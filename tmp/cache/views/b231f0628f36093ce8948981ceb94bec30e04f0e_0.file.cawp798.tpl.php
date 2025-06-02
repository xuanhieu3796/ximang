<?php
/* Smarty version 4.5.5, created on 2025-06-01 09:25:07
  from 'C:\var5\ximang.local\templates\thoitrang05\block\html\cawp798.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_683bba03dddfd7_55586488',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b231f0628f36093ce8948981ceb94bec30e04f0e' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\block\\html\\cawp798.tpl',
      1 => 1748744707,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683bba03dddfd7_55586488 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo LANGUAGE;
$_prefixVariable5 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['data_collection'][$_prefixVariable5])) {?><div class="box-top-deals"><div class="title-link"><?php ob_start();
echo LANGUAGE;
$_prefixVariable6 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable6]['tieu_de'])) {?><h3 class="title-section"><?php echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('tieu_de',$_smarty_tpl->tpl_vars['data_extend']->value);?>
</h3><?php }
ob_start();
echo LANGUAGE;
$_prefixVariable7 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable7]['link'])) {?><a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('link',$_smarty_tpl->tpl_vars['data_extend']->value);?>
" class="link-right"><?php ob_start();
echo LANGUAGE;
$_prefixVariable8 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable8]['tieu_de_link'])) {
echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('tieu_de_link',$_smarty_tpl->tpl_vars['data_extend']->value);?>
 <i class="fa-light fa-arrow-right ml-1"></i><?php }?></a><?php }?></div><div class="list"><div class="row"><?php ob_start();
echo LANGUAGE;
$_prefixVariable9 = ob_get_clean();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_extend']->value['data_collection'][$_prefixVariable9], 'item', false, 'key');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?><div class="col-lg-4 col-md-6 col-12"><div class="item"><div class="inter-top"><div class="img"><?php if (!empty($_smarty_tpl->tpl_vars['item']->value['logo'])) {
ob_start();
echo CDN_URL;
$_prefixVariable10=ob_get_clean();
$_smarty_tpl->_assignInScope('url_img', $_prefixVariable10.((string)$_smarty_tpl->tpl_vars['item']->value['logo']));
} else {
$_smarty_tpl->_assignInScope('url_img', "data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==");
}
ob_start();
if (!empty($_smarty_tpl->tpl_vars['item']->value['name'])) {
echo (string)$_smarty_tpl->tpl_vars['item']->value['name'];
}
$_prefixVariable11=ob_get_clean();
echo $_smarty_tpl->tpl_vars['this']->value->LazyLoad->renderImage(array('src'=>$_smarty_tpl->tpl_vars['url_img']->value,'alt'=>$_prefixVariable11,'class'=>'img-fluid'));?>
</div><?php if (!empty($_smarty_tpl->tpl_vars['item']->value['name'])) {?><div class="name"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</div><?php }?></div><div class="inter-content"><?php if (!empty($_smarty_tpl->tpl_vars['item']->value['dsc1'])) {?><div class="dsc"><?php echo $_smarty_tpl->tpl_vars['item']->value['dsc1'];?>
</div><?php }
if (!empty($_smarty_tpl->tpl_vars['item']->value['dsc2'])) {?><div class="dsc"><?php echo $_smarty_tpl->tpl_vars['item']->value['dsc2'];?>
</div><?php }?></div><div class="inter-btn"><?php if (!empty($_smarty_tpl->tpl_vars['item']->value['urldl'])) {?><div class="btn-deal btn-left"><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['urldl'];?>
" title="<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['name'])) {
echo $_smarty_tpl->tpl_vars['item']->value['name'];
}?>">Show More</a></div><?php }
if (!empty($_smarty_tpl->tpl_vars['item']->value['urlour'])) {?><div class="btn-deal btn-right"><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['urlour'];?>
" title="<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['name'])) {
echo $_smarty_tpl->tpl_vars['item']->value['name'];
}?>">Sign Up</a></div><?php }?></div></div></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div></div><?php }
}
}
