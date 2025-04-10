<?php
/* Smarty version 4.5.5, created on 2025-04-10 22:03:44
  from 'C:\var5\ximang.local\core\plugins\Admin\templates\Dashboard\customer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7ddd0c08a46_98750668',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f11d8391ece825f21d6c85e31198950b49217ced' => 
    array (
      0 => 'C:\\var5\\ximang.local\\core\\plugins\\Admin\\templates\\Dashboard\\customer.tpl',
      1 => 1724335132,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7ddd0c08a46_98750668 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\var5\\ximang.local\\core\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<div class="kt-portlet__body kt-portlet__body--fit">
    <div class="kt-widget17">
        <div class="kt-widget17__stats m-0 w-100 text-center">
            <div class="kt-widget17__items">
                <div class="kt-widget17__item cursor-default p-0">
                    <div class="kt-portlet__head kt-portlet__space-x">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                <?php echo __d('admin','khach_hang');?>

                            </h3>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <div class="kt-widget12">
                            <div class="kt-widget12__content">
                                <div class="kt-widget12__item mb-0">
                                    <div class="kt-widget12__info">
                                        <span class="kt-widget12__desc">
                                            <?php echo __d('admin','tong_khach_hang');?>

                                        </span>
                                        <span class="kt-widget12__value d-inline-block">
                                            <?php if (!empty($_smarty_tpl->tpl_vars['number_customer']->value)) {?>
                                                <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['number_customer']->value,0,".",",");?>

                                            <?php } else { ?>
                                                0
                                            <?php }?>
                                            <?php echo __d('admin','khach_hang');?>

                                        </span>
                                    </div>

                                    <div class="kt-widget12__info">
                                        <span class="kt-widget12__desc">
                                            <?php echo __d('admin','tong_binh_luan');?>

                                        </span>
                                        <span class="kt-widget12__value d-inline-block">
                                            <?php if (!empty($_smarty_tpl->tpl_vars['number_comment']->value)) {?>
                                                <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['number_comment']->value,0,".",",");?>

                                            <?php } else { ?>
                                                0
                                            <?php }?>
                                            <?php echo __d('admin','binh_luan');?>

                                        </span>
                                    </div>

                                    <div class="kt-widget12__info">
                                        <span class="kt-widget12__desc">
                                            <?php echo __d('admin','tong_danh_gia');?>

                                        </span>
                                        <span class="kt-widget12__value d-inline-block">
                                            <?php if (!empty($_smarty_tpl->tpl_vars['number_rating']->value)) {?>
                                                <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['number_rating']->value,0,".",",");?>

                                            <?php } else { ?>
                                                0
                                            <?php }?>
                                            <?php echo __d('admin','danh_gia');?>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="kt-widget17__items">
                <div class="kt-widget17__item cursor-default box-shadow-0 p-0">
                    <div class="kt-portlet__head kt-portlet__space-x">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                <?php echo __d('admin','thong_ke_khach_hang');?>

                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-widget20 kt-widget14 pt-0">
                            
                            <div class="kt-widget14__chart" style="height:120px;">
                                <canvas id="chart-customer"></canvas>
                                
                                <input id="data-chart-customer" type="hidden" value="<?php if (!empty($_smarty_tpl->tpl_vars['chart_data']->value)) {
echo htmlentities(json_encode($_smarty_tpl->tpl_vars['chart_data']->value));
}?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}
