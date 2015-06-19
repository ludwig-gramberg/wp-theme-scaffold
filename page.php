<?php
theme_load_part('html/head');
theme_load_part('layout/1col/wrap-begin');

while(have_posts()) {
    the_post();

    theme_load_part('content/post/page');

    /*
     * this needs to be refactored into parts to have full control
     *
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
    */
}

theme_load_part('layout/1col/wrap-end');
theme_load_part('html/foot');