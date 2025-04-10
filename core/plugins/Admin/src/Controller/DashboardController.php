<?php

namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Utility\Hash;
use Cake\Http\Response;
use Cake\ORM\Query;
use Cake\Filesystem\File;
use Cake\Core\Exception\Exception;
use Cake\Http\Client;
use Cake\I18n\FrozenTime;

class DashboardController extends AppController {

    public function initialize(): void
    {
        parent::initialize();
    }

    public function dashboard()
    {
        $this->js_page = [            
            '/assets/plugins/custom/flot/flot.bundle.js',
            '/assets/js/pages/dashboard.js'
        ];

        $this->set('path_menu', 'dashboard');
        $this->set('lang', $this->lang);
        $this->set('title_for_layout', __d('admin', 'tong_quan_he_thong'));
    }

    public function statisticsCounter()
    {
        $this->viewBuilder()->enableAutoLayout(false);
        if (!$this->getRequest()->is('post')) die;

        $counter_table = TableRegistry::get('Counters');
        $day = $counter_table->getCounterDay();        
        $week = $counter_table->getCounterWeek();    
        $month = $counter_table->getCounterMonth();
        $all = $counter_table->getCounterAll();

        $online = TableRegistry::get('LogAccess')->getCounterOnline();

        $this->set('day', $day);
        $this->set('week', $week);
        $this->set('month', $month);
        $this->set('all', $all);
        $this->set('online', $online);

        $this->render('counter_statistics');
    }

    public function statisticsOrder()
    {
        $this->viewBuilder()->enableAutoLayout(false);
        if (!$this->getRequest()->is('post')) die;

        $data = $this->getRequest()->getData();
        $type = !empty($data['type']) ? $data['type'] : 'month';

        $created = null;

        switch ($type) {
            case 'month':
                $created = strtotime(date('Y-m-01'));
                break;

           case 'year':
                $created = strtotime(date('Y-01-01'));
                break;
        }

        $table = TableRegistry::get('Orders');

        $where = ['deleted' => 0];
        if(!empty($created)){
            $where['created >='] = $created;
        }

        $number_order = $table->find()->where($where)->count();

        $where['status'] = NEW_ORDER;
        $number_order_new = $table->find()->where($where)->count();

        $where['status'] = DONE;
        $number_order_done = $table->find()->where($where)->count();

        $where['status'] = CANCEL;
        $number_order_cancel = $table->find()->where($where)->count();

        $this->set('number_order', $number_order);
        $this->set('number_order_new', $number_order_new);
        $this->set('number_order_done', $number_order_done);
        $this->set('number_order_cancel', $number_order_cancel);
        $this->set('type', $type);

        $this->render('order_statistics');
    }

    public function chartOrder()
    {
        $this->viewBuilder()->enableAutoLayout(false);
        if (!$this->getRequest()->is('post')) die;        

        $data = $this->getRequest()->getData();
        $type = !empty($data['type']) ? $data['type'] : 'month';

        $table = TableRegistry::get('Orders');        

        $this_month = date('m');
        $previous_month = date('m', strtotime('last month'));
        $last_day = intval(date('t'));
        $last_day_previous_month = intval(date('t', strtotime('last month')));
        $max_day = $last_day > $last_day_previous_month ? $last_day : $last_day_previous_month;
        
        $labels = $data_this_month = $data_previous_month = [];

        for ($i = 1; $i <= $max_day; $i++) {

            $labels[] = $i;
            $day = str_pad($i, 2, '0', STR_PAD_LEFT);

            // get data for this month
            if($i <= $last_day){
                
                $start_day = strtotime(date("Y-$this_month-$day 00:00:00"));
                $end_day = strtotime(date("Y-$this_month-$day 23:59:59"));
                $query =  $table->find()->where([
                    'deleted' => 0, 
                    'status NOT IN' => [DRAFT, CANCEL],
                    'created >=' => $start_day,
                    'created <=' => $end_day,
                ]);

                $sum_total = $query->select(['total' => $query->func()->sum('total')])->first();
                $total = !empty($sum_total['total']) ? floatval($sum_total['total']) : 0;

                $data_this_month[] = $total;
            }
            


            // get data for last month
            if($i <= $last_day_previous_month){

                $start_day = strtotime(date("Y-$previous_month-$day 00:00:00"));
                $end_day = strtotime(date("Y-$previous_month-$day 23:59:59"));
                $query =  $table->find()->where([
                    'deleted' => 0, 
                    'status NOT IN' => [DRAFT, CANCEL],
                    'created >=' => $start_day,
                    'created <=' => $end_day,
                ]);

                $sum_total = $query->select(['total' => $query->func()->sum('total')])->first();
                $total = !empty($sum_total['total']) ? floatval($sum_total['total']) : 0;

                $data_previous_month[] = $total;
            }
        }

        $chart_data = [
            'labels' => $labels,
            'data_this_month' => $data_this_month,
            'data_previous_month' => $data_previous_month,
        ];

        $this->set('chart_data', $chart_data);

        $this->render('order_chart');
    }

    public function statisticsProduct()
    {
        $this->viewBuilder()->enableAutoLayout(false);

        if (!$this->getRequest()->is('post')) die;
        
        $table = TableRegistry::get('Products');

        $number_product = $table->find()->where([
            'deleted' => 0
        ])->count();

        $number_product_seo = $table->find()->where([
            'deleted' => 0,
            'seo_score' => 'success'
        ])->count();

        $number_category = TableRegistry::get('Categories')->find()->where([
            'deleted' => 0, 
            'type' => PRODUCT
        ])->count();

        $this->set('number_product', $number_product);
        $this->set('number_product_seo', $number_product_seo);
        $this->set('number_category', $number_category);
        $this->render('product_statistics');
    }

    public function statisticsArticle()
    {
        $this->viewBuilder()->enableAutoLayout(false);
        if (!$this->getRequest()->is('post')) die;

        $table = TableRegistry::get('Articles');

        $number_article = $table->find()->where([
            'deleted' => 0
        ])->count();

        $number_image = $table->find()->where([
            'deleted' => 0,
            'has_album' => 1
        ])->count();

        $number_video = $table->find()->where([
            'deleted' => 0,
            'has_video' => 1
        ])->count();

        $number_file = $table->find()->where([
            'deleted' => 0,
            'has_file' => 1
        ])->count();

        $number_article_seo = $table->find()->where([
            'deleted' => 0,
            'seo_score' => 'success'
        ])->count();

        $number_category = TableRegistry::get('Categories')->find()->where([
            'deleted' => 0, 
            'type' => ARTICLE
        ])->count();

        $this->set('number_article', $number_article);
        $this->set('number_image', $number_image);
        $this->set('number_video', $number_video);
        $this->set('number_file', $number_file);
        $this->set('number_article_seo', $number_article_seo);
        $this->set('number_category', $number_category);

        $this->render('article_statistics');
    }
    
    public function infoWebsite()
    {
        $this->viewBuilder()->enableAutoLayout(false);
        if (!$this->getRequest()->is('post')) die;

        $settings = TableRegistry::get('Settings')->getSettingWebsite();
        $settings_website_info = !empty($settings['website_info']) ? $settings['website_info'] : [];
        
        $website_info = TableRegistry::get('Settings')->formatDataWebsiteInfoByLang($settings_website_info);
        $website_info = !empty($website_info[$this->lang]) ? $website_info[$this->lang] : [];

        $this->set('website_info', $website_info);
        $this->render('website_info');
    }

    public function expiryWebsite()
    {
        $this->viewBuilder()->enableAutoLayout(false);
        if (!$this->getRequest()->is('post')) die;

        $settings = TableRegistry::get('Settings')->getSettingWebsite();
        $profile_info = !empty($settings['profile']) ? $settings['profile'] : [];
        $duedate = null;
        $capacity = !empty($profile_info['size']) ? $profile_info['size'] : 2;

        if(!empty($profile_info['end_date']) && $profile_info['end_date'] > time()) {
            $date_diff = abs($profile_info['end_date'] - time());
            $duedate = floor($date_diff / (60 * 60 * 24));
        }
        
        $this->set('duedate', $duedate);
        $this->set('capacity', $capacity);
        $this->set('profile_info', $profile_info);

        $this->render('website_expiry');
    }


    public function durationWebsite()
    {
        $this->viewBuilder()->enableAutoLayout(false);
        if (!$this->getRequest()->is('post')) die;
        $data = $this->getRequest()->getData();

        $settings = TableRegistry::get('Settings')->getSettingWebsite();
        $profile_info = !empty($settings['profile']) ? $settings['profile'] : [];
        $duedate = $percent_remaining = $percent_used = null;
        $capacity = !empty($profile_info['size']) ? round(floatval($profile_info['size']), 2) : 0.5;

        if(!empty($profile_info['end_date']) && $profile_info['end_date'] > time()) {
            $date_diff = abs($profile_info['end_date'] - time());
            $duedate = floor($date_diff / (60 * 60 * 24));
        }

        $data_info = $this->loadComponent('System')->readInfoSystemWebsite($profile_info, $data);
        $used = !empty($data_info['cdn_disk_usage']) ? round(floatval($data_info['cdn_disk_usage']), 2) : 0;

        if(!empty($used) && !empty($capacity)) {
            $percent_used = ($used / $capacity) * 100;
            $percent_remaining = 100 - $percent_used;
        }

        $data_chart = [
            'capacity' => $percent_remaining,
            'used' => $percent_used
        ];
        
        $this->set('duedate', $duedate);
        $this->set('capacity', $capacity);
        $this->set('used', $used);
        $this->set('data_chart', $data_chart);
        $this->set('profile_info', $profile_info);

        $this->render('website_duration');
    }

    public function settingWebsite()
    {
        $this->viewBuilder()->enableAutoLayout(false);
        if (!$this->getRequest()->is('post')) die;

        $settings = TableRegistry::get('Settings')->getSettingWebsite();
        $website_mode = !empty($settings['website_mode']) ? $settings['website_mode'] : [];
        $email_setting = !empty($settings['email']) ? $settings['email'] : [];
        $profile_info = !empty($settings['profile']) ? $settings['profile'] : [];

        $languages = TableRegistry::get('Languages')->getlist();

        $this->set('website_mode', !empty($website_mode['type']) ? $website_mode['type'] : null);
        $this->set('email_setting', $email_setting);
        $this->set('languages', $languages);
        $this->set('profile_info', $profile_info);

        $this->render('website_setting');
    }

    public function seoWebsite()
    {
        $this->viewBuilder()->enableAutoLayout(false);
        if (!$this->getRequest()->is('post')) die;

        $table = TableRegistry::get('Settings');
        // sitemap  
        $settings = $table->getSettingWebsite();
        $sitemap = !empty($settings['sitemap']) ? $settings['sitemap'] : [];
        $redirect = !empty($settings['redirect_301']) ? $settings['redirect_301'] : [];

        // robots file
        $robots_file = new File(WWW_ROOT . 'robots.txt', false);

        $this->set('sitemap', $sitemap);
        $this->set('redirect', $redirect);
        $this->set('exist_robots_file', $robots_file->exists() ? true : false);

        $this->render('website_seo');
    }

    public function statisticsContact()
    {
        $this->viewBuilder()->enableAutoLayout(false);
        if (!$this->getRequest()->is('post')) die;

        $contacts = TableRegistry::get('Contacts')->find()->where([
            'deleted' => 0
        ])->limit(5)->order('id DESC')->toArray();

        $list_form = TableRegistry::get('ContactsForm')->find()->where([
            'deleted' => 0
        ])->select(['id', 'name', 'fields'])->toArray();
        $forms = !empty($list_form) ? Hash::combine($list_form, '{n}.id', '{n}') : [];

        $list_contact = [];
        
        if(!empty($contacts)) {
            foreach($contacts as $k => $contact){
                $form_id = !empty($contact['form_id']) ? $contact['form_id'] : null;
                $fields = !empty($forms[$form_id]['fields']) ? json_decode($forms[$form_id]['fields'], true) : [];
                $values = !empty($contact['value']) ? json_decode($contact['value'], true) : [];

                if (empty($fields)) continue;

                $final_values = [];
                foreach ($fields as $key => $field) {
                    $label = !empty($field['label']) ? $field['label'] : null;
                    $code = !empty($field['code']) ? $field['code'] : null;
                    $view = !empty($field['view']) ? 1 : 0;
                    $field_value = !empty($values[$code]) ? $values[$code] : null;
                    if(strlen($field_value) > 110) $field_value = substr($field_value, 0, 110) . '...';

                    $final_values[] = [
                        'label' => $label,
                        'code' => $code,
                        'view' => $view,
                        'field_value' => $field_value,
                    ];
                }

                // Nếu view hiển thị là 1 thì lấy theo cấu hình ds, còn 0 thì sẽ lấy 3 cái đầu tiên
                $final_values = !empty($final_values) ? Hash::combine($final_values, '{n}.code', '{n}', '{n}.view') : [];
                if(!empty($final_values)) $final_values = !empty($final_values[1]) ? $final_values[1] : array_slice($final_values[0], 0, 3);
                
                $contact['values'] = $final_values;

                $list_source = Configure::read('LIST_TRACKING_SOURCE');
                $tracking_source = !empty($contact['tracking_source']) ? $contact['tracking_source'] : __d('admin', 'nguon_khac');
                $contact['tracking_source'] = !empty($list_source[$tracking_source]) ? $list_source[$tracking_source] : __d('admin', 'nguon_khac');

                $contact['name_form'] = !empty($forms[$form_id]['name']) ? $forms[$form_id]['name'] : null;
                $contact['created'] = !empty($contact['created']) ? date(strval('H:i - d/m/Y'), intval($contact['created'])) : null;

                $list_contact[$k] = $contact;
            
            }
        }
        
        $this->set('list_contact', $list_contact);
        $this->render('contact');
    }

    public function statisticsComment()
    {   
        $this->viewBuilder()->enableAutoLayout(false);
        if (!$this->getRequest()->is('post')) die;

        $list_comment = TableRegistry::get('Comments')->find()->where([
            'deleted' => 0,
            'type_comment' => COMMENT
        ])->limit(10)->order('id DESC')->toArray();

        $list_rating = TableRegistry::get('Comments')->find()->where([
            'deleted' => 0,
            'type_comment' => RATING
        ])->limit(10)->order('id DESC')->toArray();

        if(!empty($list_comment)) $list_comment = Hash::combine($list_comment, '{n}.id', '{n}');
        if(!empty($list_rating)) $list_rating = Hash::combine($list_rating, '{n}.id', '{n}');

        $this->set('list_comment', $list_comment);
        $this->set('list_rating', $list_rating);

        $this->render('comment');
    }

    public function statisticsCustomer()
    {
        $this->viewBuilder()->enableAutoLayout(false);
        if (!$this->getRequest()->is('post')) die;

        $number_customer = TableRegistry::get('Customers')->find()->where([
            'deleted' => 0
        ])->count();

        $number_comment = TableRegistry::get('Comments')->find()->where([
            'deleted' => 0,
            'type_comment' => COMMENT
        ])->count();

        $number_rating = TableRegistry::get('Comments')->find()->where([
            'deleted' => 0,
            'type_comment' => RATING
        ])->count();

        // get data for chart customer
        $query = TableRegistry::get('Customers')->find()->where([
            'Customers.deleted' => 0,
            'DefaultAddress.is_default' => 1,
            'DefaultAddress.city_id >' => 0
        ])->contain(['DefaultAddress'])->limit(20);

        $count_by_address = $query->select([
            'DefaultAddress.city_id',
            'count' => $query->func()->count('city_id')
        ])->group(['DefaultAddress.city_id'])->toArray();

        $chart_data = [
            'labels' => [],
            'data_customers' => []
        ];

        if(!empty($count_by_address)){
            $all_citites = TableRegistry::get('Cities')->queryListCities([FIELD => LIST_INFO])->toArray();
            $all_citites = Hash::combine($all_citites, '{n}.id', '{n}.name');

            foreach ($count_by_address as $key => $item) {
                $count = !empty($item['count']) ? $item['count'] : 0;
                $city_id = !empty($item['DefaultAddress']['city_id']) ? intval($item['DefaultAddress']['city_id']) : null;
                $city_name = !empty($all_citites[$city_id]) ? $all_citites[$city_id] : null;

                $chart_data['labels'][] = $city_name;
                $chart_data['data_customers'][] = $count;
            }
        }

        $this->set('number_customer', $number_customer);
        $this->set('number_comment', $number_comment);
        $this->set('number_rating', $number_rating);
        $this->set('chart_data', $chart_data);

        $this->render('customer');
    }

    public function readInfomationJsonFile($params = [])
    {
        $check_cdn = !empty($params['check_cdn']) ? true : false;
        
        $result = [
            'time' => time(),
            'template_code' => CODE_TEMPLATE,
            'cdn_disk_usage' => 0,
            'capacity' => 0
        ];

        return $result;

        $rewrite = !empty($check_cdn) ? true : false;

        // tạo file infomation.json nếu chưa có
        $dir_file = SOURCE_DOMAIN . DS . 'infomation.json';

        $file_info = new File($dir_file, true, 0644);
        if(empty($file_info->path)) return $result;

        $utilities = TableRegistry::get('Utilities');
        $content = !empty($file_info->read()) ? trim($file_info->read()) : null;
        $is_json = $utilities->isJson($content);

        // kiểm tra nội dung tệp
        if(empty($content) || !$is_json) $rewrite = true;

        $infomation = !empty($content) && $is_json ? json_decode($content, true) : [];

        // ghi lại tệp sau 1 ngày
        $time_last_write = !empty($infomation['time']) ? intval($infomation['time']) : 0;
        if (empty($time_last_write) || ($time_last_write + 86400) < time()) $rewrite = true;

        // trả về thông tin nếu không phải ghi lại tệp
        if(!$rewrite && !empty($infomation)) $infomation;

        // ghi lại thông tin file
        $cdn_check = $this->_checkAvailableDiskSizeCdn();
        
        if(empty($cdn_check[CODE]) || $cdn_check[CODE] != SUCCESS) return $result;

        $total_size = !empty($cdn_check[DATA]['total_size']) ? intval($cdn_check[DATA]['total_size']) : 0;
        $max_size = !empty($cdn_check[DATA]['max_size']) ? intval($cdn_check[DATA]['max_size']) : 0;


        $result['cdn_disk_usage'] = !empty($total_size) ? round($total_size/1073741824, 2) : 0;
        $result['capacity'] = !empty($max_size) ? round($max_size/1073741824) : 0;

        $file_info->write(json_encode($result, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT), 'w');
        $file_info->close();

        return $result;
    }

    public function _checkAvailableDiskSizeCdn()
    {
        $utilities = TableRegistry::get('Utilities');
        $request = $this->getRequest();

        $domain = $request->host();
        $domain_cdn = parse_url(CDN_URL, PHP_URL_HOST);        
        $auth_user = $this->Auth->user();

        $token = $utilities->getSecureKeyCdn($domain, $domain_cdn, $auth_user);

        try{        
            $http = new Client();
            $response = $http->post(
                CDN_URL . '/myfilemanager/api/check-available-disk-size',
                [],
                [
                    'headers' => [
                        'cdn-token' => $token,
                        'cdn-language' => LANGUAGE_ADMIN,
                        'cdn-referer' => $domain
                    ],
                    'ssl_verify_peer' => FALSE,
                    'ssl_verify_host ' => FALSE
                ]
            );

            $result = $response->getJson();
            return !empty($result) ? $result : [];
        }catch (NetworkException $e) {
            return [];
        }
    } 
    
}