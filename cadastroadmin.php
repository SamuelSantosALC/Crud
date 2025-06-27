<?php
include_once 'conexao.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Administrador - Adega Control</title>
    <link rel="icon" type="image/x-icon" href="assets/images/adegacontrol_logo.PNG">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-lg mx-auto mt-12 bg-white rounded shadow p-8">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Cadastrar Administrador
        </h1>
        <form action="cadastroadmin.php" method="post" class="space-y-5">
            <div>
                <label class="block text-gray-700 font-semibold mb-1" for="nomecompleto">Nome Completo</label>
                <input type="text" id="nomecompleto" name="nomecompleto" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1" for="login">Usuário</label>
                <input type="text" id="login" name="login" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1" for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded shadow transition">Cadastrar</button>
                <a href="admin.php" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded shadow transition">Cancelar</a>
            </div>
        </form>
    </div>
    <?php

include_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nomecompleto = $_POST['nomecompleto'] ?? '';
    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (empty($nomecompleto) || empty($login) || empty($senha)) {
        echo "<div class='text-red-600 font-bold mt-4'>Por favor, preencha todos os campos!</div>";
    } else {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO usuarios (nomecompleto, login, senha) VALUES (?, ?, ?)");
        if ($stmt->execute([$nomecompleto, $login, $senhaHash])) {
            echo "<div class='flex items-center justify-center text-green-600 font-bold mt-4'>Usuário cadastrado com sucesso!</div>";
        } else {
            echo "<div class='flex items-center justify-center text-red-600 font-bold mt-4'>Erro ao cadastrar usuário!</div>";
        }
    }
}
?>
</body>
</html>