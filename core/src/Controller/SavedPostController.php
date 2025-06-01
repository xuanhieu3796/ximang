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

        $data = !empty($this->request->getData()) ? $this->request->getData() : [];
        if (!$this->getRequest()->is('post') || empty($data)) {
            $this->responseJson([MESSAGE => __d('template', 'du_lieu_khong_hop_le')]);
        }

        $record_id = !empty($data['record_id']) ? intval($data['record_id']) : [];
        if(empty($record_id)){
            $this->responseJson([MESSAGE => __d('template', 'du_lieu_khong_hop_le')]);
        }

        $member_info = TableRegistry::get('Customers')->find()->where([
            'id' => $this->customer_id
        ])->first();
        if(empty($member_info)){
            return $this->responseJson([MESSAGE => __d('template', 'khong_lay_duoc_thong_tin_tai_khoan')]);
        }

        $table = TableRegistry::get('SavedPosts');
        $article_info = $table->find()->where([
            'customer_account_id' => $this->customer_id
        ])->toArray();

        $article_ids = !empty($article_info) ? Hash::extract($article_info, '{n}.record_id') : [];
        
        $data_save = [];
        if(!in_array($record_id, $article_ids)) {
            $data_save[] = [
                'customer_account_id' => $this->customer_id,
                'record_id' => intval($record_id)
            ];
        } else {
            // nếu record id đã có trong list thì trả về kết quả luôn
            return $this->responseJson([
                CODE => SUCCESS,
                MESSAGE => __d('template', 'Lưu bài viết thành công')
            ]);
        }

        if(empty($article_info)) {
            $entity = $table->newEntities($data_save);
        } else {
            $entity = $table->patchEntities($article_info, $data_save);
        }
        
        $conn = ConnectionManager::get('default');
        try{
            $conn->begin();

            // save data
            $save = $table->saveMany($entity);
            
            if (empty($save)){
                throw new Exception();
            }

            $conn->commit();

            return $this->responseJson([
                CODE => SUCCESS,
                MESSAGE => __d('template', 'Lưu bài viết thành công')
            ]);
        }catch (Exception $e) {
            $conn->rollback();
            return $this->responseJson([MESSAGE => $e->getMessage()]);
        }
    }

    public function removePost()
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = !empty($this->request->getData()) ? $this->request->getData() : [];
        if (!$this->getRequest()->is('post') || empty($data)) {
            $this->responseJson([MESSAGE => __d('template', 'du_lieu_khong_hop_le')]);
        }

        $record_id = !empty($data['record_id']) ? intval($data['record_id']) : [];
        $member_info = TableRegistry::get('Customers')->find()->where([
            'id' => $this->customer_id
        ])->first();
        if(empty($member_info)){
            return $this->responseJson([MESSAGE => __d('template', 'khong_lay_duoc_thong_tin_tai_khoan')]);
        }

        $table = TableRegistry::get('SavedPosts');

        $conn = ConnectionManager::get('default');
        try{
            $conn->begin();

            $savedpost_info = $table->find()->where([
                'customer_account_id' => $this->customer_id,
                'record_id' => $record_id
            ])->first();

            if(empty($savedpost_info)){
                return $this->responseJson([MESSAGE => __d('template', 'Không lấy được thông tin bài viết đã lưu')]);
            }

            $delete = $table->delete($savedpost_info);

            if (empty($delete)){
                throw new Exception();
            }
    
            $conn->commit();

            return $this->responseJson([
                CODE => SUCCESS,
                MESSAGE => __d('template', 'Xóa bài viết đã lưu thành công')
            ]);
        }catch (Exception $e) {
            $conn->rollback();
            return $this->responseJson([MESSAGE => $e->getMessage()]);
        }
    }
}