
<?php
$to_email = "chrazesh3@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hello";
$header = "From: support@globaltech.com.np";
$mail_sent = mail($to_email, $subject, $body, $header);
echo $mail_sent ? "Mail sent" : "Mail failed";
?>