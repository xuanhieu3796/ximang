<?php
/* Smarty version 4.5.5, created on 2025-04-10 22:03:42
  from 'C:\var5\ximang.local\core\plugins\Admin\templates\Dashboard\website_setting.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7ddce94f426_12519221',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2efc7796a53ef5aed572bd3ee95ad8b2b43cc98a' => 
    array (
      0 => 'C:\\var5\\ximang.local\\core\\plugins\\Admin\\templates\\Dashboard\\website_setting.tpl',
      1 => 1687961042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7ddce94f426_12519221 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="kt-portlet__head">
    <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">
            <?php echo __d('admin','thiet_lap_website');?>

        </h3>
    </div>
</div>

<div class="kt-form kt-form--label-right">
    <div class="kt-portlet__body">
        <div class="kt-widget12">
            <div class="kt-widget12__content">
                <div class="kt-widget12__item">
                    <div class="kt-widget12__info">
                        <span class="kt-widget12__desc">
                            <?php echo __d('admin','che_do');?>

                        </span>
                        <a href="<?php echo ADMIN_PATH;?>
/setting/change-mode" class="kt-widget12__value d-inline-block">
                            <?php if (!empty($_smarty_tpl->tpl_vars['website_mode']->value) && $_smarty_tpl->tpl_vars['website_mode']->value == DEVELOP) {?>
                                <?php echo __d('admin','phat_trien');?>
 
                            <?php }?>

                            <?php if (!empty($_smarty_tpl->tpl_vars['website_mode']->value) && $_smarty_tpl->tpl_vars['website_mode']->value == LIVE) {?>
                                <?php echo __d('admin','thuc_te');?>
 
                            <?php }?>
                        </a>
                    </div>
                    <div class="kt-widget12__info">
                        <span class="kt-widget12__desc">
                            <?php echo __d('admin','duong_dan_cdn');?>

                        </span>
                        <div class="kt-widget12__value d-inline-block">
                            <?php if (!empty($_smarty_tpl->tpl_vars['profile_info']->value['cdn_url'])) {?>
                                <?php echo $_smarty_tpl->tpl_vars['profile_info']->value['cdn_url'];?>

                            <?php } else { ?>
                                <?php echo __d('admin','chua_xac_dinh');?>
 
                            <?php }?>
                        </div>
                    </div>
                </div>

                <div class="kt-widget12__item">
                    <div class="kt-widget12__info">
                        <span class="kt-widget12__desc">
                            <?php echo __d('admin','giao_dien_duoc_chon');?>

                        </span>

                        <a href="<?php echo ADMIN_PATH;?>
/template/list" class="kt-widget12__value d-inline-block">
                            <?php echo CODE_TEMPLATE;?>

                        </a>
                    </div>
                </div>

                <div class="kt-widget12__item">
                    <div class="kt-widget12__info">
                        <span class="kt-widget12__desc">
                            <?php echo __d('admin','ngon_ngu');?>

                        </span>

                        <span class="kt-widget12__value d-inline-block">
                            <?php if (!empty($_smarty_tpl->tpl_vars['languages']->value)) {?>
                                <span class="form-control-plaintext kt-font-bolder">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language', false, 'lang');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?>
                                        <img width="17px" class="img-fluid mr-10" src="/admin/assets/media/flags/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
.svg" title="<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
">
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </span>
                            <?php }?>
                        </span>
                    </div>
                </div>

                <div class="kt-widget12__item">
                    <div class="kt-widget12__info">
                        <span class="kt-widget12__desc">
                            <?php echo __d('admin','cau_hinh_email');?>

                        </span>

                        <a href="<?php echo ADMIN_PATH;?>
/setting/email" class="kt-widget12__value d-inline-block">
                            <span class="form-control-plaintext">
                                <?php if (!empty($_smarty_tpl->tpl_vars['email_setting']->value['email']) && !empty($_smarty_tpl->tpl_vars['email_setting']->value['application_password'])) {?>
                                    <span class="kt-badge kt-badge--inline kt-badge--success kt-badge--bold">
                                        <?php echo __d('admin','da_thiet_lap');?>

                                    </span>
                                <?php } else { ?>
                                    <span class="kt-badge kt-badge--inline kt-badge--danger kt-badge--bold">
                                        <?php echo __d('admin','chua_duoc_thiet_lap');?>

                                    </span>
                                <?php }?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}
