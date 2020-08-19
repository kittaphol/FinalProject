<?php 


require 'mail/phpmailer2/PHPMailerAutoload.php';

//header('Content-Type: text/html; charset=utf-8');
require 'mail/phpmailer2/class.phpmailer.php';
require 'mail/phpmailer2/class.smtp.php';

$mail = new PHPMailer;
$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';

$mail->Username = '5910210009@psu.ac.th';
$mail->Password = 'Toey_55988';

$mail->setFrom('5910210009@psu.ac.th','New Hoover Tour');
$mail->addAddress('toeykittaphol@gmail.com');
$mail->addReplyTo('5910210009@psu.ac.th');

$mail->isHTML(true);
$mail->Subject = 'submit';
$mail->Body = '<h3 align=left>vbvb</h3>';

if (!$mail ->send()) {
	echo "ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง";
}else{
	echo "ระบบได้ส่งข้อความไปเรียบร้อย";
}

?>

