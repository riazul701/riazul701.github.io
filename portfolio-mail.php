<?php
header('Access-Control-Allow-Origin: *');

define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASSWORD","");
define("DB_SCHEMA","portfolio");
// Open a connection
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_SCHEMA);

$stmt_contact =$mysqli->prepare("INSERT INTO contact (name, email, subject, message) VALUES (?, ?, ?, ?)");
$stmt_contact->bind_param('ssss', $name, $email, $subject, $message);
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$subject = trim($_POST['subject']);
$message = trim($_POST['message']);

if($stmt_contact->execute()) {
    echo 'success';
} else {
    echo 'failed';
}

