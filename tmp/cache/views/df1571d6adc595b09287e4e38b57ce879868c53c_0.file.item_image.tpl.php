<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:10
  from 'C:\var5\ximang.local\templates\thoitrang05\block\category_article\item_image.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc4644d6b6_80895428',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df1571d6adc595b09287e4e38b57ce879868c53c' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\block\\category_article\\item_image.tpl',
      1 => 1742369679,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc4644d6b6_80895428 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\var5\\ximang.local\\core\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
if (!empty($_smarty_tpl->tpl_vars['categories']->value)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?><div class="col-lg-4 col-md-4 col-6"><div class="item"><a <?php if (!empty($_smarty_tpl->tpl_vars['category']->value['url'])) {?>href="<?php echo $_smarty_tpl->tpl_vars['this']->value->Utilities->checkInternalUrl($_smarty_tpl->tpl_vars['category']->value['url']);?>
"<?php }?>><div class="img ratio-3-2"><?php if (!empty($_smarty_tpl->tpl_vars['category']->value['image_avatar'])) {
ob_start();
echo CDN_URL;
$_prefixVariable77=ob_get_clean();
$_smarty_tpl->_assignInScope('url_img', $_prefixVariable77.((string)$_smarty_tpl->tpl_vars['this']->value->Utilities->getThumbs($_smarty_tpl->tpl_vars['category']->value['image_avatar'],350)));
} else {
$_smarty_tpl->_assignInScope('url_img', "data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==");
}
ob_start();
if (!empty($_smarty_tpl->tpl_vars['category']->value['name'])) {
echo (string)$_smarty_tpl->tpl_vars['category']->value['name'];
}
$_prefixVariable78=ob_get_clean();
echo $_smarty_tpl->tpl_vars['this']->value->LazyLoad->renderImage(array('src'=>$_smarty_tpl->tpl_vars['url_img']->value,'alt'=>$_prefixVariable78,'class'=>'img-fluid'));?>
</div><div class="name"><?php echo smarty_modifier_truncate(htmlspecialchars((string)$_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8', true),80," ...");?>
</div></a></div></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
