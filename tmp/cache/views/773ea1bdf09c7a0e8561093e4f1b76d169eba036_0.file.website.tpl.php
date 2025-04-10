<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:10
  from 'C:\var5\ximang.local\templates\thoitrang05\element\schema\website.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc46c86866_05937015',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '773ea1bdf09c7a0e8561093e4f1b76d169eba036' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\element\\schema\\website.tpl',
      1 => 1670467152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc46c86866_05937015 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('url_website', $_smarty_tpl->tpl_vars['this']->value->Utilities->getUrlWebsite());
$_smarty_tpl->_assignInScope('path_search', 'tim-kiem');
if (LANGUAGE != 'vi') {?>
	<?php $_smarty_tpl->_assignInScope('path_search', 'search');
}?>

<?php ob_start();
echo '{query}';
$_prefixVariable87=ob_get_clean();
$_smarty_tpl->_assignInScope('schema_website', array('@context'=>'https://schema.org','@type'=>'WebSite','url'=>$_smarty_tpl->tpl_vars['url_website']->value,'potentialAction'=>array('@type'=>'SearchAction','target'=>((string)$_smarty_tpl->tpl_vars['url_website']->value)."/".((string)$_smarty_tpl->tpl_vars['path_search']->value)."?keyword=".$_prefixVariable87,'query-input'=>'required name=query')));?>

<?php echo '<script'; ?>
 type="application/ld+json">
    <?php echo json_encode($_smarty_tpl->tpl_vars['schema_website']->value);?>

<?php echo '</script'; ?>
><?php }
}
