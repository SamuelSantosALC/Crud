<?php

$host = "localhost";
$db = "crud";
$user = "root";
$pass = "";
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=crud;charset=utf8mb4",
        "root",
        ""
    );
} catch (PDOException $erro) {
    header('Location: erropage.php');
    exit;
}
