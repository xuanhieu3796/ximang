<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:10
  from 'C:\var5\ximang.local\templates\thoitrang05\Notification\bell.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc46da6f84_65112769',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '44f09994a6b8eb8e918c4ef724a3837713b110c0' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\Notification\\bell.tpl',
      1 => 1670467152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc46da6f84_65112769 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('plugins', $_smarty_tpl->tpl_vars['this']->value->Setting->getListPlugins());
if (!empty($_smarty_tpl->tpl_vars['plugins']->value['notification'])) {?>
    <link href="<?php echo URL_TEMPLATE;?>
assets/css/notification.css" rel="stylesheet" type="text/css" />

    <?php echo '<script'; ?>
 src="https://www.gstatic.com/firebasejs/9.6.1/firebase-app-compat.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://www.gstatic.com/firebasejs/9.6.1/firebase-messaging-compat.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/firebase-init.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        const messaging = firebase.messaging();
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo URL_TEMPLATE;?>
assets/js/notification.js" type="text/javascript"><?php echo '</script'; ?>
>

    <div nh-element-push="wrap" class="push-bell d-none">
        <div class="push-icon-container">
            <div class="push-icon"></div>
        </div>

        <div class="push-paragraph push-collapsed"></div>

        <div class="push-dialog push-collapsed">
            <div class="push-dialog-title">
                <?php echo __d('template','quan_ly_thong_bao');?>

            </div>

            <div class="push-notification">
                <div class="push-notification-icon"></div>
                <div class="push-notification-paragraph-large"></div>
                <div class="push-notification-paragraph-medium"></div>
                <div class="push-notification-paragraph-large"></div>
                <div class="push-notification-paragraph-small"></div>
            </div>

            <div class="push-dialog-button-container">
                <div nh-action-push="subscribe" class="push-dialog-button"></div>
            </div>
        </div>

        <div class="push-help push-collapsed" style="background-image: url('<?php echo URL_TEMPLATE;?>
assets/img/notification/allow-notifications.png');"></div>
    </div>
<?php }
}
}
