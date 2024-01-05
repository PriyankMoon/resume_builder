<?php
require '../assets/class/database.class.php';
require '../assets/class/function.class.php';

if ($_POST) {
    $post = $_POST;

    print_r($post);

    if ($post['resume_id'] && $post['font']) {


        

        $font=$db->real_escape_string($post['font']);
            // Use a prepared statement to prevent SQL injection
            $query = "UPDATE resumes SET ";
            $query.="font='$font' ";
            $query.="WHERE id={$post['resume_id']}";

            $stmt = $db->prepare($query);
        
            // Execute the query
            $stmt->execute();
        
    }
} 
?>
