<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Core\Exception\Exception;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Hash;
use Cake\Event\EventInterface;

class SavedPostController extends AppController {
    public function beforeFilter(EventInterface $event)
    {
        $session = $this->request->getSession();  
        $member = $session->read(MEMBER);

        $this->customer_id = !empty($member['customer_id']) ? intval($member['customer_id']) : null;
        
        $member_info = TableRegistry::get('Customers')->getDetailCustomer($this->customer_id, ['get_list_address' => true]);
        $this->customer_info = TableRegistry::get('Customers')->formatDataCustomerDetail($member_info);

        
    }
    public function addPost()
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = $this->getRequest()->getData();
        debug($data);
        die();
        if (!$this->controller->getRequest()->is('post') || empty($data)) {
            $this->responseJson([MESSAGE => __d('template', 'du_lieu_khong_hop_le')]);
        }

        $record_id = !empty($data['record_id']) ? intval($data['record_id']) : [];
        if(empty($record_id)){
            $this->responseJson([MESSAGE => __d('template', 'du_lieu_khong_hop_le')]);
        }

        $table = TableRegistry::get('SavedPosts');
        $savedPost_info = $table->find()->where([
            'customer_account_id' => $this->customer_id
        ])->toArray();
        debug($savedPost_info);
        die();
        $savedPost_ids = !empty($savedPost_info) ? Hash::extract($savedPost_info, '{n}.record_id') : [];

        $data_savedPost = [];
        if(!in_array($record_id, $savedPost_ids)) {
            $data_savedPost[] = [
                'customer_account_id' => $this->customer_id,
                'record_id' => intval($record_id)
            ];
        } else {
            // nếu record id đã có trong list thì trả về kết quả luôn
            return $this->System->getResponse([
                CODE => SUCCESS,
                MESSAGE => $messages
            ]);
        }

        if(empty($savedPost_info)) {
            $data_save = $table->newEntities($data_savedPost);
        } else {
            $data_save = $table->patchEntities($savedPost_info, $data_savedPost);
        }
        
        $conn = ConnectionManager::get('default');
        try{
            $conn->begin();

            // save data
            $save = $table->saveMany($data_save);
            
            if (empty($save)){
                throw new Exception();
            }

            $conn->commit();

            return $this->System->getResponse([
                CODE => SUCCESS,
                MESSAGE => $messages
            ]);
        }catch (Exception $e) {
            $conn->rollback();
            return $this->System->getResponse([MESSAGE => $e->getMessage()]);
        }
        $this->responseJson($result);
    }

    public function removeProduct()
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = $this->getRequest()->getData();
        $result = $this->loadComponent('SavedPosts')->removeProduct($data);
        $this->responseJson($result);
    }
}