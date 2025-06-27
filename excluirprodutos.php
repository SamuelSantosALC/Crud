<?php
include_once 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM produtos WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    header("Location: produtos.php");
    exit;
} else {
    echo "id invalido";
    header("Location: produtos.php");
    exit;
}
?>
