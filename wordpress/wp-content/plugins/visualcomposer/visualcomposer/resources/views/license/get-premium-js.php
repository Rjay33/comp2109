<?php
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}
?>
<script>
  (function ($) {
    jQuery(document).ready(function ($) {
      $('#toplevel_page_vcv-activation, #toplevel_page_vcv-settings').addClass('vcv-go-premium');
    });
    var hoverColor = jQuery('#adminmenu li .wp-has-current-submenu, adminmenu li .current').css('background-color');
    var color = jQuery('#adminmenu li .wp-has-current-submenu, adminmenu li .current').css('color');
    jQuery('body').on('mouseenter', '#toplevel_page_vcv-activation.vcv-go-premium .wp-submenu li:last-child, #toplevel_page_vcv-settings.vcv-go-premium .wp-submenu li:last-child', function () {
      jQuery(this).css({ 'background-color': hoverColor })
      jQuery(this).find('a').css({ 'color': color })
    });
    jQuery('body').on('mouseleave', '#toplevel_page_vcv-activation.vcv-go-premium .wp-submenu li:last-child, #toplevel_page_vcv-settings.vcv-go-premium .wp-submenu li:last-child', function () {
      jQuery(this).css({ 'background-color': '' })
      jQuery(this).find('a').css({ 'color': '' })
    });
  })(window.jQuery)
</script>
