<?php
include_once'conexao.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Sistema</title>
    <link rel="stylesheet" href="assets/css/style_dashboard.css"

</head>
<body  id="dashboard_page">
    <div id="div_left">
            <div id="div_logo">
                <img src="assets/images/adegacontrol_logo_dark.PNG" alt="Logo Adega Control" id="logo">
                <button onclick="window.location.href='admin.php'">Administradores</button> <br>
                <button onclick="window.location.href='produtos.php'">Produtos</button> <br> 
                <button onclick="window.location.href='index.php'"> Encerrar Sessão</button>
            </div>   
    </div>
    <h1 id="welcome">Bem-vindo ao Painel Administrativo</h1>


</body>
</html> 