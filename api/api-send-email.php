<?php
session_start();
if(!$_SESSION){
    sendError('no user signed in', __LINE__);
}
if(empty($_POST['emailSubject'])){
    sendError('no subject', __LINE__);

} 
if(empty($_POST['emailBody'])){
    sendError('no body', __LINE__);
}


// echo 'sending email';
// mail(); only works on mac

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require __DIR__.'/../src/PHPMailer.php';
require __DIR__.'/../src/Exception.php';
require __DIR__.'/../src/SMTP.php';

// Instantiation and passing `true` enables exceptions(errors)
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'keakeakea45@gmail.com';                       // SMTP username
    $mail->Password   = 'Passwordkea';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to
    $mail->SMTPDebug = 0;
    //Recipients
    $mail->setFrom('keakeakea45@gmail.com', 'Kea-student');
    $mail->addAddress('keakeakea45@gmail.com','Kea');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('keakeakea45@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    // $sPath = "http://localhost/activate-email/api-activate-account.php?key=$sActivationKey&id=$sUserId";
    $sPath = "http://localhost/real-estate-project/";
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['emailSubject'];
    $mail->Body    = $_POST['emailBody'];
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send(); 
                                           // Sends the email
    echo '{"status":1, "message":"email sent"}';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



/**************************/

function sendError($message, $line){
    echo '{"status":0, "message":"'.$message.'", "line":"'.$line.'"}';
    exit;
}