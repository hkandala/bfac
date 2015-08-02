<?php
    require_once 'include/php/connect.php';
    require_once 'sessionCheck.php';

    $user_id = $curUser->id;
    $no_of_hacks = $_POST['no_of_hacks'];
    $hack_desc = $_POST['hack_desc'];
    $past_proj = $_POST['past_proj'];
    $ideas = $_POST['ideas'];
    $spec = $_POST['spec'];

    $query = 'INSERT INTO `additional_details`(`user_id`, `no_of_hacks`, `hack_desc`, `past_proj`, `ideas`, `spec`) VALUES ("' . $user_id . '", "' . $no_of_hacks . '", "' . $hack_desc . '", "' . $past_proj . '", "' . $ideas . '", "' . $spec . '");';
    $insert = $GLOBALS['db']->raw($query);

    if($insert) {
        header('Location: detailsForm.php');
    } else {
        echo 'Something wrong happened, Please try again later';
    }