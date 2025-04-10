<?php
/* Smarty version 4.5.5, created on 2025-04-10 22:03:41
  from 'C:\var5\ximang.local\core\plugins\Admin\templates\Dashboard\website_expiry.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7ddcdc71cd1_97954064',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba60726c9d931cb1809d4ee3b31379e727b37d79' => 
    array (
      0 => 'C:\\var5\\ximang.local\\core\\plugins\\Admin\\templates\\Dashboard\\website_expiry.tpl',
      1 => 1687961042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7ddcdc71cd1_97954064 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="kt-portlet__head">
    <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">
            <?php echo __d('admin','han_su_dung');?>

        </h3>
    </div>
    <div class="kt-portlet__head-toolbar">
        <a href="#" class="btn btn-sm btn-label-danger btn-bold">
            <?php echo __d('admin','lien_he_gia_han');?>

        </a>
    </div>
</div>

<div class="kt-portlet__body">
    <div class="kt-widget5">
        <div class="kt-widget5__item mb-0 pb-0">
            <div class="kt-widget5__content">
                <div class="kt-widget5__pic">
                    <i class="flaticon-calendar-with-a-clock-time-tools" style="font-size: 3rem;"></i>
                </div>
                <div class="kt-widget5__section">
                    <span class="kt-widget5__title">
                        <?php echo __d('admin','thoi_gian_ket_thuc');?>

                    </span>
                    <p class="kt-widget5__desc">
                        <?php if (!empty($_smarty_tpl->tpl_vars['profile_info']->value['end_date'])) {?>
                            <?php echo $_smarty_tpl->tpl_vars['this']->value->Utilities->convertIntgerToDateString($_smarty_tpl->tpl_vars['profile_info']->value['end_date'],'d/m/Y');?>

                        <?php } else { ?>
                            <?php echo __d('admin','chua_xac_dinh');?>

                        <?php }?>
                    </p>
                </div>
            </div>
            <div class="kt-widget5__content">
                <div class="kt-widget5__stats pr-0">
                    <span class="kt-widget5__title">
                        <?php echo __d('admin','thoi_gian_con_lai');?>

                    </span>
                    <span class="kt-widget5__number kt-font-danger">
                        <?php if (!empty($_smarty_tpl->tpl_vars['duedate']->value)) {?>
                            <?php echo $_smarty_tpl->tpl_vars['duedate']->value;?>
 <?php echo __d('admin','ngay');?>

                        <?php } elseif ((isset($_smarty_tpl->tpl_vars['duedate']->value))) {?>
                            <?php echo __d('admin','trong_ngay_hom_nay');?>

                        <?php } else { ?>
                            <?php echo __d('admin','het_han');?>

                        <?php }?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}
