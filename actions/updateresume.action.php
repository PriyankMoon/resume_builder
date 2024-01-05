<?php
require '../assets/class/database.class.php';
require '../assets/class/function.class.php';

if ($_POST) {
    $post = $_POST;

    echo "<pre>";
    print_r($post);

    if ($post['id'] && $post['slug'] &&  $post['full_name'] && $post['email_id'] && $post['mobile_no'] && $post['dob'] && $post['gender'] && $post['religion'] && $post['nationality'] && $post['marital_status'] && $post['hobbies'] && $post['languages'] && $post['address'] && $post['objective']) {

        // its no use coz' the idea i want to implement is working withoutthis ~ ahahahahah
        // Handle personal_link field if its empty it empty the personal_link in database
        // $personalLink = isset($post['personal_link']) ? $post['personal_link'] : null;
        
        $post2 = $post;
        unset($post2['id']);
        unset($post2['slug']);

        $columns = array_keys($post2);
        $values = array_map(function ($value) use ($db) {
            return $db->real_escape_string($value);
        }, $post2);

        // Add updated_at to the key-value pairs
        $columns[] = 'updated_at';
        $values[] = time();

        $setClause = implode(', ', array_map(function ($column, $value) {
            return "$column = '$value'";
        }, $columns, $values));

        try {
            // Use a prepared statement to prevent SQL injection
            $query = "UPDATE resumes SET $setClause WHERE id = {$post['id']} AND slug = '{$post['slug']}'";

            $stmt = $db->prepare($query);
        
            // Execute the query
            $stmt->execute();
        
            $fn->setAlert('Resume updated successfully!');
            header('Location: ../updateresume.php?resume='.$post['slug']);
            exit();
        } catch (Exception $error) {
            $fn->setError('Error updating resume: ' . $error->getMessage());
            header('Location: ../updateresume.php?resume='.$post['slug']);
            exit();
        }
    } else {
        $fn->setError('Please fill the form!');
        header('Location: ../updateresume.php?resume='.$post['slug']);
        exit();
    }
} else {
    header('Location: ../updateresume.php?resume='.$post['slug']);
    exit();
}
?>
