<?php
require '../assets/class/database.class.php';
require '../assets/class/function.class.php';

$slug = $_GET['resume'] ?? '';
$resumes = $db->query("SELECT * FROM resumes WHERE (slug='$slug' AND user_id=" . $fn->Auth()['id'] . ")");
$resume = $resumes->fetch_assoc();

if (!$resume) {
    header('Location: myresumes.php');
    exit();
}

$exps = $db->query("SELECT * FROM experiences WHERE (resume_id=" . $resume['id'] . ")");
$exps = $exps->fetch_all(1);

$edus = $db->query("SELECT * FROM educations WHERE (resume_id=" . $resume['id'] . ")");
$edus = $edus->fetch_all(1);

$skills = $db->query("SELECT * FROM skills WHERE (resume_id=" . $resume['id'] . ")");
$skills = $skills->fetch_all(1);

unset($resume['id']);
unset($resume['slug']);
unset($resume['updated_at']);

$resume['resume_title'] .= 'clone_'.time();

// Separate the columns into two parts: those to be kept and those to be added
$columnsToKeep = implode(',', array_keys($resume));
$columnsToAdd = 'slug,updated_at';

// Create two separate arrays for values
$valuesToKeep = array_map(function ($value) use ($db) {
    return $db->real_escape_string($value);
}, $resume);

$authid = $fn->Auth()['id'];
$valuesToAdd = [
    $fn->randomstring(),
    time()
];

// Combine the two arrays for values
$values = array_merge($valuesToKeep, $valuesToAdd);

try {
    $query = 'INSERT INTO resumes';
    $query .= "($columnsToKeep,$columnsToAdd) ";
    $query .= "VALUES(" . rtrim(str_repeat('?,', count($values)), ',') . ")";

    // Debug: Echo the SQL query and values (remove in production)
    // echo "Query: $query\n";
    // echo "Values: " . implode(', ', $values) . "\n";
    // die();

    $stmt = $db->prepare($query);

    if (!$stmt) {
        throw new Exception('Error preparing statement: ' . $db->error);
    }

    $types = str_repeat('s', count($values));
$params = [$types];
foreach ($values as &$value) {
    $params[] = &$value;
}
call_user_func_array([$stmt, 'bind_param'], $params);



    $stmt->execute();

    // Get the ID of the newly inserted resume
$new_resume_id = $db->insert_id;

foreach($exps as $exp){
    $query2 = 'INSERT INTO experiences(resume_id,position,company,job_desc,started,ended)';
    $query2 .= " VALUES ($new_resume_id,'{$exp['position']}','{$exp['company']}','{$exp['job_desc']}','{$exp['started']}','{$exp['ended']}')";
    $db->query($query2);
}

foreach($edus as $edu){
    $query3 = 'INSERT INTO educations(resume_id,course,institute,started,ended)';
    $query3 .= " VALUES ($new_resume_id,'{$edu['course']}','{$edu['institute']}','{$edu['started']}','{$edu['ended']}')";
    $db->query($query3);
}

foreach($skills as $skill){
    $query4 = 'INSERT INTO skills(resume_id,skill,sub_skill)';
    $query4 .= " VALUES ($new_resume_id,'{$skill['skill']}','{$skill['sub_skill']}')";
    $db->query($query4);
}

    $stmt->close();
    $db->close();

    $fn->setAlert('Clone Created successfully!');
    header('Location: ../myresumes.php');
    exit();
} catch (Exception $error) {
    echo $error->getMessage();
    header('Location: ../myresumes.php');
    exit();
}
?>
