<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;

class FaqsTable extends AppTable
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('faqs');
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

    public function queryListFaqs($params = []) 
    {
        $table = TableRegistry::get('Faqs');

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
                $fields = ['Faqs.id', 'Faqs.name', 'Faqs.content', 'Faqs.created_by', 'Faqs.created', 'Faqs.updated', 'Faqs.featured', 'Faqs.position', 'Faqs.status'];
            break;

            case LIST_INFO:
                $fields = ['Faqs.id', 'Faqs.name'];
            break;

            case SIMPLE_INFO:
            default:
                $fields = ['Faqs.id', 'Faqs.name','Faqs.content', 'Faqs.created_by', 'Faqs.created', 'Faqs.featured', 'Faqs.updated', 'Faqs.position', 'Faqs.status'];
            break;
        }

        $sort_string = 'Faqs.id ASC';
        if(!empty($params[SORT])){
            switch($sort_field){
                case 'id':
                    $sort_string = 'Faqs.id '. $sort_type;
                break;

                case 'name':
                    $sort_string = 'Faqs.name '. $sort_type .', Faqs.id ASC';
                break;
            }
        }

        // filter by conditions
        $where = ['Faqs.deleted' => 0]; 

        if(!empty($keyword)){
            $where['Faqs.search_unicode LIKE'] = '%' . Text::slug(strtolower($keyword), ' ') . '%';
        }

        if(!empty($ids)){
            $where['Faqs.id IN'] = $ids;
        }

        return $table->find()->where($where)->select($fields)->order($sort_string);
    }

    public function checkTagExist($name = null, $id = null)
    {
        if(empty($tag)) return false;

        $where = ['Faqs.name' => $name];
        if(!empty($id)){
            $where['Faqs.id !='] = $id;
        }
        $result = TableRegistry::get('Faqs')->find()->where($where)->first();

        return !empty($result) ? true : false;
    }

    public function getDetailTag($id = null)
    {
        $result = [];
        if(empty($id)) return [];        

        $result = TableRegistry::get('Tags')->find()
        ->where([
            'Tags.id' => $id
        ])->first();

        return $result;
    }
}