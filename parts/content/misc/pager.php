<?php
the_posts_pagination(array(
    'prev_text' => __('Previous page', 'twentyfifteen'),
    'next_text' => __('Next page', 'twentyfifteen'),
    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'twentyfifteen') . ' </span>',
));