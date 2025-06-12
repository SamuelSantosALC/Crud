<?php
include_once 'conexao.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $sql = "SELECT * FROM usuarios WHERE login = :login";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':login', $login);
    $stmt->execute();

    $usuario = $stmt->fetch();
    if ($usuario && password_verify($senha, $usuario['senha'])) {
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

    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <div class="bg-gray-200 flex flex-col items-center justify-center h-screen">
    <img src="assets/adegacontrol_logo.png" class="w-120 h-80" alt="logo">
    <form method="POST">
        <div class="flex flex-col items-center font-bold">
        <h1>Login Admin</h1>
        <p>Digite seu login e senha para acessar o painel administrativo.</p>
    
        <input type="text" name="login" placeholder="Login" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit" class="bg-blue-400 hover:bg-blue-600 transition rounded-lg shadow-lg text-center p-4 text-white">Entrar</button>
         <script>
    lucide.createIcons();
  </script>
        </div>
    </form>
    <button onclick="window.location.href='cadastroadmin.php'"> <- Voltar Para a Pagina Inicial</button>
    </div>
</body>
</html>