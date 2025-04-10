<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:10
  from 'C:\var5\ximang.local\templates\thoitrang05\block\comment\info_modal.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc46a8d3d2_94470200',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c8cdd1c2fdfeb30ba5b2519dc44c40a590c4eb4' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\block\\comment\\info_modal.tpl',
      1 => 1670467152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc46a8d3d2_94470200 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="info-comment-modal" class="modal fade" role="dialog" aria-hidden="true"><div class="modal-dialog modal-md"><div class="modal-content"><div class="modal-body"><h3 class="modal-comment-title text-center"><b><?php echo __d('template','thong_tin_nguoi_gui');?>
</b></h3><div class="modal-comment-content"><div class="text-center  mb-5"><?php echo __d('template','de_gui_binh_luan_ban_vui_long_cung_cap_them_thong_tin_lien_he');?>
</div><form id="info-comment-form" method="POST" autocomplete="off"><div class="form-group"><label><?php echo __d('template','ten_hien_thi');?>
:<span class="required">*</span></label><input name="full_name" class="form-control" type="text"></div><div class="form-group"><label><?php echo __d('template','email');?>
:<span class="required">*</span></label><input name="email" class="form-control" type="text"></div><div class="form-group"><label><?php echo __d('template','so_dien_thoai');?>
:<span class="required">*</span></label><input name="phone" class="form-control" type="text"></div></form></div><button id="btn-send-info" type="button" class="col-12 btn btn-primary"><?php echo __d('template','cap_nhat');?>
</button></div></div></div></div><?php }
}
