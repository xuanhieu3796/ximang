<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:10
  from 'C:\var5\ximang.local\templates\thoitrang05\block\slider\view_doi_tac.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc4653e5f6_47028367',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8fbcf9a61eaf904f4f85adf7740a5ccc6e90082' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\block\\slider\\view_doi_tac.tpl',
      1 => 1742483025,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc4653e5f6_47028367 (Smarty_Internal_Template $_smarty_tpl) {
if (!empty($_smarty_tpl->tpl_vars['data_block']->value)) {?><div class="section-brand"><?php ob_start();
echo LANGUAGE;
$_prefixVariable79 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable79]['tieu_de'])) {?><h3 class="title-section text-center"><?php echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('tieu_de',$_smarty_tpl->tpl_vars['data_extend']->value);?>
</h3><?php }?><div class="swiper swiper-slider-brand" nh-swiper="<?php if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['slider'])) {
echo htmlentities(json_encode($_smarty_tpl->tpl_vars['data_extend']->value['slider']));
}?>"><div class="swiper-wrapper"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_block']->value, 'slider');
$_smarty_tpl->tpl_vars['slider']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['slider']->value) {
$_smarty_tpl->tpl_vars['slider']->do_else = false;
$_smarty_tpl->_assignInScope('image_source', '');
if (!empty($_smarty_tpl->tpl_vars['slider']->value['image']) && !empty($_smarty_tpl->tpl_vars['slider']->value['image_source'])) {
$_smarty_tpl->_assignInScope('image_source', $_smarty_tpl->tpl_vars['slider']->value['image_source']);
}
$_smarty_tpl->_assignInScope('image_url', '');
if (!empty($_smarty_tpl->tpl_vars['slider']->value['image']) && $_smarty_tpl->tpl_vars['image_source']->value == 'cdn') {
ob_start();
echo CDN_URL;
$_prefixVariable80=ob_get_clean();
$_smarty_tpl->_assignInScope('image_url', $_prefixVariable80.((string)$_smarty_tpl->tpl_vars['slider']->value['image']));
if (!empty(DEVICE)) {
ob_start();
echo CDN_URL;
$_prefixVariable81=ob_get_clean();
$_smarty_tpl->_assignInScope('image_url', $_prefixVariable81.((string)$_smarty_tpl->tpl_vars['this']->value->Utilities->getThumbs($_smarty_tpl->tpl_vars['slider']->value['image'],350)));
}
}
if (!empty($_smarty_tpl->tpl_vars['slider']->value['image']) && $_smarty_tpl->tpl_vars['image_source']->value == 'template') {
$_smarty_tpl->_assignInScope('image_url', ((string)$_smarty_tpl->tpl_vars['slider']->value['image']));
if (!empty(DEVICE)) {
$_smarty_tpl->_assignInScope('image_url', ((string)$_smarty_tpl->tpl_vars['this']->value->Utilities->getThumbs($_smarty_tpl->tpl_vars['slider']->value['image'],350,'template')));
}
}?><div class="swiper-slide <?php if (!empty($_smarty_tpl->tpl_vars['slider']->value['class_item'])) {
echo $_smarty_tpl->tpl_vars['slider']->value['class_item'];
}?>"><div class="item-img-brand"><div class="img-brand ratio-16-9"><img src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
" class="img-fluid" alt="<?php if (!empty($_smarty_tpl->tpl_vars['slider']->value['name'])) {
echo $_smarty_tpl->tpl_vars['slider']->value['name'];
}?>"></div></div></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div><?php if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['slider']['pagination'])) {?><!-- If we need pagination --><div class="swiper-pagination"></div><?php }
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['slider']['navigation'])) {?><!-- If we need navigation buttons --><div class="swiper-button-next"><i class="fa-light fa-angle-right"></i></div><div class="swiper-button-prev"><i class="fa-light fa-angle-left"></i></div><?php }?></div></div><?php }
}
}
