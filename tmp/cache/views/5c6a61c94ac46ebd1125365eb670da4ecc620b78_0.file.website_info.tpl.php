<?php
/* Smarty version 4.5.5, created on 2025-04-10 22:03:41
  from 'C:\var5\ximang.local\core\plugins\Admin\templates\Dashboard\website_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7ddcd7ebe45_95924682',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c6a61c94ac46ebd1125365eb670da4ecc620b78' => 
    array (
      0 => 'C:\\var5\\ximang.local\\core\\plugins\\Admin\\templates\\Dashboard\\website_info.tpl',
      1 => 1687961042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7ddcd7ebe45_95924682 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="kt-portlet__head">
    <div class="kt-portlet__head-label">
        <a href="<?php echo ADMIN_PATH;?>
/setting/website-info" class="kt-portlet__head-title">
            <?php echo __d('admin','thong_tin_website');?>

        </a>
    </div>
</div>

<div class="kt-form kt-form--label-right">
    <div class="kt-portlet__body">
        <div class="form-group form-group-xs row">
            <label class="col-4 col-xl-3 col-form-label">
                <?php echo __d('admin','ten_website');?>
:
            </label>

            <div class="col-8 col-xl-9">
                <span class="form-control-plaintext kt-font-bolder">
                    <?php if (!empty($_smarty_tpl->tpl_vars['website_info']->value['website_name'])) {?>
                        <?php echo $_smarty_tpl->tpl_vars['website_info']->value['website_name'];?>

                    <?php }?>
                </span>
            </div>
        </div>

        <div class="form-group form-group-xs row">
            <label class="col-4 col-xl-3 col-form-label">
                <?php echo __d('admin','ten_cong_ty');?>
:
            </label>

            <div class="col-8 col-xl-9">
                <span class="form-control-plaintext kt-font-bolder">
                    <?php if (!empty($_smarty_tpl->tpl_vars['website_info']->value['company_name'])) {?>
                        <?php echo $_smarty_tpl->tpl_vars['website_info']->value['company_name'];?>

                    <?php }?>
                </span>
            </div>
        </div>

        <div class="form-group form-group-xs row">
            <label class="col-4 col-xl-3 col-form-label">
                <?php echo __d('admin','hotline');?>
:
            </label>
            <div class="col-8 col-xl-9">
                <span class="form-control-plaintext kt-font-bolder">
                    <?php if (!empty($_smarty_tpl->tpl_vars['website_info']->value['hotline'])) {?>
                        <?php echo $_smarty_tpl->tpl_vars['website_info']->value['hotline'];?>

                    <?php }?>
                </span>
            </div>
        </div>

        <div class="form-group form-group-xs row">
            <label class="col-4 col-xl-3 col-form-label">
                <?php echo __d('admin','so_dien_thoai');?>
:
            </label>

            <div class="col-8 col-xl-9">
                <span class="form-control-plaintext kt-font-bolder">
                    <?php if (!empty($_smarty_tpl->tpl_vars['website_info']->value['phone'])) {?>
                        <?php echo $_smarty_tpl->tpl_vars['website_info']->value['phone'];?>

                    <?php }?>
                </span>
            </div>
        </div>

        <div class="form-group form-group-xs row">
            <label class="col-4 col-xl-3 col-form-label">
                <?php echo __d('admin','email');?>
:
            </label>

            <div class="col-8 col-xl-9">
                <span class="form-control-plaintext kt-font-bolder">
                    <?php if (!empty($_smarty_tpl->tpl_vars['website_info']->value['email'])) {?>
                        <?php echo $_smarty_tpl->tpl_vars['website_info']->value['email'];?>

                    <?php }?>
                </span>
            </div>
        </div>

        <div class="form-group form-group-xs row">
            <label class="col-4 col-xl-3 col-form-label">
                <?php echo __d('admin','dia_chi');?>
:
            </label>

            <div class="col-8 col-xl-9">
                <span class="form-control-plaintext kt-font-bolder">
                    <?php if (!empty($_smarty_tpl->tpl_vars['website_info']->value['address'])) {?>
                        <?php echo $_smarty_tpl->tpl_vars['website_info']->value['address'];?>

                    <?php }?>
                </span>
            </div>
        </div>
    </div>
</div><?php }
}
