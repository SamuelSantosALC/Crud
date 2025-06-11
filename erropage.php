<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Sistema</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="flex flex-row bg-white rounded-lg shadow-lg p-8">
            <img src="assets/bg.png" alt="erro" class="w-60 h-60"/>
            <div class="flex flex-col justify-center">
                <h1 class="font-bold text-4xl mb-5">Erro</h1>
                <p class="font-sans text-lg mb-10">Ocorreu um erro ao processar sua solicitação. Por favor, tente novamente mais tarde.</p>
                <button onclick="window.location.href='index.php'" class="bg-blue-400 hover:bg-blue-600 transition rounded-lg shadow-lg text-center p-4 text-white">
                    Tentar novamente
                </button>
            </div>
        </div>
    </div>
</body>
</html>