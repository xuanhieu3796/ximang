<?php
/* Smarty version 4.5.5, created on 2025-04-10 22:03:43
  from 'C:\var5\ximang.local\core\plugins\Admin\templates\Dashboard\comment.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7ddcfecd5b3_37488484',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f312a145d6fc4cc86c2c97ed574d0459f2f91dd' => 
    array (
      0 => 'C:\\var5\\ximang.local\\core\\plugins\\Admin\\templates\\Dashboard\\comment.tpl',
      1 => 1724335132,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7ddcfecd5b3_37488484 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="kt-portlet__body kt-portlet__body--fit">
    <div class="kt-widget17">
        <div class="kt-widget17__stats m-0 w-100 text-center">
            <div class="kt-widget17__items">
                <div class="kt-widget17__item cursor-default box-shadow-0 p-0">
                    <div class="kt-portlet__head kt-portlet__space-x">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                <?php echo __d('admin','binh_luan_va_danh_gia');?>

                            </h3>
                        </div>
                    </div>
                <?php if (!empty($_smarty_tpl->tpl_vars['list_comment']->value) || !empty($_smarty_tpl->tpl_vars['list_rating']->value)) {?>
                    <div class="kt-portlet__body comment_dashboard-over-flow text-left">
                        <div class="kt-widget3 ">
                            <?php if (!empty($_smarty_tpl->tpl_vars['list_comment']->value)) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_comment']->value, 'item_comment', false, 'key');
$_smarty_tpl->tpl_vars['item_comment']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item_comment']->value) {
$_smarty_tpl->tpl_vars['item_comment']->do_else = false;
?>
                                    <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['item_comment']->value['type_comment'] == 'comment')) {
echo __d('admin','binh_luan');
} else {
echo __d('admin','danh_gia');
}
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('type_comment', $_prefixVariable1);?>
                                    <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['item_comment']->value['status']) && $_smarty_tpl->tpl_vars['item_comment']->value['status'] == 2) {
echo __d('admin','cho_duyet');
}
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_assignInScope('status', $_prefixVariable2);?>
                                    <?php if (empty($_smarty_tpl->tpl_vars['item_comment']->value['status'])) {?>
                                        <?php ob_start();
echo __d('admin','khong_duyet');
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->_assignInScope('status', $_prefixVariable3);?>
                                    <?php }?>
                                    <div class="kt-widget3__item row">
                                        <div class="col-md-4">
                                            <div class="kt-widget3__info pl-0 mb-2">
                                                <?php if (!empty($_smarty_tpl->tpl_vars['item_comment']->value['full_name'])) {?>
                                                    <div class="d-flex <?php if (!empty($_smarty_tpl->tpl_vars['item_comment']->value['is_admin'])) {?>mb-2<?php }?>">
                                                        <span class="kt-widget3__username fw-600">
                                                            <?php echo $_smarty_tpl->tpl_vars['item_comment']->value['full_name'];?>
 
                                                        </span>
                                                        <?php if (!empty($_smarty_tpl->tpl_vars['item_comment']->value['is_admin'])) {?>
                                                            <span class="kt-badge kt-badge--danger kt-badge--inline ml-2">
                                                                Admin
                                                            </span>
                                                        <?php }?>
                                                    </div>
                                                <?php }?>
                                                <?php if (!empty($_smarty_tpl->tpl_vars['item_comment']->value['created'])) {?>
                                                    <span class="kt-widget3__time fs-12 font-italic">
                                                        <?php echo $_smarty_tpl->tpl_vars['this']->value->UtilitiesAdmin->convertIntgerToDateTimeString($_smarty_tpl->tpl_vars['item_comment']->value['created']);?>

                                                    </span>
                                                <?php }?>
                                            </div>
                                            <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['item_comment']->value['type'] == 'product_detail')) {
echo __d('admin','san_pham');
} else {
echo __d('admin','bai_viet');
}
$_prefixVariable4=ob_get_clean();
$_smarty_tpl->_assignInScope('type', $_prefixVariable4);?>

                                            <?php if (!empty($_smarty_tpl->tpl_vars['item_comment']->value['type'])) {?>
                                                <a class="kt-widget3__text mb-2 d-inline-block cursor-p" nh-btn="view-admin-comment" data-type="<?php echo $_smarty_tpl->tpl_vars['item_comment']->value['type'];?>
">
                                                    <i class="fa fa-external-link-alt"></i> <?php echo $_smarty_tpl->tpl_vars['type']->value;?>

                                                </a>
                                            <?php }?>
                                            <input type="hidden" name="foreign_id" value="<?php if (!empty($_smarty_tpl->tpl_vars['item_comment']->value['foreign_id'])) {
echo $_smarty_tpl->tpl_vars['item_comment']->value['foreign_id'];
}?>">
                                        </div>
                                        <div class="col-md-7">
                                            <?php if (!empty($_smarty_tpl->tpl_vars['type_comment']->value)) {?>
                                                <p class="d-flex font-weight-bold kt-widget3__text mb-2">
                                                    <i class="flaticon2-talk text-warning mr-1"></i> <?php echo $_smarty_tpl->tpl_vars['type_comment']->value;?>

                                                <?php if ($_smarty_tpl->tpl_vars['item_comment']->value['status'] != 1) {?> 
                                                    <span class="kt-badge <?php if ($_smarty_tpl->tpl_vars['item_comment']->value['status'] == 2) {?>kt-badge--success<?php } else { ?>kt-badge--warning<?php }?> kt-badge--inline fs-10 ml-2">
                                                        <?php echo $_smarty_tpl->tpl_vars['status']->value;?>

                                                    </span>
                                                <?php }?>
                                                </p>
                                            <?php }?>

                                            <?php if (!empty($_smarty_tpl->tpl_vars['item_comment']->value['content'])) {?>
                                                <p class="kt-widget3__text text-justify content-comment mh-80 ">
                                                    <?php echo strip_tags($_smarty_tpl->tpl_vars['item_comment']->value['content']);?>

                                                </p>
                                                <span nh-btn ="show-more" class=" mb-2 d-none kt-badge kt-badge--inline kt-badge--unified-brand kt-badge--bold cursor-p">
                                                    <?php echo __d('admin','xem_them');?>

                                                </span>
                                            <?php }?>
                                            <?php if (!empty($_smarty_tpl->tpl_vars['item_comment']->value['images'])) {?>
                                                <div class="album-images list-image-album album-comment-dashboard mb-2">
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, json_decode($_smarty_tpl->tpl_vars['item_comment']->value['images']), 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
                                                        <a href="<?php echo CDN_URL;
echo $_smarty_tpl->tpl_vars['image']->value;?>
" target="_blank" class="kt-media kt-media--lg mr-10 position-relative">
                                                            <img class="image-comment1" src="<?php echo CDN_URL;
echo $_smarty_tpl->tpl_vars['image']->value;?>
"/>
                                                        </a>
                                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </div> 
                                            <?php }?>
                                            <?php $_smarty_tpl->_assignInScope('name_replied', '');?>
                                            <?php if (!empty($_smarty_tpl->tpl_vars['item_comment']->value['parent_id'])) {?>
                                                <?php if (!empty($_smarty_tpl->tpl_vars['list_comment']->value[$_smarty_tpl->tpl_vars['item_comment']->value['parent_id']]['full_name'])) {?>
                                                    <?php $_smarty_tpl->_assignInScope('name_replied', $_smarty_tpl->tpl_vars['list_comment']->value[$_smarty_tpl->tpl_vars['item_comment']->value['parent_id']]['full_name']);?>
                                                <?php }?>
                                                <div class="inner-reply mb-2">
                                                    <i class="flaticon-reply"></i>
                                                    <?php echo __d('admin','tra_loi');?>
 <?php echo strip_tags($_smarty_tpl->tpl_vars['name_replied']->value);?>

                                                </div>
                                            <?php }?>
                                        </div>
                                        <div class="col-md-1">
                                            <a class="kt-widget3__status kt-font-info" nh-btn="view-comment" href="<?php if (!empty($_smarty_tpl->tpl_vars['item_comment']->value['url'])) {?>/<?php echo $_smarty_tpl->tpl_vars['item_comment']->value['url'];
}?>" target="_blank">                                    
                                                <i class="fa fa-eye cursor-p fs-14 text-primary"></i>
                                            </a>
                                        </div>                        
                                    </div>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php }?>
                            <?php if (!empty($_smarty_tpl->tpl_vars['list_rating']->value)) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_rating']->value, 'item_rating');
$_smarty_tpl->tpl_vars['item_rating']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item_rating']->value) {
$_smarty_tpl->tpl_vars['item_rating']->do_else = false;
?>
                                    <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['item_rating']->value['type_comment'] == 'comment')) {
echo __d('admin','binh_luan');
} else {
echo __d('admin','danh_gia');
}
$_prefixVariable5=ob_get_clean();
$_smarty_tpl->_assignInScope('type_comment', $_prefixVariable5);?> 
                                    <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['item_rating']->value['status']) && $_smarty_tpl->tpl_vars['item_rating']->value['status'] == 2) {
echo __d('admin','cho_duyet');
}
$_prefixVariable6=ob_get_clean();
$_smarty_tpl->_assignInScope('status', $_prefixVariable6);?>
                                    <?php if (empty($_smarty_tpl->tpl_vars['item_rating']->value['status'])) {?>
                                        <?php ob_start();
echo __d('admin','khong_duyet');
$_prefixVariable7=ob_get_clean();
$_smarty_tpl->_assignInScope('status', $_prefixVariable7);?>
                                    <?php }?>
                                    <div class="kt-widget3__item row">
                                        <div class="col-md-4">
                                            <div class="kt-widget3__info pl-0 mb-2">
                                                <div class="d-flex <?php if (!empty($_smarty_tpl->tpl_vars['item_rating']->value['is_admin'])) {?>mb-2<?php }?>">
                                                    <span class="kt-widget3__username fw-600">
                                                        <?php echo $_smarty_tpl->tpl_vars['item_rating']->value['full_name'];?>
 
                                                    </span>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['item_rating']->value['is_admin'])) {?>
                                                        <span class="kt-badge kt-badge--danger kt-badge--inline ml-2">
                                                            Admin
                                                        </span>
                                                    <?php }?>
                                                </div>
                                                <?php if (!empty($_smarty_tpl->tpl_vars['item_rating']->value['created'])) {?>
                                                    <span class="kt-widget3__time fs-12 font-italic">
                                                        <?php echo $_smarty_tpl->tpl_vars['this']->value->UtilitiesAdmin->convertIntgerToDateTimeString($_smarty_tpl->tpl_vars['item_rating']->value['created']);?>

                                                    </span>
                                                <?php }?>
                                            <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['item_rating']->value['type'] == 'product_detail')) {
echo __d('admin','san_pham');
} else {
echo __d('admin','bai_viet');
}
$_prefixVariable8=ob_get_clean();
$_smarty_tpl->_assignInScope('type', $_prefixVariable8);?>
                                            </div>
                                            <?php if (!empty($_smarty_tpl->tpl_vars['item_rating']->value['type'])) {?>
                                                <a class="kt-widget3__text mb-2 d-inline-block cursor-p" nh-btn="view-admin-comment" data-type="<?php echo $_smarty_tpl->tpl_vars['item_rating']->value['type'];?>
">
                                                    <i class="fa fa-external-link-alt"></i> <?php echo $_smarty_tpl->tpl_vars['type']->value;?>

                                                </a>
                                            <?php }?>
                                            <input type="hidden" name="foreign_id" value="<?php if (!empty($_smarty_tpl->tpl_vars['item_rating']->value['foreign_id'])) {
echo $_smarty_tpl->tpl_vars['item_rating']->value['foreign_id'];
}?>">
                                        </div>
                                        <div class="col-md-7">
                                            <?php if (!empty($_smarty_tpl->tpl_vars['type_comment']->value)) {?>
                                                <p class="d-flex font-weight-bold kt-widget3__text mb-2">
                                                    <i class="flaticon2-talk text-warning mr-1"></i> <?php echo $_smarty_tpl->tpl_vars['type_comment']->value;?>
 
                                                <?php if ($_smarty_tpl->tpl_vars['item_rating']->value['status'] != 1) {?> 
                                                    <span class="kt-badge <?php if ($_smarty_tpl->tpl_vars['item_rating']->value['status'] == 2) {?>kt-badge--success<?php } else { ?>kt-badge--warning<?php }?> kt-badge--inline fs-10 ml-2">
                                                        <?php echo $_smarty_tpl->tpl_vars['status']->value;?>

                                                    </span>
                                                <?php }?>
                                                </p>
                                            <?php }?>

                                            <?php if (!empty($_smarty_tpl->tpl_vars['item_rating']->value['rating'])) {?>
                                                <div class="star-rating" number-rating="<?php echo $_smarty_tpl->tpl_vars['item_rating']->value['rating'];?>
">
                                                    <span style="width:100%"></span>
                                                </div>
                                            <?php }?>

                                            <?php if (!empty($_smarty_tpl->tpl_vars['item_rating']->value['content'])) {?>
                                                <p class="kt-widget3__text text-justify content-comment mh-80 ">
                                                    <?php echo strip_tags($_smarty_tpl->tpl_vars['item_rating']->value['content']);?>
 
                                                </p>
                                                <span nh-btn ="show-more" class=" mb-2 d-none kt-badge kt-badge--inline kt-badge--unified-brand kt-badge--bold cursor-p">
                                                    <?php echo __d('admin','xem_them');?>

                                                </span>
                                            <?php }?>
                                            <?php if (!empty($_smarty_tpl->tpl_vars['item_rating']->value['images'])) {?>
                                                <div class="album-images list-image-album album-comment-dashboard mb-2">
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, json_decode($_smarty_tpl->tpl_vars['item_rating']->value['images']), 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
                                                        <a href="<?php echo CDN_URL;
echo $_smarty_tpl->tpl_vars['image']->value;?>
" target="_blank" class="kt-media kt-media--lg mr-10 position-relative">
                                                            <img class="image-comment1" src="<?php echo CDN_URL;
echo $_smarty_tpl->tpl_vars['image']->value;?>
"/>
                                                        </a>
                                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </div> 
                                            <?php }?>
                                            <?php $_smarty_tpl->_assignInScope('name_replied', '');?>
                                            <?php if (!empty($_smarty_tpl->tpl_vars['item_rating']->value['parent_id'])) {?>
                                                <?php if (!empty($_smarty_tpl->tpl_vars['list_rating']->value[$_smarty_tpl->tpl_vars['item_rating']->value['parent_id']]['full_name'])) {?>
                                                    <?php $_smarty_tpl->_assignInScope('name_replied', $_smarty_tpl->tpl_vars['list_rating']->value[$_smarty_tpl->tpl_vars['item_rating']->value['parent_id']]['full_name']);?>
                                                <?php }?>
                                                <div class="inner-reply mb-2">
                                                    <i class="flaticon-reply"></i>
                                                        <?php echo __d('admin','tra_loi');?>
 <?php echo strip_tags($_smarty_tpl->tpl_vars['name_replied']->value);?>

                                                </div>
                                            <?php }?>
                                        </div>
                                        <div class="col-md-1">
                                            <a class="kt-widget3__status kt-font-info" nh-btn="view-comment" href="<?php if (!empty($_smarty_tpl->tpl_vars['item_rating']->value['url'])) {?>/<?php echo $_smarty_tpl->tpl_vars['item_rating']->value['url'];
}?>" target="_blank">                                   
                                                 <i class="fa fa-eye cursor-p fs-14 text-primary"></i>
                                            </a>
                                        </div>
                                    </div>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php }?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="kt-portlet__body">
                        <div class="kt-font-bolder">
                            <?php echo __d('admin','khong_co_binh_luan');?>

                        </div>
                    </div>
                <?php }?>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}
