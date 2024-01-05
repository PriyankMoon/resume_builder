<?php
require '../assets/class/database.class.php';
require '../assets/class/function.class.php';

if ($_POST) {
    $post = $_POST;

    // echo "<pre>";
    // print_r($post);

    if ($post['full_name'] && $post['email_id'] && $post['mobile_no'] && $post['dob'] && $post['gender'] && $post['religion'] && $post['nationality'] && $post['marital_status'] && $post['hobbies'] && $post['languages'] && $post['address'] && $post['objective']) {


        // its no use coz' the idea i want to implement is working withoutthis ~ ahahahahah
        // Handle personal_link field if its empty it empty the personal_link in database
        // $personalLink = isset($post['personal_link']) ? $post['personal_link'] : null;


        $columns = implode(',', array_keys($post));
        $values = array_map(function ($value) use ($db) {
            return $db->real_escape_string($value);
        }, $post);

        $authid = $fn->Auth()['id'];

        $columns .= ',slug,updated_at,user_id';
        $values[] = $fn->randomstring();
        $values[] = time();
        $values[] = $authid;

        try {
            // Use a prepared statement to prevent SQL injection
            $query = 'INSERT INTO resumes';
            $query .= "($columns) ";
            $query .= "VALUES(" . implode(',', array_fill(0, count($values), '?')) . ")";
            
            $stmt = $db->prepare($query);
        
            // Create an array of references for bind_param
            $params = array(str_repeat('s', count($values)));
            foreach ($values as &$value) {
                $params[] = &$value;
            }
        
            // Call bind_param using call_user_func_array
            call_user_func_array(array($stmt, 'bind_param'), $params);
        
            $stmt->execute();
        
            $fn->setAlert('Resume Added successfully!');
            header('Location: ../myresumes.php');
            exit();
        } catch (Exception $error) {
            $fn->setError('Error creating resume: ' . $error->getMessage());
            header('Location: ../createresume.php');
            exit();
        }
    } else {
        $fn->setError('Please fill the form!');
        header('Location: ../createresume.php');
        exit();
    }
} else {
    header('Location: ../createresume.php');
    exit();
}
?>
