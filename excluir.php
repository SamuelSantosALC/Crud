<?php
include_once 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    header("Location: admin.php");
    exit;
} else {
    echo "id invalido";
    header("Location: admin.php");
    exit;
}
?>
