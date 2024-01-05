<?php
require '../assets/class/database.class.php';
require '../assets/class/function.class.php';

if ($_POST) {
    $post = $_POST;

    print_r($post);

    if ($post['resume_id'] && $post['background']) {


        $post['tile']=$post['background'];

        $tile=$db->real_escape_string($post['tile']);
            // Use a prepared statement to prevent SQL injection
            $query = "UPDATE resumes SET ";
            $query.="background='$tile' ";
            $query.="WHERE id={$post['resume_id']}";

            $stmt = $db->prepare($query);
        
            // Execute the query
            $stmt->execute();
        
    }
} 
?>
