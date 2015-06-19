<?php
/**
 * Template Name: Demo-Form
 */

// this loads the page-object and populates $post
// now we can use $post in the form process and hand it over to the form
if(have_posts()) {
    the_post();
}

// must process form _before_ we have any output so we can redirect
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once SITE_THEME_PATH.'/form/demo-form/process.php';
}

theme_load_part('html/head');
theme_load_part('layout/2col/wrap-begin');

// form
theme_load_part('demo-form/form', array('post' => $post));

theme_load_part('layout/2col/wrap-middle');

// some sidebar perhaps
theme_load_part('demo-form/sidebar');

theme_load_part('layout/2col/wrap-end');
theme_load_part('html/foot');