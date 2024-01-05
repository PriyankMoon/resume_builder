<?php
require '../assets/class/database.class.php';
require '../assets/class/function.class.php';

if ($_POST) {
    $post = $_POST;

    if (!empty($post['email_id']) && !empty($post['password'])) {
        $email_id = $db->real_escape_string($post['email_id']);
        $password = $db->real_escape_string($post['password']);

        // Validate email format
        if (!filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
            $fn->setError('Invalid email format.');
            header('Location: ../login.php');
            exit();
        }
        
        $stmt = $db->prepare("SELECT * FROM users WHERE email_id = ?");
        $stmt->bind_param("s", $email_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            $userData = $result->fetch_assoc();

            if ($userData && password_verify($password, $userData['password'])) {
                $fn->setAuth($userData);
                $fn->setAlert('Logged in Successfully !');
                header('Location: ../myresumes.php');
                exit();
            } else {
                $fn->setError('Incorrect email id or password.');
                header('Location: ../login.php');
                exit();
            }
        } else {
            $fn->setError('Error executing the query: ' . $db->error);
            header('Location: ../login.php');
            exit();
        }
    } else {
        $fn->setError('Please fill the form!');
        header('Location: ../login.php');
        exit();
    }
} else {
    header('Location: ../login.php');
    exit();
}
?>
