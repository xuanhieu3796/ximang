<?php
/* Smarty version 4.5.5, created on 2025-04-10 22:03:37
  from 'C:\var5\ximang.local\core\plugins\Admin\templates\element\layout\header_menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7ddc9739261_71028388',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff732cf4a5037d424a49b6916371170d0dbae983' => 
    array (
      0 => 'C:\\var5\\ximang.local\\core\\plugins\\Admin\\templates\\element\\layout\\header_menu.tpl',
      1 => 1744295617,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7ddc9739261_71028388 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('permissions', $_smarty_tpl->tpl_vars['this']->value->RoleAdmin->getPermissionAllRouter());?>

<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">	
	<ul class="kt-menu__nav">

				<?php ob_start();
echo ADMIN_PATH;
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->_assignInScope('link_article_add', $_prefixVariable3."/article/add");?>
		<?php ob_start();
echo ADMIN_PATH;
$_prefixVariable4=ob_get_clean();
$_smarty_tpl->_assignInScope('link_article', $_prefixVariable4."/article");?>
		<?php ob_start();
echo ADMIN_PATH;
$_prefixVariable5=ob_get_clean();
$_smarty_tpl->_assignInScope('link_category_article', $_prefixVariable5."/category/article");?>
		<?php ob_start();
echo ADMIN_PATH;
$_prefixVariable6=ob_get_clean();
$_smarty_tpl->_assignInScope('link_media', $_prefixVariable6."/media");?>

		<?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_article_add']->value])) {
echo "1";
}
$_prefixVariable7=ob_get_clean();
$_smarty_tpl->_assignInScope('access_article_add', $_prefixVariable7);?>
		<?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_article']->value])) {
echo "1";
}
$_prefixVariable8=ob_get_clean();
$_smarty_tpl->_assignInScope('access_article', $_prefixVariable8);?>
		<?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_category_article']->value])) {
echo "1";
}
$_prefixVariable9=ob_get_clean();
$_smarty_tpl->_assignInScope('access_category_article', $_prefixVariable9);?>
		<?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_media']->value])) {
echo "1";
}
$_prefixVariable10=ob_get_clean();
$_smarty_tpl->_assignInScope('access_media', $_prefixVariable10);?>

		<?php ob_start();
echo ADMIN_PATH;
$_prefixVariable11=ob_get_clean();
$_smarty_tpl->_assignInScope('link_tag', $_prefixVariable11."/tag");?>
        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable12=ob_get_clean();
$_smarty_tpl->_assignInScope('link_page_seo_info', $_prefixVariable12."/page-seo-info");?>
        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable13=ob_get_clean();
$_smarty_tpl->_assignInScope('link_seo_redirect', $_prefixVariable13."/redirect-301");?>
        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable14=ob_get_clean();
$_smarty_tpl->_assignInScope('link_seo_sitemap', $_prefixVariable14."/site-map-config");?>
        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable15=ob_get_clean();
$_smarty_tpl->_assignInScope('link_seo_setting', $_prefixVariable15."/seo-setting");?>
        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable16=ob_get_clean();
$_smarty_tpl->_assignInScope('link_management', $_prefixVariable16."/link");?>

		<?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_tag']->value])) {
echo "1";
}
$_prefixVariable17=ob_get_clean();
$_smarty_tpl->_assignInScope('access_tag', $_prefixVariable17);?>
        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_management']->value])) {
echo "1";
}
$_prefixVariable18=ob_get_clean();
$_smarty_tpl->_assignInScope('access_link_management', $_prefixVariable18);?>
        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_page_seo_info']->value])) {
echo "1";
}
$_prefixVariable19=ob_get_clean();
$_smarty_tpl->_assignInScope('access_page_seo_info', $_prefixVariable19);?>
        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_seo_redirect']->value])) {
echo "1";
}
$_prefixVariable20=ob_get_clean();
$_smarty_tpl->_assignInScope('access_seo_redirect', $_prefixVariable20);?>
        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_seo_sitemap']->value])) {
echo "1";
}
$_prefixVariable21=ob_get_clean();
$_smarty_tpl->_assignInScope('access_seo_sitemap', $_prefixVariable21);?>
        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_seo_setting']->value])) {
echo "1";
}
$_prefixVariable22=ob_get_clean();
$_smarty_tpl->_assignInScope('access_seo_setting', $_prefixVariable22);?>
        
        		<?php ob_start();
echo ADMIN_PATH;
$_prefixVariable23=ob_get_clean();
$_smarty_tpl->_assignInScope('link_author_add', $_prefixVariable23."/author/add");?>
		<?php ob_start();
echo ADMIN_PATH;
$_prefixVariable24=ob_get_clean();
$_smarty_tpl->_assignInScope('link_author', $_prefixVariable24."/author");?>

		<?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_author_add']->value])) {
echo "1";
}
$_prefixVariable25=ob_get_clean();
$_smarty_tpl->_assignInScope('access_author_add', $_prefixVariable25);?>
		<?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_author']->value])) {
echo "1";
}
$_prefixVariable26=ob_get_clean();
$_smarty_tpl->_assignInScope('access_author', $_prefixVariable26);?>
        
		<?php if ($_smarty_tpl->tpl_vars['access_article_add']->value || $_smarty_tpl->tpl_vars['access_article']->value || $_smarty_tpl->tpl_vars['access_category_article']->value || $_smarty_tpl->tpl_vars['access_media']->value) {?>
			<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
				<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
						    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						        <rect x="0" y="0" width="24" height="24"/>
						        <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5"/>
						        <path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L12.5,10 C13.3284271,10 14,10.6715729 14,11.5 C14,12.3284271 13.3284271,13 12.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3"/>
						    </g>
						</svg>
					</span>
					<span class="kt-menu__link-text">
						<?php echo __d('admin','bai_viet');?>

					</span>
					<i class="kt-menu__ver-arrow la la-angle-right"></i>
				</a>

				<div class="kt-menu__submenu kt-menu__submenu--classic  kt-menu__submenu--right">
					<ul class="kt-menu__subnav">
						            			<?php if ($_smarty_tpl->tpl_vars['access_article']->value || $_smarty_tpl->tpl_vars['access_article_add']->value || $_smarty_tpl->tpl_vars['access_category_article']->value) {?>
							<li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
								<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon">
		                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										        <rect x="0" y="0" width="24" height="24"/>
										        <rect fill="#000000" opacity="0.3" x="4" y="5" width="16" height="2" rx="1"/>
										        <rect fill="#000000" opacity="0.3" x="4" y="13" width="16" height="2" rx="1"/>
										        <path d="M5,9 L13,9 C13.5522847,9 14,9.44771525 14,10 C14,10.5522847 13.5522847,11 13,11 L5,11 C4.44771525,11 4,10.5522847 4,10 C4,9.44771525 4.44771525,9 5,9 Z M5,17 L13,17 C13.5522847,17 14,17.4477153 14,18 C14,18.5522847 13.5522847,19 13,19 L5,19 C4.44771525,19 4,18.5522847 4,18 C4,17.4477153 4.44771525,17 5,17 Z" fill="#000000"/>
										    </g>
										</svg>
		                            </span>

									<span class="kt-menu__link-text">
										<?php echo __d('admin','bai_viet');?>

									</span>
									<i class="kt-menu__hor-arrow la la-angle-right"></i>
								</a>

								<div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
									<ul class="kt-menu__subnav">
										<?php if ($_smarty_tpl->tpl_vars['access_article']->value) {?>
											<li class="kt-menu__item" aria-haspopup="true">
												<a href="<?php echo $_smarty_tpl->tpl_vars['link_article']->value;?>
" class="kt-menu__link" path-menu="article">
													<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
		                                                <span></span>
		                                            </i>
													<span class="kt-menu__link-text">
														<?php echo __d('admin','danh_sach');?>

													</span>
												</a>
											</li>
										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['access_article_add']->value) {?>
											<li class="kt-menu__item" aria-haspopup="true">
												<a href="<?php echo $_smarty_tpl->tpl_vars['link_article_add']->value;?>
" class="kt-menu__link" path-menu="article_add">
													<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
		                                                <span></span>
		                                            </i>
													<span class="kt-menu__link-text">
														<?php echo __d('admin','them_bai_viet');?>

													</span>
												</a>
											</li>
										<?php }?>										

										<?php if ($_smarty_tpl->tpl_vars['access_category_article']->value) {?>
											<li class="kt-menu__item" aria-haspopup="true">
												<a href="<?php echo $_smarty_tpl->tpl_vars['link_category_article']->value;?>
" class="kt-menu__link" path-menu="category_article">
													<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
		                                                <span></span>
		                                            </i>
													<span class="kt-menu__link-text">
														<?php echo __d('admin','danh_muc');?>

													</span>
												</a>
											</li>
										<?php }?>
									</ul>
								</div>
							</li>
						<?php }?>

						            			<?php if ($_smarty_tpl->tpl_vars['access_author_add']->value || $_smarty_tpl->tpl_vars['access_author']->value) {?>
							<li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
								<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon">
		                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										        <polygon points="0 0 24 0 24 24 0 24"/>
										        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
										        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
										    </g>
										</svg>
		                            </span>

									<span class="kt-menu__link-text">
										<?php echo __d('admin','tac_gia');?>

									</span>
									<i class="kt-menu__hor-arrow la la-angle-right"></i>
								</a>

								<div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
									<ul class="kt-menu__subnav">
										<?php if ($_smarty_tpl->tpl_vars['access_author']->value) {?>
											<li class="kt-menu__item" aria-haspopup="true">
												<a href="<?php echo $_smarty_tpl->tpl_vars['link_author']->value;?>
" class="kt-menu__link" path-menu="author">
													<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
		                                                <span></span>
		                                            </i>
													<span class="kt-menu__link-text">
														<?php echo __d('admin','danh_sach');?>

													</span>
												</a>
											</li>
										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['access_author_add']->value) {?>
											<li class="kt-menu__item" aria-haspopup="true">
												<a href="<?php echo $_smarty_tpl->tpl_vars['link_author_add']->value;?>
" class="kt-menu__link" path-menu="author_add">
													<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
		                                                <span></span>
		                                            </i>
													<span class="kt-menu__link-text">
														<?php echo __d('admin','them_moi');?>

													</span>
												</a>
											</li>
										<?php }?>
									</ul>
								</div>
							</li>
						<?php }?>

												<?php if ($_smarty_tpl->tpl_vars['access_media']->value) {?>
							<li class="kt-menu__item" aria-haspopup="true">
								<a href="<?php echo $_smarty_tpl->tpl_vars['link_media']->value;?>
" class="kt-menu__link" path-menu="media">
									<span class="kt-menu__link-icon">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										        <polygon points="0 0 24 0 24 24 0 24"/>
										        <rect fill="#000000" opacity="0.3" x="2" y="4" width="20" height="16" rx="2"/>
										        <polygon fill="#000000" opacity="0.3" points="4 20 10.5 11 17 20"/>
										        <polygon fill="#000000" points="11 20 15.5 14 20 20"/>
										        <circle fill="#000000" opacity="0.3" cx="18.5" cy="8.5" r="1.5"/>
										    </g>
										</svg>
									</span>
									<span class="kt-menu__link-text">
										<?php echo __d('admin','media');?>

									</span>
								</a>
							</li>
						<?php }?>

						        				<?php if ($_smarty_tpl->tpl_vars['access_tag']->value || $_smarty_tpl->tpl_vars['access_link_management']->value || $_smarty_tpl->tpl_vars['access_page_seo_info']->value || $_smarty_tpl->tpl_vars['access_seo_redirect']->value || $_smarty_tpl->tpl_vars['access_seo_setting']->value) {?>
							<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">			
								<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon">
			                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										        <rect x="0" y="0" width="24" height="24"/>
										        <circle fill="#000000" cx="6" cy="18" r="3"/>
										        <path d="M16.5,21 L13.5,21 C13.5,15.2010101 8.79898987,10.5 3,10.5 L3,7.5 C10.4558441,7.5 16.5,13.5441559 16.5,21 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
										        <path d="M22.5,21 L19.5,21 C19.5,12.163444 11.836556,4.5 3,4.5 L3,1.5 C13.4934102,1.5 22.5,10.5065898 22.5,21 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
										    </g>
										</svg>
			                        </span>			
									<span class="kt-menu__link-text">
										<?php echo __d('admin','seo');?>

									</span>
									<i class="kt-menu__hor-arrow la la-angle-right"></i>
								</a>

								<div class="kt-menu__submenu kt-menu__submenu--classic  kt-menu__submenu--right">
									<ul class="kt-menu__subnav">
			                			<?php if ($_smarty_tpl->tpl_vars['access_tag']->value) {?>
											<li class="kt-menu__item" aria-haspopup="true">
												<a href="<?php echo $_smarty_tpl->tpl_vars['link_tag']->value;?>
" class="kt-menu__link" path-menu="tag">
													<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
			                                            <span></span>
			                                        </i>
													<span class="kt-menu__link-text">
														<?php echo __d('admin','the_bai_viet');?>

													</span>
												</a>
											</li>
										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['access_link_management']->value) {?>
											<li class="kt-menu__item" aria-haspopup="true">
												<a href="<?php echo $_smarty_tpl->tpl_vars['link_management']->value;?>
" class="kt-menu__link" path-menu="link">
													<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
			                                            <span></span>
			                                        </i>
													<span class="kt-menu__link-text">
														<?php echo __d('admin','duong_dan');?>

													</span>
												</a>
											</li>
										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['access_page_seo_info']->value) {?>
											<li class="kt-menu__item" aria-haspopup="true">
												<a href="<?php echo $_smarty_tpl->tpl_vars['link_page_seo_info']->value;?>
" class="kt-menu__link" path-menu="page_seo_info">
													<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
			                                            <span></span>
			                                        </i>
													<span class="kt-menu__link-text">
														<?php echo __d('admin','thong_tin_seo');?>

													</span>
												</a> 
											</li>
										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['access_seo_redirect']->value) {?>
											<li class="kt-menu__item" aria-haspopup="true">
												<a href="<?php echo $_smarty_tpl->tpl_vars['link_seo_redirect']->value;?>
" class="kt-menu__link" path-menu="seo_redirect">
													<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
			                                            <span></span>
			                                        </i>
													<span class="kt-menu__link-text">
														<?php echo __d('admin','chuyen_huong_301');?>

													</span>
												</a>
											</li>
										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['access_seo_sitemap']->value) {?>
											<li class="kt-menu__item" aria-haspopup="true">
												<a href="<?php echo $_smarty_tpl->tpl_vars['link_seo_sitemap']->value;?>
" class="kt-menu__link" path-menu="seo_site_map">
													<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
			                                            <span></span>
			                                        </i>
													<span class="kt-menu__link-text">
														<?php echo __d('admin','sitemap');?>

													</span>
												</a>
											</li>
										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['access_seo_setting']->value) {?>
											<li class="kt-menu__item" aria-haspopup="true">
												<a href="<?php echo $_smarty_tpl->tpl_vars['link_seo_setting']->value;?>
" class="kt-menu__link" path-menu="seo_setting">
													<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
			                                            <span></span>
			                                        </i>
													<span class="kt-menu__link-text">
														<?php echo __d('admin','cai_dat');?>

													</span>
												</a>
											</li>
										<?php }?>

									</ul>
								</div>
							</li>
						<?php }?>

												<?php ob_start();
echo INTERFACE_CONFIGURATION;
$_prefixVariable27 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['addons']->value[$_prefixVariable27])) {?>
							<?php $_smarty_tpl->_assignInScope('collections', $_smarty_tpl->tpl_vars['this']->value->ExtendCollectionAdmin->getListActived());?>
							<?php if (!empty($_smarty_tpl->tpl_vars['collections']->value)) {?>
								<li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
									<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
										<span class="kt-menu__link-icon">
			                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											        <polygon points="0 0 24 0 24 24 0 24"/>
											        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
											        <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
											        <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
											    </g>
											</svg>
			                            </span>

										<span class="kt-menu__link-text">
											<?php echo __d('admin','du_lieu_mo_rong');?>

										</span>
										<i class="kt-menu__hor-arrow la la-angle-right"></i>
									</a>

									<div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
										<ul class="kt-menu__subnav">
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['collections']->value, 'collection');
$_smarty_tpl->tpl_vars['collection']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['collection']->value) {
$_smarty_tpl->tpl_vars['collection']->do_else = false;
?>
												<?php if (!empty($_smarty_tpl->tpl_vars['collection']->value['code'])) {?>
													<li class="kt-menu__item" aria-haspopup="true">
														<a href="<?php echo ADMIN_PATH;?>
/extend-data/<?php echo $_smarty_tpl->tpl_vars['collection']->value['code'];?>
" class="kt-menu__link" path-menu="extend_data_<?php echo $_smarty_tpl->tpl_vars['collection']->value['code'];?>
">
															<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
				                                                <span></span>
				                                            </i>
															<span class="kt-menu__link-text">
																<?php if (!empty($_smarty_tpl->tpl_vars['collection']->value['name'])) {?>
																	<?php echo $_smarty_tpl->tpl_vars['collection']->value['name'];?>

																<?php }?>
															</span>
														</a>
													</li>
												<?php }?>
											<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										</ul>
									</div>
								</li>
							<?php }?>
						<?php }?>
					</ul>
				</div>
			</li>
		<?php }?>


        	    <?php ob_start();
echo PRODUCT;
$_prefixVariable28 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['addons']->value[$_prefixVariable28])) {?>
	    	<?php ob_start();
echo ADMIN_PATH;
$_prefixVariable29=ob_get_clean();
$_smarty_tpl->_assignInScope('link_order_add', $_prefixVariable29."/order/add");?>
            <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable30=ob_get_clean();
$_smarty_tpl->_assignInScope('link_order', $_prefixVariable30."/order");?>
            <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable31=ob_get_clean();
$_smarty_tpl->_assignInScope('link_payment', $_prefixVariable31."/payment");?>
            <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable32=ob_get_clean();
$_smarty_tpl->_assignInScope('link_shipment', $_prefixVariable32."/shipment");?>

            <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable33=ob_get_clean();
$_smarty_tpl->_assignInScope('link_product_add', $_prefixVariable33."/product/add");?>
            <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable34=ob_get_clean();
$_smarty_tpl->_assignInScope('link_product', $_prefixVariable34."/product");?>
            <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable35=ob_get_clean();
$_smarty_tpl->_assignInScope('link_category_product', $_prefixVariable35."/category/product");?>
            <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable36=ob_get_clean();
$_smarty_tpl->_assignInScope('link_brand', $_prefixVariable36."/brand");?>

            <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable37=ob_get_clean();
$_smarty_tpl->_assignInScope('link_promotion_add', $_prefixVariable37."/promotion/add");?>
            <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable38=ob_get_clean();
$_smarty_tpl->_assignInScope('link_promotion', $_prefixVariable38."/promotion");?>
            <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable39=ob_get_clean();
$_smarty_tpl->_assignInScope('link_coupon', $_prefixVariable39."/promotion/coupon");?>

            <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable40=ob_get_clean();
$_smarty_tpl->_assignInScope('link_report', $_prefixVariable40."/report");?>

            <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable41=ob_get_clean();
$_smarty_tpl->_assignInScope('link_shop', $_prefixVariable41."/shop");?>

            <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_order_add']->value])) {
echo "1";
}
$_prefixVariable42=ob_get_clean();
$_smarty_tpl->_assignInScope('access_order_add', $_prefixVariable42);?>
            <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_order']->value])) {
echo "1";
}
$_prefixVariable43=ob_get_clean();
$_smarty_tpl->_assignInScope('access_order', $_prefixVariable43);?>
            <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_payment']->value])) {
echo "1";
}
$_prefixVariable44=ob_get_clean();
$_smarty_tpl->_assignInScope('access_payment', $_prefixVariable44);?>
            <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_shipment']->value])) {
echo "1";
}
$_prefixVariable45=ob_get_clean();
$_smarty_tpl->_assignInScope('access_shipment', $_prefixVariable45);?>

            <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_product_add']->value])) {
echo "1";
}
$_prefixVariable46=ob_get_clean();
$_smarty_tpl->_assignInScope('access_product_add', $_prefixVariable46);?>
            <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_product']->value])) {
echo "1";
}
$_prefixVariable47=ob_get_clean();
$_smarty_tpl->_assignInScope('access_product', $_prefixVariable47);?>
            <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_category_product']->value])) {
echo "1";
}
$_prefixVariable48=ob_get_clean();
$_smarty_tpl->_assignInScope('access_category_product', $_prefixVariable48);?>
            <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_brand']->value])) {
echo "1";
}
$_prefixVariable49=ob_get_clean();
$_smarty_tpl->_assignInScope('access_brand', $_prefixVariable49);?>

            <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_promotion_add']->value])) {
echo "1";
}
$_prefixVariable50=ob_get_clean();
$_smarty_tpl->_assignInScope('access_promotion_add', $_prefixVariable50);?>
            <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_promotion']->value])) {
echo "1";
}
$_prefixVariable51=ob_get_clean();
$_smarty_tpl->_assignInScope('access_promotion', $_prefixVariable51);?>
            <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_coupon']->value])) {
echo "1";
}
$_prefixVariable52=ob_get_clean();
$_smarty_tpl->_assignInScope('access_coupon', $_prefixVariable52);?>

            <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_report']->value])) {
echo "1";
}
$_prefixVariable53=ob_get_clean();
$_smarty_tpl->_assignInScope('access_report', $_prefixVariable53);?>

            <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_shop']->value])) {
echo "1";
}
$_prefixVariable54=ob_get_clean();
$_smarty_tpl->_assignInScope('access_shop', $_prefixVariable54);?>

            <?php if ($_smarty_tpl->tpl_vars['access_order_add']->value || $_smarty_tpl->tpl_vars['access_order']->value || $_smarty_tpl->tpl_vars['access_payment']->value || $_smarty_tpl->tpl_vars['access_shipment']->value || $_smarty_tpl->tpl_vars['access_product_add']->value || $_smarty_tpl->tpl_vars['access_product']->value || $_smarty_tpl->tpl_vars['access_category_product']->value || $_smarty_tpl->tpl_vars['access_brand']->value || $_smarty_tpl->tpl_vars['access_promotion_add']->value || $_smarty_tpl->tpl_vars['access_promotion']->value || $_smarty_tpl->tpl_vars['link_coupon']->value || $_smarty_tpl->tpl_vars['access_report']->value || $_smarty_tpl->tpl_vars['access_shop']->value) {?>

            	<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
				
					<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
						<span class="kt-menu__link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"></rect>
									<path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000"></path>
									<path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3"></path>
								</g>
							</svg>
                        </span>			
						<span class="kt-menu__link-text">
							<?php echo __d('admin','ban_hang');?>

						</span>
						<i class="kt-menu__ver-arrow la la-angle-right"></i>
					</a>

					<div class="kt-menu__submenu kt-menu__submenu--classic  kt-menu__submenu--right">
						<ul class="kt-menu__subnav">
							                			<?php if ($_smarty_tpl->tpl_vars['access_product_add']->value || $_smarty_tpl->tpl_vars['access_product']->value || $_smarty_tpl->tpl_vars['access_category_product']->value || $_smarty_tpl->tpl_vars['access_brand']->value) {?>
								<li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
									<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
										<span class="kt-menu__link-icon">
			                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											        <rect x="0" y="0" width="24" height="24"/>
											        <path d="M20.4061385,6.73606154 C20.7672665,6.89656288 21,7.25468437 21,7.64987309 L21,16.4115967 C21,16.7747638 20.8031081,17.1093844 20.4856429,17.2857539 L12.4856429,21.7301984 C12.1836204,21.8979887 11.8163796,21.8979887 11.5143571,21.7301984 L3.51435707,17.2857539 C3.19689188,17.1093844 3,16.7747638 3,16.4115967 L3,7.64987309 C3,7.25468437 3.23273352,6.89656288 3.59386153,6.73606154 L11.5938615,3.18050598 C11.8524269,3.06558805 12.1475731,3.06558805 12.4061385,3.18050598 L20.4061385,6.73606154 Z" fill="#000000" opacity="0.3"/>
											        <polygon fill="#000000" points="14.9671522 4.22441676 7.5999999 8.31727912 7.5999999 12.9056825 9.5999999 13.9056825 9.5999999 9.49408582 17.25507 5.24126912"/>
											    </g>
											</svg>
			                            </span>

										<span class="kt-menu__link-text">
											<?php echo __d('admin','san_pham');?>

										</span>
										<i class="kt-menu__hor-arrow la la-angle-right"></i>
									</a>

									<div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
										<ul class="kt-menu__subnav">
											<?php if ($_smarty_tpl->tpl_vars['access_product']->value) {?>
												<li class="kt-menu__item" aria-haspopup="true">
													<a href="<?php echo $_smarty_tpl->tpl_vars['link_product']->value;?>
" class="kt-menu__link" path-menu="product">
														<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
			                                                <span></span>
			                                            </i>
														<span class="kt-menu__link-text">
															<?php echo __d('admin','danh_sach');?>

														</span>
													</a>
												</li>
											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['access_product_add']->value) {?>
												<li class="kt-menu__item" aria-haspopup="true">
													<a href="<?php echo $_smarty_tpl->tpl_vars['link_product_add']->value;?>
" class="kt-menu__link" path-menu="product_add">
														<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
			                                                <span></span>
			                                            </i>
														<span class="kt-menu__link-text">
															<?php echo __d('admin','them_san_pham');?>

														</span>
													</a>
												</li>
											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['access_category_product']->value) {?>
												<li class="kt-menu__item" aria-haspopup="true">
													<a href="<?php echo $_smarty_tpl->tpl_vars['link_category_product']->value;?>
" class="kt-menu__link" path-menu="category_product">
														<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
			                                                <span></span>
			                                            </i>
														<span class="kt-menu__link-text">
															<?php echo __d('admin','danh_muc');?>

														</span>
													</a>
												</li>
											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['access_brand']->value) {?>
												<li class="kt-menu__item" aria-haspopup="true">
													<a href="<?php echo $_smarty_tpl->tpl_vars['link_brand']->value;?>
" class="kt-menu__link" path-menu="brand">
														<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
			                                                <span></span>
			                                            </i>
														<span class="kt-menu__link-text">
															<?php echo __d('admin','thuong_hieu');?>

														</span>
													</a>
												</li>
											<?php }?>
										</ul>
									</div>
								</li>
							<?php }?>

														<?php ob_start();
echo ORDER;
$_prefixVariable55 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['addons']->value[$_prefixVariable55])) {?>
	                			<?php if ($_smarty_tpl->tpl_vars['access_order_add']->value || $_smarty_tpl->tpl_vars['access_order']->value || $_smarty_tpl->tpl_vars['access_shipment']->value) {?>
	                				<li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
										<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
											<span class="kt-menu__link-icon">
				                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												        <rect x="0" y="0" width="24" height="24"/>
												        <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
												        <path d="M3.28077641,9 L20.7192236,9 C21.2715083,9 21.7192236,9.44771525 21.7192236,10 C21.7192236,10.0817618 21.7091962,10.163215 21.6893661,10.2425356 L19.5680983,18.7276069 C19.234223,20.0631079 18.0342737,21 16.6576708,21 L7.34232922,21 C5.96572629,21 4.76577697,20.0631079 4.43190172,18.7276069 L2.31063391,10.2425356 C2.17668518,9.70674072 2.50244587,9.16380623 3.03824078,9.0298575 C3.11756139,9.01002735 3.1990146,9 3.28077641,9 Z M12,12 C11.4477153,12 11,12.4477153 11,13 L11,17 C11,17.5522847 11.4477153,18 12,18 C12.5522847,18 13,17.5522847 13,17 L13,13 C13,12.4477153 12.5522847,12 12,12 Z M6.96472382,12.1362967 C6.43125772,12.2792385 6.11467523,12.8275755 6.25761704,13.3610416 L7.29289322,17.2247449 C7.43583503,17.758211 7.98417199,18.0747935 8.51763809,17.9318517 C9.05110419,17.7889098 9.36768668,17.2405729 9.22474487,16.7071068 L8.18946869,12.8434035 C8.04652688,12.3099374 7.49818992,11.9933549 6.96472382,12.1362967 Z M17.0352762,12.1362967 C16.5018101,11.9933549 15.9534731,12.3099374 15.8105313,12.8434035 L14.7752551,16.7071068 C14.6323133,17.2405729 14.9488958,17.7889098 15.4823619,17.9318517 C16.015828,18.0747935 16.564165,17.758211 16.7071068,17.2247449 L17.742383,13.3610416 C17.8853248,12.8275755 17.5687423,12.2792385 17.0352762,12.1362967 Z" fill="#000000"/>
												    </g>
												</svg>
				                            </span>

											<span class="kt-menu__link-text">
												<?php echo __d('admin','don_hang');?>

											</span>
											<i class="kt-menu__hor-arrow la la-angle-right"></i>
										</a>

										<div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
											<ul class="kt-menu__subnav">
												<?php if ($_smarty_tpl->tpl_vars['access_order']->value) {?>
													<li class="kt-menu__item" aria-haspopup="true">
														<a href="<?php echo $_smarty_tpl->tpl_vars['link_order']->value;?>
" class="kt-menu__link" path-menu="order">
															<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
				                                                <span></span>
				                                            </i>
															<span class="kt-menu__link-text">
																<?php echo __d('admin','danh_sach');?>

															</span>
														</a>
													</li>
												<?php }?>

												<?php if ($_smarty_tpl->tpl_vars['access_order_add']->value) {?>
													<li class="kt-menu__item" aria-haspopup="true">
														<a href="<?php echo $_smarty_tpl->tpl_vars['link_order_add']->value;?>
" class="kt-menu__link" path-menu="order_add">
															<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
				                                                <span></span>
				                                            </i>
															<span class="kt-menu__link-text">
																<?php echo __d('admin','tao_don_moi');?>

															</span>
														</a>
													</li>
												<?php }?>											

												<?php if ($_smarty_tpl->tpl_vars['access_shipment']->value) {?>
													<li class="kt-menu__item" aria-haspopup="true">
														<a href="<?php echo $_smarty_tpl->tpl_vars['link_shipment']->value;?>
" class="kt-menu__link" path-menu="shipment">
															<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
				                                                <span></span>
				                                            </i>
															<span class="kt-menu__link-text">
																<?php echo __d('admin','van_don');?>

															</span>
														</a>
													</li>
												<?php }?>
											</ul>
										</div>
									</li>
								<?php }?>

									                			<?php if ($_smarty_tpl->tpl_vars['access_payment']->value) {?>
									<li class="kt-menu__item" aria-haspopup="true">
										<a href="<?php echo $_smarty_tpl->tpl_vars['link_payment']->value;?>
" class="kt-menu__link" path-menu="payment">
											<span class="kt-menu__link-icon">
				                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												        <rect x="0" y="0" width="24" height="24"/>
												        <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
												        <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
												    </g>
												</svg>
				                            </span>
											<span class="kt-menu__link-text">
												<?php echo __d('admin','giao_dich');?>

											</span>
										</a>
									</li>
								<?php }?>
							<?php }?>

							                			<?php ob_start();
echo PROMOTION;
$_prefixVariable56 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['addons']->value[$_prefixVariable56])) {?>
                				<?php if ($_smarty_tpl->tpl_vars['access_promotion_add']->value || $_smarty_tpl->tpl_vars['access_promotion']->value || $_smarty_tpl->tpl_vars['access_coupon']->value) {?>
                					<li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
										<a href="javascript:;" class="kt-menu__link kt-menu__toggle" path-menu="promotion">
											<span class="kt-menu__link-icon">
			                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												        <rect x="0" y="0" width="24" height="24"/>
												        <path d="M4,6 L20,6 C20.5522847,6 21,6.44771525 21,7 L21,8 C21,8.55228475 20.5522847,9 20,9 L4,9 C3.44771525,9 3,8.55228475 3,8 L3,7 C3,6.44771525 3.44771525,6 4,6 Z M5,11 L10,11 C10.5522847,11 11,11.4477153 11,12 L11,19 C11,19.5522847 10.5522847,20 10,20 L5,20 C4.44771525,20 4,19.5522847 4,19 L4,12 C4,11.4477153 4.44771525,11 5,11 Z M14,11 L19,11 C19.5522847,11 20,11.4477153 20,12 L20,19 C20,19.5522847 19.5522847,20 19,20 L14,20 C13.4477153,20 13,19.5522847 13,19 L13,12 C13,11.4477153 13.4477153,11 14,11 Z" fill="#000000"/>
												        <path d="M14.4452998,2.16794971 C14.9048285,1.86159725 15.5256978,1.98577112 15.8320503,2.4452998 C16.1384028,2.90482849 16.0142289,3.52569784 15.5547002,3.83205029 L12,6.20185043 L8.4452998,3.83205029 C7.98577112,3.52569784 7.86159725,2.90482849 8.16794971,2.4452998 C8.47430216,1.98577112 9.09517151,1.86159725 9.5547002,2.16794971 L12,3.79814957 L14.4452998,2.16794971 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
												    </g>
												</svg>
			                                </span>

											<span class="kt-menu__link-text">
												<?php echo __d('admin','khuyen_mai');?>

											</span>
											<i class="kt-menu__hor-arrow la la-angle-right"></i>
										</a>

										<div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
											<ul class="kt-menu__subnav">
												<?php if ($_smarty_tpl->tpl_vars['access_promotion']->value) {?>
													<li class="kt-menu__item" aria-haspopup="true">
														<a href="<?php echo $_smarty_tpl->tpl_vars['link_promotion']->value;?>
" class="kt-menu__link" path-menu="promotion">
															<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
				                                                <span></span>
				                                            </i>
															<span class="kt-menu__link-text">
																<?php echo __d('admin','danh_sach');?>

															</span>
														</a>
													</li>
												<?php }?>

												<?php if ($_smarty_tpl->tpl_vars['access_promotion_add']->value) {?>
													<li class="kt-menu__item" aria-haspopup="true">
														<a href="<?php echo $_smarty_tpl->tpl_vars['link_promotion_add']->value;?>
" class="kt-menu__link" path-menu="promotion_add">
															<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
				                                                <span></span>
				                                            </i>
															<span class="kt-menu__link-text">
																<?php echo __d('admin','them_khuyen_mai');?>

															</span>
														</a>
													</li>
												<?php }?>												

												<?php if ($_smarty_tpl->tpl_vars['access_coupon']->value) {?>
													<li class="kt-menu__item" aria-haspopup="true">
														<a href="<?php echo $_smarty_tpl->tpl_vars['link_coupon']->value;?>
" class="kt-menu__link" path-menu="coupon">
															<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
				                                                <span></span>
				                                            </i>
															<span class="kt-menu__link-text">
																<?php echo __d('admin','ma_coupon');?>

															</span>
														</a>
													</li>
												<?php }?>
											</ul>
										</div>
									</li>
                				<?php }?>
                			<?php }?>

                			<?php ob_start();
echo SHOP;
$_prefixVariable57 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['addons']->value[$_prefixVariable57]) && $_smarty_tpl->tpl_vars['access_shop']->value) {?>
                				<li class="kt-menu__item" aria-haspopup="true">
									<a href="<?php echo $_smarty_tpl->tpl_vars['link_shop']->value;?>
" class="kt-menu__link" path-menu="shop">
										<span class="kt-menu__link-icon">
			                                <i class="fa fa-store"></i>
			                            </span>
										<span class="kt-menu__link-text">
											<?php echo __d('admin','cua_hang');?>

										</span>
									</a>
								</li>
                			<?php }?>

                			                			<?php ob_start();
echo REPORT;
$_prefixVariable58 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['addons']->value[$_prefixVariable58])) {?>
	                			<?php if ($_smarty_tpl->tpl_vars['access_report']->value) {?>
	                				<li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
										<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
											<span class="kt-menu__link-icon">
				                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												        <rect x="0" y="0" width="24" height="24"/>
												        <path d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z" fill="#000000" opacity="0.3"/>
												        <path d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z" fill="#000000"/>
												    </g>
												</svg>
				                            </span>

											<span class="kt-menu__link-text">
												<?php echo __d('admin','bao_cao');?>

											</span>
											<i class="kt-menu__hor-arrow la la-angle-right"></i>
										</a>

										<div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
											<ul class="kt-menu__subnav">
												<li class="kt-menu__item" aria-haspopup="true">
													<a href="<?php echo ADMIN_PATH;?>
/report" class="kt-menu__link" path-menu="report">
														<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
			                                                <span></span>
			                                            </i>
														<span class="kt-menu__link-text">
															<?php echo __d('admin','tong_quan');?>

														</span>
													</a>
												</li>

												<li class="kt-menu__item" aria-haspopup="true">
													<a href="<?php echo ADMIN_PATH;?>
/report/revenue" class="kt-menu__link" path-menu="report_revenue">
														<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
			                                                <span></span>
			                                            </i>
														<span class="kt-menu__link-text">
															<?php echo __d('admin','theo_thoi_gian');?>

														</span>
													</a>
												</li>

												<li class="kt-menu__item" aria-haspopup="true">
													<a href="<?php echo ADMIN_PATH;?>
/report/product" class="kt-menu__link" path-menu="report_product">
														<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
			                                                <span></span>
			                                            </i>
														<span class="kt-menu__link-text">
															<?php echo __d('admin','theo_san_pham');?>

														</span>
													</a>
												</li>

												<li class="kt-menu__item" aria-haspopup="true">
													<a href="<?php echo ADMIN_PATH;?>
/report/staff" class="kt-menu__link" path-menu="report_staff">
														<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
			                                                <span></span>
			                                            </i>
														<span class="kt-menu__link-text">
															<?php echo __d('admin','theo_nhan_vien');?>

														</span>
													</a>
												</li>

												<li class="kt-menu__item" aria-haspopup="true">
													<a href="<?php echo ADMIN_PATH;?>
/report/city" class="kt-menu__link" path-menu="report_city">
														<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
			                                                <span></span>
			                                            </i>
														<span class="kt-menu__link-text">
															<?php echo __d('admin','theo_tinh_thanh');?>

														</span>
													</a>
												</li>

												<li class="kt-menu__item" aria-haspopup="true">
													<a href="<?php echo ADMIN_PATH;?>
/report/source" class="kt-menu__link"  path-menu="report_source">
														<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
			                                                <span></span>
			                                            </i>
														<span class="kt-menu__link-text">
															<?php echo __d('admin','theo_nguon_don_hang');?>

														</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
	                			<?php }?>
	                		<?php }?>	                		
						</ul>
					</div>
				</li>
            <?php }?>
	    <?php }?>




	            <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable59=ob_get_clean();
$_smarty_tpl->_assignInScope('link_customer', $_prefixVariable59."/customer");?>        
        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable60=ob_get_clean();
$_smarty_tpl->_assignInScope('link_comment', $_prefixVariable60."/comment");?>
        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable61=ob_get_clean();
$_smarty_tpl->_assignInScope('link_contact', $_prefixVariable61."/contact");?>
        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable62=ob_get_clean();
$_smarty_tpl->_assignInScope('link_point', $_prefixVariable62."/customer/point");?>
        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable63=ob_get_clean();
$_smarty_tpl->_assignInScope('link_point_history', $_prefixVariable63."/customer/point-history");?>

        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable64=ob_get_clean();
$_smarty_tpl->_assignInScope('link_affiliate', $_prefixVariable64."/customer/affiliate");?>
        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable65=ob_get_clean();
$_smarty_tpl->_assignInScope('link_affiliate_statistical', $_prefixVariable65."/customer/affiliate/statistical");?>
        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable66=ob_get_clean();
$_smarty_tpl->_assignInScope('link_affiliate_request', $_prefixVariable66."/customer/affiliate/request");?>
        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable67=ob_get_clean();
$_smarty_tpl->_assignInScope('link_affiliate_point_tomoney', $_prefixVariable67."/customer/point-tomoney");?>
        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable68=ob_get_clean();
$_smarty_tpl->_assignInScope('link_affiliate_order', $_prefixVariable68."/customer/affiliate/order");?>

        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable69=ob_get_clean();
$_smarty_tpl->_assignInScope('link_notification', $_prefixVariable69."/notification");?>
        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable70=ob_get_clean();
$_smarty_tpl->_assignInScope('link_notification_add', $_prefixVariable70."/notification/add");?>
        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable71=ob_get_clean();
$_smarty_tpl->_assignInScope('link_notification_sent', $_prefixVariable71."/notification/sent");?>
        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable72=ob_get_clean();
$_smarty_tpl->_assignInScope('link_notification_subscribe', $_prefixVariable72."/notification/subscribe");?>

        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_customer']->value])) {
echo "1";
}
$_prefixVariable73=ob_get_clean();
$_smarty_tpl->_assignInScope('access_customer', $_prefixVariable73);?>
        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_comment']->value])) {
echo "1";
}
$_prefixVariable74=ob_get_clean();
$_smarty_tpl->_assignInScope('access_comment', $_prefixVariable74);?>
        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_contact']->value])) {
echo "1";
}
$_prefixVariable75=ob_get_clean();
$_smarty_tpl->_assignInScope('access_contact', $_prefixVariable75);?>
        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_point']->value])) {
echo "1";
}
$_prefixVariable76=ob_get_clean();
$_smarty_tpl->_assignInScope('access_point', $_prefixVariable76);?>
        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_point_history']->value])) {
echo "1";
}
$_prefixVariable77=ob_get_clean();
$_smarty_tpl->_assignInScope('access_point_history', $_prefixVariable77);?>

        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_affiliate']->value])) {
echo "1";
}
$_prefixVariable78=ob_get_clean();
$_smarty_tpl->_assignInScope('access_affiliate', $_prefixVariable78);?>
        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_affiliate_statistical']->value])) {
echo "1";
}
$_prefixVariable79=ob_get_clean();
$_smarty_tpl->_assignInScope('access_affiliate_statistical', $_prefixVariable79);?>
        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_affiliate_request']->value])) {
echo "1";
}
$_prefixVariable80=ob_get_clean();
$_smarty_tpl->_assignInScope('access_affiliate_request', $_prefixVariable80);?>
        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_affiliate_point_tomoney']->value])) {
echo "1";
}
$_prefixVariable81=ob_get_clean();
$_smarty_tpl->_assignInScope('access_affiliate_point_tomoney', $_prefixVariable81);?>
        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_affiliate_order']->value])) {
echo "1";
}
$_prefixVariable82=ob_get_clean();
$_smarty_tpl->_assignInScope('access_affiliate_order', $_prefixVariable82);?>

        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_notification']->value])) {
echo "1";
}
$_prefixVariable83=ob_get_clean();
$_smarty_tpl->_assignInScope('access_notification', $_prefixVariable83);?>
        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_notification_add']->value])) {
echo "1";
}
$_prefixVariable84=ob_get_clean();
$_smarty_tpl->_assignInScope('access_notification_add', $_prefixVariable84);?>
        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_notification_sent']->value])) {
echo "1";
}
$_prefixVariable85=ob_get_clean();
$_smarty_tpl->_assignInScope('access_notification_sent', $_prefixVariable85);?>
        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_notification_subscribe']->value])) {
echo "1";
}
$_prefixVariable86=ob_get_clean();
$_smarty_tpl->_assignInScope('access_notification_subscribe', $_prefixVariable86);?>

        <?php ob_start();
echo CUSTOMER;
$_prefixVariable87 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['addons']->value[$_prefixVariable87])) {?>
	        <?php if ($_smarty_tpl->tpl_vars['access_customer']->value || $_smarty_tpl->tpl_vars['access_comment']->value || $_smarty_tpl->tpl_vars['access_contact']->value || $_smarty_tpl->tpl_vars['access_point']->value || $_smarty_tpl->tpl_vars['access_point_history']->value || $_smarty_tpl->tpl_vars['access_affiliate']->value || $_smarty_tpl->tpl_vars['access_affiliate_order']->value || $_smarty_tpl->tpl_vars['access_affiliate_statistical']->value || $_smarty_tpl->tpl_vars['access_affiliate_point_tomoney']->value || $_smarty_tpl->tpl_vars['access_affiliate_request']->value || $_smarty_tpl->tpl_vars['access_notification']->value || $_smarty_tpl->tpl_vars['access_notification_add']->value || $_smarty_tpl->tpl_vars['access_notification_sent']->value || $_smarty_tpl->tpl_vars['access_notification_subscribe']->value) {?>
	        	<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
					
					<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
						<span class="kt-menu__link-icon">
	                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
							    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <polygon points="0 0 24 0 24 24 0 24"/>
							        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
							        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
							    </g>
							</svg>
	                    </span>

						<span class="kt-menu__link-text">
							<?php echo __d('admin','khach_hang');?>

						</span>
						<i class="kt-menu__ver-arrow la la-angle-right"></i>
					</a>

					<div class="kt-menu__submenu kt-menu__submenu--classic  kt-menu__submenu--right">
						<ul class="kt-menu__subnav">
								        				<?php if ($_smarty_tpl->tpl_vars['access_customer']->value) {?>
								<li class="kt-menu__item" aria-haspopup="true">
									<a href="<?php echo $_smarty_tpl->tpl_vars['link_customer']->value;?>
" class="kt-menu__link" path-menu="customer">
										<span class="kt-menu__link-icon">
			                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											        <polygon points="0 0 24 0 24 24 0 24"/>
											        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
											        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
											    </g>
											</svg>
			                            </span>
										<span class="kt-menu__link-text">
											<?php echo __d('admin','khach_hang');?>

										</span>
									</a>
								</li>
							<?php }?>

								            			<?php if ($_smarty_tpl->tpl_vars['access_comment']->value) {?>
								<li class="kt-menu__item" aria-haspopup="true">
									<a href="<?php echo $_smarty_tpl->tpl_vars['link_comment']->value;?>
" class="kt-menu__link" path-menu="comment">
										<span class="kt-menu__link-icon">
				                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											        <rect x="0" y="0" width="24" height="24"/>
											        <path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
											        <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000"/>
											    </g>
											</svg>
				                        </span>

										<span class="kt-menu__link-text">
											<?php echo __d('admin','binh_luan_danh_gia');?>

										</span>
									</a>
								</li>
							<?php }?>

								            			<?php if ($_smarty_tpl->tpl_vars['access_contact']->value) {?>
								<li class="kt-menu__item" aria-haspopup="true">
									<a href="<?php echo $_smarty_tpl->tpl_vars['link_contact']->value;?>
" class="kt-menu__link" path-menu="contact">
										<span class="kt-menu__link-icon">
				                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											        <rect x="0" y="0" width="24" height="24"/>
											        <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"/>
											        <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"/>
											    </g>
											</svg>
				                        </span>

										<span class="kt-menu__link-text">
											<?php echo __d('admin','lien_he');?>

										</span>
									</a>
								</li>
							<?php }?>

											            <?php ob_start();
echo POINT;
$_prefixVariable88 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['addons']->value[$_prefixVariable88])) {?>
				                <?php if ($_smarty_tpl->tpl_vars['access_point']->value || $_smarty_tpl->tpl_vars['access_point_history']->value) {?>
									<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">			
										<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
											<span class="kt-menu__link-icon">
					                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												        <rect x="0" y="0" width="24" height="24"/>
												        <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5"/>
												        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) " x="3" y="3" width="18" height="7" rx="1"/>
												        <path d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z" fill="#000000"/>
												    </g>
												</svg>
					                        </span>			
											<span class="kt-menu__link-text">
												<?php echo __d('admin','diem_khach_hang');?>

											</span>
											<i class="kt-menu__hor-arrow la la-angle-right"></i>
										</a>

										<div class="kt-menu__submenu kt-menu__submenu--classic  kt-menu__submenu--right">
											<ul class="kt-menu__subnav">
					                			<?php if ($_smarty_tpl->tpl_vars['access_point']->value) {?>
													<li class="kt-menu__item" aria-haspopup="true">
														<a href="<?php echo $_smarty_tpl->tpl_vars['link_point']->value;?>
" class="kt-menu__link" path-menu="customers_point">
															<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
				                                                <span></span>
				                                            </i>
															<span class="kt-menu__link-text">
																<?php echo __d('admin','diem_khach_hang');?>

															</span>
														</a>
													</li>
												<?php }?>

												<?php if ($_smarty_tpl->tpl_vars['access_point_history']->value) {?>
													<li class="kt-menu__item" aria-haspopup="true">
														<a href="<?php echo $_smarty_tpl->tpl_vars['link_point_history']->value;?>
" class="kt-menu__link" path-menu="customers_point_history">
															<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
				                                                <span></span>
				                                            </i>
															<span class="kt-menu__link-text">
																<?php echo __d('admin','su_dung_diem');?>

															</span>
														</a>
													</li>
												<?php }?>
											</ul>
										</div>
									</li>
								<?php }?>
							<?php }?>

								            			<?php ob_start();
echo AFFILIATE;
$_prefixVariable89 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['addons']->value[$_prefixVariable89])) {?>
	            				<?php if ($_smarty_tpl->tpl_vars['access_affiliate_statistical']->value || $_smarty_tpl->tpl_vars['access_affiliate']->value || $_smarty_tpl->tpl_vars['access_affiliate_order']->value || $_smarty_tpl->tpl_vars['access_affiliate_request']->value || $_smarty_tpl->tpl_vars['access_affiliate_point_tomoney']->value) {?>
									<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">			
										<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
											<span class="kt-menu__link-icon">
					                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"></rect>
														<path d="M15.1231569,19.0111815 L7.83785094,14.818972 C8.31992102,14.3336937 8.67836566,13.7254559 8.86199856,13.0454449 L16.0980947,17.246999 C15.6352738,17.7346932 15.2940944,18.3389541 15.1231569,19.0111815 Z M7.75585639,9.10080708 L15.0774983,4.78750147 C15.2169157,5.48579221 15.5381369,6.11848298 15.9897205,6.63413231 L8.86499752,10.9657252 C8.67212677,10.2431476 8.28201274,9.60110795 7.75585639,9.10080708 Z" fill="#000000" fill-rule="nonzero"></path>
														<circle fill="#000000" opacity="0.3" cx="19" cy="4" r="3"></circle>
														<circle fill="#000000" opacity="0.3" cx="19" cy="20" r="3"></circle>
														<circle fill="#000000" opacity="0.3" cx="5" cy="12" r="3"></circle>
													</g>
												</svg>
					                        </span>
											<span class="kt-menu__link-text">
												<?php echo __d('admin','affiliate');?>

											</span>
											<i class="kt-menu__hor-arrow la la-angle-right"></i>
										</a>

										<div class="kt-menu__submenu kt-menu__submenu--classic  kt-menu__submenu--right">
											<ul class="kt-menu__subnav">
					                			<?php if ($_smarty_tpl->tpl_vars['access_affiliate_statistical']->value) {?>
													<li class="kt-menu__item" aria-haspopup="true">
														<a href="<?php echo $_smarty_tpl->tpl_vars['link_affiliate_statistical']->value;?>
" class="kt-menu__link" path-menu="affiliate_statistical">
															<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
					                                            <span></span>
					                                        </i>
															<span class="kt-menu__link-text">
																<?php echo __d('admin','thong_ke');?>

															</span>
														</a>
													</li>
												<?php }?>

												<?php if ($_smarty_tpl->tpl_vars['access_affiliate']->value) {?>
													<li class="kt-menu__item" aria-haspopup="true">
														<a href="<?php echo $_smarty_tpl->tpl_vars['link_affiliate']->value;?>
" class="kt-menu__link" path-menu="affiliate">
															<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
					                                            <span></span>
					                                        </i>
															<span class="kt-menu__link-text">
																<?php echo __d('admin','danh_sach_doi_tac');?>

															</span>
														</a>
													</li>
												<?php }?>

												<?php if ($_smarty_tpl->tpl_vars['access_affiliate_order']->value) {?>
													<li class="kt-menu__item" aria-haspopup="true">
														<a href="<?php echo $_smarty_tpl->tpl_vars['link_affiliate_order']->value;?>
" class="kt-menu__link" path-menu="affiliate_order">
															<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
					                                            <span></span>
					                                        </i>
															<span class="kt-menu__link-text">
																<?php echo __d('admin','don_hang_doi_tac');?>

															</span>
														</a>
													</li>
												<?php }?>

												<?php if ($_smarty_tpl->tpl_vars['access_affiliate_request']->value) {?>
													<li class="kt-menu__item" aria-haspopup="true">
														<a href="<?php echo $_smarty_tpl->tpl_vars['link_affiliate_request']->value;?>
" class="kt-menu__link" path-menu="affiliate_request">
															<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
					                                            <span></span>
					                                        </i>
															<span class="kt-menu__link-text">
																<?php echo __d('admin','yeu_cau_hop_tac');?>

															</span>
														</a>
													</li>
												<?php }?>

												<?php if ($_smarty_tpl->tpl_vars['access_affiliate_point_tomoney']->value) {?>
													<li class="kt-menu__item" aria-haspopup="true">
														<a href="<?php echo $_smarty_tpl->tpl_vars['link_affiliate_point_tomoney']->value;?>
" class="kt-menu__link" path-menu="customer_tomoney">
															<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
					                                            <span></span>
					                                        </i>
															<span class="kt-menu__link-text">
																<?php echo __d('admin','yeu_cau_rut_tien');?>

															</span>
														</a>
													</li>
												<?php }?>
											</ul>
										</div>
									</li>
								<?php }?>
	            			<?php }?>						

												        <?php ob_start();
echo NOTIFICATION;
$_prefixVariable90 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['addons']->value[$_prefixVariable90])) {?>
					            <?php if ($_smarty_tpl->tpl_vars['access_notification']->value || $_smarty_tpl->tpl_vars['access_notification_add']->value || $_smarty_tpl->tpl_vars['access_notification_sent']->value || $_smarty_tpl->tpl_vars['access_notification_subscribe']->value) {?>
					            	<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">			
										<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
											<span class="kt-menu__link-icon">
					                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												        <path d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z" fill="#000000"/>
												        <rect fill="#000000" opacity="0.3" x="10" y="16" width="4" height="4" rx="2"/>
												    </g>
												</svg>
					                        </span>	
											<span class="kt-menu__link-text">
												<?php echo __d('admin','thong_bao');?>

											</span>
											<i class="kt-menu__hor-arrow la la-angle-right"></i>
										</a>

										<div class="kt-menu__submenu kt-menu__submenu--classic  kt-menu__submenu--right">
											<ul class="kt-menu__subnav">
					                			<?php if ($_smarty_tpl->tpl_vars['access_notification']->value) {?>
													<li class="kt-menu__item" aria-haspopup="true">
														<a href="<?php echo $_smarty_tpl->tpl_vars['link_notification']->value;?>
" class="kt-menu__link" path-menu="notification">
															<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
					                                            <span></span>
					                                        </i>
															<span class="kt-menu__link-text">
																<?php echo __d('admin','danh_sach');?>

															</span>
														</a>
													</li>
												<?php }?>

												<?php if ($_smarty_tpl->tpl_vars['access_notification_add']->value) {?>
													<li class="kt-menu__item" aria-haspopup="true">
														<a href="<?php echo $_smarty_tpl->tpl_vars['link_notification_add']->value;?>
" class="kt-menu__link" path-menu="notification_add">
															<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
					                                            <span></span>
					                                        </i>
															<span class="kt-menu__link-text">
																<?php echo __d('admin','tao_thong_bao_moi');?>

															</span>
														</a>
													</li>
												<?php }?>

												<?php if ($_smarty_tpl->tpl_vars['access_notification_subscribe']->value) {?>
													<li class="kt-menu__item" aria-haspopup="true">
														<a href="<?php echo $_smarty_tpl->tpl_vars['link_notification_subscribe']->value;?>
" class="kt-menu__link" path-menu="notification_subscribe">
															<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
					                                            <span></span>
					                                        </i>
															<span class="kt-menu__link-text">
																<?php echo __d('admin','danh_sach_thiet_bi');?>

															</span>
														</a>
													</li>
												<?php }?>

												<?php if ($_smarty_tpl->tpl_vars['access_notification_sent']->value) {?>
													<li class="kt-menu__item" aria-haspopup="true">
														<a href="<?php echo $_smarty_tpl->tpl_vars['link_notification_sent']->value;?>
" class="kt-menu__link" path-menu="notification_sent">
															<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
					                                            <span></span>
					                                        </i>
															<span class="kt-menu__link-text">
																<?php echo __d('admin','lich_su_gui');?>

															</span>
														</a>
													</li>
												<?php }?>
											</ul>
										</div>
									</li>
					            <?php }?>
					        <?php }?>
						</ul>
					</div>
				</li>
	        <?php }?>
	    <?php }?>
	    

                <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable91=ob_get_clean();
$_smarty_tpl->_assignInScope('link_setting', $_prefixVariable91."/setting/dashboard");?>
        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable92=ob_get_clean();
$_smarty_tpl->_assignInScope('link_template', $_prefixVariable92."/template/dashboard");?>
        <?php ob_start();
echo ADMIN_PATH;
$_prefixVariable93=ob_get_clean();
$_smarty_tpl->_assignInScope('link_mobile_app', $_prefixVariable93."/mobile-app");?>

        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_setting']->value])) {
echo "1";
}
$_prefixVariable94=ob_get_clean();
$_smarty_tpl->_assignInScope('access_setting', $_prefixVariable94);?>
        <?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_template']->value])) {
echo "1";
}
$_prefixVariable95=ob_get_clean();
$_smarty_tpl->_assignInScope('access_template', $_prefixVariable95);?>

		<?php ob_start();
if (!empty($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['link_mobile_app']->value])) {
echo "1";
}
$_prefixVariable96=ob_get_clean();
$_smarty_tpl->_assignInScope('access_mobile_app', $_prefixVariable96);?>

                <?php if ($_smarty_tpl->tpl_vars['access_tag']->value || $_smarty_tpl->tpl_vars['access_link_management']->value || $_smarty_tpl->tpl_vars['access_page_seo_info']->value || $_smarty_tpl->tpl_vars['access_seo_redirect']->value || $_smarty_tpl->tpl_vars['access_seo_setting']->value || $_smarty_tpl->tpl_vars['access_setting']->value || $_smarty_tpl->tpl_vars['access_template']->value || $_smarty_tpl->tpl_vars['access_mobile_app']->value) {?>
        	<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
			
				<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
						    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						        <rect x="0" y="0" width="24" height="24"/>
						        <path d="M15.9497475,3.80761184 L13.0246125,6.73274681 C12.2435639,7.51379539 12.2435639,8.78012535 13.0246125,9.56117394 L14.4388261,10.9753875 C15.2198746,11.7564361 16.4862046,11.7564361 17.2672532,10.9753875 L20.1923882,8.05025253 C20.7341101,10.0447871 20.2295941,12.2556873 18.674559,13.8107223 C16.8453326,15.6399488 14.1085592,16.0155296 11.8839934,14.9444337 L6.75735931,20.0710678 C5.97631073,20.8521164 4.70998077,20.8521164 3.92893219,20.0710678 C3.1478836,19.2900192 3.1478836,18.0236893 3.92893219,17.2426407 L9.05556629,12.1160066 C7.98447038,9.89144078 8.36005124,7.15466739 10.1892777,5.32544095 C11.7443127,3.77040588 13.9552129,3.26588995 15.9497475,3.80761184 Z" fill="#000000"/>
						        <path d="M16.6568542,5.92893219 L18.0710678,7.34314575 C18.4615921,7.73367004 18.4615921,8.36683502 18.0710678,8.75735931 L16.6913928,10.1370344 C16.3008685,10.5275587 15.6677035,10.5275587 15.2771792,10.1370344 L13.8629656,8.7228208 C13.4724413,8.33229651 13.4724413,7.69913153 13.8629656,7.30860724 L15.2426407,5.92893219 C15.633165,5.5384079 16.26633,5.5384079 16.6568542,5.92893219 Z" fill="#000000" opacity="0.3"/>
						    </g>
						</svg>
                    </span>

					<span class="kt-menu__link-text">
						<?php echo __d('admin','cai_dat');?>

					</span>
					<i class="kt-menu__ver-arrow la la-angle-right"></i>
				</a>

				<div class="kt-menu__submenu kt-menu__submenu--classic  kt-menu__submenu--right">
					<ul class="kt-menu__subnav">
						        				<?php if ($_smarty_tpl->tpl_vars['access_setting']->value) {?>
							<li class="kt-menu__item" aria-haspopup="true">
								<a href="<?php echo $_smarty_tpl->tpl_vars['link_setting']->value;?>
" class="kt-menu__link" path-menu="setting">
									<span class="kt-menu__link-icon">
		                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										        <rect x="0" y="0" width="24" height="24"/>
										        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"/>
										        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"/>
										    </g>
										</svg>
		                            </span>
									<span class="kt-menu__link-text">
										<?php echo __d('admin','cai_dat_chung');?>

									</span>
								</a>
							</li>
						<?php }?>						

						        				<?php if ($_smarty_tpl->tpl_vars['access_template']->value) {?>
							<li class="kt-menu__item" aria-haspopup="true">
								<a href="<?php echo $_smarty_tpl->tpl_vars['link_template']->value;?>
" class="kt-menu__link" path-menu="template">
									<span class="kt-menu__link-icon">
		                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										        <rect x="0" y="0" width="24" height="24"/>
										        <path d="M5,6 L19,6 C19.5522847,6 20,6.44771525 20,7 L20,17 L4,17 L4,7 C4,6.44771525 4.44771525,6 5,6 Z" fill="#000000"/>
										        <rect fill="#000000" opacity="0.3" x="1" y="18" width="22" height="1" rx="0.5"/>
										    </g>
										</svg>
		                            </span>
									<span class="kt-menu__link-text">
										<?php echo __d('admin','giao_dien');?>

									</span>
								</a>
							</li>
						<?php }?>

						        				<?php ob_start();
echo MOBILE_APP;
$_prefixVariable97 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['addons']->value[$_prefixVariable97]) && $_smarty_tpl->tpl_vars['access_mobile_app']->value) {?>
							<li class="kt-menu__item" aria-haspopup="true">
								<a href="<?php echo $_smarty_tpl->tpl_vars['link_mobile_app']->value;?>
" class="kt-menu__link" path-menu="mobile_app">
									<span class="kt-menu__link-icon">
		                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										        <rect x="0" y="0" width="24" height="24"/>
										        <path d="M7.13888889,4 L7.13888889,19 L16.8611111,19 L16.8611111,4 L7.13888889,4 Z M7.83333333,1 L16.1666667,1 C17.5729473,1 18.25,1.98121694 18.25,3.5 L18.25,20.5 C18.25,22.0187831 17.5729473,23 16.1666667,23 L7.83333333,23 C6.42705272,23 5.75,22.0187831 5.75,20.5 L5.75,3.5 C5.75,1.98121694 6.42705272,1 7.83333333,1 Z" fill="#000000" fill-rule="nonzero"/>
										        <polygon fill="#000000" opacity="0.3" points="7 4 7 19 17 19 17 4"/>
										        <circle fill="#000000" cx="12" cy="21" r="1"/>
										    </g>
										</svg>
		                            </span>
									<span class="kt-menu__link-text">
										<?php echo __d('admin','mobile_app');?>

									</span>
								</a>
							</li>
						<?php }?>

						
					</ul>
				</div>
			</li>
        <?php }?>

                <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel">
			<a href="<?php echo ADMIN_PATH;?>
/ticket" class="kt-menu__link" path-menu="ticket">
				<span class="kt-menu__link-icon">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
					    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					        <rect x="0" y="0" width="24" height="24"/>
					        <path d="M11.1669899,4.49941818 L2.82535718,19.5143571 C2.557144,19.9971408 2.7310878,20.6059441 3.21387153,20.8741573 C3.36242953,20.9566895 3.52957021,21 3.69951446,21 L21.2169432,21 C21.7692279,21 22.2169432,20.5522847 22.2169432,20 C22.2169432,19.8159952 22.1661743,19.6355579 22.070225,19.47855 L12.894429,4.4636111 C12.6064401,3.99235656 11.9909517,3.84379039 11.5196972,4.13177928 C11.3723594,4.22181902 11.2508468,4.34847583 11.1669899,4.49941818 Z" fill="#000000" opacity="0.3"/>
					        <rect fill="#000000" x="11" y="9" width="2" height="7" rx="1"/>
					        <rect fill="#000000" x="11" y="17" width="2" height="2" rx="1"/>
					    </g>
					</svg>
				</span>
				<span class="kt-menu__link-text">
					<?php echo __d('admin','ho_tro');?>

				</span>	
			</a>
		</li>
        
	</ul>
</div><?php }
}
