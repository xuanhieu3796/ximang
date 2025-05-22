<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;

class ReviewHelper extends Helper
{
    
    public function getReviews($params = [], $lang = null) 
    {
        $result = [];

        $languages = TableRegistry::get('Languages')->getList();
        if(empty($lang) || empty($languages[$lang])) $lang = LANGUAGE;
        $params[FILTER][LANG] = $lang;

        if(!isset($params[FILTER][STATUS])) $params[FILTER][STATUS] = 1;

        $limit = !empty($params['limit']) ? intval($params['limit']) : 10;
        $reviews = TableRegistry::get('Reviews')->queryListReviews($params)->limit($limit)->toArray();
        
        if(!empty($reviews)){
            foreach($reviews as $k => $review){
                $result[$k] = [
                    'id' => !empty($review['id']) ? intval($review['id']) : null,
                    'name' => !empty($review['name']) ? $review['name'] : null,
                    'number' => !empty($review['number']) ? intval($review['number']) : null,
                    'position' => !empty($review['position']) ? intval($review['position']) : null,
                    'status' => !empty($review['status']) ? intval($review['status']) : null,
                    'created' => !empty($review['created']) ? date('H:i - d/m/Y', $review['created']) : null,

                ];
            }
        }
        
        return $result;
    }
}
