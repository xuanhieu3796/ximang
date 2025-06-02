<?php
/* Smarty version 4.5.5, created on 2025-06-01 09:25:07
  from 'C:\var5\ximang.local\templates\thoitrang05\block\html\e0zmqlh.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_683bba03bba871_91033407',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '276159175f8ac5e1036e8de1552acc8d3060c2e5' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\block\\html\\e0zmqlh.tpl',
      1 => 1748744707,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683bba03bba871_91033407 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="box-header-info box-header-mail"><a href="mailto:"><span class="icon"><svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M36.6667 17.5V25.8333C36.6667 31.6667 33.3334 34.1667 28.3334 34.1667H11.6667C6.66671 34.1667 3.33337 31.6667 3.33337 25.8333V14.1667C3.33337 8.33333 6.66671 5.83333 11.6667 5.83333H23.3334" stroke="#292D32" stroke-width="2.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M11.6666 15L16.8833 19.1667C18.6 20.5333 21.4166 20.5333 23.1333 19.1667L25.1 17.6" stroke="#292D32" stroke-width="2.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M32.5 13.3333C34.8012 13.3333 36.6667 11.4679 36.6667 9.16667C36.6667 6.86548 34.8012 5 32.5 5C30.1989 5 28.3334 6.86548 28.3334 9.16667C28.3334 11.4679 30.1989 13.3333 32.5 13.3333Z" stroke="#26C48C" stroke-width="2.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></span><span class="info"><?php ob_start();
echo LANGUAGE;
$_prefixVariable3 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable3]['tieu_de'])) {?><div class="name"><?php echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('tieu_de',$_smarty_tpl->tpl_vars['data_extend']->value);?>
</div><?php }
ob_start();
echo LANGUAGE;
$_prefixVariable4 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable4]['mo_ta'])) {?><div class="dsc"><?php echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('mo_ta',$_smarty_tpl->tpl_vars['data_extend']->value);?>
</div><?php }?></span></a></div><?php }
}
