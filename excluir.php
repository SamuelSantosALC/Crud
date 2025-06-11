<?php
include_once 'conexao.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID inválido!";
    exit;
}

$sql = "DELETE FROM usuarios WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: admin.php");
exit;