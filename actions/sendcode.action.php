<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../assets/class/database.class.php';
require '../assets/class/function.class.php';

require '../assets/packages/phpmailer/src/Exception.php';
require '../assets/packages/phpmailer/src/PHPMailer.php';
require '../assets/packages/phpmailer/src/SMTP.php';

if ($_POST) {
    $post = $_POST;

    if ($post['email_id']) {
        $email_id = $db->real_escape_string($post['email_id']);
        $stmt = $db->prepare("SELECT id, full_name FROM users WHERE email_id=?");
        $stmt->bind_param("s", $email_id); 
        $stmt->execute();       
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $otp = rand(100000,999999);
            $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                      //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'priyankmoon91@gmail.com';                     //SMTP username
    $mail->Password   = 'qkvepsozbtvxdoer';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('resumebuilder@verify.com', 'Resume Builder');
    $mail->addAddress($email_id);     //Add a recipient



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Forgot Password ?';
    $mail->Body    = 'Your 6 digit verification code is : <b>'.$otp.'</b>';

    $mail->send();
    
    $fn->setSession('otp',$otp);
    $fn->setSession('email',$email_id);

    header('Location: ../verification.php');
            exit();

} catch (Exception $e) {
    $fn->setError($mail->ErrorInfo);
    header('Location: ../forgot-password.php');
    exit();
}
        } else {
            $fn->setError($email_id . ' is not registered');
            header('Location: ../forgot-password.php');
            exit();
        }
    } else {
        $fn->setError('Please enter email id');
        header('Location: ../forgot-password.php');
        exit();
    }
} else {
    header('Location: ../forgot-password.php');
    exit();
}
?>