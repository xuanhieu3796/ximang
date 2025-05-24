<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;

class ReviewsTable extends AppTable
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('reviews');
        $this->setPrimaryKey('id');

        $this->addBehavior('UnixTimestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created' => 'new',
                    'updated' => 'always'
                ]
            ]
        ]);
    }

    public function queryListReviews($params = []) 
    {
        $table = TableRegistry::get('Reviews');

        // get info params
        $field = !empty($params[FIELD]) ? $params[FIELD] : SIMPLE_INFO;

        // sort
        $sort = !empty($params[SORT]) ? $params[SORT] : [];
        $sort_field = !empty($sort[FIELD]) ? $sort[FIELD] : null;
        $sort_type = !empty($sort[SORT]) ? $sort[SORT] : DESC;

        // filter
        $filter = !empty($params[FILTER]) ? $params[FILTER] : [];

        $lang = !empty($filter[LANG]) ? $filter[LANG] : null;
        $keyword = !empty($filter['keyword']) ? trim($filter['keyword']) : null;
        $ids = !empty($filter['ids']) ? $filter['ids'] : [];

        // fields select
        switch($field){
            case FULL_INFO:
                $fields = ['Reviews.id', 'Reviews.name', 'Reviews.created_by', 'Reviews.created', 'Reviews.updated', 'Reviews.number', 'Reviews.position', 'Reviews.status'];
            break;

            case LIST_INFO:
                $fields = ['Reviews.id', 'Reviews.name'];
            break;

            case SIMPLE_INFO:
            default:
                $fields = ['Reviews.id', 'Reviews.name', 'Reviews.created_by', 'Reviews.created', 'Reviews.updated', 'Reviews.number', 'Reviews.position', 'Reviews.status'];
            break;
        }

        $sort_string = 'Reviews.id ASC';
        if(!empty($params[SORT])){
            switch($sort_field){
                case 'id':
                    $sort_string = 'Reviews.id '. $sort_type;
                break;

                case 'name':
                    $sort_string = 'Reviews.name '. $sort_type .', Reviews.id ASC';
                break;
            }
        }

        // filter by conditions
        $where = ['Reviews.deleted' => 0]; 

        if(!empty($keyword)){
            $where['Reviews.name LIKE'] = '%' . Text::slug(strtolower($keyword), ' ') . '%';
        }

        if(!empty($ids)){
            $where['Reviews.id IN'] = $ids;
        }

        return $table->find()->where($where)->select($fields)->order($sort_string);
    }


    public function getDetailReview($id = null)
    {
        $result = [];
        if(empty($id)) return [];        

        $result = TableRegistry::get('Reviews')->find()
        ->where([
            'Reviews.id' => $id
        ])->first();
            
        return $result;
    }
}