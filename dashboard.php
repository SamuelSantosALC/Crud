<?php
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
    <button onclick="window.location.href='cadastroadmin.php'">Cadastrar Novo Usuário</button>
</body>
</html> 