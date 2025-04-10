<?php
/* Smarty version 4.5.5, created on 2025-04-10 22:03:37
  from 'C:\var5\ximang.local\core\plugins\Admin\templates\Dashboard\dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7ddc91c9445_27343156',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04e61fb24c32c3eb8ff8ab21bd078c83bff8e833' => 
    array (
      0 => 'C:\\var5\\ximang.local\\core\\plugins\\Admin\\templates\\Dashboard\\dashboard.tpl',
      1 => 1724335132,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7ddc91c9445_27343156 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <?php echo __d('admin','tong_quan');?>

            </h3>
        </div>
    </div>
</div>

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid entire-dashboard">
    <div class="row">

        <?php ob_start();
echo PRODUCT;
$_prefixVariable1 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['addons']->value[$_prefixVariable1])) {?>
            <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
                <div id="wrap-order-statistics" class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid"></div>
            </div>
                    <?php }?>

        <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
            <div id="wrap-counter-statistics" class="kt-portlet kt-portlet--height-fluid"></div>
        </div>
                
        <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
            <div id="wrap-comment-rate" class="kt-portlet kt-portlet--height-fluid"></div>
        </div> 
        <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
            <div id="wrap-contact" class="kt-portlet kt-portlet--height-fluid"></div>
        </div> 

        <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
            <div id="wrap-customer" class="kt-portlet kt-portlet--height-fluid"></div>
        </div>
        
        <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
            <div id="wrap-article-statistics" class="kt-portlet kt-portlet--height-fluid"></div>
        </div>
        <?php ob_start();
echo PRODUCT;
$_prefixVariable2 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['addons']->value[$_prefixVariable2])) {?>
            <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
                <div id="wrap-product-statistics" class="kt-portlet kt-portlet--height-fluid"></div>
            </div>
        <?php }?>  

        <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
            <div id="wrap-website-info" class="kt-portlet kt-portlet--height-fluid"></div>
        </div>    

        <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
            <div id="wrap-website-setting" class="kt-portlet kt-portlet--height-fluid"></div>
        </div>

        <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
            <div id="wrap-website-seo" class="kt-portlet kt-portlet--height-fluid"></div>
        </div>

        <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="kt-widget17">
                        <div class="kt-widget17__stats m-0 w-100 text-center">
                            <div class="kt-widget17__items">
                                <div id="wrap-website-expiry" class="kt-widget17__item cursor-default p-0"></div>
                            </div>
                            <div class="kt-widget17__items">
                                <div id="wrap-website-duration" class="kt-widget17__item cursor-default p-0"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div><?php }
}
