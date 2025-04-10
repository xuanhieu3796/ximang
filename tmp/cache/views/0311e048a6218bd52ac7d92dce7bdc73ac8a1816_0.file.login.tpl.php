<?php
/* Smarty version 4.5.5, created on 2025-04-10 22:03:24
  from 'C:\var5\ximang.local\core\plugins\Admin\templates\User\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7ddbc58bd42_85984754',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0311e048a6218bd52ac7d92dce7bdc73ac8a1816' => 
    array (
      0 => 'C:\\var5\\ximang.local\\core\\plugins\\Admin\\templates\\User\\login.tpl',
      1 => 1718533418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7ddbc58bd42_85984754 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\var5\\ximang.local\\core\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div class="kt-login__signin">
	<div class="kt-login__head" style="margin: 0 0 20px 0;">
		<h3 class="kt-login__title">
			<?php echo __d('admin','dang_nhap_quan_tri');?>

		</h3>
	</div>

	<form id="form-login" class="kt-form" action="<?php echo ADMIN_PATH;?>
/ajax-login" method="post">
		<div class="input-group form-group">
			<input name="username" class="form-control" type="text" placeholder="<?php echo __d('admin','tai_khoan');?>
" autocomplete="off">
		</div>

		<div class="input-group form-group">
			<input name="password" class="form-control" type="password" placeholder="<?php echo __d('admin','mat_khau');?>
" >
		</div>									

		<div nh-show-error class="text-error"></div>

		<div class="row kt-login__extra d-flex justify-content-between">
			<label class="kt-checkbox kt-checkbox--tick kt-checkbox--success kt-font-bold">
				<input name="token" type="checkbox" value="<?php if (!empty($_smarty_tpl->tpl_vars['token']->value)) {
echo $_smarty_tpl->tpl_vars['token']->value;
}?>"> 
				I'm not a robot
				<span></span>
			</label>

			<a href="javascript://" show-form-forgot class="color-gray kt-font-bold">
				<?php echo __d('admin','quen_mat_khau');?>
?
			</a>
		</div>

		<input type="hidden" name="redirect" value="<?php if (!empty($_smarty_tpl->tpl_vars['redirect']->value)) {
echo $_smarty_tpl->tpl_vars['redirect']->value;
}?>">

		<div class="kt-login__actions" style="margin-top: 10px;">
			<span id="btn-login" class="btn btn-dark btn-pill kt-login__btn-primary">
				<?php echo __d('admin','dang_nhap');?>

			</span>
		</div>

		<div class="kt-login__account">
			<i class="text-muted" style="font-size: 12px;">
				© <?php echo smarty_modifier_date_format(time(),'%Y');?>
 Web4s. 
				Version <?php echo ADMIN_VERSION_UPDATE;?>

			</i>
		</div>
	</form>
</div>

<div class="kt-login__forgot">
	<div class="kt-login__head">
		<h3 class="kt-login__title">
			<?php echo __d('admin','quen_mat_khau');?>
 ?
		</h3>
		<div class="kt-login__desc">
			<?php echo __d('admin','nhap_email_de_lay_ma_xac_nhan_quen_mat_khau');?>

		</div>
	</div>
	<div class="kt-login__form">
		<form id="forgot-password" class="kt-form" action="<?php echo ADMIN_PATH;?>
/ajax-forgot-password" method="post">
			<div class="form-group">
				<input type="text" name="email" class="form-control" placeholder="Email" autocomplete="off">
			</div>
			<div class="kt-login__actions">
				<button id="btn-forgot-password" class="btn btn-dark btn-pill kt-login__btn-primary">
					<?php echo __d('admin','lay_ma');?>

				</button>
				<button id="btn-cancel" class="btn btn-secondary btn-pill kt-login__btn-secondary">
					<?php echo __d('admin','quay_lai');?>

				</button>
			</div>
		</form>
	</div>
</div><?php }
}
