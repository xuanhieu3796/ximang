<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;
use Cake\Utility\Security;
use Cake\Core\Exception\Exception;
use Cake\Datasource\ConnectionManager;
use Cake\Core\Configure;
use Google;
use Cake\Http\Client;
use App\Lib\SignIn\SignInWithApple;

class ReviewController extends AppController 
{
    public function send() 
    {
        $this->layout = false;
        $this->autoRender = false;

        $data = !empty($this->request->getData()) ? $this->request->getData() : [];
        if (!$this->getRequest()->is('post') || empty($data)) {
            $this->responseJson([MESSAGE => __d('template', 'du_lieu_khong_hop_le')]);
        }

        $id = !empty($data['id']) ? intval($data['id']) : null;

        if (empty($id)) {
            return $this->System->getResponse([MESSAGE => __d('template', 'du_lieu_khong_hop_le')]);
        }

        $table = TableRegistry::get('Reviews');

        $review = $table->find()->where([
            'id' => $id
        ])->select(['id', 'number'])->first();
        
        if(empty($review)){
            return $this->System->getResponse([MESSAGE => __d('template', 'Không tìm thấy thông tin đánh giá')]);
        }
        $number = !empty($review['number']) ? intval($review['number']) : 0;

        $number_vote = $number + 1;

        $entity = $table->patchEntity($review, ['number' => $number_vote]);

        $conn = ConnectionManager::get('default');
        try{
            $conn->begin();

            $save = $table->save($entity);
            if (empty($save)){
                throw new Exception();
            }
            
            $conn->commit();
            $this->responseJson([CODE => SUCCESS, MESSAGE => __d('template', 'Cảm ơn bạn đã ý kiến của bạn')]);

        }catch (Exception $e) {
            $conn->rollback();
            $this->responseJson([MESSAGE => $e->getMessage()]);  
        }
    }

    public function detail() 
    {
        $this->viewBuilder()->enableAutoLayout(false);
        $table = TableRegistry::get('Reviews');

        $list_review = $table->queryListReviews()->toArray();
        
        if(empty($list_review)){
            return $this->System->getResponse([MESSAGE => __d('template', 'Không tìm thấy thông tin đánh giá')]);
        }
        $total = array_sum(array_column($list_review, 'number'));
        $result = [];

        foreach($list_review as $key => $review){
            $percent = $total > 0 ? round($review['number'] / $total * 100, 2) : 0;
            if (empty($review['name'])) continue;
            $result[$key] = [
                'name' => !empty($review['name']) ? $review['name'] : null,
                'number' => !empty($review['number']) ? $review['number'] : 0,
                'percent' => $percent
            ];
        }

        $this->set('list_review', $result);
        $this->render('detail');
    }
    

}