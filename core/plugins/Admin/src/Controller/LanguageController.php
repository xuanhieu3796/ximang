<?php

namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Utility\Hash;
use Cake\Http\Response;
use Cake\ORM\Query;
use Cake\Core\Exception\Exception;
use Cake\Datasource\ConnectionManager;

class LanguageController extends AppController {

    public function initialize(): void
    {
        parent::initialize();
    }

    public function list() 
    {
        $this->js_page = '/assets/js/pages/list_language.js';

        $this->set('path_menu', 'setting');
        $this->set('title_for_layout', __d('admin', 'ngon_ngu'));
    }

    public function listJson()
    {
        $languages_table = TableRegistry::get('Languages');
        $utilities = $this->loadComponent('Utilities');

        $data_post = $params = $users = $sort = [];
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

        // params         
        $params[SORT] = !empty($data[SORT]) ? $data[SORT] : [];
        
        // page and limit
        $page = !empty($data[PAGINATION][PAGE]) ? intval($data[PAGINATION][PAGE]) : 1;
        $limit = !empty($data[PAGINATION][PERPAGE]) ? intval($data[PAGINATION][PERPAGE]) : PAGINATION_LIMIT_ADMIN;


        // sort 
        $sort_field = !empty($params[SORT][FIELD]) ? $params[SORT][FIELD] : null;
        $sort_type = !empty($params[SORT][SORT]) ? $params[SORT][SORT] : null;

        // lấy thông tin addon ngôn ngữ được cài đặt
        $codes = $this->getListLanguageInstalled();
        if (!empty($codes)) {
            $params[FILTER]['codes'] = $codes;
        }

        try {
            $languages = $this->paginate($languages_table->queryListLanguages($params), [
                'limit' => $limit,
                'page' => $page,
                'order' => [
                    $sort_field => $sort_type
                ]
            ])->toArray();

        } catch (Exception $e) {
            $page = 1;
            $languages = $this->paginate($languages_table->queryListLanguages(), [
                'limit' => $limit,
                'page' => $page,
                'order' => [
                    $sort_field => $sort_type
                ]
            ])->toArray();
        }

        $pagination_info = !empty($this->request->getAttribute('paging')['Languages']) ? $this->request->getAttribute('paging')['Languages'] : [];
        $meta_info = $utilities->formatPaginationInfo($pagination_info);

        $this->responseJson([
            CODE => SUCCESS,
            MESSAGE => __d('admin', 'xu_ly_du_lieu_thanh_cong'),
            DATA => $languages, 
            META => $meta_info
        ]);
    }

    public function isDefault()
    {
        $this->layout = false;
        $this->autoRender = false;

        $session = $this->getRequest()->getSession();

        $data = $this->getRequest()->getData();
        $id = !empty($data['id']) ? intval($data['id']) : null;

        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }

        if (empty($id)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }
        
        $data['is_default'] = 1;

        $languages_table = TableRegistry::get('Languages');    
        $language = $languages_table->get($id);
        $language = $languages_table->patchEntity($language, $data);

        try{
            $languages_table->updateAll(
                [  
                    'is_default' => 0
                ],
                [  
                    'is_default' => 1
                ]
            );

            $save = $languages_table->save($language);
            if(empty($save->id)) {
                throw new Exception();
            }

            $session->delete(LANG);

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
        $status = !empty($data['status']) ? 1 : 0;

        if (!$this->getRequest()->is('post')) {
            $this->responseJson([MESSAGE => __d('admin', 'phuong_thuc_khong_hop_le')]);
        }

        if (empty($ids) || !is_array($ids)) {
            $this->responseJson([MESSAGE => __d('admin', 'du_lieu_khong_hop_le')]);
        }

        $languages_table = TableRegistry::getTableLocator()->get('Languages');

        $languages = $languages_table->find()->where([
            'Languages.id IN' => $ids,
            'Languages.deleted' => 0
        ])->select(['Languages.id', 'Languages.status'])->toArray();
        
        if(empty($languages)){
            $this->responseJson([MESSAGE => __d('admin', 'khong_tim_thay_thong_tin_bai_viet')]);
        }

        $patch_data = [];
        foreach ($ids as $k => $language_id) {
            $patch_data[] = [
                'id' => $language_id,
                'status' => $status
            ];
        }

        $data_languages = $languages_table->patchEntities($languages, $patch_data);

        $conn = ConnectionManager::get('default');
        try{
            $conn->begin();

            $change_status = $languages_table->saveMany($data_languages);
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

    public function getListLanguageInstalled()
    {
        $addons = TableRegistry::get('Addons')->getList();
        if (empty($addons)) return [];

        $result = [];
        $user = $this->Auth->user();

        if(!empty($user['supper_admin'])){
            return $result;
        }

        foreach ($addons as $code => $addon) {
            if (empty($code) || strpos($code, 'language') !== 0) continue;

            $code = str_replace('language_', '', $code);
            $result[] = $code;
        }

        return $result;
    }
}