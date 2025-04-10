<?php
/* Smarty version 4.5.5, created on 2025-04-10 22:03:24
  from 'C:\var5\ximang.local\core\plugins\Admin\templates\layout\account.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7ddbc6fb775_73331637',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2fbce6bcfe7caca2c6633977db263a53ec37d734' => 
    array (
      0 => 'C:\\var5\\ximang.local\\core\\plugins\\Admin\\templates\\layout\\account.tpl',
      1 => 1718533418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7ddbc6fb775_73331637 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
	<head>
		<base href="">
		<meta charset="utf-8" />
		<title>Web4s | <?php echo __d('admin','tai_khoan');?>
</title>

		<meta name="description" content="<?php echo __d('admin','dang_nhap');?>
">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="shortcut icon" href="<?php echo ADMIN_PATH;?>
/favicon.ico" />

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

		<link href="<?php echo ADMIN_PATH;?>
/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo ADMIN_PATH;?>
/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo ADMIN_PATH;?>
/assets/css/pages/login/login-4.css?v=<?php echo ADMIN_VERSION_UPDATE;?>
" rel="stylesheet" type="text/css" />
		<link href="<?php echo ADMIN_PATH;?>
/assets/css/login.css?v=<?php echo ADMIN_VERSION_UPDATE;?>
" rel="stylesheet" type="text/css" />
		
	</head>
	
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login" wrap-account>
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-color: #1b1b28;">
					<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
						<div class="kt-login__container">
							<div class="kt-login__logo" style="margin-bottom: 30px;">
								<img alt="Web4s" src="<?php echo ADMIN_PATH;?>
/assets/media/logos/logo4s-01.svg" style="width: 250px;">
							</div>
							
							<?php echo $_smarty_tpl->tpl_vars['this']->value->fetch('content');?>

						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="message-login-modal" class="modal fade" role="dialog" aria-hidden="true">
		    <div class="modal-dialog modal-lg" role="document">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title">
		                    <?php echo __d('admin','thong_bao');?>

		                </h5>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                </button>
		            </div>
		            <div class="modal-body">
		                <div class="form-group" message-errors="true" style="font-size: 16px;">
                            
                        </div>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
		                    <?php echo __d('admin','dong');?>

		                </button>
		            </div>
		        </div>
		    </div>
		</div>

		<?php echo '<script'; ?>
 type="text/javascript">
			var adminPath = "<?php echo ADMIN_PATH;?>
";
			var csrfToken = "<?php echo $_smarty_tpl->tpl_vars['this']->value->getRequest()->getAttribute('csrfToken');?>
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
/assets/js/main.js?v=<?php echo ADMIN_VERSION_UPDATE;?>
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
 src="<?php echo $_smarty_tpl->tpl_vars['js_file']->value;?>
" type="text/javascript"><?php echo '</script'; ?>
>
	        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	    <?php }?>
	
	</body>

</html><?php }
}
