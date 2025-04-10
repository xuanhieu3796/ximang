<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:09
  from 'C:\var5\ximang.local\templates\thoitrang05\block\slider\view_fanpage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc455bc873_06870145',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '593d52915b2043a7a713344e7580e46287e04490' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\block\\slider\\view_fanpage.tpl',
      1 => 1742485823,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc455bc873_06870145 (Smarty_Internal_Template $_smarty_tpl) {
if (!empty($_smarty_tpl->tpl_vars['data_block']->value)) {?><div class="box-follow"><?php ob_start();
echo LANGUAGE;
$_prefixVariable39 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable39]['tieu_de'])) {?><div class="title-footer"><?php echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('tieu_de',$_smarty_tpl->tpl_vars['data_extend']->value);?>
</div><?php }?><div class="list"><?php
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
$_prefixVariable40=ob_get_clean();
$_smarty_tpl->_assignInScope('image_url', $_prefixVariable40.((string)$_smarty_tpl->tpl_vars['slider']->value['image']));
}
if (!empty($_smarty_tpl->tpl_vars['slider']->value['image']) && $_smarty_tpl->tpl_vars['image_source']->value == 'template') {
$_smarty_tpl->_assignInScope('image_url', ((string)$_smarty_tpl->tpl_vars['slider']->value['image']));
}?><div class="item"><div class="icon"><a href="<?php if (!empty($_smarty_tpl->tpl_vars['slider']->value['url'])) {
echo $_smarty_tpl->tpl_vars['slider']->value['url'];
}?>"><?php if (!empty($_smarty_tpl->tpl_vars['slider']->value['class_item'])) {?><i class="<?php echo $_smarty_tpl->tpl_vars['slider']->value['class_item'];?>
"></i><?php } else {
ob_start();
if (!empty($_smarty_tpl->tpl_vars['slider']->value['name'])) {
echo (string)$_smarty_tpl->tpl_vars['slider']->value['name'];
}
$_prefixVariable41=ob_get_clean();
echo $_smarty_tpl->tpl_vars['this']->value->LazyLoad->renderImage(array('src'=>((string)$_smarty_tpl->tpl_vars['image_url']->value),'alt'=>$_prefixVariable41,'class'=>'img-fluid'));
}?></a></div></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div><?php }
}
}
