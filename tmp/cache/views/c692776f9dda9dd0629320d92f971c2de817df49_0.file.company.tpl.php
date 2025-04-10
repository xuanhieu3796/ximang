<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:10
  from 'C:\var5\ximang.local\templates\thoitrang05\element\schema\company.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc46b75df5_23658691',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c692776f9dda9dd0629320d92f971c2de817df49' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\element\\schema\\company.tpl',
      1 => 1670467152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc46b75df5_23658691 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('url_website', $_smarty_tpl->tpl_vars['this']->value->Utilities->getUrlWebsite());
$_smarty_tpl->_assignInScope('website_info', $_smarty_tpl->tpl_vars['this']->value->Setting->getWebsiteInfo());?>

<?php $_smarty_tpl->_assignInScope('website_name', '');
$_smarty_tpl->_assignInScope('company_name', '');?>

<?php if (!empty($_smarty_tpl->tpl_vars['website_info']->value['website_name'])) {?>
	<?php $_smarty_tpl->_assignInScope('website_name', $_smarty_tpl->tpl_vars['website_info']->value['website_name']);
}?>

<?php if (!empty($_smarty_tpl->tpl_vars['website_info']->value['company_name'])) {?>
	<?php $_smarty_tpl->_assignInScope('company_name', $_smarty_tpl->tpl_vars['website_info']->value['company_name']);
}?>


<?php if (!empty($_smarty_tpl->tpl_vars['website_name']->value) || !empty($_smarty_tpl->tpl_vars['company_name']->value)) {?>
	<?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['website_name']->value)) {
echo (string)$_smarty_tpl->tpl_vars['website_name']->value;
} else {
echo (string)$_smarty_tpl->tpl_vars['company_name']->value;
}
$_prefixVariable85=ob_get_clean();
ob_start();
if (!empty($_smarty_tpl->tpl_vars['website_info']->value['company_logo'])) {
echo CDN_URL;
echo (string)$_smarty_tpl->tpl_vars['website_info']->value['company_logo'];
}
$_prefixVariable86=ob_get_clean();
$_smarty_tpl->_assignInScope('schema_company', array('@context'=>'https://schema.org','@type'=>'Organization','name'=>$_prefixVariable85,'legalName'=>$_smarty_tpl->tpl_vars['company_name']->value,'url'=>((string)$_smarty_tpl->tpl_vars['url_website']->value)."/",'logo'=>$_prefixVariable86));?>

	<?php echo '<script'; ?>
 type="application/ld+json">
		<?php echo json_encode($_smarty_tpl->tpl_vars['schema_company']->value);?>

	<?php echo '</script'; ?>
>
<?php }
}
}
