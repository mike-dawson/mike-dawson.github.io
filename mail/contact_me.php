<?php
require 'mailer/PHPMailerAutoload.php';
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                    // Enable SMTP authentication
$mail->Username = 'Email';          // SMTP username
$mail->Password = 'Password'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('info@example.com', 'Website');
$mail->addAddress('ContactEmail');   // Add a recipient

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = $phone;
$bodyContent .= $message;

$mail->Subject = 'Website Query from' $email_address;
$mail->Body    = $bodyContent;
 if(!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent';
}     
?>
