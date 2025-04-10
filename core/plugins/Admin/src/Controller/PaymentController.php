<?php

namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Http\Response;
use Cake\Core\Exception\Exception;
use Cake\Datasource\ConnectionManager;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Cake\Utility\Hash;

class PaymentController extends AppController {

    public function initialize(): void
    {
        parent::initialize();
    }

    public function list()
    {
        $this->js_page = '/assets/js/pages/list_payment.js';
        $this->set('path_menu', 'payment');
        $this->set('title_for_layout', __d('admin', 'danh_sach_giao_dich'));
    }

    public function listJson()
    {
        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }

        $table = TableRegistry::get('Payments');
        $utilities = $this->loadComponent('Utilities');

        $data = $params = [];

        $limit = PAGINATION_LIMIT_ADMIN;
        $page = 1;
        $data = !empty($this->request->getData()) ? $this->request->getData() : [];

        // params query
        $params[QUERY] = !empty($data[QUERY]) ? $data[QUERY] : [];

        // params filter
        $params[FILTER] = !empty($data[DATA_FILTER]) ? $data[DATA_FILTER] : [];
        if(!empty($params[QUERY])){
            $params[FILTER] = array_merge($params[FILTER], $params[QUERY]);
        }

        // page and limit
        $page = !empty($data[PAGINATION][PAGE]) ? intval($data[PAGINATION][PAGE]) : 1;
        $limit = !empty($data[PAGINATION][PERPAGE]) ? intval($data[PAGINATION][PERPAGE]) : PAGINATION_LIMIT_ADMIN;
        
        // sort 
        $params[SORT] = !empty($data[SORT]) ? $data[SORT] : [];
        $sort_field = !empty($params[SORT][FIELD]) ? $params[SORT][FIELD] : null;
        $sort_type = !empty($params[SORT][SORT]) ? $params[SORT][SORT] : null;

        if(!empty($data['export']) && $data['export'] == 'all') {
            $limit = 100000;
        }
        
        try {
            $payments = $this->paginate($table->queryListPayments($params), [
                'limit' => $limit,
                'page' => $page,
                'order' => [
                    $sort_field => $sort_type
                ]
            ])->toArray();
        } catch (Exception $e) {
            $payments = $this->paginate($table->queryListPayments($params), [
                'limit' => $limit,
                'page' => 1,
                'order' => [
                    $sort_field => $sort_type
                ]
            ])->toArray();
        }

        if(!empty($data['export'])) {
            return $this->exportExcelPayment($payments);
        }

        $pagination_info = !empty($this->request->getAttribute('paging')['Payments']) ? $this->request->getAttribute('paging')['Payments'] : [];
        $meta_info = $utilities->formatPaginationInfo($pagination_info);

        // lấy danh sách cổng thanh toán đưa ra ngoài ds
        $list_gateway = $table = TableRegistry::get('PaymentsGateway')->getList($this->lang);
        $list_gateway = !empty($list_gateway) ? Hash::combine(array_values($list_gateway), '{n}.code', '{n}.name') : [];

        $this->responseJson([
            CODE => SUCCESS,
            MESSAGE => __d('admin', 'xu_ly_du_lieu_thanh_cong'),
            DATA => $payments, 
            META => $meta_info,
            EXTEND => [
                'list_gateway' => $list_gateway
            ]
        ]);
    }

    public function exportExcelPayment($data = [])
    {
        if(empty($data)) return false;

        $spreadsheet = $this->initializationExcel($data);
        $writer = new Xlsx($spreadsheet);

        ob_start();
        $writer->save('php://output');
        $xlsData = ob_get_contents();
        ob_end_clean();
        
        $this->responseJson([
            CODE => SUCCESS,
            MESSAGE => __d('admin', 'xu_ly_du_lieu_thanh_cong'),
            DATA => "data:application/vnd.ms-excel;base64,".base64_encode($xlsData),
            META => [
                'name' => __d('admin', 'danh_sach_giao_dich')
            ]
        ]);
    }

    // khởi tạo file excel
    // Dùng để export dữ liệu excel và download file excel mẫu
    public function initializationExcel($data = [])
    {
        $list_payment = [
            CASH => __d('admin', 'tien_mat'),
            BANK => __d('admin', 'chuyen_khoan'),
            CREDIT => __d('admin', 'quet_the'),
            COD => __d('admin', 'cod'),
        ];

        $status_payment = [
            0 => __d('admin', 'da_huy'),
            1 => __d('admin', 'thanh_cong'),
            2 => __d('admin', 'cho_xet_duyet')
        ];

        $data_dropdown = [
            'true_false' => __d('admin', 'co') .','.__d('admin', 'khong'),
            'status' => !empty($status_payment) ? implode(',', $status_payment) : ''
        ];

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $spreadsheet->getActiveSheet()->setTitle(__d('admin', 'thong_tin_giao_dich'));

        $arr_header = [
            'id' => __d('admin', 'id'),
            'code' => __d('admin', 'ma_giao_dich'),
            'amount' => __d('admin', 'so_tien'),
            'payment_method' => __d('admin', 'phuong_thuc_thanh_toan'),
            'status' => __d('admin', 'tinh_trang'),
            'created' => __d('admin', 'thoi_gian_giao_dich'),
            'full_name' => __d('admin', 'ho_va_ten_khach_hang'),
            'note' => __d('admin', 'ghi_chu')
        ];

        if (empty($arr_header)) return false;

        $column = $column_end = 'A';
        $row = 1;

        foreach ($arr_header as $key => $header) {
            $sheet->setCellValue($column . $row, $header);
            $sheet->getStyle($column . $row)->getFont()->setBold(true);
            $sheet->getStyle($column . $row)->getAlignment()->setVertical('center');

            switch ($key) {
                case 'id':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(25, 'pt');
                    $sheet->getStyle($column . $row)->getAlignment()->setHorizontal('center');
                    break;
                case 'code':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(120, 'pt');
                    break;
                case 'amount':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(120, 'pt');
                    $sheet->getStyle($column . $row)->getAlignment()->setHorizontal('center');
                    break;
                case 'payment_method':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(150, 'pt');
                    $sheet->getStyle($column . $row)->getAlignment()->setHorizontal('center');
                    break;
                case 'status':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(90, 'pt');
                    $sheet->getStyle($column . $row)->getAlignment()->setHorizontal('center');
                    break;
                case 'created':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(100, 'pt');
                    break;
                case 'full_name':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(200, 'pt');
                    $sheet->getStyle($column . $row)->getAlignment()->setHorizontal('center');
                    break;
                case 'note':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(250, 'pt');
                    break;
                
                default: 
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
            }

            $column_end = $column;
            $column++;
        }

        // style excel
        $spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(25);
        $spreadsheet->getActiveSheet()->getStyle('A1:' . $column_end . '1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('fcb789');

        $row_excel = 2;
        foreach ($data as $key => $item) { 
            // thêm dữ liệu full vào row excel
            $colum_excel = 'A';
            foreach ($arr_header as $code => $header) {

                switch ($code) {
                    case 'amount': 
                        $amount = !empty($item[$code]) ? number_format(floatval($item[$code])) : '';

                        $sheet->setCellValue($colum_excel . $row_excel, !empty($amount) ? $amount : '');
                        $sheet->getStyle($colum_excel . $row_excel)->getAlignment()->setHorizontal('center');

                        break;
                    case 'payment_method': 
                        $payment_method = !empty($item['payment_method']) ? $item['payment_method'] : [];
                        $payment_name = !empty($list_payment[$payment_method]) ? $list_payment[$payment_method] : '';


                        $sheet->setCellValue($colum_excel . $row_excel, !empty($payment_name) ? $payment_name : '');
                        $sheet->getStyle($colum_excel . $row_excel)->getAlignment()->setHorizontal('center');

                        break;
                    case 'status':
                        $status = !empty($item['status']) ? $item['status'] : null;
                        $status_name = !empty($status_payment[$status]) ? $status_payment[$status] : '';

                        $sheet->setCellValue($colum_excel . $row_excel, !empty($status_name) ? $status_name : '');

                        $validation = $spreadsheet->getActiveSheet()->getCell($colum_excel.$row_excel)->getDataValidation();
                        $validation->setType( \PhpOffice\PhpSpreadsheet\Cell\Datavalidation::TYPE_LIST );
                        $validation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\Datavalidation::STYLE_INFORMATION );
                        $validation->setAllowBlank(false);
                        $validation->setShowInputMessage(true);
                        $validation->setShowErrorMessage(true);
                        $validation->setShowDropDown(true);
                        $validation->setErrorTitle('Input error');
                        $validation->setError('Value is not in list.');
                        $validation->setPromptTitle('Pick from list');
                        $validation->setPrompt('Please pick a value from the drop-down list.');
                        $validation->setFormula1('"' . $data_dropdown['status'] . '"');

                        $sheet->getStyle($colum_excel . $row_excel)->getAlignment()->setHorizontal('center');

                        break;
                    case 'created': 
                        $created = !empty($item[$code]) ? date('H:i - d/m/Y', $item[$code]) : '';

                        $sheet->setCellValue($colum_excel . $row_excel, !empty($created) ? $created : '');
                        $sheet->getStyle($colum_excel . $row_excel)->getAlignment()->setHorizontal('center');

                        break;
                    default:
                        $sheet->setCellValue($colum_excel . $row_excel, !empty($item[$code]) ? $item[$code] : '');
                        break;
                }

                $sheet->getStyle($colum_excel . $row_excel)->getAlignment()->setVertical('center');
                $colum_excel ++;
            }

            $row_excel ++;
        }

        return $spreadsheet;
    }

    public function detail($code = null)
    {
        $payment_info = TableRegistry::get('Payments')->getDetailPayment($code);
        if (empty($payment_info)) $this->showErrorPage();

        
        if(!empty($payment_info['foreign_id']) && $payment_info['foreign_type'] == ORDER){
            $payment_info['order'] = TableRegistry::get('Orders')->getDetailOrder($payment_info['foreign_id']);
        }

        $table_log = TableRegistry::get('PaymentsLog');
        $payment_id = !empty($payment_info['id']) ? intval($payment_info['id']) : null;

        $payment_logs = $table_log->queryListPaymentsLog([
            'get_user' => true,
            FILTER => ['payment_id' => $payment_id]
        ])->toArray();

        $payment_info['logs'] = [];
        if (!empty($payment_logs)) {
            foreach ($payment_logs as $key => $log) {
                $payment_info['logs'][] = $table_log->formatDataPaymentLogDetail($log);
            }
        }

        $this->set('payment', $payment_info);

        $this->js_page = [
            '/assets/js/pages/payment_detail.js',
        ];

        if($this->request->is('ajax')){
            $this->viewBuilder()->enableAutoLayout(false);
            $this->render('detail_quick_view');
        }else{
            $this->set('path_menu', 'payment');        
            $this->set('title_for_layout', __d('admin', 'chi_tiet_giao_dich'));
        }
    }

    public function changeNote()
    {
        $this->layout = false;
        $this->autoRender = false;

        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }

        $data = !empty($this->request->getData()) ? $this->request->getData() : [];

        $id = !empty($data['id']) ? intval($data['id']) : null;
        $value = !empty($data['value']) ? $data['value'] : 0;
        $type = !empty($data['type']) ? $data['type'] : '';

        // validate data
        if (empty($id) || empty($type)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $payments_table = TableRegistry::get('Payments');
        if ( !empty($type) && $type == 'note' ) {
            $data_save['note'] = $value;
        }
        $payment = $payments_table->find()->where(['id' => $id])->first();
        $payment = $payments_table->patchEntity($payment, $data_save);

        try{
            // save data
            $save = $payments_table->save($payment);

            if (empty($save->id)){
                throw new Exception();
            }

            // save log payment
            $save_log = TableRegistry::get('PaymentsLog')->saveLog($save);
            if (!$save_log){
                throw new Exception();
            }

            $this->responseJson([CODE => SUCCESS, DATA => ['id' => $save->id]]);
        }catch (Exception $e) {
            $this->responseJson([MESSAGE => $e->getMessage()]);
        }
    }

    public function changeStatus()
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = $this->getRequest()->getData();
        $ids = !empty($data['ids']) ? $data['ids'] : [];
        $status = isset($data['status']) ? intval($data['status']) : null;

        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }

        if (empty($ids) || !is_array($ids) || !isset($status)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $table = TableRegistry::get('Payments');
        $table_log = TableRegistry::get('PaymentsLog');
        $table_order = TableRegistry::get('Orders');
        $customer_point_component = $this->loadComponent('Admin.CustomersPoint');

        // kiểm tra danh sách ids có được xử lý giao dịch hay không
        // nếu xác nhận giao dịch hoặc hủy thì check xem trong danh sách ids nếu có giao dịch đã hủy hoặc đã thành công thì loại bỏ các id không được phép, chỉ cập nhật những id được phép
        $check_condition = $table->find()->where([
            'id IN' => $ids,
            'status IN' => 2
        ])->select(['id'])->toArray();

        $ids = !empty($check_condition) ? array_column($check_condition, 'id') : [];
        if (empty($ids)) {
            $this->responseJson([MESSAGE => __d('admin', 'trang_thai_giao_dich_khong_hop_le')]);
        }        
        
        $conn = ConnectionManager::get('default');

        try{
            $conn->begin();

            foreach($ids as $id){
                $payment_info = $table->find()->where(['id' => $id])->first(); 
                if (empty($payment_info)) continue;

                $foreign_id = !empty($payment_info['foreign_id']) ? $payment_info['foreign_id'] : null;
                $foreign_type = !empty($payment_info['foreign_type']) ? $payment_info['foreign_type'] : null;

                // save data
                $payment_info = $table->patchEntity($payment_info, ['status' => $status]);
                $save = $table->save($payment_info);
                if (empty($save->id)){
                    throw new Exception();
                }

                // save log payment
                $save_log = $table_log->saveLog($save);
                if (!$save_log){
                    throw new Exception();
                }

                if(!empty($foreign_id) && $foreign_type == ORDER && $status == 1){
                    $update_order = $table_order->updateAfterPayment($foreign_id);
                    if (empty($update_order)){
                        throw new Exception();
                    }

                    // cộng điểm thưởng sau khi đơn hàng thành công
                    $customer_point_component->refundPointOrder($foreign_id);
                }

                if(!empty($foreign_id) && $foreign_type == POINT && $status == 1){
                    $update_point = $customer_point_component->updatePointAfterPayment($foreign_id);
                    if (empty($update_point[CODE] || $update_point[CODE] != SUCCESS)){
                        throw new Exception();
                    }
                }    
            }           

            $conn->commit();

            $this->responseJson([CODE => SUCCESS, MESSAGE => __d('admin', 'cap_nhat_thanh_cong')]);
        } catch (Exception $e) {
            $conn->rollback();
            $this->responseJson([MESSAGE => $e->getMessage()]);  
        }
    }

    public function confirm($id = null)
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = $this->getRequest()->getData();
        $status = isset($data['status']) ? intval($data['status']) : null;
        $amount = isset($data['amount']) ? floatval(str_replace(',', '', $data['amount'])) : null;
        $note = !empty($data['note']) ? trim($data['note']) : null;

        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }

        if (empty($amount) || !isset($status)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $table = TableRegistry::get('Payments');

        $payment_info = $table->find()->where(['id' => $id])->select()->first();
        if (empty($payment_info)) {
            $this->responseJson([MESSAGE => __d('admin', 'khong_lay_duoc_thong_tin_giao_dich')]);
        }

        $current_status = !empty($payment_info['status']) ? intval($payment_info['status']) : null;
        if (empty($current_status) || $current_status != 2) {
            $this->responseJson([MESSAGE => __d('admin', 'trang_thai_giao_dich_khong_hop_le')]);
        } 

        $data_save = [
            'status' => $status,
            'amount' => $amount
        ];

        if (!empty($note)) {
            $data_save['note'] = $note;
        }

        $entity = $table->patchEntity($payment_info, $data_save);
        $conn = ConnectionManager::get('default');

        try{
            $conn->begin();

            $save = $table->save($entity);
            if (empty($save->id)){
                throw new Exception();
            }

            // save log payment
            $save_log = TableRegistry::get('PaymentsLog')->saveLog($save);
            if (!$save_log){
                throw new Exception();
            }

            $foreign_id = !empty($payment_info['foreign_id']) ? $payment_info['foreign_id'] : null;
            $foreign_type = !empty($payment_info['foreign_type']) ? $payment_info['foreign_type'] : null;

            if(!empty($foreign_id) && $foreign_type == ORDER && $status == 1){
                $update_order = TableRegistry::get('Orders')->updateAfterPayment($foreign_id);
                if (empty($update_order)){
                    throw new Exception();
                }

                // cộng điểm thưởng sau khi đơn hàng thành công
                $this->loadComponent('Admin.CustomersPoint')->refundPointOrder($foreign_id);
            }

            if(!empty($foreign_id) && $foreign_type == POINT && $status == 1){
                $update_point = $this->loadComponent('Admin.CustomersPoint')->updatePointAfterPayment($foreign_id);
                if (empty($update_point[CODE] || $update_point[CODE] != SUCCESS)){
                    throw new Exception();
                }
            }       

            $conn->commit();

            $this->responseJson([CODE => SUCCESS, MESSAGE => __d('admin', 'cap_nhat_thanh_cong')]);
        } catch (Exception $e) {
            $conn->rollback();
            $this->responseJson([MESSAGE => $e->getMessage()]);  
        }
    }
}