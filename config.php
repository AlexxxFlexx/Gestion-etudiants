<?php
$servername = "localhost";
$username = "root";
$dbname = "gestion_etudiants";
$password = "root";
$port = 8889;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;port=$port;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo "Connection failed: " . $error->getMessage();
    exit;
}
?>