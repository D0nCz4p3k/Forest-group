<?php

$name = $_POST["name"]; // input name="name"
$from = $_POST["email"]; // input name="email"
$subject = "Wiadomość z formularza na stronie XYZ";
$to = "mateuszczapski2@gmail.com"; // adres, na który ma zostać wysłany mail
$message = $_POST["msg"]; // textarea name="msg"

$txt = "Imię: " . $name . "\r\n" . "Email: " . $from . "\r\n" . "\r\n" . "Treść: " . $message;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8" . "\r\n";
$headers .= "From: " . $from . "\r\n";
$headers .= "Reply-To: " . $from . "\r\n";


ob_start();
$mail_status = mail($to, $subject, $txt, $headers);
ob_end_clean();

if ($mail_status) {
    header("Location: /contact.html?mail_status=sent"); // jeśli formularz jest na stronie głównej, zmień na index.html
} else {
    header("Location: /contact.html?mail_status=error"); // jeśli formularz jest na stronie głównej, zmień na index.html
}