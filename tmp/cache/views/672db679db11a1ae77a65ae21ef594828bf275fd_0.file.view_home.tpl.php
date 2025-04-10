<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:09
  from 'C:\var5\ximang.local\templates\thoitrang05\block\article\view_home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc45e3f000_51285892',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '672db679db11a1ae77a65ae21ef594828bf275fd' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\block\\article\\view_home.tpl',
      1 => 1742529344,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc45e3f000_51285892 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('is_slider', false);
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['slider'])) {?>
    <?php $_smarty_tpl->_assignInScope('is_slider', true);
}?>

<?php $_smarty_tpl->_assignInScope('element', "item");
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['element'])) {?>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['data_extend']->value['element'];
$_prefixVariable57 = ob_get_clean();
$_smarty_tpl->_assignInScope('element', $_prefixVariable57);
}?>

<?php $_smarty_tpl->_assignInScope('col', '');
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['col'])) {?>
    <?php $_smarty_tpl->_assignInScope('col', $_smarty_tpl->tpl_vars['data_extend']->value['col']);
}?>

<?php $_smarty_tpl->_assignInScope('ignore_lazy', false);
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['ignore_lazy'])) {?>
    <?php $_smarty_tpl->_assignInScope('ignore_lazy', $_smarty_tpl->tpl_vars['data_extend']->value['ignore_lazy']);
}?>

<div class="title-link"><?php ob_start();
echo LANGUAGE;
$_prefixVariable58 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable58]['tieu_de'])) {?><h3 class="title-section"><?php echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('tieu_de',$_smarty_tpl->tpl_vars['data_extend']->value);?>
</h3><?php }
ob_start();
echo LANGUAGE;
$_prefixVariable59 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable59]['link'])) {?><a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('link',$_smarty_tpl->tpl_vars['data_extend']->value);?>
" class="link-right"><?php ob_start();
echo LANGUAGE;
$_prefixVariable60 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable60]['tieu_de_link'])) {
echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('tieu_de_link',$_smarty_tpl->tpl_vars['data_extend']->value);?>
 <i class="fa-light fa-arrow-right ml-1"></i><?php }?></a><?php }?></div><?php if (!empty($_smarty_tpl->tpl_vars['data_block']->value['data'])) {?><div class="swiper" nh-swiper="<?php if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['slider'])) {
echo htmlentities(json_encode($_smarty_tpl->tpl_vars['data_extend']->value['slider']));
}?>"><div class="swiper-wrapper"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_block']->value['data'], 'article');
$_smarty_tpl->tpl_vars['article']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->do_else = false;
echo $_smarty_tpl->tpl_vars['this']->value->element("../block/".((string)$_smarty_tpl->tpl_vars['block_type']->value)."/".((string)$_smarty_tpl->tpl_vars['element']->value),array('article'=>$_smarty_tpl->tpl_vars['article']->value,'is_slider'=>$_smarty_tpl->tpl_vars['is_slider']->value,'ignore_lazy'=>$_smarty_tpl->tpl_vars['ignore_lazy']->value));
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div><?php if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['slider']['pagination'])) {?><!-- If we need pagination --><div class="swiper-pagination"></div><?php }
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['slider']['navigation'])) {?><div class="swiper-button-next"><i class="fa-light fa-angle-right "></i></div><div class="swiper-button-prev"><i class="fa-light fa-angle-left "></i></div><?php }?></div><?php } else { ?><div class="mb-4"><?php echo __d('template','khong_co_du_lieu');?>
</div><?php }
ob_start();
echo PAGINATION;
$_prefixVariable61 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['block_config']->value['has_pagination']) && !empty($_smarty_tpl->tpl_vars['data_block']->value[$_prefixVariable61])) {
ob_start();
echo PAGINATION;
$_prefixVariable62 = ob_get_clean();
echo $_smarty_tpl->tpl_vars['this']->value->element('pagination_ajax',array('pagination'=>$_smarty_tpl->tpl_vars['data_block']->value[$_prefixVariable62]));
}
}
}
