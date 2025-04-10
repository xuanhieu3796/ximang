<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:09
  from 'C:\var5\ximang.local\templates\thoitrang05\block\menu\view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc4583a051_40422992',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec4060fdf5bcaa0b38bf81627506e8a4dace927f' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\block\\menu\\view.tpl',
      1 => 1742528732,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc4583a051_40422992 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\var5\\ximang.local\\core\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
<div class="menu-container"><a class="btn-menu-mobile" nh-menu="btn-open" menu-type="main" href="javascript:;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 7.75H3C2.59 7.75 2.25 7.41 2.25 7C2.25 6.59 2.59 6.25 3 6.25H21C21.41 6.25 21.75 6.59 21.75 7C21.75 7.41 21.41 7.75 21 7.75Z" fill="#292D32"/><path d="M21 12.75H3C2.59 12.75 2.25 12.41 2.25 12C2.25 11.59 2.59 11.25 3 11.25H21C21.41 11.25 21.75 11.59 21.75 12C21.75 12.41 21.41 12.75 21 12.75Z" fill="#292D32"/><path d="M21 17.75H3C2.59 17.75 2.25 17.41 2.25 17C2.25 16.59 2.59 16.25 3 16.25H21C21.41 16.25 21.75 16.59 21.75 17C21.75 17.41 21.41 17.75 21 17.75Z" fill="#292D32"/></svg></a><div class="back-drop"></div><nav class="menu-section" nh-menu="sidebar" menu-type="main"><div class="menu-top"><span class="menu-header">Menu</span><a href="javascript:;" nh-menu="btn-close" class="close-sidebar effect-rotate icon-close"><i class="fa-light fa-xmark"></i></a></div><?php if (!empty($_smarty_tpl->tpl_vars['data_block']->value)) {?><ul><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_block']->value, 'menu');
$_smarty_tpl->tpl_vars['menu']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->do_else = false;
$_smarty_tpl->_assignInScope('class_has_child', '');
if (!empty($_smarty_tpl->tpl_vars['menu']->value['has_sub_menu'])) {
$_smarty_tpl->_assignInScope('class_has_child', "has-child ");
}
$_smarty_tpl->_assignInScope('class_position', '');
if (!empty($_smarty_tpl->tpl_vars['menu']->value['view_item']) && $_smarty_tpl->tpl_vars['menu']->value['view_item'] == 'sub_dropdown') {
$_smarty_tpl->_assignInScope('class_position', "position-relative ");
}
$_smarty_tpl->_assignInScope('class_item', '');
if (!empty($_smarty_tpl->tpl_vars['menu']->value['class_item'])) {
$_smarty_tpl->_assignInScope('class_item', $_smarty_tpl->tpl_vars['menu']->value['class_item']);
}
if (!empty($_smarty_tpl->tpl_vars['menu']->value['name'])) {
$_smarty_tpl->_assignInScope('image_source', '');
if (!empty($_smarty_tpl->tpl_vars['menu']->value['image']) && !empty($_smarty_tpl->tpl_vars['menu']->value['image_source'])) {
$_smarty_tpl->_assignInScope('image_source', $_smarty_tpl->tpl_vars['menu']->value['image_source']);
}
$_smarty_tpl->_assignInScope('image_url', '');
if (!empty($_smarty_tpl->tpl_vars['menu']->value['image']) && $_smarty_tpl->tpl_vars['image_source']->value == 'cdn') {
ob_start();
echo CDN_URL;
$_prefixVariable47=ob_get_clean();
$_smarty_tpl->_assignInScope('image_url', $_prefixVariable47.((string)$_smarty_tpl->tpl_vars['menu']->value['image']));
}
if (!empty($_smarty_tpl->tpl_vars['menu']->value['image']) && $_smarty_tpl->tpl_vars['image_source']->value == 'template') {
$_smarty_tpl->_assignInScope('image_url', ((string)$_smarty_tpl->tpl_vars['menu']->value['image']));
}?><li class="<?php echo $_smarty_tpl->tpl_vars['class_position']->value;
echo $_smarty_tpl->tpl_vars['class_has_child']->value;
echo $_smarty_tpl->tpl_vars['class_item']->value;?>
"><?php if (!empty($_smarty_tpl->tpl_vars['menu']->value['image'])) {?><img src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>
" class="marker-image" /><?php }?><a href="<?php if (!empty($_smarty_tpl->tpl_vars['menu']->value['url'])) {
echo $_smarty_tpl->tpl_vars['this']->value->Utilities->checkInternalUrl($_smarty_tpl->tpl_vars['menu']->value['url']);
} else { ?>/<?php }?>"<?php if (!empty($_smarty_tpl->tpl_vars['menu']->value['blank_link'])) {?>target="_blank"<?php }?>><?php echo smarty_modifier_truncate(htmlspecialchars((string)$_smarty_tpl->tpl_vars['menu']->value['name'], ENT_QUOTES, 'UTF-8', true),60," ...");?>
<span class="fa-light fa-chevron-down"></span></a><?php if (empty($_smarty_tpl->tpl_vars['menu']->value['data_sub_menu']) && !empty($_smarty_tpl->tpl_vars['menu']->value['data_extend_sub_menu'])) {
$_tmp_array = isset($_smarty_tpl->tpl_vars['menu']) ? $_smarty_tpl->tpl_vars['menu']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array['data_sub_menu'] = $_smarty_tpl->tpl_vars['menu']->value['data_extend_sub_menu'];
$_smarty_tpl->_assignInScope('menu', $_tmp_array);
}
if (!empty($_smarty_tpl->tpl_vars['menu']->value['data_sub_menu'])) {
$_smarty_tpl->_assignInScope('parent_menu_code', $_smarty_tpl->tpl_vars['this']->value->Utilities->randomCode());
$_smarty_tpl->_assignInScope('data_child', $_smarty_tpl->tpl_vars['menu']->value['data_sub_menu']);
if ($_smarty_tpl->tpl_vars['menu']->value['type_sub_menu'] == 'custom') {
$_smarty_tpl->_assignInScope('data_child', $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('data_sub_menu',$_smarty_tpl->tpl_vars['menu']->value['data_sub_menu']));
}?><span class="grower" nh-toggle="<?php echo $_smarty_tpl->tpl_vars['parent_menu_code']->value;?>
"></span><?php echo $_smarty_tpl->tpl_vars['this']->value->element("../block/".((string)$_smarty_tpl->tpl_vars['block_type']->value)."/".((string)$_smarty_tpl->tpl_vars['menu']->value['view_item']),array('data_sub_menu'=>$_smarty_tpl->tpl_vars['data_child']->value,'parent_menu_code'=>$_smarty_tpl->tpl_vars['parent_menu_code']->value));
}?></li><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul><?php }?></nav></div><?php }
}
