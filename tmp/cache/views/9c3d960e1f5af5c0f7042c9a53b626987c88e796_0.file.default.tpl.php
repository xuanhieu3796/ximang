<?php
/* Smarty version 4.5.5, created on 2025-04-10 22:03:37
  from 'C:\var5\ximang.local\core\plugins\Admin\templates\layout\default.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7ddc92a36f4_61373378',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c3d960e1f5af5c0f7042c9a53b626987c88e796' => 
    array (
      0 => 'C:\\var5\\ximang.local\\core\\plugins\\Admin\\templates\\layout\\default.tpl',
      1 => 1718533418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7ddc92a36f4_61373378 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
">
	<head>
		<base href="">
		<meta charset="utf-8" />
		<title>
			<?php if (!empty($_smarty_tpl->tpl_vars['title_for_layout']->value)) {?>
				<?php echo $_smarty_tpl->tpl_vars['title_for_layout']->value;?>

			<?php } else { ?>
				Control Panel
			<?php }?> 
			| Admin
		</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="<?php echo ADMIN_PATH;?>
/assets/plugins/global/plugins.bundle.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo ADMIN_PATH;?>
/assets/css/style.bundle.min.css" rel="stylesheet" type="text/css" />


		<link href="<?php echo ADMIN_PATH;?>
/assets/css/skins/header/base/dark.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo ADMIN_PATH;?>
/assets/css/skins/header/menu/dark.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo ADMIN_PATH;?>
/assets/css/skins/brand/dark.css" rel="stylesheet" type="text/css" />

		<?php if (!empty($_smarty_tpl->tpl_vars['css_page']->value)) {?>
	        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['css_page']->value, 'css_file');
$_smarty_tpl->tpl_vars['css_file']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['css_file']->value) {
$_smarty_tpl->tpl_vars['css_file']->do_else = false;
?>
	        	<link href="<?php echo ADMIN_PATH;
echo $_smarty_tpl->tpl_vars['css_file']->value;?>
" rel="stylesheet" type="text/css" />
	        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	    <?php }?>
		<link href="<?php echo ADMIN_PATH;?>
/assets/css/custom.css?v=<?php echo ADMIN_VERSION_UPDATE;?>
" rel="stylesheet" type="text/css" />

		<link rel="shortcut icon" href="<?php echo ADMIN_PATH;?>
/favicon.ico" />
	</head>
	
	<body path-menu="<?php if (!empty($_smarty_tpl->tpl_vars['path_menu']->value)) {
echo $_smarty_tpl->tpl_vars['path_menu']->value;
}?>" class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-page--loading">

		<?php echo $_smarty_tpl->tpl_vars['this']->value->element('layout/header_mobile');?>


		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
				<div id="kt_wrapper" class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper">

					<?php echo $_smarty_tpl->tpl_vars['this']->value->element('layout/header');?>


					<div id="kt_content" class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
						<div class="kt-container-layout kt-grid__item kt-grid__item--fluid kt-grid__item kt-grid__item--fluid <?php if (!empty($_smarty_tpl->tpl_vars['full_screen']->value)) {?>kt-container--fluid<?php }?>">
							<?php echo $_smarty_tpl->tpl_vars['this']->value->fetch('content');?>

						</div>
					</div>
				</div>
			</div>
		</div>

		<?php echo $_smarty_tpl->tpl_vars['this']->value->element('Admin.layout/notifications');?>


		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>
		

		<ul class="kt-sticky-toolbar">
			<li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--brand" data-toggle="kt-tooltip" title="" data-placement="left" data-original-title="<?php echo __d('admin','gui_yeu_cau');?>
">
				<a href="<?php echo ADMIN_PATH;?>
/feedback">
					<i class="flaticon2-telegram-logo"></i>
				</a>
			</li>
			<li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--danger" id="kt_sticky_toolbar_chat_toggler" data-toggle="kt-tooltip" title="" data-placement="left" data-original-title="<?php echo __d('admin','hotline_ho_tro');?>
: 1900 6680">
				<a href="tel:19006680">
					<i class="flaticon2-phone"></i>
				</a>
			</li>
		</ul>

		<?php echo '<script'; ?>
 type="text/javascript">
			var adminPath = '<?php echo ADMIN_PATH;?>
';	
			var cdnUrl = '<?php echo CDN_URL;?>
';
			var paginationLimitAdmin = '<?php echo PAGINATION_LIMIT_ADMIN;?>
';
			var templatePath = '<?php echo URL_TEMPLATE;?>
';
			var csrfToken = '<?php echo $_smarty_tpl->tpl_vars['this']->value->getRequest()->getAttribute('csrfToken');?>
';
			var accessKeyUpload = "<?php echo $_smarty_tpl->tpl_vars['access_key_upload']->value;?>
";
			var useMultipleLanguage = Boolean("<?php echo $_smarty_tpl->tpl_vars['use_multiple_language']->value;?>
");
			var listLanguage = JSON.parse('<?php echo json_encode($_smarty_tpl->tpl_vars['list_languages']->value);?>
');
			var languageAdmin = "<?php echo LANGUAGE_ADMIN;?>
";
		<?php echo '</script'; ?>
>
		
	
		<?php echo '<script'; ?>
 src="<?php echo ADMIN_PATH;?>
/assets/plugins/global/plugins.bundle.js" type="text/javascript"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo ADMIN_PATH;?>
/assets/plugins/global/scripts.bundle.js" type="text/javascript"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo ADMIN_PATH;?>
/assets/js/locales/<?php echo LANGUAGE_ADMIN;?>
.js?v=<?php echo ADMIN_VERSION_UPDATE;?>
" type="text/javascript"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo ADMIN_PATH;?>
/assets/js/constants.js?v=<?php echo ADMIN_VERSION_UPDATE;?>
" type="text/javascript"><?php echo '</script'; ?>
>		
		<?php echo '<script'; ?>
 src="<?php echo ADMIN_PATH;?>
/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.vi.min.js" type="text/javascript"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo ADMIN_PATH;?>
/assets/js/main.js?v=<?php echo ADMIN_VERSION_UPDATE;?>
" type="text/javascript"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo ADMIN_PATH;?>
/assets/js/nh_notification.js?v=<?php echo ADMIN_VERSION_UPDATE;?>
" type="text/javascript"><?php echo '</script'; ?>
>
		
		

		<?php if (!empty($_smarty_tpl->tpl_vars['js_page']->value)) {?>
	        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['js_page']->value, 'js_file');
$_smarty_tpl->tpl_vars['js_file']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['js_file']->value) {
$_smarty_tpl->tpl_vars['js_file']->do_else = false;
?>
	            <?php echo '<script'; ?>
 src="<?php echo ADMIN_PATH;
echo $_smarty_tpl->tpl_vars['js_file']->value;?>
?v=<?php echo ADMIN_VERSION_UPDATE;?>
" type="text/javascript"><?php echo '</script'; ?>
>
	        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	    <?php }?>

	</body>

</html><?php }
}
