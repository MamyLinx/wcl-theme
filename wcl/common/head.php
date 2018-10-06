<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2014 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */
?>

<?php
    $js_lang = array(
        'delete' => __('Delete', 'bender_black'),
        'cancel' => __('Cancel', 'bender_black')
    );

    osc_enqueue_script('jquery');
    osc_enqueue_script('jquery-ui');
    osc_register_script('global-theme-js', osc_current_web_theme_js_url('global.js'), 'jquery');
    osc_register_script('delete-user-js', osc_current_web_theme_js_url('delete_user.js'), 'jquery-ui');
    osc_enqueue_script('global-theme-js');
?>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<title><?php echo meta_title() ; ?></title>
<meta name="title" content="<?php echo osc_esc_html(meta_title()); ?>" />
<?php if( meta_description() != '' ) { ?>
<meta name="description" content="<?php echo osc_esc_html(meta_description()); ?>" />
<?php } ?>
<?php if( meta_keywords() != '' ) { ?>
<meta name="keywords" content="<?php echo osc_esc_html(meta_keywords()); ?>" />
<?php } ?>
<?php if( osc_get_canonical() != '' ) { ?>
<!-- canonical -->
<link rel="canonical" href="<?php echo osc_get_canonical(); ?>"/>
<!-- /canonical -->
<?php } ?>
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Expires" content="Fri, Jan 01 1970 00:00:00 GMT" />

<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<!-- favicon -->
<link rel="shortcut icon" href="<?php echo osc_current_web_theme_url('favicon/favicon-48.png'); ?>">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo osc_current_web_theme_url('favicon/favicon-144.png'); ?>">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo osc_current_web_theme_url('favicon/favicon-114.png'); ?>">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo osc_current_web_theme_url('favicon/favicon-72.png'); ?>">
<link rel="apple-touch-icon-precomposed" href="<?php echo osc_current_web_theme_url('favicon/favicon-57.png'); ?>">
<!-- /favicon -->

<link href="<?php echo osc_current_web_theme_url('js/jquery-ui/jquery-ui-1.10.2.custom.min.css') ; ?>" rel="stylesheet" type="text/css" />

<script type="text/javascript" defer>
    var bender_black = window.bender_black || {};
    bender_black.base_url = '<?php echo osc_base_url(true); ?>';
    bender_black.langs = <?php echo json_encode($js_lang); ?>;
    bender_black.fancybox_prev = '<?php echo osc_esc_js( __('Previous image','bender_black')) ?>';
    bender_black.fancybox_next = '<?php echo osc_esc_js( __('Next image','bender_black')) ?>';
    bender_black.fancybox_closeBtn = '<?php echo osc_esc_js( __('Close','bender_black')) ?>';
</script>
<?php if(bender_black_default_direction()=='0') { ?>
<link href="<?php echo osc_current_web_theme_url('css/main.min.css') ; ?>" rel="stylesheet" type="text/css" />
<!--Load bootstrap 4 from CDN for my theme-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?php echo osc_current_web_theme_url('css/bootstrap/4.1.3/css/bootstrap.min.css') ; ?>">
<script src="<?php echo osc_current_web_theme_url('js/bootstrap/4.1.3/js/jquery-slim.min.js');?>"></script>
<script src="<?php echo osc_current_web_theme_url('js/bootstrap/4.1.3/js/popper.min.js') ; ?>"></script>
<script src="<?php echo osc_current_web_theme_url('js/bootstrap/4.1.3/js/bootstrap.min.js') ; ?>" ></script>
<!--END-->
<?php } ?>
<?php osc_run_hook('header') ; ?>
