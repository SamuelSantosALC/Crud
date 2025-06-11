<?php
include_once 'conexao.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID inválido!";
    exit;
}

// Se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomecompleto = $_POST['nomecompleto'];
    $login = $_POST['login'];

    $sql = "UPDATE usuarios SET nomecompleto = ?, login = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nomecompleto, $login, $id]);

    header("Location: admin.php");
    exit;
}

// Buscar dados do usuário
$sql = "SELECT * FROM usuarios WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$usuario = $stmt->fetch();

if (!$usuario) {
    echo "Usuário não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <form method="post">
        <label>Nome Completo:</label><br>
        <input type="text" name="nomecompleto" value="<?= htmlspecialchars($usuario['nomecompleto']) ?>" required><br><br>
        <label>Login:</label><br>
        <input type="text" name="login" value="<?= htmlspecialchars($usuario['login']) ?>" required><br><br>
        <button type="submit">Salvar</button>
        <a href="admin.php">Cancelar</a>
    </form>
</body>
</html>