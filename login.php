<?php
include_once 'conexao.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $sql = "SELECT * FROM usuarios WHERE login = :login AND senha = :senha";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':login', $login);
    $stmt->bindValue(':senha', $senha);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION['admin'] = $login;
        header('Location: dashboard.php');
        exit;
    } else {
        $erro = "Login ou senha inválidos!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>

</head>
<body>
    <form method="POST">
        <h1>Login Admin</h1>
        <p>Digite seu login e senha para acessar o painel administrativo.</p>
        <input type="text" name="login" placeholder="Login" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <input type="submit" value="Entrar">
    </form>
     <button onclick="window.location.href='cadastroadmin.php'">Voltar Para a Pagina Inicial</button>
</body>
</html>