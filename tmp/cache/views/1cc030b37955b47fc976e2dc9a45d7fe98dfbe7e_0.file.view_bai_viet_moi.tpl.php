<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:09
  from 'C:\var5\ximang.local\templates\thoitrang05\block\article\view_bai_viet_moi.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc45b484f1_92483795',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1cc030b37955b47fc976e2dc9a45d7fe98dfbe7e' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\block\\article\\view_bai_viet_moi.tpl',
      1 => 1742534488,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc45b484f1_92483795 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('is_slider', false);
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['slider'])) {?>
    <?php $_smarty_tpl->_assignInScope('is_slider', true);
}?>

<?php $_smarty_tpl->_assignInScope('element', "item");
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['element'])) {?>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['data_extend']->value['element'];
$_prefixVariable49 = ob_get_clean();
$_smarty_tpl->_assignInScope('element', $_prefixVariable49);
}?>

<?php $_smarty_tpl->_assignInScope('col', '');
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['col'])) {?>
    <?php $_smarty_tpl->_assignInScope('col', $_smarty_tpl->tpl_vars['data_extend']->value['col']);
}?>

<?php $_smarty_tpl->_assignInScope('ignore_lazy', false);
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['ignore_lazy'])) {?>
    <?php $_smarty_tpl->_assignInScope('ignore_lazy', $_smarty_tpl->tpl_vars['data_extend']->value['ignore_lazy']);
}?>

<div class="box-article-hot"><?php ob_start();
echo LANGUAGE;
$_prefixVariable50 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable50]['tieu_de'])) {?><h3 class="title-section text-left"><?php echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('tieu_de',$_smarty_tpl->tpl_vars['data_extend']->value);?>
</h3><?php }
if (!empty($_smarty_tpl->tpl_vars['data_block']->value['data'])) {?><div class="row"><div class="col-md-6 col-12"><div class="article-left"><?php echo $_smarty_tpl->tpl_vars['this']->value->element("../block/".((string)$_smarty_tpl->tpl_vars['block_type']->value)."/item_left",array('article'=>$_smarty_tpl->tpl_vars['data_block']->value['data'][0],'is_slider'=>$_smarty_tpl->tpl_vars['is_slider']->value,'ignore_lazy'=>$_smarty_tpl->tpl_vars['ignore_lazy']->value));?>
</div></div><div class="col-md-6 col-12"><div class="article-right"><div class="list-article"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_block']->value['data'], 'article');
$_smarty_tpl->tpl_vars['article']->index = -1;
$_smarty_tpl->tpl_vars['article']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->do_else = false;
$_smarty_tpl->tpl_vars['article']->index++;
$__foreach_article_8_saved = $_smarty_tpl->tpl_vars['article'];
if ($_smarty_tpl->tpl_vars['article']->index >= 1 && $_smarty_tpl->tpl_vars['article']->index <= 4) {
echo $_smarty_tpl->tpl_vars['this']->value->element("../block/".((string)$_smarty_tpl->tpl_vars['block_type']->value)."/item_small",array('article'=>$_smarty_tpl->tpl_vars['article']->value));
}
$_smarty_tpl->tpl_vars['article'] = $__foreach_article_8_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div><div class="link-article"><a href="<?php ob_start();
echo LANGUAGE;
$_prefixVariable51 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable51]['link'])) {
echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('link',$_smarty_tpl->tpl_vars['data_extend']->value);
}?>" title="<?php ob_start();
echo LANGUAGE;
$_prefixVariable52 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable52]['tieu_de'])) {
echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('tieu_de',$_smarty_tpl->tpl_vars['data_extend']->value);
}?>"><?php ob_start();
echo LANGUAGE;
$_prefixVariable53 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable53]['tieu_de_link'])) {
echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('tieu_de_link',$_smarty_tpl->tpl_vars['data_extend']->value);
}?> <i class="fa-light fa-arrow-right"></i></a></div></div></div></div><?php } else { ?><div class="mb-4"><?php echo __d('template','khong_co_du_lieu');?>
</div><?php }?></div><?php ob_start();
echo PAGINATION;
$_prefixVariable54 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['block_config']->value['has_pagination']) && !empty($_smarty_tpl->tpl_vars['data_block']->value[$_prefixVariable54])) {
ob_start();
echo PAGINATION;
$_prefixVariable55 = ob_get_clean();
echo $_smarty_tpl->tpl_vars['this']->value->element('pagination_ajax',array('pagination'=>$_smarty_tpl->tpl_vars['data_block']->value[$_prefixVariable55]));
}
}
}
