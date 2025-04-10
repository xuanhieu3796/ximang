<div class="form-group">
    <label>
        {__d('admin', 'mo_ta_ngan')}
    </label>
    <div class="clearfix">
        <textarea name="description" id="description" class="mce-editor-simple">{if !empty($article.description)}{$article.description}{/if}</textarea>
    </div>
</div>

<div class="form-group">
    <label>
        {__d('admin', 'noi_dung')}
    </label>
    <div class="clearfix">
        <textarea name="content" id="content" class="mce-editor">{if !empty($article.content)}{$article.content}{/if}</textarea>
    </div>

    {$this->element('attribute/embed_attribute', ['embed_attribute' => $embed_attribute])}
</div>

<div class="form-group">
    <label>
        {__d('admin', 'the_bai_viet')}
    </label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="la la-tags"></i>
            </span>
        </div>
        {assign var = tags value = []}
        {if !empty($article.tags)}
            {foreach from = $article.tags item = tag key = k_tag}
                {$tags[$k_tag] = $tag.name}
            {/foreach}
        {/if}
        <input name="tags" id="tags" value="{if !empty($tags)}{htmlentities($tags|@json_encode)}{/if}" type="text" class="form-control form-control-sm tagify-input">
    </div>
    <span class="form-text text-muted">
        {__d('admin', 'chi_ho_tro_{0}_the_va_do_dai_moi_the_khong_qua_{1}_ky_tu', [10, 45])}
    </span>
</div>

<div class="form-group">
    <label>
        {__d('admin', 'album_anh')}
    </label>
    <div class="row wrap-album">
        <div class="col-xl-8 col-lg-8">
            <input id="images" name="images" value="{if !empty($article.images)}{htmlentities($article.images|@json_encode)}{/if}" type="hidden" />
            <div class="clearfix mb-5 list-image-album">
                {if !empty($article.images)}
                    {foreach from = $article.images item = image}
                        <a href="{CDN_URL}{$image}" target="_blank" class="kt-media kt-media--lg mr-10 position-relative item-image-album" data-image="{$image}">
                            <img src="{CDN_URL}{$image}">
                            <span class="btn-clear-image-album" title="{__d('admin', 'xoa_anh')}">
                                <i class="fa fa-times"></i>
                            </span>
                        </a>
                    {/foreach}
                {/if}
            </div>
        </div>

        <div class="col-xl-2 col-lg-4">
            {assign var = url_select_album value = "{CDN_URL}/myfilemanager/?type_file=image&cross_domain=1&multiple=1&token={$access_key_upload}&field_id=images&lang={LANGUAGE_ADMIN}"}

            <span class="col-12 btn btn-sm btn-success btn-select-image-album" data-src="{$url_select_album}" data-type="iframe">
                <i class="fa fa-images"></i> 
                {__d('admin', 'chon_anh_album')}
            </span>
        </div>
    </div>
</div>

<div class="form-group">
    <label>
        {__d('admin', 'tep_dinh_kem')}
    </label>
    <div class="row">
        <div class="col-xl-8 col-lg-8">
            <div class="wrap-files">
                <input id="files" name="files" value="{if !empty($article.files)}{htmlentities($article.files|@json_encode)}{/if}" type="hidden" />
                <div class="list-files">
                    {if !empty($article.files)}
                        {foreach from = $article.files item = file}
                            <a href="{CDN_URL}{$file}" class="kt-media kt-media--lg mr-20 item-file" data-file="{$file}" target="_blank">
                                {assign var = file_type value = {$this->UtilitiesAdmin->getTypeFileByUrl($file)}}
                                <i class="fa fa-file{if !empty($file_type)}-{$file_type}{/if}"></i>
                                <span class="btn-clear-file" title="{__d('admin', 'xoa_tep')}">
                                    <i class="fa fa-times"></i>
                                </span>
                            </a>
                        {/foreach}
                    {/if}
                </div>
            </div>
        </div>

        {assign var = url_select_files value = "{CDN_URL}/myfilemanager/?cross_domain=1&multiple=1&token={$access_key_upload}&field_id=files&lang={LANGUAGE_ADMIN}"}

        <div class="col-xl-2 col-lg-4">
            <span class="col-12 btn btn-sm btn-success btn-select-file" data-src="{$url_select_files}" data-type="iframe">
                <i class="fa fa-file-alt"></i> 
                {__d('admin', 'chon_tep')}
            </span>
        </div>
    </div>
</div>

<div class="form-group">
    <label>
        {__d('admin', 'duong_dan_video')}
    </label>

    <div class="row wrap-video">
        <div class="col-xl-8 col-lg-8">
            <input name="url_video" id="url_video" value="{if !empty($article.url_video)}{$article.url_video}{/if}" type="text" class="form-control form-control-sm">
            <span class="form-text text-muted">
                {__d('admin', 'voi_kieu_video_youtube_url_chi_dien_ma_video')} 
                <img src="{ADMIN_PATH}/assets/media/note/upload_video.png" width="300px" />
            </span>
        </div>

        <div class="col-xl-4 col-lg-4">
            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    {$this->Form->select('type_video', $this->ListConstantAdmin->listTypeVideo(), ['id' => 'type_video', 'empty' => null, 'default' => "{if !empty($article.type_video)}{$article.type_video}{/if}", 'class' => 'form-control form-control-sm kt-selectpicker mb-10'])}
                </div>

                {assign var = url_select_video value = "{CDN_URL}/myfilemanager/?type_file=video&cross_domain=1&token={$access_key_upload}&field_id=url_video&lang={LANGUAGE_ADMIN}"}

                <div class="col-xl-6 col-lg-12">
                    <span class="col-12 btn btn-sm btn-success d-none btn-select-video" data-src="{$url_select_video}" data-type="iframe">
                        <i class="fa fa fa-photo-video"></i> 
                        {__d('admin', 'chon_video')}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>