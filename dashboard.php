<?php
include_once'conexao.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Sistema</title>
</head>

<body>
    <h1>Bem-vindo ao Painel Administrativo</h1>
    <p>Olá, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</p>
    <button onclick="window.location.href='cadastroadmin.php'">Cadastrar Novo Usuário</button>
    <button onclick="window.location.href='admin.php'">Administradores</button>
    <button onclick="window.location.href='index.php'"> Encerrar Sessão</button>

</body>
</html> 