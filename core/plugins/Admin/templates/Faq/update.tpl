{assign var = url_list value = "{ADMIN_PATH}/faq"}
{assign var = url_add value = "{ADMIN_PATH}faq/add"}
{assign var = url_edit value = "{ADMIN_PATH}/faq/update"}

{$this->element('Admin.page/content_head', [
    'url_list' => $url_list,
    'url_add' => $url_add,
    'url_edit' => $url_edit
])}

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <form id="main-form" action="{ADMIN_PATH}/faq/save{if !empty($id)}/{$id}{/if}" method="POST" autocomplete="off">
        <div class="kt-portlet nh-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {__d('admin', 'thong_tin_co_ban')}
                    </h3>
                </div>
            </div>

            <div class="kt-portlet__body">
                <div class="form-group">
                    <label>
                        {__d('admin', 'tieu_de')}
                         <span class="kt-font-danger">*</span>
                    </label>
                    <input name="name" value="{if !empty($faq.name)}{$faq.name}{/if}" class="form-control form-control-sm nh-format-link" type="text" maxlength="255">
                </div>
                <div class="row">
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
                                    <input type="radio" name="featured" value="1" {if !empty($faq.featured)}checked{/if}> 
                                    {__d('admin', 'co')}
                                    <span></span>
                                </label>
                                <label class="kt-radio kt-radio--tick kt-radio--danger">
                                    <input type="radio" name="featured" value="0" {if empty($faq.featured)}checked{/if}> 
                                    {__d('admin', 'khong')}
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>
                        {__d('admin', 'noi_dung')}
                    </label>
                    <div class="clearfix">
                        <textarea name="content" id="content" class="mce-editor">{if !empty($faq.content)}{$faq.content}{/if}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>