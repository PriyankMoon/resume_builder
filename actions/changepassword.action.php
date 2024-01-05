<?php
require '../assets/class/database.class.php';
require '../assets/class/function.class.php';

if ($_POST) {
    $post = $_POST;

    if ($post['password']) {
        $newPassword = $db->real_escape_string($post['password']);
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $email = $fn->getSession('email');

        // Update the password using the hashed password
        $db->query("UPDATE users SET password='$hashedPassword' WHERE email_id='$email'");
        
        $fn->setAlert('Password is changed!');
        header('Location: ../login.php');
        exit();
    } else {
        $fn->setError('Please enter your new password');
        header('Location: ../change-password.php');
        exit();
    }
} else {
    header('Location: ../change-password.php');
    exit();
}
?>
