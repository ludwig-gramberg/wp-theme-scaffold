<?php

// beanstalk deployment revision
define('SITE_VERSION', file_get_contents(ABSPATH.'.revision'));
// url of page
define('SITE_URI', get_template_directory_uri().'/');
// theme uri
define('SITE_THEME_URI', get_template_directory_uri());
// theme path
define('SITE_THEME_PATH', get_template_directory());


/* --- theme helper --- */

/**
 * wrapper for enqueue style which adds revision to the file name
 *
 * @param $name
 * @param array $deps
 */
function theme_load_style($name, array $deps = array()) {
    wp_enqueue_style(str_replace('/','-',$name), SITE_URI.'css/'.$name.'.css', $deps, SITE_VERSION);
}

/**
 * wrapper for enqueue script which adds revision to the file name
 *
 * @param $name
 * @param array $deps
 */
function theme_load_script($name, array $deps = array()) {
    wp_enqueue_script(str_replace('/','-',$name), SITE_URI.'js/'.$name.'.js', $deps, SITE_VERSION);
}

/**
 * load template part with block cache support and profiler integration
 *
 * cache plugin: https://github.com/ludwig-gramberg/wp-theme-cache
 * profiler plugin: https://github.com/ludwig-gramberg/wp-profiler
 *
 * @param string $part
 * @param array $variables
 * @param null $cacheKey
 * @param array $cacheTags
 */
function theme_load_part($part, $variables = array(), $cacheKey = null, $cacheTags = array()) {
    do_action('profiler_start', 'load_part:'.$part);

    if($cacheKey) {
        $cacheKey = $part.':'.($_SERVER['HTTPS'] ? 's:' : '').$cacheKey;
    }

    $template_file = get_template_directory().'/parts/'.$part.'.php';

    if(file_exists($template_file)) {
        if($cacheKey) {
            do_action('theme_cache_get', $cacheKey, $result = new stdClass());
            if($result->data) {
                echo $result->data;
            } else {
                ob_start();
                foreach($variables as $name => $var) {
                    $$name = $var;
                }
                require $template_file;
                $data = ob_get_contents();
                do_action('theme_cache_set', $cacheKey, $data, $cacheTags);
                ob_end_flush();
            }
        } else {
            foreach($variables as $name => $var) {
                $$name = $var;
            }
            require $template_file;
        }
    } else {
        echo '<div style="background-color:#c00;color:#fff;font-size:14px;padding:10px;margin:20px;">missing template '.$part.'</div>';
    }
    do_action('profiler_stop', 'load_part:'.$part);
}

/**
 * @see theme_load_part
 *
 * @param string $part
 * @param array $variables
 * @param null $cacheKey
 * @param array $cacheTags
 * @return string
 */
function theme_return_part($part, $variables = array(), $cacheKey = null, $cacheTags = array()) {
    ob_start();
    theme_load_part($part, $variables, $cacheKey, $cacheTags);
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}