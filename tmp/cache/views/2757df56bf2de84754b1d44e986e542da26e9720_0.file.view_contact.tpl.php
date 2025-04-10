<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:10
  from 'C:\var5\ximang.local\templates\thoitrang05\block\slider\view_contact.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc46295f90_62834183',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2757df56bf2de84754b1d44e986e542da26e9720' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\block\\slider\\view_contact.tpl',
      1 => 1742910174,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc46295f90_62834183 (Smarty_Internal_Template $_smarty_tpl) {
if (!empty($_smarty_tpl->tpl_vars['data_block']->value)) {?><div class="box-contact-inbox"><div class="row"><div class="col-lg-6 col-md-7 col-12"><div class="info-left"><?php ob_start();
echo LANGUAGE;
$_prefixVariable70 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable70]['tieu_de'])) {?><div class="title"><?php echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('tieu_de',$_smarty_tpl->tpl_vars['data_extend']->value);?>
</div><?php }
ob_start();
echo LANGUAGE;
$_prefixVariable71 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable71]['mo_ta'])) {?><div class="dsc"><?php echo $_smarty_tpl->tpl_vars['this']->value->Block->getLocale('mo_ta',$_smarty_tpl->tpl_vars['data_extend']->value);?>
</div><?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_block']->value, 'slider');
$_smarty_tpl->tpl_vars['slider']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['slider']->value) {
$_smarty_tpl->tpl_vars['slider']->do_else = false;
if (!empty($_smarty_tpl->tpl_vars['slider']->value['name'])) {?><p><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"></path><path d="M8 13A5 5 0 1 0 8 3a5 5 0 0 0 0 10zm0-2a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></svg><?php echo $_smarty_tpl->tpl_vars['slider']->value['name'];?>
</p><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?><form nh-form-contact="M1R9BAU3QD" action="/contact/send-info" method="POST" autocomplete="off" class="form-contact-inbox"><div class="form-group mb-0"><input required data-msg="<?php echo __d('template','vui_long_nhap_thong_tin');?>
"data-rule-maxlength="255" data-msg-maxlength="<?php echo __d('template','thong_tin_nhap_qua_dai');?>
"name="email" type="email" class="form-control newsletter--input" placeholder="Enter your email"><span nh-btn-action="submit" class="btn newsletter--submit">Subscribe</span></div></form></div></div><div class="col-lg-5 col-md-5 col-12"><div class="inter-image"><div class="img ratio-4-3"><?php ob_start();
echo LANGUAGE;
$_prefixVariable72 = ob_get_clean();
ob_start();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable72]['image'])) {
echo (string)$_smarty_tpl->tpl_vars['this']->value->Utilities->replaceVariableSystem($_smarty_tpl->tpl_vars['this']->value->Block->getLocale('image',$_smarty_tpl->tpl_vars['data_extend']->value));
}
$_prefixVariable73=ob_get_clean();
ob_start();
echo LANGUAGE;
$_prefixVariable74 = ob_get_clean();
ob_start();
if (!empty($_smarty_tpl->tpl_vars['data_extend']->value['locale'][$_prefixVariable74]['tieu_de'])) {
echo (string)$_smarty_tpl->tpl_vars['this']->value->Block->getLocale('tieu_de',$_smarty_tpl->tpl_vars['data_extend']->value);
}
$_prefixVariable75=ob_get_clean();
echo $_smarty_tpl->tpl_vars['this']->value->LazyLoad->renderImage(array('src'=>$_prefixVariable73,'alt'=>$_prefixVariable75,'class'=>'img-fluid'));?>
</div></div></div></div></div><?php }
}
}
