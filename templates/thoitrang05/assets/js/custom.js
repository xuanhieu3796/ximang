 $(document).on('click', '[nh-link-redirect-blank]', function(e) {
 $(this).closest('.action-item').removeClass('open');
 $(this).closest('.action-share--content').hide();
});