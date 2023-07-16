<?php
session_start();

// Il y a un bug, il faut séparer la connection, il faut qu'elle se fasse ici

$user = 'root';
$password = 'HLyeafaW2ajD4Y';
$database = 'lescaissesduseigneurs'; 

$conn = new mysqli('127.0.0.1', $user, $password, $database, $port);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$mysqli->close();
?>
