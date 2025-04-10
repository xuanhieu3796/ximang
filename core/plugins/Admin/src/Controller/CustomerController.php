<?php

namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Http\Response;
use Cake\ORM\Query;
use Cake\Core\Exception\Exception;
use Cake\Utility\Hash;
use Cake\Datasource\ConnectionManager;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Cake\Utility\Security;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class CustomerController extends AppController {

    protected $limit_import = 50;
    public function initialize(): void
    {
        parent::initialize();        
    }

    public function list() 
    {
        $this->css_page = [
            '/assets/css/pages/wizard/wizard-1.css',
            '/assets/plugins/custom/jquery-ui/jquery-ui.bundle.css'
        ];

        $this->js_page = [
            '/assets/plugins/custom/jquery-ui/jquery-ui.bundle.js',
            '/assets/js/pages/list_customer.js'
        ];

        $this->set('path_menu', 'customer');
        $this->set('title_for_layout', __d('admin', 'khach_hang'));
    }

    public function listJson()
    {

        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }

        $table = TableRegistry::get('Customers');
        $utilities = $this->loadComponent('Utilities');

        $data = $params = $brands = [];

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
        $params['get_account'] = true;
        $params['get_point'] = true;
        $params['get_order'] = true;

        // params sort         
        $params[SORT] = !empty($data[SORT]) ? $data[SORT] : [];

        // page and limit
        $page = !empty($data[PAGINATION][PAGE]) ? intval($data[PAGINATION][PAGE]) : 1;
        $limit = !empty($data[PAGINATION][PERPAGE]) ? intval($data[PAGINATION][PERPAGE]) : PAGINATION_LIMIT_ADMIN;

        // sort 
        $sort_field = !empty($params[SORT][FIELD]) ? $params[SORT][FIELD] : null;
        $sort_type = !empty($params[SORT][SORT]) ? $params[SORT][SORT] : null;

        // format data filter source
        $sources = !empty($params[FILTER]['source']) ? $params[FILTER]['source'] : [];
        if (!empty($sources) && is_array($sources)) {
            $source = [];
            foreach ($sources as $key => $item) {
                if (empty($item['value'])) continue;

                $source[] = $item['value'];
            }

            $params[FILTER]['source'] = !empty($source) ? $source : [];
        }

        if(!empty($data['export']) && $data['export'] == 'all') {
            $limit = 100000;
        }

        try {
            $customers = $this->paginate($table->queryListCustomers($params), [
                'limit' => $limit,
                'page' => $page,
                'order' => [
                    $sort_field => $sort_type
                ]
            ])->toArray();

        } catch (Exception $e) {
            $page = 1;
            $customers = $this->paginate($table->queryListCustomers($params), [
                'limit' => $limit,
                'page' => $page,
                'order' => [
                    $sort_field => $sort_type
                ]
            ])->toArray();
        }

        $pagination_info = !empty($this->request->getAttribute('paging')['Customers']) ? $this->request->getAttribute('paging')['Customers'] : [];
        $meta_info = $utilities->formatPaginationInfo($pagination_info);

        $result = [];
        if(!empty($customers)){
            foreach ($customers as $key => $customer) {
                $result[] = $table->formatDataCustomerDetail($customer);
            }
        }

        if(!empty($data['export'])) {
            return $this->exportExcelCustomer($result);
        }

        $this->responseJson([
            CODE => SUCCESS,
            MESSAGE => __d('admin', 'xu_ly_du_lieu_thanh_cong'),
            DATA => $result, 
            META => $meta_info
        ]);
    }

    public function exportExcelCustomer($data = [])
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
                'name' => __d('admin', 'danh_sach_khach_hang')
            ]
        ]);
    }

    // khởi tạo file excel
    // Dùng để export dữ liệu excel và download file excel mẫu
    public function initializationExcel($data = [])
    {
        $list_sex = [
            'male' => __d('admin', 'nam'),
            'female' => __d('admin', 'nu'),
            'other' => __d('admin', 'khac')
        ];

        $data_dropdown = [
            'status' => __d('admin', 'hoat_dong') .','.__d('admin', 'ngung_hoat_dong'),
            'sex' => !empty($list_sex) ? implode(',', $list_sex) : ''
        ];

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $spreadsheet->getActiveSheet()->setTitle(__d('admin', 'thong_tin_khach_hang'));

        $arr_header = [
            'id' => __d('admin', 'id'),
            'code' => __d('admin', 'ma_khach_hang'),
            'full_name' => __d('admin', 'ho_va_ten'),
            'phone' => __d('admin', 'so_dien_thoai'),
            'email' => 'Email',
            'birthday' => __d('admin', 'ngay_sinh'),
            'sex' => __d('admin', 'gioi_tinh'),
            'city_name' => __d('admin', 'tinh_thanh'),
            'district_name' => __d('admin', 'quan_huyen'),
            'ward_name' => __d('admin', 'phuong_xa'),
            'address' => __d('admin', 'dia_chi'),
            'status' => __d('admin', 'trang_thai'),
            'username' => __d('admin', 'tai_khoan'),
            'zip_code' => 'Zip code',
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
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(100, 'pt');
                    $sheet->getStyle($column . $row)->getAlignment()->setHorizontal('center');
                    break;
                case 'full_name':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(200, 'pt');
                    $sheet->getStyle($column . $row)->getAlignment()->setHorizontal('center');
                    break;
                case 'phone':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(90, 'pt');
                    $sheet->getStyle($column . $row)->getAlignment()->setHorizontal('center');
                    break;
                case 'email':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(150, 'pt');
                    break;
                case 'birthday':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(90, 'pt');
                    $sheet->getStyle($column . $row)->getAlignment()->setHorizontal('center');
                    break;
                case 'sex':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(50, 'pt');
                    $sheet->getStyle($column . $row)->getAlignment()->setHorizontal('center');
                    break;
                case 'username':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(150, 'pt');
                    $sheet->getStyle($column . $row)->getAlignment()->setHorizontal('center');
                    break;
                case 'city_name':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(90, 'pt');
                    $sheet->getStyle($column . $row)->getAlignment()->setHorizontal('center');
                    break;
                case 'district_name':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(100, 'pt');
                    $sheet->getStyle($column . $row)->getAlignment()->setHorizontal('center');
                    break;
                case 'ward_name':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(100, 'pt');
                    $sheet->getStyle($column . $row)->getAlignment()->setHorizontal('center');
                    break;
                case 'address':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(250, 'pt');
                    break;
                case 'zip_code':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(100, 'pt');
                    break;
                case 'status':
                    $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(90, 'pt');
                    $sheet->getStyle($column . $row)->getAlignment()->setHorizontal('center');
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
                    case 'id':
                    case 'code':
                    case 'phone':
                    case 'birthday':
                    case 'city_name':
                    case 'district_name':
                    case 'ward_name':
                    case 'zip_code':
                        $sheet->setCellValue($colum_excel . $row_excel, !empty($item[$code]) ? $item[$code] : '');
                        $sheet->getStyle($colum_excel . $row_excel)->getAlignment()->setHorizontal('center');

                        break;
                    case 'sex':
                        $sex = !empty($item[$code]) ? $item[$code] : '';
                        $sex_name = !empty($sex) && !empty($list_sex[$sex]) ? $list_sex[$sex] : '';

                        $sheet->setCellValue($colum_excel . $row_excel, $sex_name);

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
                        $validation->setFormula1('"' . $data_dropdown['sex'] . '"');

                        $sheet->getStyle($colum_excel . $row_excel)->getAlignment()->setHorizontal('center');
                        break;
                    case 'status':
                        $sheet->setCellValue($colum_excel . $row_excel, !empty($item['status']) ? __d('admin', 'hoat_dong') : __d('admin', 'ngung_hoat_dong'));

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

    public function autoSuggest()
    {
        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }

        $table = TableRegistry::get('Customers');
        $data = !empty($this->request->getData()) ? $this->request->getData() : [];
        
        $filter = !empty($data[FILTER]) ? $data[FILTER] : [];
        $get_params = !empty($data['get_params']) ? $data['get_params'] : [];
        $filter[STATUS] = 1;

        $params = [
            FILTER => $filter,
            FIELD => SIMPLE_INFO
        ];

        if(!empty($get_params)){
            $params['get_user'] = !empty($get_params['get_user']) ? true : false;
            $params['get_account'] = !empty($get_params['get_account']) ? true : false;
            $params['get_default_address'] = !empty($get_params['get_default_address']) ? true : false;
            $params['get_list_address'] = !empty($get_params['get_list_address']) ? true : false;
            $params['get_point'] = !empty($get_params['get_point']) ? true : false;
            $params['get_bank'] = !empty($get_params['get_bank']) ? true : false;
            $params['address_id'] = !empty($get_params['address_id']) ? true : false;
        }
        
        $customers = $table->queryListCustomers($params)->limit(10)->toArray();

        $result = [];
        if(!empty($customers)){
            foreach($customers as $customer){
                $item = $table->formatDataCustomerDetail($customer);
                $full_name = !empty($item['phone']) ? $item['full_name'] : null;
                $phone = !empty($item['phone']) ? $item['phone'] : null;
                $email = !empty($item['email']) ? $item['email'] : null;

                $item['full_name_phone'] = $item['full_name_email'] = $full_name;
                if(!empty($phone)) {
                    $item['full_name_phone'] = $full_name . ' - ' . $phone;
                }

                if(!empty($email)) {
                    $item['full_name_email'] = $full_name . ' - ' . $email;
                }

                $result[] = $item;
            }
        }
  
        $this->responseJson([
            CODE => SUCCESS,
            MESSAGE => __d('admin', 'xu_ly_du_lieu_thanh_cong'),
            DATA => $result, 
        ]);
    }

    public function add() 
    {
        $cities_table = TableRegistry::get('Cities');
        $users_table = TableRegistry::get('Users');

        $this->js_page = [
            '/assets/js/pages/customer_add.js'
        ];
        $this->set('path_menu', 'customer');
        $this->set('title_for_layout', __d('admin', 'them_khach_hang'));
    }

    public function update($id = null) 
    {
        $customers_table = TableRegistry::get('Customers');

        $customer = $customers_table->getDetailCustomer($id, [
            'get_user' => false,
            'get_list_address' => true
        ]);

        if(empty($customer)){
            $this->showErrorPage();
        }
        $customer = $customers_table->formatDataCustomerDetail($customer);

        $this->js_page = [
            '/assets/js/pages/customer_update.js',
        ];

        $this->set('id', $id);
        $this->set('customer', $customer);
        $this->set('path_menu', 'customer');
        $this->set('title_for_layout', __d('admin', 'cap_nhat_khach_hang'));
    }

    public function saveAddress($customer_id = null)
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = $this->getRequest()->getData(); 

        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }

        if (empty($data)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        if(empty($customer_id)){
            $this->responseJson([MESSAGE => __d('admin', 'khong_lay_duoc_thong_tin_khach_hang')]);
        }
    
        $customer_component = $this->loadComponent('Admin.Customer');
        $result = $customer_component->saveAddress($data, $customer_id);


        if($result[CODE] == SUCCESS){
            $data_result = !empty($result[DATA]) ? $result[DATA] : [];
            if(!empty($data_result)){
                $customer_id = !empty($data_result['customer_id']) ? intval($data_result['customer_id']) : null;
                $customer_info = TableRegistry::get('Customers')->get($customer_id);

                $data_result['full_name'] = !empty($customer_info['full_name']) ? $customer_info['full_name'] : null;
                $data_result['email'] = !empty($customer_info['email']) ? $customer_info['email'] : null;
                $data_result['address_name'] = !empty($data_result['name']) ? $data_result['name'] : null;
            }
            $result[DATA] = $data_result;
        }

        exit(json_encode($result));
    }

    public function getAddress($id = null)
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = $this->getRequest()->getData(); 

        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }

        if (empty($data['id'])) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $address_info = TableRegistry::get('CustomersAddress')->get($data['id']);
    
        $this->responseJson([
            CODE => SUCCESS,
            MESSAGE => __d('admin', 'xu_ly_du_lieu_thanh_cong'),
            DATA => $address_info
        ]);
    }

    public function saveNote($id = null)
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = $this->getRequest()->getData(); 

        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }

        $comment = !empty($data['comment']) ? $data['comment'] : null;
        if(empty($comment)){
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $customers_table = TableRegistry::get('Customers');
        $customer_info = $customers_table->get($id);
        if(empty($customer_info)){
            $this->showErrorPage();
        }

        $utilities = $this->loadComponent('Utilities');
        $date = $utilities->stringDateTimeToInt(date('Y-m-d H:i:s'));

        $note = !empty($customer_info['note']) ? json_decode($customer_info['note'], true) : [];
        $note[] = [
            'comment' => $comment,
            'created_by' => null,
            'created' => $date
        ];

        $data_save = [
            'id' => $id,
            'note' => json_encode($note)
        ];

        $customer = $customers_table->patchEntity($customer_info, $data_save, ['validate' => false]);
        
        $conn = ConnectionManager::get('default');
        try{
            $conn->begin();

            $save = $customers_table->save($customer);
            if (empty($save->id)){
                throw new Exception();
            }

            $conn->commit();
            $this->responseJson([CODE => SUCCESS, DATA => ['id' => $save->id]]);

        }catch (Exception $e) {
            $conn->rollback();
            $this->responseJson([MESSAGE => $e->getMessage()]);
        }     
    }

    public function save($id = null) 
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = $this->getRequest()->getData();    

        if (!$this->getRequest()->is('post') || empty($data)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $data_save = [
            'full_name' => !empty($data['full_name']) ? strip_tags(trim($data['full_name'])) : null,
            'username' => !empty($data['username']) ? $data['username'] : null,
            'password' => !empty($data['password']) ? $data['password'] : null,
            'address_name' => !empty($data['name']) ? $data['name'] : __d('admin', 'mac_dinh'),
            'phone' => !empty($data['phone']) ? $data['phone'] : null,
            'email' => !empty($data['email']) ? $data['email'] : null,
            'staff_id' => !empty($data['staff_id']) ? $data['staff_id'] : null,
            'code' => !empty($data['code']) ? $data['code'] : null,
            'birthday' => !empty($data['birthday']) ? $data['birthday'] : null,
            'sex' => !empty($data['sex']) ? $data['sex'] : null,
            'is_default' => empty($data['is_default']) ? 1 : 0,
            'city_id' => !empty($data['city_id']) ? $data['city_id'] : null,
            'district_id' => !empty($data['district_id']) ? $data['district_id'] : null,
            'ward_id' => !empty($data['ward_id']) ? $data['ward_id'] : null,
            'address' => !empty($data['address']) ? $data['address'] : null,
            'zip_code' => !empty($data['zip_code']) ? $data['zip_code'] : null,
            'tracking_source' => 'Direct',
            'status_account' => !empty($data['status_account']) ? intval($data['status_account']) : null
        ];

        $result = $this->loadComponent('Admin.Customer')->saveCustomer($data_save, $id);

        if($result[CODE] == SUCCESS){
            $result[DATA] = TableRegistry::get('Customers')->formatDataCustomerDetail($result[DATA]);
        }

        exit(json_encode($result));
    }

    public function detail($id = null)
    {
        $table = TableRegistry::get('Customers');

        $customer = $table->getDetailCustomer($id, [
            'get_account' => true,
            'get_default_address' => true,
            'get_list_address' => true
        ]);
        
        $customer = $table->formatDataCustomerDetail($customer);
        if(empty($customer)){
            $this->showErrorPage();
        }

        $orders = TableRegistry::get('Orders')->find()->contain(['OrdersContact'])
        ->where([
            'OrdersContact.customer_id' => $id,
            'Orders.type' => ORDER,
            'Orders.deleted' => 0
        ])->select([
            'Orders.id', 'Orders.created', 'Orders.code', 'Orders.note', 'Orders.total', 'Orders.status'
        ])->toArray();

        $this->js_page = [
            '/assets/js/pages/customer_detail.js'
        ];

        $this->set('id', $id);
        $this->set('customer', $customer);
        $this->set('orders', $orders);

        if($this->request->is('ajax')){
            $this->viewBuilder()->enableAutoLayout(false);
            $this->render('detail_quick_view');
        }else{
            $this->set('path_menu', 'customer');
            $this->set('title_for_layout', __d('admin', 'chi_tiet_khach_hang'));
        }
    }

    public function checkExist($type = null)
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = $this->getRequest()->getData();       
        $phone = !empty($data['phone']) ? trim($data['phone']) : null;
        $email = !empty($data['email']) ? trim($data['email']) : null;

        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }

        if (empty($phone) && empty($email)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $check = false;

        $table = TableRegistry::get('Customers');        
        switch($type){
            case 'phone':
                $check = $table->checkPhoneExist($phone);
            break;

            case 'email':
                $check = $table->checkEmailExist($email);
            break;
        }
        
        $this->responseJson([
            CODE => SUCCESS,
            MESSAGE => __d('admin', 'xu_ly_du_lieu_thanh_cong'),
            DATA => ['exist' => $check]
        ]);
    }

    public function changeStatus()
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = $this->getRequest()->getData();
        $ids = !empty($data['ids']) ? $data['ids'] : [];
        $status = !empty($data['status']) ? 1 : 0;

        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }

        if (empty($ids) || !is_array($ids)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $customers_table = TableRegistry::get('Customers');
        try{
            $customers_table->updateAll(
                [  
                    'status' => $status
                ],
                [  
                    'id IN' => $ids
                ]
            );

            $this->responseJson([CODE => SUCCESS, MESSAGE => __d('admin', 'cap_nhat_thanh_cong')]);

        }catch (Exception $e) {
            $this->responseJson([MESSAGE => $e->getMessage()]);  
        }
    }

    public function delete()
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = $this->getRequest()->getData();
        $ids = !empty($data['ids']) ? $data['ids'] : [];
        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }

        if (empty($ids) || !is_array($ids)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $customers_table = TableRegistry::get('Customers');

        $conn = ConnectionManager::get('default');
        try{
            $conn->begin();
            foreach($ids as $id){
                // delete customer
                $customer_info = $customers_table->find()->where(['Customers.id' => $id])->contain(['Account'])->first();
                if (empty($customer_info)) {
                    $this->responseJson([MESSAGE => __d('admin', 'khong_lay_duoc_thong_tin_khach_hang')]);
                }
                if(!empty($customer_info['Account'])){
                    $customer = $customers_table->patchEntity($customer_info, [
                        'id' => $id, 
                        'deleted' => 1,
                        'Account' => [
                            'deleted' => 1
                        ]
                    ], ['validate' => false]);
                } else {
                    $customer = $customers_table->patchEntity($customer_info, [
                        'id' => $id, 
                        'deleted' => 1
                    ], ['validate' => false]);
                }
                $delete_customer = $customers_table->save($customer);
                if (empty($delete_customer)){
                    throw new Exception();
                }
            }

            $conn->commit();

            $this->responseJson([CODE => SUCCESS, MESSAGE => __d('admin', 'xoa_du_lieu_thanh_cong')]);

        }catch (Exception $e) {
            $conn->rollback();
            $this->responseJson([MESSAGE => $e->getMessage()]);  
        }
    }

    public function setDefault()
    {
        $this->layout = false;
        $this->autoRender = false;

        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }

        $data = $this->getRequest()->getData();

        if (empty($data)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $customer_component = $this->loadComponent('Admin.Customer');
        $update_default = $customer_component->setDefault($data);
        exit(json_encode($update_default));
    }

    public function deleteAddress()
    {
        $this->layout = false;
        $this->autoRender = false;

        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }

        $data = $this->getRequest()->getData();

        if (empty($data)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $customer_component = $this->loadComponent('Admin.Customer');
        $result = $customer_component->deleteAddress($data);
        exit(json_encode($result));
    }

    public function deleteNote()
    {
        $this->layout = false;
        $this->autoRender = false;

        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }

        $data = $this->getRequest()->getData();
        $id = !empty($data['id']) ? $data['id'] : null;
        $index = isset($data['index']) ? $data['index'] : null;
        if (empty($id)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $table = TableRegistry::get('Customers');

        // delete customer address
        $customer_info = $table->get($id);
        $note = !empty($customer_info['note']) ? json_decode($customer_info['note'], true) : [];

        if (empty($note[$index])) {
            $this->responseJson([MESSAGE => __d('admin', 'khong_tim_thay_thong_tin_ghi_chu')]);
        }

        unset($note[$index]);

        $data_save = [
            'id' => $id,
            'note' => json_encode($note)
        ];

        $customer = $table->patchEntity($customer_info, $data_save, ['validate' => false]);
        
        $conn = ConnectionManager::get('default');
        try{
            $conn->begin();

            $save = $table->save($customer);
            if (empty($save->id)){
                throw new Exception();
            }

            $conn->commit();
            $this->responseJson([CODE => SUCCESS, DATA => ['id' => $save->id]]);

        }catch (Exception $e) {
            $conn->rollback();
            $this->responseJson([MESSAGE => $e->getMessage()]);
        } 
    }

    public function changePassword($id = null)
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = $this->getRequest()->getData();    

        if (!$this->getRequest()->is('post') || empty($data) || empty($id)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $password = !empty($data['password']) ? $data['password'] : null;

        $account_table = TableRegistry::get('CustomersAccount');        
        $account_info = $account_table->find()->where(['customer_id' => $id])->first();
        if (empty($account_info)) {
            $this->responseJson([MESSAGE => __d('template', 'khong_lay_duoc_thong_tin_tai_khoan')]);
        }

        $password = Security::hash($password, 'md5', false);
        
        $data_account = $account_table->patchEntity($account_info, [
            'password' => $password
        ]);

        $conn = ConnectionManager::get('default');
        try{
            $conn->begin();

            $save = $account_table->save($data_account);

            if (empty($save->id)){
                throw new Exception();
            }

            $conn->commit();
            $this->responseJson([CODE => SUCCESS]);

        }catch (Exception $e) {
            $conn->rollback();
            $this->responseJson([MESSAGE => $e->getMessage()]);
        }
    }

    public function addAccount($id = null)
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = $this->getRequest()->getData();    

        if (!$this->getRequest()->is('post') || empty($data) || empty($id)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        if(empty($data['username'])) {
            $this->responseJson([MESSAGE => __d('template', 'vui_long_nhap_tai_khoan_dang_ky')]);
        }

        if(empty($data['password'])) {
            $this->responseJson([MESSAGE => __d('template', 'vui_long_nhap_mat_khau')]);
        }
        $table = TableRegistry::get('CustomersAccount');

        $username_exist = $table->checkExistUsername($data['username']);
        if($username_exist){
            $this->responseJson([MESSAGE => __d('template', 'tai_khoan_da_duoc_dang_ky')]);
        }

        $data_save = [
            'customer_id' => $id,
            'username' => !empty($data['username']) ? trim(strip_tags($data['username'])) : null,
            'password' => !empty($data['password']) ? Security::hash($data['password'], 'md5', false) : null
        ];

        $customer = $table->newEntity($data_save);

        $utilities = $this->loadComponent('Utilities');

        // show error validation in model
        if($customer->hasErrors()){
            $list_errors = $utilities->errorModel($customer->getErrors());
            
            $this->responseJson([
                MESSAGE => !empty($list_errors[0]) ? $list_errors[0] : null,
                DATA => $list_errors
            ]);             
        }

        $conn = ConnectionManager::get('default');
        try{
            $conn->begin();

            $save = $table->save($customer);
            if (empty($save->id)){
                throw new Exception();
            }

            $conn->commit();
            $this->responseJson([CODE => SUCCESS, DATA => ['id' => $save->id]]);

        }catch (Exception $e) {
            $conn->rollback();
            $this->responseJson([MESSAGE => $e->getMessage()]);
        } 
    }

    public function accountStatus($id = null)
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = $this->getRequest()->getData();    

        if (!$this->getRequest()->is('post') || empty($data) || empty($id)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $account_status = isset($data['account_status']) ? intval($data['account_status']) : 0;

        $account_table = TableRegistry::get('CustomersAccount');        
        $account_info = $account_table->find()->where(['customer_id' => $id])->first();
        if (empty($account_info)) {
            $this->responseJson([MESSAGE => __d('template', 'khong_lay_duoc_thong_tin_tai_khoan')]);
        }
        
        $data_account = $account_table->patchEntity($account_info, [
            'status' => $account_status
        ]);

        $conn = ConnectionManager::get('default');
        try{
            $conn->begin();

            $save = $account_table->save($data_account);

            if (empty($save->id)){
                throw new Exception();
            }

            $conn->commit();
            $this->responseJson([CODE => SUCCESS]);

        }catch (Exception $e) {
            $conn->rollback();
            $this->responseJson([MESSAGE => $e->getMessage()]);
        }
    }

    public function importDataByExcel()
    {
        $this->layout = false;
        $this->autoRender = false;

        $excel_file = !empty($_FILES['excel_file']) ? $_FILES['excel_file'] : [];

        if (!$this->getRequest()->is('post') || empty($excel_file)) {
            $this->responseJson([MESSAGE => __d('template', 'du_lieu_khong_hop_le')]);
        }
        $upload = $this->loadComponent('Upload');
        $files = !empty($excel_file['tmp_name']) ? $excel_file['tmp_name'] : null;

        /**  Identify the type of $inputFileName  **/
        $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($files);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
        $spreadsheet = $reader->load($files);

        $data_excel = $spreadsheet->getActiveSheet()->toArray();

        if (empty($data_excel) || count($data_excel) < 2) {
            $this->responseJson([MESSAGE => __d('template', 'du_lieu_khong_hop_le')]);
        }

        // xóa dữ liệu tiêu đề và header
        unset($data_excel[0]);

        $utilities = $this->loadComponent('Utilities');
        $table = TableRegistry::get('Customers');

        $languages = TableRegistry::get('Languages')->getList();
        $brands = TableRegistry::get('Brands')->getListBrands($this->lang);
        
        $arr_sex = [
            'male' => __d('admin', 'nam'),
            'female' => __d('admin', 'nu'),
            'other' => __d('admin', 'khac')
        ];
        $arr_status = [
            1 => __d('admin', 'hoat_dong'),
            0 => __d('admin', 'ngung_hoat_dong')
        ];

        $arr_header = [
            'id',
            'code',
            'full_name',
            'phone',
            'email',
            'birthday',
            'sex',
            'city_name',
            'district_name',
            'ward_name',
            'address',
            'status',
            'tracking_source'
        ];

        // loại bọ các trường thông tin null trong data_excel
        $data_excel = array_filter(array_map('array_filter', $data_excel));

        $data_customers = [];
        $city_id = $district_id = $id = null;
        if (!empty($data_excel)) {
            foreach ($data_excel as $key => $val) {

                // đọc dữ liệu từ excel
                foreach ($arr_header as $k => $code) {
                    switch ($code) {
                        case 'id':
                            $id = !empty($val[$k]) ? trim($val[$k]) : null;
                            $data_customers[$key][$code] = $id;

                            break;
                        case 'full_name':
                            $full_name = !empty($val[$k]) ? trim($val[$k]) : null;
                            if (empty($full_name)) $this->responseJson([MESSAGE => __d('admin', 'vui_long_nhap_ten_khach_hang')]);

                            $data_customers[$key][$code] = $full_name;

                            break;
                        case 'phone':
                            $phone = !empty($val[$k]) ? trim($val[$k]) : null;

                            if (empty($phone)) $this->responseJson([MESSAGE => __d('admin', 'vui_long_nhap_so_dien_thoai_khach_hang')]);
         
                            if(strpos($phone, '0') > 0) $phone = '0' . $phone;

                            $checkPhoneExist = $table->checkPhoneExist($phone, $id);
                            if ($checkPhoneExist && !empty($phone)) {
                                $this->responseJson([MESSAGE => __d('admin', 'so_dien_thoai_{0}_da_ton_tai_tren_he_thong_vui_long_nhap_so_dien_thoai_khac', [$phone])]);
                            }

                            $data_customers[$key][$code] = $phone;

                            break;
                        case 'email':
                            $email = !empty($val[$k]) ? trim($val[$k]) : null;

                            if (empty($email)) $this->responseJson([MESSAGE => __d('admin', 'vui_long_nhap_dia_chi_email_khach_hang')]);

                            $checkEmailExist = $table->checkEmailExist($email, $id);
                            if ($checkEmailExist && !empty($email)) {
                                $this->responseJson([MESSAGE => __d('admin', 'email_{0}_da_ton_tai_tren_he_thong_vui_long_nhap_email_khac', [$email])]);
                            }

                            $data_customers[$key][$code] = $email;

                            break;
                        case 'sex':
                            $sex = !empty($val[$k]) ? trim($val[$k]) : null;

                            foreach ($arr_sex as $key_sex => $value) {
                                if($value === $sex) $data_customers[$key][$code] = $key_sex;
                            }

                            break;
                        case 'city_name':
                            $city_name = !empty($val[$k]) ? trim($val[$k]) : null;

                            if(empty($city_name)) break;

                            $list_city = TableRegistry::get('Cities')->getListCity();
                            foreach ($list_city as $id => $name) {
                                if($city_name === $name){
                                    $city_id = $id;
                                    $data_customers[$key]['city_id'] = $city_id;  
                                } 
                            }

                            if(empty($data_customers[$key]['city_id'])) $this->responseJson([MESSAGE => __d('admin', 'tinh_{0}_khong_ton_tai_tren_he_thong_vui_long_nhap_dung_tinh_thanh', [$city_name])]);

                            break;
                        case 'district_name':
                            $district_name = !empty($val[$k]) ? trim($val[$k]) : null;

                            if(empty($district_name)) break;

                            $list_district = TableRegistry::get('Districts')->getListDistrict($city_id);
                            foreach ($list_district as $id => $name) {
                                if($district_name === $name){
                                    $district_id = $id;
                                    $data_customers[$key]['district_id'] = $district_id;  
                                } 
                            }

                            if(empty($data_customers[$key]['district_id'])) $this->responseJson([MESSAGE => __d('admin', '{0}_khong_ton_tai_tren_he_thong_vui_long_nhap_dung_quan_huyen', [$district_name])]);

                            break;
                        case 'ward_name':
                            $ward_name = !empty($val[$k]) ? trim($val[$k]) : null;

                            if(empty($ward_name)) break;

                            $list_ward = TableRegistry::get('Wards')->getListWard($district_id);
                            foreach ($list_ward as $ward_id => $name) {
                                if($ward_name === $name) $data_customers[$key]['ward_id'] = $ward_id;
                            }

                            if(empty($data_customers[$key]['ward_id'])) $this->responseJson([MESSAGE => __d('admin', '{0}_khong_ton_tai_tren_he_thong_vui_long_nhap_dung_phuong_xa', [$ward_name])]);

                            break;
                        case 'birthday':
                            $birthday = !empty($val[$k]) ? trim($val[$k]) : null;


                            if(empty($birthday)) break;

                            if(!$utilities->isDateClient($birthday)){
                                $this->responseJson([MESSAGE => __d('admin', '{0}_ngay_sinh_chua_dung_dinh_dang_ngay_thang', [$birthday])]);
                            }

                            $data_customers[$key][$code] = strtotime(date('Y-m-d 00:00:00', strtotime(str_replace('/', '-', $birthday))));

                            break;
                        case 'status':
                            $status = !empty($val[$k]) ? trim($val[$k]) : null;

                            foreach ($arr_status as $k_status => $value) {
                                if($status === $value){
                                    $data_customers[$key][$code] = $k_status;
                                } 
                            }

                            break;
                        case 'tracking_source':
                            $tracking_source = !empty($val[$k]) ? trim($val[$k]) : 'Direct';

                            $data_customers[$key][$code] = $tracking_source;

                            break;
                        default:
                            $value = !empty($val[$k]) ? trim($val[$k]) : null;

                            $data_customers[$key][$code] = $value;

                            break;
                    }
                }
            }            
        }

        if (empty($data_customers)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $result = [
            CODE => ERROR,
            MESSAGE => __d('admin', 'cap_nhat_thong_tin_khach_hang_khong_thanh_cong'),
            DATA => [],
        ];


        $dataExcel = $upload->_createTmpDataJson('excel', $data_customers, $this->limit_import);

        if(empty($dataExcel)) {
            $this->responseJson([MESSAGE => __d('admin', 'khong_tao_duoc_du_lieu')]);
        }

        exit(json_encode([
            CODE => SUCCESS,
            DATA => [
                'folder' => $dataExcel
            ]
        ]));
    }

    private function _createTmpDataJson($folder_name = 'example', $data = null, $limit = 10)
    {
        if(empty($data)) return null;

        $dir_folder = TMP . $folder_name . DS;
        $create_dir_folder = new Folder($dir_folder, true, 0755);

        $folder_child_name = Text::uuid();
        $dir_folder_child = $dir_folder . $folder_child_name . DS;


        $create_folder_child = new Folder($dir_folder_child, true, 0755);
        $files = $create_folder_child->find('.*\.json', true);

        $data = array_chunk($data, $limit);
        foreach ($data as $k_data => $v_data) {
            $file = new File($dir_folder_child . str_pad($k_data, 5, '0', STR_PAD_LEFT). '.json', true, 0755);
            $file->write(json_encode($v_data), 'w');
            $file->close();
        }

        return $folder_child_name;
    }

    public function processImportExcel()
    {   
        $this->viewBuilder()->enableAutoLayout(false);

        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }

        $data = $this->getRequest()->getData();

        $page = !empty($data['page']) ? $data['page'] : 0;
        $folder = !empty($data['folder']) ? $data['folder'] : null;

        if(empty($folder)) {
            $this->responseJson([MESSAGE => __d('admin', 'khong_lay_duoc_ten_thu_muc_excel')]);
        }

        $table = TableRegistry::get('Customers');
        $utilities = $this->loadComponent('Utilities');
        $location = $this->loadComponent('Location');
        $dir_folder = TMP . 'excel' . DS . $folder . DS;
        $create_dir_folder = new Folder($dir_folder);
        $files = $create_dir_folder->find('.*\.json', true);
        $file = new File($dir_folder . $files[$page]);

        $data = [];
        if($file->exists()){                        
            $content = $file->read();
            $file->close();
            $data = $utilities->isJson($content) ? json_decode($content, true) : [];
        }
        
        if(empty($data)) {
            $this->responseJson([MESSAGE => __d('admin', 'khong_co_du_lieu_excel')]);
        }

        $new_entities = $patch_entities = $list_customer = $address_deleted = [];
        foreach ($data as $key => $item_save) {

            $id = !empty($item_save['id']) ? intval($item_save['id']) : null;
            $full_name = !empty($item_save['full_name']) ? $item_save['full_name'] : null;
            $phone = !empty($item_save['phone']) ? $item_save['phone'] : null;
            $email = !empty($item_save['email']) ? $item_save['email'] : null;
            $city_id = !empty($item_save['city_id']) ? intval($item_save['city_id']) : null;
            $district_id = !empty($item_save['district_id']) ? intval($item_save['district_id']) : null;
            $ward_id = !empty($item_save['ward_id']) ? intval($item_save['ward_id']) : null;
            $address = !empty($item_save['address']) ? $item_save['address'] : null;

            $address_info = $location->getFullAddress([
                'city_id' => $city_id,
                'district_id' => $district_id,
                'ward_id' => $ward_id,
                'address' => $address
            ]);

            $item_save['Addresses'][] = [
                'name' => __d('admin', 'mac_dinh'),
                'phone' => $phone,
                'address' => $address,
                'country_id' => 1,
                'city_id' => $city_id,
                'district_id' => $district_id,
                'ward_id' => $ward_id,                
                'country_name' => !empty($address_info['country_name']) ? $address_info['country_name'] : null,
                'city_name' => !empty($address_info['city_name']) ? $address_info['city_name'] : null,
                'district_name' => !empty($address_info['district_name']) ? $address_info['district_name'] : null,
                'ward_name' => !empty($address_info['ward_name']) ? $address_info['ward_name'] : null,
                'full_address' => !empty($address_info['full_address']) ? $address_info['full_address'] : null,
                'is_default' => 1,
                'search_unicode' => strtolower($this->Utilities->formatSearchUnicode([$phone]))
            ];

            if(!empty($id)) {

                $customer_info = $table->getDetailCustomer($id, ['get_default_address' => true]);
                if(empty($customer_info)){
                    $this->responseJson([MESSAGE => __d('admin', 'khong_lay_duoc_thong_tin_khach_hang_co_id_la_{0}', [$id])]);
                }

                $code = !empty($customer_info['code']) ? $customer_info['code'] : null;
                $address_id = !empty($customer_info['DefaultAddress']['id']) ? intval($customer_info['DefaultAddress']['id']) : null;

                if(!empty($address_id)) array_push($address_deleted, $address_id);
                
                $item_save['search_unicode'] = strtolower($utilities->formatSearchUnicode([$full_name, $code, $email, $phone]));

                $patch_entities[] = $item_save;
                $list_customer[] = $customer_info;

            } else {
                $code = 'CUS' . $utilities->generateRandomNumber(9);

                $item_save['code'] = $code;
                $item_save['search_unicode'] = strtolower($utilities->formatSearchUnicode([$full_name, $code, $email, $phone]));
                $new_entities[] = $item_save;
            }
        }

        if(!empty($address_deleted)) {
            TableRegistry::get('CustomersAddress')->deleteAll(['id IN' => $address_deleted]);
        }

        if(!empty($new_entities)) {
            $customers = $table->newEntities($new_entities, [
                'associated' => ['Addresses']
            ]);
        }


        if(!empty($patch_entities)) {
            $customers = $table->patchEntities($list_customer, $patch_entities);
        }

        $conn = ConnectionManager::get('default');
        try{
            $conn->begin();
            // save data
            $save = $table->saveMany($customers);
            if (empty($save)){
                throw new Exception();
            }

            $conn->commit();

        }catch (Exception $e) {
            $conn->rollback();
            return $this->System->getResponse([MESSAGE => $e->getMessage()]);
        }

        $percent = $total_customer = 0;
        $perpage = $this->limit_import;
        $total_page = count($files);

        if($total_page > ($page + 1) )
        {
            $percent = (($page + 1) * $perpage) / ((($total_page - 1) * $perpage) + count($data)) * 100;
            $this->responseJson([
                CODE => SUCCESS,
                DATA => [
                    'continue' => true,
                    'page' => $page + 1,
                    'product' => (($page + 1) * $perpage),
                    'folder' => $folder,
                    'percent' => $percent
                ]
            ]);
        }

        $total_customer = count($data);
        if($total_page > 1)
        {
            $total_customer = $page * $perpage + count($data);
        }

        $delete = @$create_dir_folder->delete();
        $percent = 100;
        $this->responseJson([
            CODE => SUCCESS,
            DATA => [
                'continue' => false,
                'product' => $total_customer,
                'percent' => $percent
            ]
        ]);
    }
}