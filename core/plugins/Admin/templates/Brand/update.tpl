{assign var = url_list value = "{ADMIN_PATH}/brand"}
{assign var = url_add value = "{ADMIN_PATH}/brand/add"}
{assign var = url_edit value = "{ADMIN_PATH}/brand/update"}

{$this->element('Admin.page/content_head', [
    'url_list' => $url_list,
    'url_add' => $url_add,
    'url_edit' => $url_edit,
    'show_lang' => true
])}

<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    <form id="main-form" action="{ADMIN_PATH}/brand/save{if !empty($id)}/{$id}{/if}" method="POST" autocomplete="off">
        <div class="clearfix" style="min-height: 900px;">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-toolbar">
                        <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-basic-info" role="tab">
                                    {__d('admin', 'thong_tin_co_ban')}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-description" role="tab">
                                    {__d('admin', 'mo_ta')}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-seo" role="tab">                                
                                    SEO
                                </a>
                            </li>
                            {if !empty($id)}
                                <li class="nav-item">
                                    <a nh-btn="show-log-tab" data-toggle="tab" href="#tab-log" role="tab" class="nav-link">
                                        {__d('admin', 'lich_su_cap_nhat')} 
                                    </a>
                                </li>
                            {/if}
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-basic-info" role="tabpanel">
                            {$this->element('../Brand/element_basic_info')}
                        </div>

                        <div class="tab-pane" id="tab-description" role="tabpanel">
                            {$this->element('../Brand/element_description')}
                        </div>

                        <div class="tab-pane" id="tab-seo" role="tabpanel">
                            {$this->element('../Brand/element_seo')}
                        </div>
                        <div id="tab-log" nh-tab="log-tab" record-id="{if !empty($id)}{$id}{/if}" sub-type="{BRAND}" class="tab-pane" role="tabpanel"></div>
                    </div>  
                </div>
            </div>
        </div>
    </form>
</div>

{$this->element('page/modal_log')}