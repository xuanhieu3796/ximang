<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:09
  from 'C:\var5\ximang.local\templates\thoitrang05\element\layout\block.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc45513855_93004646',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca5dc225e330e88fd41d06b789c48b404a31e06f' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\element\\layout\\block.tpl',
      1 => 1670467152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc45513855_93004646 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\var5\\ximang.local\\core\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.replace.php','function'=>'smarty_modifier_replace',),));
ob_start();
if (!empty($_smarty_tpl->tpl_vars['block_info']->value['type'])) {
echo (string)$_smarty_tpl->tpl_vars['block_info']->value['type'];
}
$_prefixVariable35=ob_get_clean();
$_smarty_tpl->_assignInScope('block_type', $_prefixVariable35);
$_smarty_tpl->_assignInScope('data_extend', array());
if (!empty($_smarty_tpl->tpl_vars['block_info']->value['data_extend'])) {
$_smarty_tpl->_assignInScope('data_extend', $_smarty_tpl->tpl_vars['block_info']->value['data_extend']);
}
$_smarty_tpl->_assignInScope('data_block', array());
if (!empty($_smarty_tpl->tpl_vars['block_info']->value['data_block'])) {
$_smarty_tpl->_assignInScope('data_block', $_smarty_tpl->tpl_vars['block_info']->value['data_block']);
}
$_smarty_tpl->_assignInScope('view', 'view.tpl');
if (!empty($_smarty_tpl->tpl_vars['block_info']->value['view'])) {
ob_start();
echo $_smarty_tpl->tpl_vars['block_info']->value['view'];
$_prefixVariable36 = ob_get_clean();
$_smarty_tpl->_assignInScope('view', $_prefixVariable36);
}?><div nh-block="<?php echo $_smarty_tpl->tpl_vars['block_code']->value;?>
" nh-block-cache="<?php if (!empty($_smarty_tpl->tpl_vars['block_config']->value['cache'])) {?>true<?php } else { ?>false<?php }?>" class="<?php if (!empty($_smarty_tpl->tpl_vars['block_config']->value['class'])) {
echo $_smarty_tpl->tpl_vars['block_config']->value['class'];
}?>"><?php if ($_smarty_tpl->tpl_vars['this']->value->Block->checkViewExist($_smarty_tpl->tpl_vars['block_type']->value,$_smarty_tpl->tpl_vars['view']->value)) {
ob_start();
echo smarty_modifier_replace($_smarty_tpl->tpl_vars['view']->value,'.tpl','');
$_prefixVariable37=ob_get_clean();
ob_start();
echo DATA_EXTEND;
$_prefixVariable38=ob_get_clean();
echo $_smarty_tpl->tpl_vars['this']->value->element("../block/".((string)$_smarty_tpl->tpl_vars['block_type']->value)."/".$_prefixVariable37,array('block_info'=>$_smarty_tpl->tpl_vars['block_info']->value,'block_config'=>$_smarty_tpl->tpl_vars['block_config']->value,$_prefixVariable38=>$_smarty_tpl->tpl_vars['data_extend']->value,'data_block'=>$_smarty_tpl->tpl_vars['data_block']->value,'block_type'=>$_smarty_tpl->tpl_vars['block_type']->value));
}?></div><?php }
}
