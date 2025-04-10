<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:09
  from 'C:\var5\ximang.local\templates\thoitrang05\element\layout\row.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc453b6632_17675934',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '52ec32a04b21f0e7a532a41eed92471bb03decfd' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\element\\layout\\row.tpl',
      1 => 1670467152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc453b6632_17675934 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('row_config', array());
if (!empty($_smarty_tpl->tpl_vars['row']->value['config'])) {
$_smarty_tpl->_assignInScope('row_config', $_smarty_tpl->tpl_vars['row']->value['config']);
}?><div <?php if (!empty($_smarty_tpl->tpl_vars['row_config']->value['id_row'])) {?>id="<?php echo $_smarty_tpl->tpl_vars['row_config']->value['id_row'];?>
"<?php }?> nh-row="<?php if (!empty($_smarty_tpl->tpl_vars['row']->value['code'])) {
echo $_smarty_tpl->tpl_vars['row']->value['code'];
}?>" class="<?php if (!empty($_smarty_tpl->tpl_vars['row_config']->value['style_class'])) {
echo $_smarty_tpl->tpl_vars['row_config']->value['style_class'];
}?>"><?php if (empty($_smarty_tpl->tpl_vars['row_config']->value['full_screen'])) {?><div class="container"><?php }?><div class="row <?php if (!empty($_smarty_tpl->tpl_vars['row_config']->value['full_screen'])) {?>no-gutters<?php }?>"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['row']->value['columns'], 'column');
$_smarty_tpl->tpl_vars['column']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->do_else = false;
ob_start();
if (!empty($_smarty_tpl->tpl_vars['column']->value['column_value'])) {
echo (string)$_smarty_tpl->tpl_vars['column']->value['column_value'];
}
$_prefixVariable32=ob_get_clean();
$_smarty_tpl->_assignInScope('column_value', $_prefixVariable32);?><div class="<?php ob_start();
echo DEVICE;
$_prefixVariable33 = ob_get_clean();
if (empty($_prefixVariable33)) {?>col-md-<?php echo $_smarty_tpl->tpl_vars['column_value']->value;?>
 col-12<?php } else { ?>col-<?php echo $_smarty_tpl->tpl_vars['column_value']->value;
}?>"><?php if (!empty($_smarty_tpl->tpl_vars['column']->value['blocks'])) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['column']->value['blocks'], 'block_code');
$_smarty_tpl->tpl_vars['block_code']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['block_code']->value) {
$_smarty_tpl->tpl_vars['block_code']->do_else = false;
$_smarty_tpl->_assignInScope('block_info', array());
if (!empty($_smarty_tpl->tpl_vars['blocks']->value[$_smarty_tpl->tpl_vars['block_code']->value])) {
$_smarty_tpl->_assignInScope('block_info', $_smarty_tpl->tpl_vars['blocks']->value[$_smarty_tpl->tpl_vars['block_code']->value]);
}
$_smarty_tpl->_assignInScope('block_config', array());
if (!empty($_smarty_tpl->tpl_vars['block_info']->value['config'])) {
$_smarty_tpl->_assignInScope('block_config', $_smarty_tpl->tpl_vars['block_info']->value['config']);
}
$_smarty_tpl->_assignInScope('block_cache_options', array());
if (!empty($_smarty_tpl->tpl_vars['block_config']->value['cache'])) {
ob_start();
echo BLOCK;
$_prefixVariable34 = ob_get_clean();
$_smarty_tpl->_assignInScope('block_cache_options', $_smarty_tpl->tpl_vars['this']->value->Setting->getConfigCacheView($_smarty_tpl->tpl_vars['block_code']->value,$_prefixVariable34,$_smarty_tpl->tpl_vars['block_info']->value));
}
echo $_smarty_tpl->tpl_vars['this']->value->element('layout/block',array('block_info'=>$_smarty_tpl->tpl_vars['block_info']->value,'block_config'=>$_smarty_tpl->tpl_vars['block_config']->value,'block_code'=>$_smarty_tpl->tpl_vars['block_code']->value),$_smarty_tpl->tpl_vars['block_cache_options']->value);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div><?php if (empty($_smarty_tpl->tpl_vars['row_config']->value['full_screen'])) {?></div><?php }?></div><?php }
}
