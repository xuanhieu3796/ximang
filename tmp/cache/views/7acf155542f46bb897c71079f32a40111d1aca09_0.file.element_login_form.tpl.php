<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:10
  from 'C:\var5\ximang.local\templates\thoitrang05\Member\element_login_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc469944a9_08572719',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7acf155542f46bb897c71079f32a40111d1aca09' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\Member\\element_login_form.tpl',
      1 => 1670467152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc469944a9_08572719 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('url_login', '/member/ajax-login');?>

<div class="modal-title h2 text-uppercase text-center font-weight-bold pt-5">
    <?php echo __d('template','dang_nhap');?>

</div>
<form nh-form="member-login" action="/member/ajax-login" method="post" autocomplete="off">
    <div class="p-5">
        <div class="row mx-n2">
            <div class="col-md-6 col-12 px-2">
                <span nh-btn-login-social="google" nh-oauthserver="https://accounts.google.com/o/oauth2/v2/auth" class="btn btn-submit d-flex align-items-center justify-content-center text-center mb-3 rounded">
                    <i class="fa-2x fa-brands fa-google mr-3"></i>
                    <?php echo __d('template','dang_nhap_google');?>

                </span>
            </div>
            <div class="col-md-6 col-12 px-2">
                <span nh-btn-login-social="facebook" nh-oauthserver="https://www.facebook.com/v14.0/dialog/oauth" class="btn btn-submit d-flex align-items-center justify-content-center text-center mb-3 rounded">
                    <i class="fa-2x fa-brands fa-facebook mr-3"></i>
                    <?php echo __d('template','dang_nhap_facebook');?>

                </span>
            </div>
        </div>
        <div class="text-line-through mb-3">
           <span><?php echo __d('template','hoac_tai_khoan');?>
</span>
        </div>

        <div class="form-group mb-4">
            <input name="username" id="username" type="text" class="form-control required" placeholder="<?php echo __d('template','tai_khoan');?>
">
        </div>

        <div class="form-group mb-4">
            <input name="password" id="password" type="password" class="form-control required" placeholder="<?php echo __d('template','mat_khau');?>
">
        </div>
        <a class="mb-4 d-block text-dark" href="/member/forgot-password">
            <?php echo __d('template','quen_mat_khau');?>
 ?
        </a>
        <button nh-btn-action="submit" class="btn btn-submit w-100 mb-3">
            <?php echo __d('template','dang_nhap');?>

        </button>
        <input type="hidden" name="redirect" value="<?php if (!empty($_smarty_tpl->tpl_vars['redirect']->value)) {
echo $_smarty_tpl->tpl_vars['redirect']->value;
}?>">
        <a href="/member/register" class="d-block text-uppercase font-weight-bold color-highlight mt-3">
            <?php echo __d('template','dang_ky_ngay');?>

        </a>
    </div>
</form><?php }
}
