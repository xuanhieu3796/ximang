<?php

namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Text;

class FaqController extends AppController {

    public function initialize(): void
    {
        parent::initialize();
    }

    public function list()
    {
        $this->js_page = '/assets/js/pages/list_faq.js';
        $this->set('path_menu', 'faq');
        $this->set('title_for_layout', __d('admin', 'Danh sách Faq'));
    }

    public function listJson()
    {
        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }

        $table = TableRegistry::get('Faqs');
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

        $params[FILTER][LANG] = !empty($params[FILTER][LANG]) ? $params[FILTER][LANG] : null;

        // params         
        $params[SORT] = !empty($data[SORT]) ? $data[SORT] : [FIELD => 'id', SORT => DESC];

        // page and limit
        $page = !empty($data[PAGINATION][PAGE]) ? intval($data[PAGINATION][PAGE]) : 1;
        $limit = !empty($data[PAGINATION][PERPAGE]) ? intval($data[PAGINATION][PERPAGE]) : PAGINATION_LIMIT_ADMIN;


        // sort 
        $sort_field = !empty($params[SORT][FIELD]) ? $params[SORT][FIELD] : null;
        $sort_type = !empty($params[SORT][SORT]) ? $params[SORT][SORT] : null;

        try {
            $faqs = $this->paginate($table->queryListFaqs($params), [
                'limit' => $limit,
                'page' => $page,
                'order' => [
                    $sort_field => $sort_type
                ]
            ])->toArray();
        } catch (Exception $e) {
            $page = 1;
            $faqs = $this->paginate($table->queryListFaqs($params), [
                'limit' => $limit,
                'page' => $page,
                'order' => [
                    $sort_field => $sort_type
                ]
            ])->toArray();
        }
        $pagination_info = !empty($this->request->getAttribute('paging')['Faqs']) ? $this->request->getAttribute('paging')['Faqs'] : [];
        $meta_info = $utilities->formatPaginationInfo($pagination_info);

        $this->responseJson([
            CODE => SUCCESS,
            MESSAGE => __d('admin', 'xu_ly_du_lieu_thanh_cong'),
            DATA => $faqs, 
            META => $meta_info
        ]);
    }

    public function add()
    {
        $this->js_page = [
            '/assets/plugins/custom/tinymce6/tinymce.min.js',
            '/assets/js/seo_analysis.js',
            '/assets/js/pages/faq.js',
        ];
        $max_record = TableRegistry::get('Faqs')->find()->select('id')->max('id');

        $this->set('path_menu', 'faq');
        $this->set('position', !empty($max_record->id) ? $max_record->id + 1 : 1);
        $this->set('title_for_layout', __d('admin', 'Thêm Faq'));
        $this->render('update');
    }

    public function update($id = null)
    {
        $faq = TableRegistry::get('Faqs')->find()->where(['Faqs.id' => $id])->first();
        if(empty($faq)){
            $this->showErrorPage();
        }
        $this->set('position', !empty($faq['position']) ? $faq['position'] : 1);
 
        $this->set('path_menu', 'faq');
        $this->set('id', $id);
        $this->set('faq', $faq);

        $this->js_page = [
            '/assets/plugins/custom/tinymce6/tinymce.min.js',
            '/assets/js/seo_analysis.js',
            '/assets/js/pages/faq.js',
        ];

        $this->set('title_for_layout', __d('admin', 'Cập nhật faq'));
    }

    public function save($id = null)
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = $this->getRequest()->getData();
       
        if (!$this->getRequest()->is('post') || empty($data)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $utilities = $this->loadComponent('Utilities');
        $table = TableRegistry::get('Faqs');
        if(empty($data['name'])){
            $this->responseJson([MESSAGE => __d('admin', 'vui_long_nhap_tieu_de')]);
        }

        $name = !empty($data['name']) ? trim(strip_tags($data['name'])) : null;

        if(!empty($id)){
            $faq = $table->getDetailTag($id);

            if(empty($faq)){
                $this->responseJson([MESSAGE => __d('admin', 'khong_lay_duoc_thong_tin_ban_ghi')]);
            }
        }
        $status = isset($faq['status']) ? intval($faq['status']) : 1;
        $data_save = [
            'name' => $name,
            'content' => !empty($data['content']) ? $data['content'] : null,
            'position' => !empty($data['position']) ? intval($data['position']) : 1,
            'featured' => !empty($data['featured']) ? intval($data['featured']) : 0,
            'status' => $status,
            'search_unicode' => strtolower($utilities->formatSearchUnicode([$name]))
        ];

        if(empty($id)){
            $data_save['created_by'] = $this->Auth->user('id');

            $entity = $table->newEntity($data_save);
        }else{
            $entity = $table->patchEntity($faq, $data_save);
        }

        $conn = ConnectionManager::get('default');
        try{
            $conn->begin();

            $save = $table->save($entity);
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

    public function delete()
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = $this->getRequest()->getData();
        $ids = !empty($data['ids']) ? $data['ids'] : [];

        if (!$this->getRequest()->is('post') || empty($ids) || !is_array($ids)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $table = TableRegistry::get('Faqs');

        $conn = ConnectionManager::get('default');
        try{
            $conn->begin();

            foreach ($ids as $key => $id) {

                $faq = $table->get($id);
                if (empty($faq)) {
                    throw new Exception(__d('admin', 'Không lấy được thông tin faq'));
                }

                $faq = $table->patchEntity($faq, ['id' => $id, 'deleted' => 1], ['validate' => false]);
                $delete = $table->save($faq);
                if (empty($delete)){
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

    public function changeStatus()
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = $this->getRequest()->getData();
        $ids = !empty($data['ids']) ? $data['ids'] : [];
        $status = !empty($data['status']) ? 1 : 0;

        if (!$this->getRequest()->is('post') || empty($ids) || !is_array($ids)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $table = TableRegistry::get('Faqs');

        $faqs = $table->find()->where([
            'Faqs.id IN' => $ids,
            'Faqs.deleted' => 0
        ])->select(['Faqs.id', 'Faqs.status'])->toArray();
        
        if(empty($faqs)){
            $this->responseJson([MESSAGE => __d('admin', 'khong_tim_thay_thong_tin_thuong_hieu')]);
        }

        $patch_data = [];
        foreach ($ids as $k => $faq_id) {
            $patch_data[] = [
                'id' => $faq_id,
                'status' => $status
            ];
        }

        $entities = $table->patchEntities($faqs, $patch_data, ['validate' => false]);

        $conn = ConnectionManager::get('default');
        try{
            $conn->begin();

            $change_status = $table->saveMany($entities);            
            if (empty($change_status)){
                throw new Exception();
            }
            
            $conn->commit();
            $this->responseJson([CODE => SUCCESS, MESSAGE => __d('admin', 'cap_nhat_thanh_cong')]);

        }catch (Exception $e) {
            $conn->rollback();
            $this->responseJson([MESSAGE => $e->getMessage()]);  
        }
    }

    public function changePosition()
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = !empty($this->request->getData()) ? $this->request->getData() : [];

        $id = !empty($data['id']) ? intval($data['id']) : null;
        $value = !empty($data['value']) ? $data['value'] : 0;

        if(!$this->getRequest()->is('post') || empty($id)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $table = TableRegistry::get('Faqs');
        $faq = $table->get($id);
        if(empty($faq)) {
            $this->responseJson([MESSAGE => __d('admin', 'khong_lay_duoc_thong_tin_ban_ghi')]);
        }

        $faq = $table->patchEntity($faq, ['position' => $value], ['validate' => false]);

        try{
            $save = $table->save($faq);

            if (empty($save->id)){
                throw new Exception();
            }
            $this->responseJson([CODE => SUCCESS, DATA => ['id' => $save->id]]);

        }catch (Exception $e) {
            $this->responseJson([MESSAGE => $e->getMessage()]);
        }
    }

    public function autoSuggest()
    {
        $this->layout = false;
        $this->autoRender = false;
        
        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }
        
        $data = $this->getRequest()->getData();

        $params = [
            FIELD => LIST_INFO,
            FILTER => [
                LANG => $this->lang,
                KEYWORD => !empty($data['keyword']) ? $data['keyword'] : null
            ]
        ];
        
        $tags = TableRegistry::get('Tags')->queryListTags($params)->limit(7)->toArray();

        $results = [];
        if(!empty($tags)){
            foreach($tags as $item){
                $results[] = [
                    'value' => !empty($item['name']) ? $item['name'] : null
                ];
            }
        }
        
        exit(json_encode($results));
    }
}