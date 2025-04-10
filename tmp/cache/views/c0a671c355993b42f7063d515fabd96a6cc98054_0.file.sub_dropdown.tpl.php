<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:09
  from 'C:\var5\ximang.local\templates\thoitrang05\block\menu\sub_dropdown.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc459abbe7_14196691',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0a671c355993b42f7063d515fabd96a6cc98054' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\block\\menu\\sub_dropdown.tpl',
      1 => 1670467152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc459abbe7_14196691 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\var5\\ximang.local\\core\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
<ul nh-toggle-element="<?php echo $_smarty_tpl->tpl_vars['parent_menu_code']->value;?>
" class="entry-menu dropdown"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_sub_menu']->value, 'sub_menu', false, 'k_0');
$_smarty_tpl->tpl_vars['sub_menu']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k_0']->value => $_smarty_tpl->tpl_vars['sub_menu']->value) {
$_smarty_tpl->tpl_vars['sub_menu']->do_else = false;
?><li class="<?php if (!empty($_smarty_tpl->tpl_vars['sub_menu']->value['children'])) {?>has-child<?php }?> "><a class="menu-link" href="<?php if (!empty($_smarty_tpl->tpl_vars['sub_menu']->value['url'])) {
echo $_smarty_tpl->tpl_vars['this']->value->Utilities->checkInternalUrl($_smarty_tpl->tpl_vars['sub_menu']->value['url']);
} else { ?>/<?php }?>"><?php echo smarty_modifier_truncate(htmlspecialchars((string)$_smarty_tpl->tpl_vars['sub_menu']->value['name'], ENT_QUOTES, 'UTF-8', true),60," ...");
if (!empty($_smarty_tpl->tpl_vars['sub_menu']->value['children'])) {?><span class="child-indicator fa-light fa-chevron-right"></span><?php }?></a><?php if (!empty($_smarty_tpl->tpl_vars['sub_menu']->value['children'])) {?><span class="grower" nh-toggle="<?php echo $_smarty_tpl->tpl_vars['parent_menu_code']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['k_0']->value;?>
"></span><ul nh-toggle-element="<?php echo $_smarty_tpl->tpl_vars['parent_menu_code']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['k_0']->value;?>
"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sub_menu']->value['children'], 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
echo $_smarty_tpl->tpl_vars['this']->value->element("../block/".((string)$_smarty_tpl->tpl_vars['block_type']->value)."/element_dropdown",array('sub_menu'=>$_smarty_tpl->tpl_vars['item']->value));
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul><?php }?></li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul><?php }
}
