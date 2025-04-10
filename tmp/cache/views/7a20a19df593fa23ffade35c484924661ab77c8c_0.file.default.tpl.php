<?php
/* Smarty version 4.5.5, created on 2025-04-10 21:57:08
  from 'C:\var5\ximang.local\templates\thoitrang05\layout\default.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67f7dc44ceb305_00833200',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a20a19df593fa23ffade35c484924661ab77c8c' => 
    array (
      0 => 'C:\\var5\\ximang.local\\templates\\thoitrang05\\layout\\default.tpl',
      1 => 1671071598,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67f7dc44ceb305_00833200 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="<?php echo LANGUAGE;?>
" csrf-token="<?php echo $_smarty_tpl->tpl_vars['this']->value->getRequest()->getAttribute('csrfToken');?>
">
<head>
    <?php $_smarty_tpl->_assignInScope('title', '');?>
    <?php if (!empty($_smarty_tpl->tpl_vars['seo_info']->value['title'])) {?>
        <?php $_smarty_tpl->_assignInScope('title', ((string)$_smarty_tpl->tpl_vars['seo_info']->value['title']));?>
    <?php }?>
    <?php if (!empty($_smarty_tpl->tpl_vars['title_for_layout']->value)) {?>
        <?php $_smarty_tpl->_assignInScope('title', ((string)$_smarty_tpl->tpl_vars['title_for_layout']->value));?>
    <?php }?>

    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="description" content="<?php if (!empty($_smarty_tpl->tpl_vars['seo_info']->value['description'])) {
echo $_smarty_tpl->tpl_vars['seo_info']->value['description'];
}?>" />
    <meta name="keywords" content="<?php if (!empty($_smarty_tpl->tpl_vars['seo_info']->value['keywords'])) {
echo $_smarty_tpl->tpl_vars['seo_info']->value['keywords'];
}?>" />
    
    <link rel="canonical" href="<?php echo $_smarty_tpl->tpl_vars['this']->value->Utilities->getUrlPath();?>
">
    <link rel="alternate" hreflang="<?php echo LANGUAGE;?>
" href="<?php echo $_smarty_tpl->tpl_vars['this']->value->Utilities->getUrlCurrent();?>
" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="<?php if (!empty($_smarty_tpl->tpl_vars['seo_info']->value['site_name'])) {
echo $_smarty_tpl->tpl_vars['seo_info']->value['site_name'];
}?>">
    <meta name="twitter:title" content="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
">
    <meta name="twitter:description" content="<?php if (!empty($_smarty_tpl->tpl_vars['seo_info']->value['description'])) {
echo $_smarty_tpl->tpl_vars['seo_info']->value['description'];
}?>">
    <meta name="twitter:image" content="<?php if (!empty($_smarty_tpl->tpl_vars['seo_info']->value['image'])) {
echo CDN_URL;
echo $_smarty_tpl->tpl_vars['seo_info']->value['image'];
}?>">

    <!-- Open Graph data -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?php if (!empty($_smarty_tpl->tpl_vars['seo_info']->value['site_name'])) {
echo $_smarty_tpl->tpl_vars['seo_info']->value['site_name'];
}?>">
    <meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
">
    <meta property="og:url" content="<?php echo $_smarty_tpl->tpl_vars['this']->value->Utilities->getUrlCurrent();?>
">
    <meta property="og:image" content="<?php if (!empty($_smarty_tpl->tpl_vars['seo_info']->value['image'])) {
echo CDN_URL;
echo $_smarty_tpl->tpl_vars['seo_info']->value['image'];
}?>">
    <meta property="og:description" content="<?php if (!empty($_smarty_tpl->tpl_vars['seo_info']->value['description'])) {
echo $_smarty_tpl->tpl_vars['seo_info']->value['description'];
}?>">
    
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <link rel="dns-prefetch" href="<?php echo CDN_URL;?>
">
    
    <?php $_smarty_tpl->_assignInScope('website_info', $_smarty_tpl->tpl_vars['this']->value->Setting->getWebsiteInfo());?>
    <link href="<?php if (!empty($_smarty_tpl->tpl_vars['website_info']->value['favicon'])) {
echo CDN_URL;
echo $_smarty_tpl->tpl_vars['website_info']->value['favicon'];
} else { ?>/favicon.ico<?php }?>" rel="icon" type="image/x-icon"/>
      
    <?php $_smarty_tpl->_assignInScope('css_cache_key', 'css');?>
    <?php if (PAGE_TYPE == 'home') {?>
        <?php $_smarty_tpl->_assignInScope('css_cache_key', 'css_home');?>
    <?php }?>
    <?php ob_start();
echo LAYOUT;
$_prefixVariable1 = ob_get_clean();
echo $_smarty_tpl->tpl_vars['this']->value->element('layout/css',array(),$_smarty_tpl->tpl_vars['this']->value->Setting->getConfigCacheView($_smarty_tpl->tpl_vars['css_cache_key']->value,$_prefixVariable1));?>

    <?php echo $_smarty_tpl->tpl_vars['this']->value->element('fonts');?>


    <?php $_smarty_tpl->_assignInScope('embed_code', array());?>
    <?php if (!empty($_smarty_tpl->tpl_vars['data_init']->value['embed_code'])) {?>
        <?php $_smarty_tpl->_assignInScope('embed_code', $_smarty_tpl->tpl_vars['data_init']->value['embed_code']);?>
    <?php }?>

    <?php if (!empty($_smarty_tpl->tpl_vars['embed_code']->value['head']) && empty($_smarty_tpl->tpl_vars['embed_code']->value['time_delay'])) {?>
        <?php echo $_smarty_tpl->tpl_vars['embed_code']->value['head'];?>

    <?php }?>
    
</head>

<body class="<?php if (!empty(DEVICE)) {?>is-mobile<?php }?> <?php if (!empty(PAGE_TYPE)) {
echo PAGE_TYPE;
}?>">
    <?php if (!empty($_smarty_tpl->tpl_vars['embed_code']->value['top_body']) && empty($_smarty_tpl->tpl_vars['embed_code']->value['time_delay'])) {?>
        <?php echo $_smarty_tpl->tpl_vars['embed_code']->value['top_body'];?>

    <?php }?>

    <?php if (!empty($_smarty_tpl->tpl_vars['page_code']->value) && !empty($_smarty_tpl->tpl_vars['structure']->value)) {?>
        <?php $_smarty_tpl->_assignInScope('page_cache_options', array());?>
        <?php if (!empty($_smarty_tpl->tpl_vars['cache_page']->value)) {?>
            <?php ob_start();
echo PAGE;
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('page_cache_options', $_smarty_tpl->tpl_vars['this']->value->Setting->getConfigCacheView($_smarty_tpl->tpl_vars['page_code']->value,$_prefixVariable2));?>
        <?php }?>

        <?php echo $_smarty_tpl->tpl_vars['this']->value->element('layout/page',array('structure'=>$_smarty_tpl->tpl_vars['structure']->value),$_smarty_tpl->tpl_vars['page_cache_options']->value);?>

    <?php }?>



    <?php ob_start();
echo LAYOUT;
$_prefixVariable3 = ob_get_clean();
echo $_smarty_tpl->tpl_vars['this']->value->element('layout/modal',array(),$_smarty_tpl->tpl_vars['this']->value->Setting->getConfigCacheView('modal',$_prefixVariable3));?>

    <input id="nh-data-init" type="hidden" value="<?php if (!empty($_smarty_tpl->tpl_vars['data_init']->value)) {
echo htmlentities(json_encode($_smarty_tpl->tpl_vars['data_init']->value));
}?>">



    <?php ob_start();
echo LAYOUT;
$_prefixVariable4 = ob_get_clean();
echo $_smarty_tpl->tpl_vars['this']->value->element('schema/company',array(),$_smarty_tpl->tpl_vars['this']->value->Setting->getConfigCacheView('schema_company',$_prefixVariable4));?>

    <?php ob_start();
echo LAYOUT;
$_prefixVariable5 = ob_get_clean();
echo $_smarty_tpl->tpl_vars['this']->value->element('schema/website',array(),$_smarty_tpl->tpl_vars['this']->value->Setting->getConfigCacheView('schema_website',$_prefixVariable5));?>


    <?php if (!empty(PAGE_TYPE) && PAGE_TYPE != HOME) {?>
        <?php echo $_smarty_tpl->tpl_vars['this']->value->element('schema/breadcrumb');?>

    <?php }?>

    <?php if (!empty(PAGE_TYPE) && PAGE_TYPE == PRODUCT_DETAIL) {?>
        <?php echo $_smarty_tpl->tpl_vars['this']->value->element('schema/product_detail');?>

    <?php }?>

    <?php if (!empty(PAGE_TYPE) && PAGE_TYPE == ARTICLE_DETAIL) {?>
        <?php echo $_smarty_tpl->tpl_vars['this']->value->element('schema/article_detail');?>

    <?php }?>
    

    <?php $_smarty_tpl->_assignInScope('js_cache_key', 'js');?>
    <?php if (PAGE_TYPE == 'home') {?>
        <?php $_smarty_tpl->_assignInScope('js_cache_key', 'js_home');?>
    <?php }?>
    <?php ob_start();
echo LAYOUT;
$_prefixVariable6 = ob_get_clean();
echo $_smarty_tpl->tpl_vars['this']->value->element('layout/js',array(),$_smarty_tpl->tpl_vars['this']->value->Setting->getConfigCacheView($_smarty_tpl->tpl_vars['js_cache_key']->value,$_prefixVariable6));?>



    <?php if (!empty($_smarty_tpl->tpl_vars['embed_code']->value['bottom_body']) && empty($_smarty_tpl->tpl_vars['embed_code']->value['time_delay'])) {?>
        <?php echo $_smarty_tpl->tpl_vars['embed_code']->value['bottom_body'];?>

    <?php }?>
    
    <?php echo $_smarty_tpl->tpl_vars['this']->value->element('../Notification/bell');?>


    <?php if (!empty($_smarty_tpl->tpl_vars['nh_admin_bar']->value)) {?>
        <?php echo $_smarty_tpl->tpl_vars['nh_admin_bar']->value;?>

    <?php }?>
</body>
</html>
<?php }
}
