<?php
/* Smarty version 4.5.5, created on 2025-04-10 22:03:39
  from 'C:\var5\ximang.local\core\plugins\Admin\templates\element\layout\notifications_items.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7ddcb77e634_35897952',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed463f8e412c0b7e95b8b9086f274e1e173a4ed2' => 
    array (
      0 => 'C:\\var5\\ximang.local\\core\\plugins\\Admin\\templates\\element\\layout\\notifications_items.tpl',
      1 => 1687961042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7ddcb77e634_35897952 (Smarty_Internal_Template $_smarty_tpl) {
if (!empty($_smarty_tpl->tpl_vars['notifications']->value)) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['notifications']->value, 'notification');
$_smarty_tpl->tpl_vars['notification']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['notification']->value) {
$_smarty_tpl->tpl_vars['notification']->do_else = false;
?>
        <?php $_smarty_tpl->_assignInScope('link', '#');?>
        <?php if (!empty($_smarty_tpl->tpl_vars['notification']->value['link'])) {?>
            <?php $_smarty_tpl->_assignInScope('link', $_smarty_tpl->tpl_vars['notification']->value['link']);?>
        <?php }?>

        <?php $_smarty_tpl->_assignInScope('type', '');?>
        <?php if (!empty($_smarty_tpl->tpl_vars['notification']->value['type'])) {?>
            <?php $_smarty_tpl->_assignInScope('type', $_smarty_tpl->tpl_vars['notification']->value['type']);?>
        <?php }?>

        <a nh-notification="item" data-time="<?php if (!empty($_smarty_tpl->tpl_vars['notification']->value['created'])) {
echo $_smarty_tpl->tpl_vars['notification']->value['created'];
}?>" href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
" target="_blank" class="kt-notification__item">
            <div class="kt-notification__item-icon">
                <?php if ($_smarty_tpl->tpl_vars['type']->value == 'general') {?>
                    <i class="flaticon2-layers kt-font-success"></i>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['type']->value == 'upgrade') {?>
                    <i class="flaticon-upload kt-font-primary"></i>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['type']->value == 'news') {?>
                    <i class="flaticon-doc kt-font-warning"></i>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['type']->value == 'promotion') {?>
                    <i class="flaticon2-percentage kt-font-danger"></i>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['type']->value == 'order') {?>
                    <i class="flaticon-doc kt-font-primary"></i>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['type']->value == 'contact') {?>
                    <i class="flaticon-whatsapp kt-font-warning"></i>
                <?php }?>
            </div>
            <div class="kt-notification__item-details">
                <div class="kt-notification__item-title">
                    <?php if (!empty($_smarty_tpl->tpl_vars['notification']->value['title'])) {?>
                        <?php echo $_smarty_tpl->tpl_vars['notification']->value['title'];?>

                    <?php }?>
                </div>

                <div class="kt-notification__item-time text-lowercase">
                    <?php if (!empty($_smarty_tpl->tpl_vars['notification']->value['created'])) {?>
                        <?php $_smarty_tpl->_assignInScope('created', $_smarty_tpl->tpl_vars['this']->value->NhNotificationAdmin->parseTimeNotification($_smarty_tpl->tpl_vars['notification']->value['created']));?>
                        <?php $_smarty_tpl->_assignInScope('time', '');?>
                        <?php $_smarty_tpl->_assignInScope('full_time', '');?>

                        <?php if (!empty($_smarty_tpl->tpl_vars['created']->value['time'])) {?>
                            <?php $_smarty_tpl->_assignInScope('time', $_smarty_tpl->tpl_vars['created']->value['time']);?>
                        <?php }?>

                        <?php if (!empty($_smarty_tpl->tpl_vars['created']->value['full_time'])) {?>
                            <?php $_smarty_tpl->_assignInScope('full_time', $_smarty_tpl->tpl_vars['created']->value['full_time']);?>
                        <?php }?>

                        <?php if (!empty($_smarty_tpl->tpl_vars['time']->value)) {?>
                            <?php echo $_smarty_tpl->tpl_vars['time']->value;?>

                        <?php } else { ?>
                            <?php echo $_smarty_tpl->tpl_vars['full_time']->value;?>

                        <?php }?>
                    <?php }?>
                </div>
            </div>
        </a>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <?php if (!empty($_smarty_tpl->tpl_vars['more_page']->value)) {?>
        <div nh-notification="more" data-page="<?php if (!empty($_smarty_tpl->tpl_vars['page']->value)) {
echo $_smarty_tpl->tpl_vars['page']->value;
} else { ?>1<?php }?>" class="kt-notification-load-more cursor-p text-center p-10">
            <span>
                <?php echo __d('admin','xem_them');?>

            </span>
        </div>
    <?php }
}?>

<?php if (empty($_smarty_tpl->tpl_vars['notifications']->value) && !empty($_smarty_tpl->tpl_vars['init']->value)) {?>
    <div class="text-center">
        <i><?php echo __d('admin','chua_co_thong_bao_nao');?>
</i>
    </div>
<?php }
}
}
