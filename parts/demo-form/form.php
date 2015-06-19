<?php
// load form fields
include SITE_THEME_PATH.'/form/demo-form/fields.php';
?>
<form class="container form-horizontal bg_white"
      name="<?php echo $form_name ?>"
      action="<?php echo get_permalink($post->ID) ?>"
      method="post"
      enctype="application/x-www-form-urlencoded"
>
    <?php x_form_render_is_submit($form_name); ?>

    <?php if(x_form_is_submit($form_name)) { ?>
        <pre>POST: <?php htmlspecialchars(print_r($_POST, true)) ?></pre>
        <pre>Errors: <?php htmlspecialchars(print_r($form_errors, true)) ?></pre>
    <?php } ?>

    <?php if(array_key_exists('success', $_GET)) { ?>
        <p><strong>FORM SUCCESS!</strong></p>
    <?php } ?>

    <p>
        <label for="<?php echo $form_name ?>_gender">gender</label>
        <?php echo $field_gender ?>
    </p>
    <p>
        <label for="<?php echo $form_name ?>_firstname">first name</label>
        <?php echo $field_firstname ?>
        <?php if(array_key_exists('firstname', $form_errors)) { ?>
            <span class="error">please provide a first name</span>
        <?php } ?>
    </p>
    <p>
        <label for="<?php echo $form_name ?>_firstname">last name</label>
        <?php echo $field_lastname ?>
        <?php if(array_key_exists('firstname', $form_errors)) { ?>
            <span class="error">please provide a last name</span>
        <?php } ?>
    </p>
    <p>
        <label for="<?php echo $form_name ?>_email">email address</label>
        <?php echo $field_email ?>
        <?php if(array_key_exists('email', $form_errors)) { ?>
            <span class="error">please provide a valid email address</span>
        <?php } ?>
    </p>

    <button type="submit">Submit Form</button>
</form>