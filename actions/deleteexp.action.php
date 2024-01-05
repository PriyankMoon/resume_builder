<?php
require '../assets/class/database.class.php';
require '../assets/class/function.class.php';

if ($_GET) {
    $post = $_GET;

    // echo "<pre>";
    // print_r($post);

    if ($post['id'] && $post['resume_id']) {

        try {
            // Use a prepared statement to prevent SQL injection
            $query = "DELETE FROM experiences WHERE id={$post['id']} AND resume_id={$post['resume_id']}";
            
            
            
            $stmt = $db->prepare($query);



            $stmt->execute();

            $fn->setAlert('Experience Deleted ');
            header('Location: ../updateresume.php?resume=' . $post['slug']);
            exit();
        } catch (Exception $error) {
            $fn->setError('Error creating resume: ' . $error->getMessage());
            header('Location: ../updateresume.php?resume=' . $post['slug']);
            exit();
        }
    } else {
        $fn->setError('Please fill the form!');
        header('Location: ../updateresume.php?resume=' . $post['slug']);
        exit();
    }
} else {
    header('Location: ../updateresume.php?resume=' . $post['slug']);
    exit();
}
?>
