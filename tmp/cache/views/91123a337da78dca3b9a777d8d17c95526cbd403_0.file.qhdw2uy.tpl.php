<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:09
  from 'C:\var5\ximang.local\templates\thoitrang05\block\html\qhdw2uy.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc457c18c8_82890979',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91123a337da78dca3b9a777d8d17c95526cbd403' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\block\\html\\qhdw2uy.tpl',
      1 => 1742914289,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc457c18c8_82890979 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('website_info', $_smarty_tpl->tpl_vars['this']->value->Setting->getWebsiteInfo());?><div class="logo-section"><a href="/"><?php ob_start();
echo CDN_URL;
$_prefixVariable46=ob_get_clean();
echo $_smarty_tpl->tpl_vars['this']->value->LazyLoad->renderImage(array('src'=>$_prefixVariable46.((string)$_smarty_tpl->tpl_vars['website_info']->value['company_logo']),'alt'=>$_smarty_tpl->tpl_vars['website_info']->value['website_name'],'class'=>'img-fluid','ignore'=>true));?>
</a></div><?php }
}
