<?php
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="style_index.css">
</head>
<body id="index_page">
    <div id="index_content">
        <h1 id="welcome">Bem-vindo ao Adega control</h1>
        <button onclick="window.location.href='login.php'" id="button" class="bg-blue-400 hover:bg-blue-600 transition rounded-lg shadow-lg text-center p-4 text-white">Fazer Login</button>
    </div>
    <footer class="text-center text-gray-500 text-sm mt-4 z-10 position top-400, bottom-, left-0, right-" >
        <p>Desenvolvido por Samuel Santos</p>
        &copy; 2025 Adega Control. Todos os direitos reservados.
    </footer>
</body>
</html>        