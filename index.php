<?php
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 flex flex-col items-center justify-center relative h-screen">
    <div class="bg-white rounded-lg shadow-lg text-center p-8 z-10 border-gray-500 border-2 space-y-4">
        <h1 class="font-bold text-1x">Bem-vindo ao Adega control</h1>
        <button onclick="window.location.href='login.php'" class="bg-blue-400 hover:bg-blue-600 transition rounded-lg shadow-lg text-center p-4 text-white">Fazer Login</button>
    </div>
    <footer class="text-center text-gray-500 text-sm mt-4 z-10 position top-400, bottom-, left-0, right-" >
        <p>Desenvolvido por Samuel Santos</p>
        &copy; 2025 Adega Control. Todos os direitos reservados.
    </footer>
</body>
</html>