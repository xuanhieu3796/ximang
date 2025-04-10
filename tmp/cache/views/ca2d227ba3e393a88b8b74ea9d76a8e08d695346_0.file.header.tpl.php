<?php
/* Smarty version 4.5.5, created on 2025-04-10 22:03:37
  from 'C:\var5\ximang.local\core\plugins\Admin\templates\element\layout\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7ddc957e2e5_98678677',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca2d227ba3e393a88b8b74ea9d76a8e08d695346' => 
    array (
      0 => 'C:\\var5\\ximang.local\\core\\plugins\\Admin\\templates\\element\\layout\\header.tpl',
      1 => 1687961042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7ddc957e2e5_98678677 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
	<!-- 
		Uncomment this to display the close button of the panel
		<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
	-->
	<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
		<div class="kt-header-logo">
			<a href="<?php echo ADMIN_PATH;?>
">
				<img alt="Web4s" src="<?php echo ADMIN_PATH;?>
/assets/media/logos/logo4s-02.svg" style="width:100px;" />
			</a>
			<i class="fs-11 text-muted pt-5 pl-5">
				Version <?php echo ADMIN_VERSION_UPDATE;?>

			</i>
		</div>

		<?php echo $_smarty_tpl->tpl_vars['this']->value->element('layout/header_menu');?>

	</div>

	<?php echo $_smarty_tpl->tpl_vars['this']->value->element('layout/header_topbar');?>

</div><?php }
}
