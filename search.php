<?php
theme_load_part('html/head');
theme_load_part('layout/1col/wrap-begin');

if(have_posts()) {
    theme_load_part('content/misc/search-header');
    while(have_posts()) {
        the_post();

        theme_load_part('content/post/search');
        theme_load_part('content/misc/post-nav');

    }
} else {
    // something if search results are empty
}

theme_load_part('layout/1col/wrap-end');
theme_load_part('html/foot');