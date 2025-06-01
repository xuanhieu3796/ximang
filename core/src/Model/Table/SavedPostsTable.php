<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Utility\Hash;

class SavedPostsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('saved_posts');
        $this->setPrimaryKey('id');


    }

    public function validationDefault(Validator $validator): Validator
    {

        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        return $validator;
    }

    public function savedPostTotal($account_id = null)
        {
            $result = [];

            if(empty($account_id)) return [];

            $savedPost_info = TableRegistry::get('SavedPosts')->find()->where([
                'customer_account_id' => $account_id
            ])->toArray();
            return $result;
    }

}