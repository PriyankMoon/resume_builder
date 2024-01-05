<?php
require '../assets/class/database.class.php';
require '../assets/class/function.class.php';

if ($_GET) {
    $post = $_GET;

    // echo "<pre>";
    // print_r($post);

    if ($post['id']) {

        // Use a prepared statement to prevent SQL injection
        $authid = $fn->Auth()['id'];

        try {
            // Use a prepared statement to prevent SQL injection
            $query = "DELETE resumes,experiences,educations,skills FROM resumes ";

            $query.="LEFT JOIN experiences ON resumes.id=experiences.resume_id ";
            $query.="LEFT JOIN educations ON resumes.id=educations.resume_id ";
            $query.="LEFT JOIN skills ON resumes.id=skills.resume_id ";
            
            $query.="WHERE resumes.id={$post['id']} AND resumes.user_id={$authid}";
            
            
            
            $stmt = $db->prepare($query);



            $stmt->execute();

            $fn->setAlert('Resume Deleted ');
            header('Location: ../myresumes.php');
            exit();
        } catch (Exception $error) {
            $fn->setError('Error creating resume: ' . $error->getMessage());
            header('Location: ../myresumes.php');
            exit();
        }
    } else {
        $fn->setError('Please fill the form!');
        header('Location: ../myresumes.php');
        exit();
    }
} else {
    header('Location: ../myresumes.php');
    exit();
}
?>
