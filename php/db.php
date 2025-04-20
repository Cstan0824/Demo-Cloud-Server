<?php 
include 'env.php';


$HOST = $_ENV['DB_HOST'];
$DATABASE   = $_ENV['DB'];
$USERNAME = $_ENV['DB_USER'];
$PASSWORD = $_ENV['DB_PASSWORD'];

$conn = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
