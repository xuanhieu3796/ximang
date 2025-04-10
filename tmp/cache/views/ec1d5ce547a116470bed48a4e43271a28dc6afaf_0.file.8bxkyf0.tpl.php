<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:09
  from 'C:\var5\ximang.local\templates\thoitrang05\block\html\8bxkyf0.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc45ac2c98_54137050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec1d5ce547a116470bed48a4e43271a28dc6afaf' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\block\\html\\8bxkyf0.tpl',
      1 => 1742914289,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc45ac2c98_54137050 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('form_url', $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('duong_dan_tim_kiem',$_smarty_tpl->tpl_vars['data_extend']->value));?><div class="box-search"><form class="position-relative" action="<?php echo $_smarty_tpl->tpl_vars['form_url']->value;?>
" method="get" autocomplete="off"><div class="input-group"><input nh-auto-suggest="<?php echo PRODUCT;?>
" name="keyword" placeholder="<?php ob_start();
echo LANGUAGE;
$_prefixVariable48 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable48]['tu_khoa'])) {
echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('tu_khoa',$_smarty_tpl->tpl_vars['data_extend']->value);
}?>" type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['this']->value->Utilities->getParamsByKey('keyword');?>
"><div class="input-group-append "><button nh-btn-submit class="btn btn-submit pl-0" type="submit"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z" stroke="#26C48C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M22 22L20 20" stroke="#26C48C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></button></div></div></form></div><?php }
}
