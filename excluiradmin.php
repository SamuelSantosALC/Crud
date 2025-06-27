<?php
include_once 'conexao.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: admin.php');
    exit;
}

// Troque esta linha:
// $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
// Por:
$stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
$stmt->execute([$id]);

header('Location: admin.php');
exit;
?>
