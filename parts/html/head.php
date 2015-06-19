<?php
/**
 * loading default scripts and styles:
 * individual styles per template you enqeue on the top of that template-file, order scripts by dependency
 * */

wp_enqueue_style('ife-google-font', add_query_arg(array('family' => 'Crimson%20Text:700,400,700italic,400italic|Open+Sans:400italic,700italic,400,700'), "//fonts.googleapis.com/css" ), array(), null);
theme_load_style('styles');

theme_load_script('some-js-library');
theme_load_script('some-js-library-plugin', array('some-js-library'));

?>
<!DOCTYPE html>
<!--[if IE 9]> <html class="ie ie9" <?php language_attributes(); ?>> <!--[endif]-->
<!--[if IE 8]> <html class="ie ie8" <?php language_attributes(); ?>> <!--[endif]-->
<!--[if IE 7]> <html class="ie ie7" <?php language_attributes(); ?>> <!--[endif]-->
<!--[if IE 6]> <html class="ie ie6" <?php language_attributes(); ?>> <!--[endif]-->
<!--[if !IE]><!-->
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name='viewport' content='width=device-width, initial-scale=1' />

    <!--[if lt IE 9]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->

    <title><?php wp_title(' :: ', true, 'right') ?></title>

    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <link rel="shortcut icon" href="<?php echo SITE_THEME_URI.'/favicon.ico' ?>" type="image/x-icon" />

    <?php wp_head(); ?>
</head>
<body ontouchstart="" <?php body_class(); ?>>