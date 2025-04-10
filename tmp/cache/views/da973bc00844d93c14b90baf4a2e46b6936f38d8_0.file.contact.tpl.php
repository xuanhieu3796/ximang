<?php
/* Smarty version 4.5.5, created on 2025-04-10 22:03:43
  from 'C:\var5\ximang.local\core\plugins\Admin\templates\Dashboard\contact.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7ddcf5c5ff3_48062575',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da973bc00844d93c14b90baf4a2e46b6936f38d8' => 
    array (
      0 => 'C:\\var5\\ximang.local\\core\\plugins\\Admin\\templates\\Dashboard\\contact.tpl',
      1 => 1724335132,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7ddcf5c5ff3_48062575 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="kt-portlet__body kt-portlet__body--fit">
    <div class="kt-widget17">
        <div class="kt-widget17__stats m-0 w-100 text-center">
            <div class="kt-widget17__items">
                <div class="kt-widget17__item box-shadow-0 cursor-default p-0">
                    <div class="kt-portlet__head kt-portlet__space-x">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                <?php echo __d('admin','lien_he_moi_nhat');?>

                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/admin/contact" target="_blank">
                                        <?php echo __d('admin','xem_tat_ca');?>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php if (!empty($_smarty_tpl->tpl_vars['list_contact']->value)) {?>
                    <div class="kt-portlet__body comment_dashboard-over-flow contact-dashboard ">
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                                <div class="kt-widget5">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_contact']->value, 'item_contact', false, 'key');
$_smarty_tpl->tpl_vars['item_contact']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item_contact']->value) {
$_smarty_tpl->tpl_vars['item_contact']->do_else = false;
?>
                                    <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['item_contact']->value['status']) && $_smarty_tpl->tpl_vars['item_contact']->value['status'] != 2) {
echo __d('admin','da_doc');
} else {
echo __d('admin','chua_doc');
}
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('status', $_prefixVariable1);?>
                                    <div class="kt-widget5__item pb-3 row">
                                        <div class="kt-widget5__content text-left col-md-7">
                                            <div class="kt-widget5__section">
                                                <?php if (!empty($_smarty_tpl->tpl_vars['item_contact']->value['name_form'])) {?>
                                                    <div class="kt-widget5__title">
                                                        <?php echo $_smarty_tpl->tpl_vars['item_contact']->value['name_form'];?>

                                                    </div>
                                                <?php }?>
                                                
                                                <?php if (!empty($_smarty_tpl->tpl_vars['item_contact']->value['values'])) {?>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item_contact']->value['values'], 'item', false, 'key');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                                                        <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['field_value'])) {?>    
                                                            <div class="kt-widget5__info text-justify">
                                                                <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['label'])) {?>
                                                                    <span><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
:</span>
                                                                <?php }?>
                                                                    <span class=""><?php echo strip_tags($_smarty_tpl->tpl_vars['item']->value['field_value']);?>
</span>                   
                                                            </div>
                                                        <?php }?>
                                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['item_contact']->value['id'])) {?>
                                                        <a class="kt-widget3__text mb-2 d-inline-block cursor-p mt-2" href="/admin/contact/#detail-contact=<?php echo $_smarty_tpl->tpl_vars['item_contact']->value['id'];?>
" target="_blank">
                                                            <i class="fa fa-external-link-alt"></i> <?php echo __d('admin','chi_tiet');?>

                                                        </a>
                                                    <?php }?> 
                                                <?php }?>
                                            </div>
                                        </div>
                                        <div class="col-md-5 text-right">
                                            <div class="kt-widget5__content justify-content-end mb-1">
                                                <div class="kt-widget5__stats pr-3">
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['item_contact']->value['tracking_source'])) {?>
                                                        <span class="kt-widget5__number fw-600"><?php ob_start();
echo strip_tags($_smarty_tpl->tpl_vars['item_contact']->value['tracking_source']);
$_prefixVariable2 = ob_get_clean();
echo __d('admin',$_prefixVariable2);?>
</span>
                                                    <?php }?>
                                                    <span class="kt-widget5__sales"><?php echo __d('admin','nguon');?>
</span>
                                                </div>
                                                <div class="kt-widget5__stats">
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['item_contact']->value['status'])) {?>
                                                        <span class="kt-widget5__number fw-600"><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</span>
                                                    <?php }?>
                                                    <span class="kt-widget5__votes"><?php echo __d('admin','trang_thai');?>
</span>
                                                </div>
                                            </div>
                                            <?php if (!empty($_smarty_tpl->tpl_vars['item_contact']->value['created'])) {?>
                                                <p class="fs-12 font-italic mb-2 text-right">
                                                    <?php echo $_smarty_tpl->tpl_vars['item_contact']->value['created'];?>

                                                </p>
                                            <?php }?>
                                        </div>
                                    </div>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </div>
                            </div>
                        </div>
                    </div>   
                <?php }?>
                </div>
            </div>
        </div>
    </div>
<?php if (empty($_smarty_tpl->tpl_vars['list_contact']->value)) {?>
    <div class="kt-portlet__body text-center">
        <div class="kt-font-bolder">
            <?php echo __d('admin','khong_co_lien_he_moi');?>

        </div>
    </div>
<?php }?>
</div><?php }
}
