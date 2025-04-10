<?php
/* Smarty version 4.5.5, created on 2025-04-10 22:03:39
  from 'C:\var5\ximang.local\core\plugins\Admin\templates\element\layout\notifications.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7ddcb61bcb7_67373695',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1386dfbc16a7171bba3fe8b34678bd9587e32ff1' => 
    array (
      0 => 'C:\\var5\\ximang.local\\core\\plugins\\Admin\\templates\\element\\layout\\notifications.tpl',
      1 => 1687961042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7ddcb61bcb7_67373695 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('my_notifications', $_smarty_tpl->tpl_vars['this']->value->NhNotificationAdmin->getFirstPageNotifcation('my_notification'));
$_smarty_tpl->_assignInScope('general_notifications', $_smarty_tpl->tpl_vars['this']->value->NhNotificationAdmin->getFirstPageNotifcation('general'));?>

<?php $_smarty_tpl->_assignInScope('more_page_my_notification', $_smarty_tpl->tpl_vars['this']->value->NhNotificationAdmin->existmorePageNotifcation('my_notification'));
$_smarty_tpl->_assignInScope('more_page_general', $_smarty_tpl->tpl_vars['this']->value->NhNotificationAdmin->existmorePageNotifcation('general'));?>

<div nh-notification="slidebar" id="kt_quick_panel" class="kt-quick-panel">
    <a href="#" class="kt-quick-panel__close" id="kt_quick_panel_close_btn">
        <i class="flaticon2-delete"></i>
    </a>
    <div class="kt-quick-panel__nav">
        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
            <li class="nav-item active">
                <a class="nav-link active" data-toggle="tab" href="#my-notifications" role="tab">
                    <?php echo __d('admin','thong_bao_cua_toi');?>

                    <span nh-notification="count-my-notification" class="kt-badge kt-badge--outline kt-badge--info ml-5 d-none"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#general-notifications" role="tab">
                    <?php echo __d('admin','thong_bao_chung');?>

                    <span nh-notification="count-general-notification" class="kt-badge kt-badge--outline kt-badge--info ml-5 d-none"></span>
                </a>
            </li>
        </ul>
    </div>
    <div class="kt-quick-panel__content">
        <div class="tab-content">
            <div id="my-notifications" class="tab-pane fade show kt-scroll active" role="tabpanel">
                <div nh-list-notification="my_notification" class="kt-notification">
                    <?php echo $_smarty_tpl->tpl_vars['this']->value->element('Admin.layout/notifications_items',array('notifications'=>$_smarty_tpl->tpl_vars['my_notifications']->value,'more_page'=>$_smarty_tpl->tpl_vars['more_page_my_notification']->value,'page'=>1,'init'=>true));?>

                </div>
            </div>

            <div id="general-notifications" class="tab-pane fade show kt-scroll" role="tabpanel">
                <div nh-list-notification="general" class="kt-notification">
                    <?php echo $_smarty_tpl->tpl_vars['this']->value->element('Admin.layout/notifications_items',array('notifications'=>$_smarty_tpl->tpl_vars['general_notifications']->value,'more_page'=>$_smarty_tpl->tpl_vars['more_page_general']->value,'page'=>1,'init'=>true));?>

                </div>
            </div>
        </div>
    </div>
</div><?php }
}
