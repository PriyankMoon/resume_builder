<?php
session_start();
require '../assets/class/database.class.php';
require '../assets/class/function.class.php';

if ($_POST) {
    $post = $_POST;

    if ($post['full_name'] && $post['email_id']) {
        $full_name = $db->real_escape_string($post['full_name']);
        $email_id = $db->real_escape_string($post['email_id']);
        $password = password_hash($db->real_escape_string($post['password']), PASSWORD_DEFAULT);

        // Use a prepared statement to prevent SQL injection
        $authid = $fn->Auth()['id'];

        $stmt = $db->prepare("SELECT COUNT(*) as user FROM users WHERE (email_id=? AND id!=?)");
        $stmt->bind_param("si", $email_id, $authid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row['user']) {
            $fn->setError($email_id . ' is already registered!');
            header('Location: ../account.php');
            exit();
        }

        if ($password != '') {
            $stmt = $db->prepare("UPDATE users SET full_name=?, email_id=?, password=? WHERE id=?");
            $stmt->bind_param("sssi", $full_name, $email_id, $password, $authid);
            $stmt->execute();
        } else {
            $stmt = $db->prepare("UPDATE users SET full_name=?, email_id=? WHERE id=?");
            $stmt->bind_param("ssi", $full_name, $email_id, $authid);
            $stmt->execute();
        }

        $fn->setAlert('Profile is Updated !');
        header('Location: ../myresumes.php');
        exit();
    } else {
        $fn->setError('Please fill the form!');
        header('Location: ../account.php');
        exit();
    }
} else {
    header('Location: ../account.php');
    exit();
}
?>
