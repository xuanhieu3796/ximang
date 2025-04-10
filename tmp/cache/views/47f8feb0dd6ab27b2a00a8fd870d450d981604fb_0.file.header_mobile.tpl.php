<?php
/* Smarty version 4.5.5, created on 2025-04-10 22:03:37
  from 'C:\var5\ximang.local\core\plugins\Admin\templates\element\layout\header_mobile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7ddc951d0e8_77691626',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '47f8feb0dd6ab27b2a00a8fd870d450d981604fb' => 
    array (
      0 => 'C:\\var5\\ximang.local\\core\\plugins\\Admin\\templates\\element\\layout\\header_mobile.tpl',
      1 => 1687961042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7ddc951d0e8_77691626 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
	<div class="kt-header-mobile__logo">
		<a href="/">
			<img alt="Web4s" src="<?php echo ADMIN_PATH;?>
/assets/media/logos/logo4s-02.svg" style="width:100px;" />
		</a>
		<i class="fs-11 text-muted pt-5 pl-5">
			Version <?php echo ADMIN_VERSION_UPDATE;?>

		</i>
	</div>
	<div class="kt-header-mobile__toolbar">
		<button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
		<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler">
			<i class="flaticon-more"></i>
		</button>
	</div>
</div><?php }
}
