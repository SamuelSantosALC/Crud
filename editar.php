<?php

include_once 'conexao.php';

if (!isset($_GET['id'])) {
    echo "Erro em voltar o ID";
    exit;
}
else {
        $id = $_GET['id'];
    }

    $sql = "SELECT id, nomecompleto, login FROM usuarios WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nomecompleto = $_POST['nomecompleto'];
        $login = $_POST['login'];

        if (empty($nomecompleto) || empty($login)) {
            echo "Preencha todos os campos";
        } else {
            $sql = "UPDATE usuarios SET nomecompleto = :nomecompleto, login = :login WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':nomecompleto', $nomecompleto);
            $stmt->bindValue(':login', $login);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            header("Location: admin.php");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adega control</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <form method="post">
        <label>Nome Completo:</label><br>
        <input type="text" name="nomecompleto" value="<?= ($usuario['nomecompleto']) ?>" required><br><br>
        <label>Login:</label><br>
        <input type="text" name="login" value="<?= ($usuario['login']) ?>" required><br><br>
        <button type="submit">Salvar</button>
        <a href="admin.php">Cancelar</a>
    </form>
</body>
</html>