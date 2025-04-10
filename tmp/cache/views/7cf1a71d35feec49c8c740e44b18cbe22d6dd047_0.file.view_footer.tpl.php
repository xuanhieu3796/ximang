<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:10
  from 'C:\var5\ximang.local\templates\thoitrang05\block\menu\view_footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc466e7ba8_53246098',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7cf1a71d35feec49c8c740e44b18cbe22d6dd047' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\block\\menu\\view_footer.tpl',
      1 => 1742484397,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc466e7ba8_53246098 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\var5\\ximang.local\\core\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
<div class="menu-footer"><?php ob_start();
echo LANGUAGE;
$_prefixVariable83 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable83]['tieu_de'])) {?><div class="title-footer"><?php echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('tieu_de',$_smarty_tpl->tpl_vars['data_extend']->value);?>
</div><?php }
if (!empty($_smarty_tpl->tpl_vars['data_block']->value)) {?><ul><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_block']->value, 'menu');
$_smarty_tpl->tpl_vars['menu']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->do_else = false;
$_smarty_tpl->_assignInScope('class_has_child', '');
if (!empty($_smarty_tpl->tpl_vars['menu']->value['has_sub_menu'])) {
$_smarty_tpl->_assignInScope('class_has_child', "has-child ");
}
$_smarty_tpl->_assignInScope('class_position', '');
if (!empty($_smarty_tpl->tpl_vars['menu']->value['view_item']) && $_smarty_tpl->tpl_vars['menu']->value['view_item'] == 'sub_dropdown') {
$_smarty_tpl->_assignInScope('class_position', "position-relative ");
}
$_smarty_tpl->_assignInScope('class_item', '');
if (!empty($_smarty_tpl->tpl_vars['menu']->value['class_item'])) {
$_smarty_tpl->_assignInScope('class_item', $_smarty_tpl->tpl_vars['menu']->value['class_item']);
}
if (!empty($_smarty_tpl->tpl_vars['menu']->value['name'])) {
$_smarty_tpl->_assignInScope('image_source', '');
if (!empty($_smarty_tpl->tpl_vars['menu']->value['image']) && !empty($_smarty_tpl->tpl_vars['menu']->value['image_source'])) {
$_smarty_tpl->_assignInScope('image_source', $_smarty_tpl->tpl_vars['menu']->value['image_source']);
}
$_smarty_tpl->_assignInScope('image_url', '');
if (!empty($_smarty_tpl->tpl_vars['menu']->value['image']) && $_smarty_tpl->tpl_vars['image_source']->value == 'cdn') {
ob_start();
echo CDN_URL;
$_prefixVariable84=ob_get_clean();
$_smarty_tpl->_assignInScope('image_url', $_prefixVariable84.((string)$_smarty_tpl->tpl_vars['menu']->value['image']));
}
if (!empty($_smarty_tpl->tpl_vars['menu']->value['image']) && $_smarty_tpl->tpl_vars['image_source']->value == 'template') {
$_smarty_tpl->_assignInScope('image_url', ((string)$_smarty_tpl->tpl_vars['menu']->value['image']));
}?><li class="<?php echo $_smarty_tpl->tpl_vars['class_position']->value;
echo $_smarty_tpl->tpl_vars['class_has_child']->value;
echo $_smarty_tpl->tpl_vars['class_item']->value;?>
"><a href="<?php if (!empty($_smarty_tpl->tpl_vars['menu']->value['url'])) {
echo $_smarty_tpl->tpl_vars['this']->value->Utilities->checkInternalUrl($_smarty_tpl->tpl_vars['menu']->value['url']);
} else { ?>/<?php }?>"<?php if (!empty($_smarty_tpl->tpl_vars['menu']->value['blank_link'])) {?>target="_blank"<?php }?>><?php echo smarty_modifier_truncate(htmlspecialchars((string)$_smarty_tpl->tpl_vars['menu']->value['name'], ENT_QUOTES, 'UTF-8', true),60," ...");?>
</a></li><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul><?php }?></div><?php }
}
