{assign var = url_list value = "{ADMIN_PATH}/review"}
{assign var = url_add value = "{ADMIN_PATH}/review/add"}
{assign var = url_edit value = "{ADMIN_PATH}/review/update"}

{$this->element('Admin.page/content_head', [
    'url_list' => $url_list,
    'url_add' => $url_add,
    'url_edit' => $url_edit
])}

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <form id="main-form" action="{ADMIN_PATH}/review/save{if !empty($id)}/{$id}{/if}" method="POST" autocomplete="off">
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
                    <input name="name" value="{if !empty($review.name)}{$review.name}{/if}" class="form-control form-control-sm nh-format-link" type="text" maxlength="255">
                </div>
                <div class="form-group">
                    <label>
                        {__d('admin', 'vi_tri')}
                    </label>
                    <input name="position" value="{$position}" class="form-control form-control-sm" type="text">
                </div>
            </div>
        </div>
    </form>
</div>