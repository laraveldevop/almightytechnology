<?php

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 0;
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "mail.almightytechnology.co.in";
$mail->Username   = "support@almightytechnology.co.in";
$mail->Password   = "W23tq9Z2sw";

$mail->IsHTML(true);
$mail->AddAddress("piyushrdc07@gmail.com", "Almighty Technology");
$mail->SetFrom("support@almightytechnology.co.in", "Support");
$mail->Subject = "Contact us inquiry";

$msg = "Name: " . $_POST["first_name"]." ".$_POST["last_name"] . "\r\n";
$msg .= "Email: " . $_POST["email"] . "\r\n";
$msg .= "Phone: " . $_POST["phone"] . "\r\n";
$msg .= "Message: " . $_POST["message"] . "\r\n";

$mail->MsgHTML($msg);
if($_POST["first_name"] != '' && $_POST["email"] != '' && $_POST["phone"] != '' && $_POST["message"] != ''){
	if(!$mail->Send()) {
		echo "false";
		//var_dump($mail);
	} else {
		echo "true";
	}
}else{
	echo "true";
}

exit;

// magento

$toEmail = "devop@binarycode.co.nz";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From:<info@bookatime.co.nz>' . "\r\n";
//$headers .= "From: " . $_POST["userName"] . "<". $_POST["userEmail"] .">\r\n";
$msg = "Name: " . $_POST["userName"] . "\r\n";
$msg .= "Email: " . $_POST["userEmail"] . "\r\n";
$msg .= "Phone: " . $_POST["subject"] . "\r\n";
$msg .= "Message: " . $_POST["content"] . "\r\n";
//echo $headers;
//echo "<br />";
//echo $msg;
//exit;
if(mail($toEmail, "Contact us inquiry", $msg, $headers)) {
    print "true";
} else {
    print "false";
}
?>
