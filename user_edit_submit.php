<?php
include "classes/UserClass.php";
session_start();

$form = new UserClass();
$selected_user_id = $_GET['id'];

if (isset($_POST['btn_profile_settings'])) {
    $inputs = array(
        'lfirstname' => $_POST['input_firstname'],
        'llastname' => $_POST['input_lastname'],
        'lemail' => $_POST['input_email']
    );
 
    $_SESSION['error_msg'] = $form->UpdateUserProfile($selected_user_id, $inputs);
    if(empty($_SESSION['error_msg'])){
        $_SESSION['success_msg'] = "User profile successfully updated.";
        if($selected_user_id === $_SESSION['user_id']){
            $_SESSION['user_firstname'] = $inputs['lfirstname'];
            $_SESSION['user_lastname'] = $inputs['llastname'];
            $_SESSION['user_email'] = $inputs['lemail'];
        }
    }
    header("Location: user_edit.php?id=$selected_user_id");
    exit();
}else if (isset($_POST['btn_change_password'])) {
    $password = $_POST['input_new_password'];
    $confirm_password = $_POST['input_new_password_confirm'];

    $_SESSION['error_msg'] = $form->UpdateUserPassword($selected_user_id, $password, $confirm_password);
    if(empty($_SESSION['error_msg'])){
        $_SESSION['success_msg'] = "User password successfully updated.";
    }
    header("Location: user_edit.php?id=$selected_user_id");
    exit();
}else if (isset($_POST['btn_account_settings'])) {
    $current_user_id = $_SESSION['user_id'];
    if(isset($_POST['checkbox_delete'])) {
        $_SESSION['success_msg'] = $form->DeleteUserRecord($selected_user_id, $current_user_id);
        //HERE
    }else {
        $_SESSION['error_msg'] = "Please confirm account deletion.";
        header("Location: user_edit.php?id=$selected_user_id");
        exit();
    }
}

?>/