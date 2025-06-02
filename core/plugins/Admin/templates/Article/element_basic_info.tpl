{if !empty($article.id)}
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="form-group form-group-xs row">
                <label class="col-lg-4 col-xl-4 col-form-label">
                    {__d('admin', 'trang_thai')}
                </label>

                <div class="col-lg-8 col-xl-8">
                    {if !empty($article.draft)}
                        <span class="kt-badge kt-badge--dark kt-badge--inline kt-badge--pill mt-10">
                            {__d('admin', 'ban_luu_nhap')}
                        </span>
                    {/if}

                    {if isset($article.status) && $article.status == 1}
                        <span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill mt-10">
                            {__d('admin', 'hoat_dong')}
                        </span>
                    {elseif isset($article.status) && $article.status == 0}
                        <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill mt-10">
                            {__d('admin', 'khong_hoat_dong')}
                        </span>   
                    {elseif isset($article.status) && $article.status == -1}
                        <span class="kt-badge kt-badge--warning kt-badge--inline kt-badge--pill mt-10">
                            {__d('admin', 'cho_duyet')}
                        </span>   
                    {/if}
                </div>
            </div>

            <div class="form-group form-group-xs row">
                <label class="col-lg-4 col-xl-4 col-form-label">
                    {__d('admin', 'nguoi_tao')}
                </label>
                <div class="col-lg-8 col-xl-8">
                    <span class="form-control-plaintext kt-font-bolder">
                        {if !empty($article.user_full_name)}
                            {$article.user_full_name}
                        {/if}
                    </span>
                </div>
            </div>

            <div class="form-group form-group-xs row">
                <label class="col-lg-4 col-xl-4 col-form-label">
                    {__d('admin', 'thoi_gian_tao')}
                </label>
                <div class="col-lg-8 col-xl-8">
                    <span class="form-control-plaintext kt-font-bolder">
                        {if !empty($article.created)}
                            {$article.created}
                        {/if}
                    </span>
                </div>
            </div>

            <div class="form-group form-group-xs row">
                <label class="col-lg-4 col-xl-4 col-form-label">
                    {__d('admin', 'cap_nhat_moi')}
                </label>
                <div class="col-lg-8 col-xl-8">
                    <span class="form-control-plaintext kt-font-bolder">                        
                        {if !empty($article.updated)}
                            {$article.updated}
                        {/if}
                    </span>
                </div>
            </div>

            <div class="form-group form-group-xs row">
                <label class="col-lg-4 col-xl-4 col-form-label">
                    {__d('admin', 'seo')}
                </label>
                <div class="col-lg-8 col-xl-8">
                    {if !empty($article.seo_score) && $article.seo_score == 'success'}
                        <span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill mt-10">
                            {__d('admin', 'tot')}
                        </span>
                    {elseif !empty($article.seo_score) && $article.seo_score == 'warning'}
                        <span class="kt-badge kt-badge--warning kt-badge--inline kt-badge--pill mt-10">
                            {__d('admin', 'binh_thuong')}
                        </span>
                    {elseif !empty($article.seo_score) && $article.seo_score == 'danger'}
                        <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill mt-10">
                            {__d('admin', 'chua_dat')}
                        </span>
                    {else}
                        <span class="form-control-plaintext">
                            <em>{__d('admin', 'chua_co')}</em>
                        </span>
                    {/if}
                </div>
            </div>

            <div class="form-group form-group-xs row">
                <label class="col-lg-4 col-xl-4 col-form-label">
                    {__d('admin', 'tu_khoa')}
                </label>
                <div class="col-lg-8 col-xl-8">
                    {if !empty($article.keyword_score) && $article.keyword_score == 'success'}
                        <span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill mt-10">
                            {__d('admin', 'tot')}
                        </span>
                    {elseif !empty($article.keyword_score) && $article.keyword_score == 'warning'}
                        <span class="kt-badge kt-badge--warning kt-badge--inline kt-badge--pill mt-10">
                            {__d('admin', 'binh_thuong')}
                        </span>
                    {elseif !empty($article.keyword_score) && $article.keyword_score == 'danger'}
                        <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill mt-10">
                            {__d('admin', 'chua_dat')}
                        </span>
                    {else}
                        <span class="form-control-plaintext">
                            <em>{__d('admin', 'chua_co')}</em>
                        </span>
                    {/if}
                </div>
            </div>                

        </div>

        <div class="col-lg-6 col-xs-6">  
            <div class="form-group form-group-xs row">
                <label class="col-lg-4 col-xl-4 col-form-label">
                    {__d('admin', 'ngon_ngu_hien_tai')}
                </label>
                <div class="col-lg-8 col-xl-8">
                    <span class="form-control-plaintext kt-font-bolder">
                        <div class="list-flags">
                            <img src="{ADMIN_PATH}{FLAGS_URL}{$lang}.svg" alt="{$lang}" class="flag mr-10" />
                            {if !empty($list_languages[$lang])}
                                {$list_languages[$lang]}
                            {/if}
                        </div>
                    </span>
                </div>
            </div>
            
            {assign var = all_name_content value = $this->ArticleAdmin->getAllNameContent($id)}
            {if !empty($use_multiple_language) && !empty($list_languages) }
                <div class="form-group form-group-xs row">
                    <label class="col-lg-4 col-xl-4 col-form-label">
                        {__d('admin', 'sua_ban_dich')}
                    </label>
                    <div class="col-lg-12 col-xs-12">
                        <table class="table table-bordered mb-10">
                            <tbody>
                                {foreach from = $list_languages key = k_language item = language}
                                    <tr>
                                        <td class="w-90">
                                            <div class="list-flags d-inline mr-5">
                                                <img src="{ADMIN_PATH}{FLAGS_URL}{$k_language}.svg" alt="{$k_language}" class="flag" />
                                            </div>
                                            {$language}: 
                                            <i>
                                                {if !empty($all_name_content[$k_language])}
                                                    {$all_name_content[$k_language]|truncate:100:" ..."}
                                                {else}
                                                    <span class="kt-font-danger fs-12">
                                                        {__d('admin', 'chua_nhap')}
                                                    </span>
                                                {/if}
                                            </i>

                                            <a href="{ADMIN_PATH}/article/update/{$article.id}?lang={$k_language}" class="pl-10">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>                                            
                </div>
            {/if}

            <div class="form-group form-group-xs row">
                <label class="col-lg-4 col-xl-4 col-form-label">
                    {__d('admin', 'xem_bai_viet')}
                </label>

                <div class="col-lg-8 col-xl-8">
                    {if !empty($article.url)}
                        <a target="_blank" href="/{$article.url}" class="kt-link kt-font-bolder kt-link--info pt-5">
                            <i class="fa fa-external-link-alt"></i>
                            {__d('admin', 'xem_bai_viet')}
                        </a>
                    {/if}
                </div>
            </div>
        </div>
    </div>

    <div class="kt-separator kt-separator--space-lg kt-separator--border-dashed mt-10"></div>
{/if}

<div class="form-group">
    <label>
        {__d('admin', 'tieu_de')}
        <span class="kt-font-danger">*</span>
    </label>
    <input name="name" value="{if !empty($article.name)}{$article.name|escape}{/if}" class="form-control form-control-sm nh-format-link" type="text" maxlength="255">
</div>

<div id="wrap-category" class="row">
    <div class="col-lg-9">
        <div class="form-group">
            <label>
                {__d('admin', 'danh_muc')}
                <span class="kt-font-danger">*</span>
            </label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-align-justify w-20px"></i>
                    </span>
                </div>
                
                {assign var = categories value = $this->CategoryAdmin->getListCategoriesForDropdown([
                    {TYPE} => {ARTICLE}, 
                    {LANG} => $lang
                ])}

                {assign var = categories_selected value = []}
                {if !empty($article.categories)}
                    {foreach from = $article.categories item = category}
                        {$categories_selected[] = $category.id}
                    {/foreach}
                {/if}

                {$this->Form->select('categories', $categories, ['id' => 'categories', 'empty' => null, 'default' => $categories_selected, 'class' => 'form-control kt-select-multiple', 'multiple' => 'multiple', 'data-placeholder' => "{__d('admin', 'chon_danh_muc')}"])}
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <label>
            {__d('admin', 'danh_muc_chinh')}
        </label>
        {$this->Form->select('main_category_id', $list_category_main, ['id' => 'main_category_id', 'empty' => {__d('admin', 'chon')}, 'default' => "{if !empty($article.main_category_id)}{$article.main_category_id}{/if}", 'class' => 'form-control form-control-sm kt-selectpicker', 'data-placeholder' => "{__d('admin', 'chon_danh_muc')}", 'nh-attribute-by-category' => "{if !empty($attribute_by_category)}1{else}0{/if}"])}
    </div>
</div>

<div class="row">
    <div class="col-xl-3 col-12">
        <div class="form-group">
            <label>
                {__d('admin', 'tac_gia')}
            </label>
            {$this->Form->select('author_id', $this->AuthorAdmin->getListAuthorsForDropdown($lang), ['id' => 'author_id', 'empty' => {__d('admin', 'chon')}, 'default' => "{if !empty($article.author_id)}{$article.author_id}{/if}", 'class' => 'form-control form-control-sm kt-selectpicker', 'data-placeholder' => "{__d('admin', 'chon_tac_gia')}", 'data-size' => '5', 'data-live-search' => true])}
        </div>
    </div>
    <div class="col-lg-2 col-xl-2 col-12">
        <div class="form-group">
            <label>
                {__d('admin', 'luot_xem')}
            </label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
                <input name="view" value="{if !empty($article.view)}{$article.view}{/if}" type="text" class="form-control form-control-sm number-input" >
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-xl-3 col-12">
        <div class="form-group">
            <label>
                {__d('admin', 'vi_tri')}
            </label>
            <input name="position" value="{$position}" class="form-control form-control-sm" type="text">
        </div>
    </div>


    <div class="col-lg-2 col-xl-2 col-12">
        <div class="form-group">
            <label class="mb-10">
                {__d('admin', 'bai_noi_bat')}
            </label>
            <div class="kt-radio-inline">
                <label class="kt-radio kt-radio--tick kt-radio--success">
                    <input type="radio" name="featured" value="1" {if !empty($article.featured)}checked{/if}> 
                    {__d('admin', 'co')}
                    <span></span>
                </label>
                <label class="kt-radio kt-radio--tick kt-radio--danger">
                    <input type="radio" name="featured" value="0" {if empty($article.featured)}checked{/if}> 
                    {__d('admin', 'khong')}
                    <span></span>
                </label>
            </div>
        </div>
    </div>

    <div class="col-lg-2 col-xl-2 col-12">
        <div class="form-group">
            <label class="mb-10">
                {__d('admin', 'hien_thi_muc_luc')}
            </label>

            <div class="kt-radio-inline">
                <label class="kt-radio kt-radio--tick kt-radio--success">
                    <input type="radio" name="catalogue" value="1" {if !empty($article.catalogue)}checked{/if}> 
                    {__d('admin', 'co')}
                    <span></span>
                </label>
                
                <label class="kt-radio kt-radio--tick kt-radio--danger">
                    <input type="radio" name="catalogue" value="0" {if empty($article.catalogue)}checked{/if}> 
                    {__d('admin', 'khong')}
                    <span></span>
                </label>
            </div>
        </div>
    </div> 
    <div class="col-lg-3 col-xl-3 col-12">
        <div class="form-group">
            <label>
                Thời gian chờ đăng
            </label>
            <input name="time_post" value="{if !empty($article.time_post)}{date('d/m/Y - H:i', $article.time_post)}{/if}" class="form-control form-control-sm select-datetime" type="text" >
        </div>
    </div>

    
</div>

<div class="row">
    <div class="col-xl-2">
        <div class="form-group">
            <label>
                {__d('admin', 'anh_chinh')}
            </label>
            <div class="clearfix">
                {assign var = bg_avatar value = ''}
                {if !empty($article.image_avatar)}
                    {assign var = bg_avatar value = "background-image: url('{CDN_URL}{$article.image_avatar}');background-size: contain;background-position: 50% 50%;"}
                {/if}
                
                {assign var = url_select_avatar value = "{CDN_URL}/myfilemanager/?type_file=image&cross_domain=1&token={$access_key_upload}&field_id=image_avatar&lang={LANGUAGE_ADMIN}"}

                <div class="kt-avatar kt-avatar--outline kt-avatar--circle- {if !empty($bg_avatar)}kt-avatar--changed{/if}">
                    <a {if !empty($article.image_avatar)}href="{CDN_URL}{$article.image_avatar}"{/if} target="_blank" class="kt-avatar__holder d-block" style="{$bg_avatar}"></a>
                    <label class="kt-avatar__upload btn-select-image" data-toggle="kt-tooltip" data-original-title="{__d('admin', 'chon_anh')}" data-src="{$url_select_avatar}" data-type="iframe">
                        <i class="fa fa-pen"></i>
                    </label>
                    <span class="kt-avatar__cancel btn-clear-image" data-toggle="kt-tooltip" data-original-title="{__d('admin', 'xoa_anh')}">
                        <i class="fa fa-times"></i>
                    </span>

                    <input id="image_avatar" name="image_avatar" value="{if !empty($article.image_avatar)}{htmlentities($article.image_avatar)}{/if}" type="hidden" />
                </div>
            </div>
        </div>
    </div>   
</div>

