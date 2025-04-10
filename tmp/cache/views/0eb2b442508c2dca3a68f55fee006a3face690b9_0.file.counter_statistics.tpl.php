<?php
/* Smarty version 4.5.5, created on 2025-04-10 22:03:40
  from 'C:\var5\ximang.local\core\plugins\Admin\templates\Dashboard\counter_statistics.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7ddccf2def8_34917151',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0eb2b442508c2dca3a68f55fee006a3face690b9' => 
    array (
      0 => 'C:\\var5\\ximang.local\\core\\plugins\\Admin\\templates\\Dashboard\\counter_statistics.tpl',
      1 => 1718533418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7ddccf2def8_34917151 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\var5\\ximang.local\\core\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<div class="kt-portlet__body kt-portlet__body--fit">
    <div class="kt-widget17">
        <div class="kt-widget17__stats m-0 w-100 text-center">
            <div class="kt-widget17__items">
                <div class="kt-widget17__item cursor-default">
                    <span class="kt-widget17__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--danger">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg>                        
                    </span>

                    <span class="kt-widget17__subtitle">
                        Online
                    </span>

                    <span class="kt-widget17__desc">
                        <span class="kt-font-bolder">
                            <?php if (!empty($_smarty_tpl->tpl_vars['online']->value)) {?>
                                <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['online']->value,0,".",",");?>

                            <?php } else { ?>
                                0
                            <?php }?>
                            <?php echo __d('admin','nguoi');?>

                        </span>
                    </span>
                </div>

                <div class="kt-widget17__item cursor-default">
                    <span class="kt-widget17__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--warning">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg>
                    </span>
                    <span class="kt-widget17__subtitle">
                        <?php echo __d('admin','hom_nay');?>

                    </span>
                    
                    <span class="kt-widget17__desc">
                        <span class="kt-font-bolder">
                            <?php if (!empty($_smarty_tpl->tpl_vars['day']->value)) {?>
                                <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['day']->value,0,".",",");?>

                            <?php } else { ?>
                                0
                            <?php }?>
                            <?php echo __d('admin','nguoi');?>

                        </span>
                    </span>
                </div>                
            </div>

            <div class="kt-widget17__items">
                <div class="kt-widget17__item cursor-default">
                    <span class="kt-widget17__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg>
                    </span>

                    <span class="kt-widget17__subtitle">
                        <?php echo __d('admin','tuan_nay');?>

                    </span>

                    <span class="kt-widget17__desc">
                        <span class="kt-font-bolder">
                            <?php if (!empty($_smarty_tpl->tpl_vars['week']->value)) {?>
                                <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['week']->value,0,".",",");?>

                            <?php } else { ?>
                                0
                            <?php }?>
                            <?php echo __d('admin','nguoi');?>

                        </span>
                    </span>
                </div>
                
                <div class="kt-widget17__item cursor-default">
                    <span class="kt-widget17__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg>
                    </span>

                    <span class="kt-widget17__subtitle">
                        <?php echo __d('admin','thang_nay');?>

                    </span>

                    <span class="kt-widget17__desc">
                        <span class="kt-font-bolder">
                            <?php if (!empty($_smarty_tpl->tpl_vars['month']->value)) {?>
                                <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['month']->value,0,".",",");?>

                            <?php } else { ?>
                                0
                            <?php }?>
                            <?php echo __d('admin','nguoi');?>

                        </span>
                    </span>
                </div>
            </div>

            <div class="kt-widget17__items">                
                <div class="kt-widget17__item cursor-default">
                    <span class="kt-widget17__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg>
                    </span>

                    <span class="kt-widget17__subtitle">
                        <?php echo __d('admin','tat_ca');?>

                    </span>

                    <span class="kt-widget17__desc">
                        <span class="kt-font-bolder">
                            <?php if (!empty($_smarty_tpl->tpl_vars['all']->value)) {?>
                                <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['all']->value,0,".",",");?>

                            <?php } else { ?>
                                0
                            <?php }?>
                            <?php echo __d('admin','nguoi');?>

                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}
