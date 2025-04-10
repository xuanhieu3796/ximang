<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:09
  from 'C:\var5\ximang.local\templates\thoitrang05\element\layout\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc45319e30_77894365',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '23d4fe1604d47fd75ccbabcfca08a7ee929284f3' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\element\\layout\\page.tpl',
      1 => 1670467152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc45319e30_77894365 (Smarty_Internal_Template $_smarty_tpl) {
if (!empty($_smarty_tpl->tpl_vars['structure']->value)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['structure']->value, 'rows', false, 'type');
$_smarty_tpl->tpl_vars['rows']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['type']->value => $_smarty_tpl->tpl_vars['rows']->value) {
$_smarty_tpl->tpl_vars['rows']->do_else = false;
ob_start();
echo HEADER;
$_prefixVariable28 = ob_get_clean();
ob_start();
echo FOOTER;
$_prefixVariable29 = ob_get_clean();
if ($_smarty_tpl->tpl_vars['type']->value == $_prefixVariable28 || $_smarty_tpl->tpl_vars['type']->value == $_prefixVariable29) {?><<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
><?php }
if (!empty($_smarty_tpl->tpl_vars['rows']->value)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
if (!empty($_smarty_tpl->tpl_vars['row']->value['columns']) && !empty($_smarty_tpl->tpl_vars['row']->value['code'])) {
echo $_smarty_tpl->tpl_vars['this']->value->element('layout/row',array('row'=>$_smarty_tpl->tpl_vars['row']->value),array());
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
ob_start();
echo HEADER;
$_prefixVariable30 = ob_get_clean();
ob_start();
echo FOOTER;
$_prefixVariable31 = ob_get_clean();
if ($_smarty_tpl->tpl_vars['type']->value == $_prefixVariable30 || $_smarty_tpl->tpl_vars['type']->value == $_prefixVariable31) {?></<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
