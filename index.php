<?php
theme_load_part('html/head');
theme_load_part('layout/1col/wrap-begin');

if(have_posts()) {

    if(is_home() && !is_front_page()) {
        theme_load_part('content/misc/header');
    }

    // Start the loop.
    while(have_posts()) {
        the_post();
        theme_load_part('content/post/'.get_post_format());
    }

    // Previous/next page navigation.

    theme_load_part('content/misc/pager');

    // If no content, include the "No posts found" template.
} else {
    // what ever to show when you dont have posts
}

theme_load_part('layout/1col/wrap-end');
theme_load_part('html/foot');