<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:10
  from 'C:\var5\ximang.local\templates\thoitrang05\block\category_article\view_cate_image.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc463b4eb4_22834729',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c09e2f287c6d8c2c7089fd1608d82186cee323ca' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\block\\category_article\\view_cate_image.tpl',
      1 => 1742358583,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc463b4eb4_22834729 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="categories-image"><?php ob_start();
echo LANGUAGE;
$_prefixVariable76 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable76]['tieu_de'])) {?><div class="title-section text-left"><?php echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('tieu_de',$_smarty_tpl->tpl_vars['data_extend']->value);?>
</div><?php }
if (!empty($_smarty_tpl->tpl_vars['data_block']->value['data'])) {?><div class="list-category"><div class="row"><?php echo $_smarty_tpl->tpl_vars['this']->value->element('../block/category_article/item_image',array('categories'=>$_smarty_tpl->tpl_vars['data_block']->value['data']));?>
</div></div><?php }?></div><?php }
}
