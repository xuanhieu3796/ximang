{assign var = categories_selected value = []}
{if !empty($article_setting.categories_selected)}
    {$categories_selected = $article_setting.categories_selected}
{/if}


<form id="form-article-apply-attributes" action="{ADMIN_PATH}/setting/save/article_attributes_category" method="POST" autocomplete="off">
    <div class="kt-portlet__head px-0 pt-0 mb-20">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                {__d('admin', 'thuoc_tinh_ap_dung_theo_danh_muc_bai_viet')}
            </h3>
        </div> 
    </div>

    <div class="kt-form__section kt-form__section--first">
        <div class="kt-wizard-v2__form">

            <div class="form-group">
                <label>
                    {__d('admin', 'trang_thai')}
                </label>
                <div class="kt-radio-inline mt-5">
                    <label class="kt-radio kt-radio--tick kt-radio--success  mr-20">
                        <input type="radio" name="status" value="1" {if !empty($article_setting.status)}checked{/if}>
                        {__d('admin', 'dang_hoat_dong')}
                        <span></span>
                    </label>

                    <label class="kt-radio kt-radio--tick kt-radio--danger">
                        <input type="radio" name="status" value="0" {if empty($article_setting.status)}checked{/if}>
                        {__d('admin', 'khong_hoat_dong')}
                        <span></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="kt-separator kt-separator--space-lg kt-separator--border-solid mt-20 mb-20"></div>
    <div class="note-attribute kt-font-danger mb-20">    
        {__d('admin', 'luu_y')}: {__d('admin', 'neu_khong_cau_hinh_danh_muc_con_thi_he_thong_se_mac_dinh_ap_dung_theo_danh_muc_cha')}
    </div>
     <div class="kt-form__section kt-form__section--first kt-form__section-attribute">
        <div class="kt-wizard-v2__form">
            <div class="row">
                <div class="col-xl-4 col-lg-4 border-right">
                    <div class="kt-portlet__body p-0">
                        <div class="kt-heading kt-heading--md mt-0 mb-15">
                            {__d('admin', 'danh_muc_bai_viet')}
                        </div>
        
                        <div class="kt-todo__body">
                            <div class="kt-todo__items" data-type="task">
                                <div class="kt-scroll" data-scroll="true" data-height="530">
                                    {$this->element('../AttributeSetting/element_categories', [
                                        'type_attribute'=> ARTICLE,
                                        'type_category'=> ARTICLE,
                                        'categories_selected' => $categories_selected
                                    ])}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-4 border-right">
                    <div class="kt-portlet__body p-0">
                        <div class="kt-heading kt-heading--md mt-0 mb-15">
                            {__d('admin', 'thuoc_tinh_mo_rong')}
                        </div>
    
                        <div class="kt-todo__body p-0">
                            <div class="kt-todo__items" data-type="task">
                                <div id="wrap-attributes-{ARTICLE}" class="kt-scroll" data-scroll="true" data-height="530">
                                    {$this->element('../AttributeSetting/element_attributes', [
                                        'type_attribute'=> ARTICLE
                                    ])}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="kt-portlet__body p-0">
                        <div class="kt-heading kt-heading--md mt-0 mb-15">
                            {__d('admin', 'tuy_chon_cua_thuoc_tinh')}
                        </div>
    
                        <div class="kt-todo__body p-0">
                            <div class="kt-todo__items" data-type="task">
                                <div id="wrap-options-{ARTICLE}" class="kt-scroll" data-scroll="true" data-height="530">
                                    {$this->element('../AttributeSetting/element_options', [
                                        'type_attribute'=> ARTICLE
                                    ])}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</form>