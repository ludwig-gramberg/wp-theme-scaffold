<?php
/**
 * you can find x-forms here
 * https://github.com/ludwig-gramberg/wp-lib-x-forms
 *
 * in wp-folder add like so:
 * git submodule add -b master --name "wp-includes/x-forms" git@github.com:ludwig-gramberg/wp-lib-x-forms.git wp-includes/x-forms
 * */
require_once ABSPATH.'/wp-includes/x-forms/x-forms.php';

// form

$form_name = 'demo-form'; // name of the form, each form on a page must have a unique name
$form_read = &$_POST; // where to read from usually $_POST or $_GET depends on your form
$form_write = array(); // where to write the resulting data
$form_errors = array(); // where to write form errors

// email address

$field_email = x_form_render_text(
    $form_name,
    'email',
    $form_read,
    true,
    'class="form-control" id="'.$form_name.'_email"', // custom html you want in the resulting element
    $form_write,
    $form_errors,
    '',
    'Your E-Mail Address', // place holder
    'trim', // sanitization of value
    'email' // validatoin
);

// name/address fields

$field_gender = x_form_render_select(
    $form_name,
    'gender',
    $form_read,
    array(
        'f' => __('Female'),
        'm' => __('Male'),
    ),
    null,
    'class="form-control" id="'.$form_name.'_gender"',
    $form_write,
    'f'
);
$field_firstname = x_form_render_text(
    $form_name,
    'firstname',
    $form_read,
    true,
    'class="form-control" id="'.$form_name.'_firstname"',
    $form_write,
    $form_errors,
    '',
    '',
    'trim',
    'not_empty'
);
$field_lastname = x_form_render_text(
    $form_name,
    'lastname',
    $form_read,
    true,
    'class="form-control" id="'.$form_name.'_lastname"',
    $form_write,
    $form_errors,
    '',
    '',
    'trim',
    'not_empty'
);