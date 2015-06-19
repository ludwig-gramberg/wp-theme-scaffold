<?php
/**
 * you can find x-forms here
 * https://github.com/ludwig-gramberg/wp-lib-x-forms
 *
 * in wp-folder add like so:
 * git submodule add -b master --name "wp-includes/x-forms" git@github.com:ludwig-gramberg/wp-lib-x-forms.git wp-includes/x-forms
 * */
require_once ABSPATH.'/wp-includes/x-forms/x-forms.php';
// require fields
include SITE_THEME_PATH.'/form/demo-form/fields.php';

if(x_form_is_submit($form_name) && empty($form_errors)) {

    /*
     * process your form success
     * like: sending an email, writing to an api
     */

    // finally forward user to page and end script
    header('Location:'.$_SERVER['REQUEST_URI'].'?success');
    exit;

}