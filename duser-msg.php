<?php

if(isset($_POST['send_msg']))
{

require 'pdf/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'mayur.hadawale@somaiya.edu';          // SMTP username
$mail->Password = 'whiterock88'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->addReplyTo($_POST['sender-email']);
$mail->addAddress('mayur.hadawale@somaiya.edu');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h3> Sender name : </h3>'.$_POST['sender-name'].'<br><h3>Sender email id : </h3>'.$_POST['sender-email'].'<br><h3>Message :</h3><p>'.$_POST['sender-msg'].'</p>';

$mail->Subject = 'New user message';
$mail->Body    = $bodyContent;

  if(!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } 
  else {
      echo '<h2>Your Message has been received successfully.</h2>';
  }
}
else
{
    $pdf->output();
}

?>