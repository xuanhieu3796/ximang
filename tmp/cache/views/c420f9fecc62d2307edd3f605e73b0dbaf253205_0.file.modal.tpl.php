<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:10
  from 'C:\var5\ximang.local\templates\thoitrang05\element\layout\modal.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc4681c1f2_84961285',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c420f9fecc62d2307edd3f605e73b0dbaf253205' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\element\\layout\\modal.tpl',
      1 => 1670467152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc4681c1f2_84961285 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('plugins', $_smarty_tpl->tpl_vars['this']->value->Setting->getListPlugins());?>

<?php echo $_smarty_tpl->tpl_vars['this']->value->element('../Member/login_modal');?>

<?php echo $_smarty_tpl->tpl_vars['this']->value->element('../block/comment/info_modal');?>

<?php echo $_smarty_tpl->tpl_vars['this']->value->element('toasts');?>


<?php if (!empty($_smarty_tpl->tpl_vars['plugins']->value['product'])) {?>
	<?php echo $_smarty_tpl->tpl_vars['this']->value->element('../Product/quick_view_modal');?>

	<?php echo $_smarty_tpl->tpl_vars['this']->value->element('../Product/compare_modal');?>

	<?php echo $_smarty_tpl->tpl_vars['this']->value->element('../Cart/sidebar_cart');?>

<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['plugins']->value['notification'])) {?>
	<?php echo $_smarty_tpl->tpl_vars['this']->value->element('../Notification/sidebar');?>

<?php }
}
}
