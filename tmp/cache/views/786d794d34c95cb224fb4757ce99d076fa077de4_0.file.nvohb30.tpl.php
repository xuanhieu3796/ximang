<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:09
  from 'C:\var5\ximang.local\templates\thoitrang05\block\html\nvohb30.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc456a3be2_45033788',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '786d794d34c95cb224fb4757ce99d076fa077de4' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\block\\html\\nvohb30.tpl',
      1 => 1742914289,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc456a3be2_45033788 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo LANGUAGE;
$_prefixVariable42 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable42]['tieu_de'])) {?><div class="box-title d-flex justify-content-center align-items-center"><span class="icon mr-3 d-inline-block"><svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 13.75C10 14.72 10.75 15.5 11.67 15.5H13.55C14.35 15.5 15 14.82 15 13.97C15 13.06 14.6 12.73 14.01 12.52L11 11.47C10.41 11.26 10.01 10.94 10.01 10.02C10.01 9.18 10.66 8.49001 11.46 8.49001H13.34C14.26 8.49001 15.01 9.27001 15.01 10.24" stroke="#435F55" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.5 7.5V16.5" stroke="#435F55" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M22.5 12C22.5 17.52 18.02 22 12.5 22C6.98 22 2.5 17.52 2.5 12C2.5 6.48 6.98 2 12.5 2" stroke="#435F55" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M22.5 6V2H18.5" stroke="#435F55" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M17.5 7L22.5 2" stroke="#435F55" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span><span class="name mr-2 d-inline-block"><?php echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('tieu_de',$_smarty_tpl->tpl_vars['data_extend']->value);?>
</span><?php ob_start();
echo LANGUAGE;
$_prefixVariable43 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable43]['count'])) {?><span class="count font-weight-bold"><?php echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('count',$_smarty_tpl->tpl_vars['data_extend']->value);?>
</span><?php }?></div><?php }
}
}
