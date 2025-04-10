{if !empty($brand.id)}
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="form-group form-group-xs row">
                <label class="col-lg-4 col-xl-4 col-form-label">
                    {__d('admin', 'trang_thai')}
                </label>

                <div class="col-lg-8 col-xl-8">
                    {if isset($brand.status) && $brand.status == 1}
                        <span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill mt-10">
                            {__d('admin', 'hoat_dong')}
                        </span>
                    {elseif isset($brand.status) && $brand.status == 0}
                        <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill mt-10">
                            {__d('admin', 'khong_hoat_dong')}
                        </span>   
                    {elseif isset($brand.status) && $brand.status == -1}
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
                        {if !empty($brand.user_full_name)}
                            {$brand.user_full_name}
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
                        {if !empty($brand.created)}
                            {$this->UtilitiesAdmin->convertIntgerToDateTimeString($brand.created)}
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
                        {if !empty($brand.updated)}
                            {$this->UtilitiesAdmin->convertIntgerToDateTimeString($brand.updated)}
                        {/if}
                    </span>
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
            
            {assign var = all_name_content value = $this->BrandAdmin->getAllNameContent($id)}
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

                                            <a href="{ADMIN_PATH}/brand/update/{$brand.id}?lang={$k_language}" class="pl-10">
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
        </div>
    </div>

    <div class="kt-separator kt-separator--space-lg kt-separator--border-dashed mt-10"></div>
{/if}

<div class="form-group">
    <label>
        {__d('admin', 'ten_thuong_hieu')}
        <span class="kt-font-danger">*</span>
    </label>
    <input name="name" value="{if !empty($brand.name)}{$brand.name|escape}{/if}" class="form-control form-control-sm nh-format-link" type="text" maxlength="255">
</div>

<div class="row">
    <div class="col-xl-2 col-lg-3">
        <div class="form-group">
            <label>
                {__d('admin', 'vi_tri')}
            </label>
            <input name="position" value="{if !empty($position)}{$position}{/if}" class="form-control form-control-sm" type="text">
        </div>
    </div>
</div>

<div class="form-group">
    <label>
        {__d('admin', 'anh_chinh')}
    </label>
    <div class="clearfix">
        {assign var = bg_avatar value = ''}
        {if !empty($brand.image_avatar)}
            {assign var = bg_avatar value = "background-image: url('{CDN_URL}{$brand.image_avatar}');background-size: contain;background-position: 50% 50%;"}
        {/if}

        {assign var = url_select_avatar value = "{CDN_URL}/myfilemanager/?type_file=image&cross_domain=1&token={$access_key_upload}&field_id=image_avatar&lang={LANGUAGE_ADMIN}"}

        <div class="kt-avatar kt-avatar--outline kt-avatar--circle- {if !empty($bg_avatar)}kt-avatar--changed{/if}">
            <a {if !empty($brand.image_avatar)}href="{CDN_URL}{$brand.image_avatar}"{/if} target="_blank" class="kt-avatar__holder d-block" style="{$bg_avatar}"></a>
            <label class="kt-avatar__upload btn-select-image" data-toggle="kt-tooltip" data-original-title="{__d('admin', 'chon_anh')}" data-src="{$url_select_avatar}" data-type="iframe">
                <i class="fa fa-pen"></i>
            </label>
            <span class="kt-avatar__cancel btn-clear-image" data-toggle="kt-tooltip" data-original-title="{__d('admin', 'xoa_anh')}">
                <i class="fa fa-times"></i>
            </span>

            <input id="image_avatar" name="image_avatar" value="{if !empty($brand.image_avatar)}{htmlentities($brand.image_avatar)}{/if}" type="hidden" />
        </div>
    </div>
</div>