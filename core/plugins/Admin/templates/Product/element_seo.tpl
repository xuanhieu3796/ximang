<div class="form-group">
    <label>
        {__d('admin', 'duong_dan')}
        <span class="kt-font-danger">*</span>
    </label>
    <div class="input-group flex-nowrap">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="la la-link"></i>
            </span>
        </div>
        <input name="link" value="{if !empty($product.url)}{$product.url}{/if}" data-link-id="{if !empty($product.url_id)}{$product.url_id}{/if}" type="text" class="form-control form-control-sm nh-link" maxlength="255">
    </div>
</div>

<div class="form-group">
    <label>
        {__d('admin', 'tieu_de_seo')}
    </label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="la la-list-alt"></i>
            </span>
        </div>
        <input name="seo_title" value="{if !empty($product.seo_title)}{$product.seo_title|escape}{/if}" type="text" class="form-control form-control-sm" maxlength="255">
    </div>
    <div id="progress-bar-title" class="progress mt-10">
        <div class="progress-bar progress-bar-striped"></div>
    </div>
</div>

<div class="form-group">
    <label>
        {__d('admin', 'mo_ta_seo')}
    </label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="la la-file-text"></i>
            </span>
        </div>
        <input name="seo_description" value="{if !empty($product.seo_description)}{$product.seo_description|escape}{/if}" type="text" class="form-control form-control-sm" maxlength="255">
    </div>
    <div id="progress-bar-description" class="progress mt-10">
        <div class="progress-bar progress-bar-striped"></div>
    </div>
</div>

<div class="form-group">
    <label>
        {__d('admin', 'tu_khoa_seo')}
    </label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="la la-tags"></i>
            </span>
        </div>
        <input name="seo_keyword" id="seo_keyword" value="{if !empty($product.seo_keyword)}{$product.seo_keyword}{/if}" type="text" class="form-control form-control-sm tagify-input">
    </div>
    <span class="form-text text-muted">
        {__d('admin', 'chi_ho_tro_{0}_tu_khoa_va_do_dai_moi_tu_khoa_khong_qua_{1}_ky_tu', [10, 45])}
    </span>
</div>

<div class="kt-separator kt-separator--space-lg kt-separator--border-dashed"></div>

<div id="nh-analysis" class="form-group row">
    <div class="col-xl-12 col-lg-12 all-analysis"></div>
</div>

<input type="hidden" name="seo_score" value="" id="seo-score">
<input type="hidden" name="keyword_score" value="" id="keyword-score">
