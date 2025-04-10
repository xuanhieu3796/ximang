<div class="nh-search-advanced">
    <div class="kt-form">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="row align-items-center">
                    <div class="col-md-3 kt-margin-b-20-tablet-and-mobile">
                        <div class="kt-input-icon kt-input-icon--left">
                            <input id="nh-keyword" name="keyword" type="text" class="form-control form-control-sm" placeholder="{__d('admin', 'binh_luan')}, {__d('admin', 'ho_ten')}, {__d('admin', 'so_dien_thoai')}, {__d('admin', 'email')} ..." autocomplete="off">
                            <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                <span><i class="la la-search"></i></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-3 kt-margin-b-20-tablet-and-mobile">
                        <div class="kt-form__group">
                            <div class="kt-form__control">
                                {$this->Form->select('type_comment', $this->CommentAdmin->typeComment(), ['id'=>'nh_comment_type', 'empty' => "-- {__d('admin', 'loai_binh_luan')} --", 'default' => "{if isset($comment.type_comment)}{$comment.type_comment}{/if}", 'class' => 'form-control form-control-sm kt-selectpicker', 'autocomplete' => 'off'])}
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 kt-margin-b-20-tablet-and-mobile">
                        <div class="kt-form__group">
                            <div class="kt-form__control">
                                {$this->Form->select('status', $this->CommentAdmin->listStatus(), ['id'=>'nh_status', 'empty' => "-- {__d('admin', 'trang_thai')} --", 'default' => '', 'class' => 'form-control form-control-sm kt-selectpicker', 'autocomplete' => 'off'])}
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                        <button type="button" class="btn btn-outline-secondary btn-sm btn-icon collapse-search-advanced" data-toggle="collapse" data-target="#collapse-search-advanced">
                            <i class="fa fa-chevron-down"></i>
                        </button>
                        <button id="btn-refresh-search" type="button" class="btn btn-outline-secondary btn-sm btn-icon">
                            <i class="fa fa-sync-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="collapse-search-advanced" class="collapse collapse-search-advanced-content">
        <div class="kt-margin-t-20">
            <div class="form-group row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>
                            {__d('admin', 'loai')}
                        </label>
                        <select name="type" class="form-control form-control-sm kt-selectpicker" id="type">
                            <option value="">{__d('admin', 'loai')}</option>
                            <option value="product_detail">{__d('admin', 'san_pham')}</option>
                            <option value="article_detail">{__d('admin', 'bai_viet')}</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>
                            {__d('admin', 'ngay_tao')}
                        </label>
                        <div class="input-group">
                            <input id="create_from" type="text" class="form-control form-control-sm kt_datepicker" name="create_from" autocomplete="off" placeholder="{__d('admin', 'tu')}">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                            </div>
                            <input id="create_to" type="text" class="form-control form-control-sm kt_datepicker" name="create_to" autocomplete="off" placeholder="{__d('admin', 'den')}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>