<?php
/* Smarty version 4.5.5, created on 2025-04-10 22:03:42
  from 'C:\var5\ximang.local\core\plugins\Admin\templates\Dashboard\website_seo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7ddcedd9923_76134917',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ecb248c97a9649d9533589f4b6f6a636e7462dae' => 
    array (
      0 => 'C:\\var5\\ximang.local\\core\\plugins\\Admin\\templates\\Dashboard\\website_seo.tpl',
      1 => 1721310832,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7ddcedd9923_76134917 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="kt-portlet__head">
    <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">
            <?php echo __d('admin','thiet_lap_seo');?>

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
                            <?php echo __d('admin','phan_nhom_sitemap');?>

                        </span>

                        <a href="<?php echo ADMIN_PATH;?>
/site-map-config" class="kt-widget12__value d-inline-block">
                            <span class="form-control-plaintext kt-font-bolder">
                                <?php if (!empty($_smarty_tpl->tpl_vars['sitemap']->value['combine_sitemap'])) {?>
                                    <?php echo __d('admin','co_phan_nhom');?>

                                <?php }?>
                                <?php if (empty($_smarty_tpl->tpl_vars['sitemap']->value['combine_sitemap'])) {?>
                                    <?php echo __d('admin','khong_phan_nhom');?>

                                <?php }?>
                            </span>
                        </a>
                    </div>
                    <div class="kt-widget12__info">
                        <span class="kt-widget12__desc">
                            <?php echo __d('admin','chia_sitemap_theo_nam');?>

                        </span>

                        <a href="<?php echo ADMIN_PATH;?>
/site-map-config" class="kt-widget12__value d-inline-block">
                            <span class="form-control-plaintext kt-font-bolder">
                                <?php if (!empty($_smarty_tpl->tpl_vars['sitemap']->value['split_by_year'])) {?>
                                    <?php echo __d('admin','co_chia');?>

                                <?php }?>
                                <?php if (empty($_smarty_tpl->tpl_vars['sitemap']->value['split_by_year'])) {?>
                                    <?php echo __d('admin','khong_chia');?>

                                <?php }?>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="kt-widget12__item">
                    <div class="kt-widget12__info">
                        <span class="kt-widget12__desc">
                            <?php echo __d('admin','chuyen_huong_301');?>

                        </span>

                        <a href="<?php echo ADMIN_PATH;?>
/seo-setting" class="kt-widget12__value d-inline-block">
                            <span class="form-control-plaintext kt-font-bolder">
                                <?php if (!empty($_smarty_tpl->tpl_vars['redirect']->value['redirect_301'])) {?>
                                    <?php echo __d('admin','co_bat_chuyen_huong');?>

                                <?php }?>
                                <?php if (empty($_smarty_tpl->tpl_vars['redirect']->value['redirect_301'])) {?>
                                    <?php echo __d('admin','khong_bat_chuyen_huong');?>

                                <?php }?>
                            </span>
                        </a>
                    </div>
                    <div class="kt-widget12__info">
                        <span class="kt-widget12__desc">
                            <?php echo __d('admin','chuyen_huong_https');?>

                        </span>

                        <a href="<?php echo ADMIN_PATH;?>
/seo-setting" class="kt-widget12__value d-inline-block">
                            <span class="form-control-plaintext kt-font-bolder">
                                <?php if (!empty($_smarty_tpl->tpl_vars['redirect']->value['redirect_https'])) {?>
                                    <?php echo __d('admin','co_bat_chuyen_huong');?>

                                <?php }?>
                                <?php if (empty($_smarty_tpl->tpl_vars['redirect']->value['redirect_https'])) {?>
                                    <?php echo __d('admin','khong_bat_chuyen_huong');?>

                                <?php }?>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="kt-widget12__item">
                    <div class="kt-widget12__info">
                        <span class="kt-widget12__desc">
                            ROBOTS.TXT
                        </span>

                        <a href="<?php echo ADMIN_PATH;?>
/seo-setting" class="kt-widget12__value d-inline-block">
                            <span class="form-control-plaintext kt-font-bolder">
                                <?php if (!empty($_smarty_tpl->tpl_vars['exist_robots_file']->value)) {?>
                                    <?php echo __d('admin','da_tai_len');?>

                                <?php } else { ?>
                                    <?php echo __d('admin','chua_tai_len');?>

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
