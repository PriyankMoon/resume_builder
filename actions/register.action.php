<?php
require '../assets/class/database.class.php';
require '../assets/class/function.class.php';

if ($_POST) {
    $post = $_POST;

    if (!empty($post['full_name']) && !empty($post['email_id']) && !empty($post['password'])) {
        $full_name = $db->real_escape_string($post['full_name']);
        $email_id = $db->real_escape_string($post['email_id']);
        $password = password_hash($db->real_escape_string($post['password']), PASSWORD_DEFAULT);

        // Validate email format
        if (!filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
            $fn->setError('Invalid email format.');
            header('Location: ../register.php');
            exit();
        }

        // Use a prepared statement to prevent SQL injection
        $stmt = $db->prepare("SELECT COUNT(*) as user FROM users WHERE email_id = ?");
        $stmt->bind_param("s", $email_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row['user']) {
            $fn->setError($email_id . ' is already registered!');
            header('Location: ../register.php');
            exit();
        }

        try {
            $stmt = $db->prepare("INSERT INTO users(full_name, email_id, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $full_name, $email_id, $password);
            $stmt->execute();

            $fn->setAlert('You registered successfully!');
            header('Location: ../login.php');
            exit();
        } catch (Exception $error) {
            // Log the error instead of exposing it to the user
            error_log('Registration error: ' . $error->getMessage());
            $fn->setError('An unexpected error occurred during registration. Please try again.');
            header('Location: ../register.php');
            exit();
        }
    } else {
        $fn->setError('Please fill the form!');
        header('Location: ../register.php');
        exit();
    }
} else {
    header('Location: ../register.php');
    exit();
}
?>
