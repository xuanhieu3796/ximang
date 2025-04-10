<?php
/* Smarty version 4.5.5, created on 2025-04-10 22:03:42
  from 'C:\var5\ximang.local\core\plugins\Admin\templates\Dashboard\website_duration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7ddce436d02_70254720',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a690f3543131b2ddbc87932096261adedccfc6c' => 
    array (
      0 => 'C:\\var5\\ximang.local\\core\\plugins\\Admin\\templates\\Dashboard\\website_duration.tpl',
      1 => 1687961042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7ddce436d02_70254720 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="kt-portlet__head">
    <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">
            <?php echo __d('admin','dung_luong');?>

        </h3>
    </div>

    <div class="kt-portlet__head-toolbar">
        <button type="button" class="btn btn-sm btn-label-danger btn-check-capacity btn-bol">
            <?php echo __d('admin','kiem_tra_dung_luong');?>

        </button>
    </div>
</div>
<div class="kt-portlet__body p-10">
    <?php if (!empty($_smarty_tpl->tpl_vars['capacity']->value)) {?>
        <div id="chart-website-space" style="height: 215px;"></div>
        <div class="text-center">
            <?php echo __d('admin','tong_dung_luong');?>
: <?php echo $_smarty_tpl->tpl_vars['capacity']->value;?>
 GB
        </div>
        <div class="text-center">
            <?php echo __d('admin','da_dung');?>
: <?php echo $_smarty_tpl->tpl_vars['used']->value;?>
 GB
        </div>

        <input id="data-chart-space" type="hidden" value="<?php if (!empty($_smarty_tpl->tpl_vars['data_chart']->value)) {
echo htmlentities(json_encode($_smarty_tpl->tpl_vars['data_chart']->value));
}?>">
    <?php } else { ?>
        <i class="text-center"><?php echo __d('admin','chua_xac_dinh');?>
</i>
    <?php }?>
</div><?php }
}
