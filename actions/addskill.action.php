<?php
require '../assets/class/database.class.php';
require '../assets/class/function.class.php';

if ($_POST) {
    $post = $_POST;
    
    // basically this is used for query debugging 
    // echo "<pre>";
    // print_r($post);
    // die();

    if ($post['resume_id'] && $post['skill'] || $post['sub_skill']) {
        $resumeid = array_shift($post);
        $post2 = $post;
        unset($post['slug']);

        // Additional modifications
        $columns = implode(',', array_keys($post));
        $columns .= ',resume_id'; // Add resume_id to columns
        $values = array_map(function ($value) use ($db) {
            return $db->real_escape_string($value);
        }, $post);
        $values[] = $resumeid; // Add resume_id to values

        try {
            // Use a prepared statement to prevent SQL injection
            $query = 'INSERT INTO skills';
            $query .= "($columns) ";
            $query .= "VALUES(" . implode(',', array_fill(0, count($values), '?')) . ")";
            
            // basically this is used for query debugging 
            // echo $query;
            // die();

            $stmt = $db->prepare($query);

            // Create an array of references for bind_param
            $params = array(str_repeat('s', count($values)));
            foreach ($values as &$value) {
                $params[] = &$value;
            }

            // Call bind_param using call_user_func_array
            call_user_func_array(array($stmt, 'bind_param'), $params);

            $stmt->execute();

            $fn->setAlert('Skill Added successfully!');
            header('Location: ../updateresume.php?resume=' . $post2['slug']);
            exit();
        } catch (Exception $error) {
            $fn->setError('Error creating resume: ' . $error->getMessage());
            header('Location: ../updateresume.php?resume=' . $post2['slug']);
            exit();
        }
    } else {
        $fn->setError('Please fill the form!');
        header('Location: ../updateresume.php?resume=' . $post2['slug']);
        exit();
    }
} else {
    header('Location: ../updateresume.php?resume=' . $post2['slug']);
    exit();
}
?>
