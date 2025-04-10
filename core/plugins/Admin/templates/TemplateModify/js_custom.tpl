<div class="kt-subheader kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                {if !empty($title_for_layout)}{$title_for_layout}{/if}
            </h3>
        </div>

        <div class="kt-subheader__toolbar">
            <div class="btn-group">
                {if !empty($exist_file)}
                    <button id="btn-save" type="button" class="btn btn-brand btn-sm btn-save" shortcut="112">
                        {__d('admin', 'luu_lai_javascript')} (F1)
                    </button>
                {/if}
            </div>
        </div>
    </div>
</div>

<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    {if !empty($exist_file)}
        <div class="kt-portlet nh-portlet">
            <div class="kt-portlet__body">
                <div class="form-group">
                    <span nh-btn="full-screen-editor" class="btn btn-sm btn-secondary float-right">
                        <i class="fa fa-expand"></i>
                        {__d('admin', 'toan_man_hinh')}
                    </span>

                    <span nh-btn="view-history-change-file" data-path="{if !empty($file_path)}{$file_path}{/if}" class="btn btn-sm btn-secondary mr-5 float-right">
                        <i class="fa fa-file-alt"></i>
                        {__d('admin', 'lich_su_thay_doi_cua_tep')}
                    </span>

                </div>
                <form id="main-form" action="{ADMIN_PATH}/template/modify/save/js" method="POST" autocomplete="off">
                    <div id="editor" class="nh-editor">{if !empty($content)}{htmlentities($content)}{/if}</div>
                </form>
            </div>
        </div>
    {else}
        <div class="kt-portlet nh-portlet">
            <div class="kt-portlet__body">
                <span class="fs-12 fw-400">
                    {__d('admin', 'khong_doc_duoc_noi_dung_cua_tep')}.
                </span>
            </div>
        </div>
    {/if}
</div>