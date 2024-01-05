<?php
require '../assets/class/database.class.php';
require '../assets/class/function.class.php';

if ($_POST) {
    $post = $_POST;

    if ($post['otp']) {
        
        $otp=$post['otp'];

    if($fn->getSession('otp')==$otp){

        $fn->setAlert('email is verified !');
        header('Location: ../change-password.php');
        exit();
    }else{
        $fn->setError('Incorrect OTP entered !');
        header('Location: ../verification.php');
        exit();
    }
        
    } else {
        $fn->setError('Please enter 6 digit code sended to your email id ');
        header('Location: ../verification.php');
        exit();
    }
} else {
    header('Location: ../verification.php');
    exit();
}
?>