<?php
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "colleprj"; 

$conn_users = new mysqli($host, $username, $password, $database);

if ($conn_users->connect_error) {
    die("La connexion à la base de données 'users' a échoué : " . $conn_users->connect_error);
}

$conn_posts = new mysqli($host, $username, $password, $database);

if ($conn_posts->connect_error) {
    die("La connexion à la base de données 'posts' a échoué : " . $conn_posts->connect_error);
}

$conn_users->set_charset("utf8mb4");
$conn_posts->set_charset("utf8mb4");
?>
