<?php
include_once 'conexao.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
$admin = $_SESSION['admin'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adega Control - Dashboard</title>
    <link rel="icon" type="image/x-icon" href="assets/images/adegacontrol_logo.PNG">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <header class="bg-gray-800 text-white p-4 flex items-center">
        <img src="assets/images/adegacontrol_logo_mini.PNG" alt="Logo Adega Control" class="w-16 h-16 mr-4">
        <h1 class="text-2xl font-bold flex-1">Adega Control</h1>
        <nav class="flex space-x-4">
            <form action="logout.php" method="post" class="inline">
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Sair</button>
            </form>
        </nav>
    </header>
    <main class="max-w-5xl mx-auto mt-10">
        <div class="mb-8">
            <h2 class="text-xl font-semibold">Bem-vindo, <?php echo htmlspecialchars($admin); ?>!</h2>
            <p class="text-gray-600">Aqui está um resumo do sistema:</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <!-- Card 1: Total de Produtos -->
            <div class="bg-white rounded shadow p-6 flex flex-col items-center">
                <?php
                $stmt = $pdo->query("SELECT COUNT(*) as total FROM produtos");
                $total_produtos = $stmt->fetch()['total'];
                ?>
                <span class="text-4xl font-bold text-blue-700"><?php echo $total_produtos; ?></span>
                <span class="text-gray-700 mt-2">Produtos cadastrados</span>
            </div>
            <!-- Card 2: Total de Administradores -->
            <div class="bg-white rounded shadow p-6 flex flex-col items-center">
                <?php
                $stmt = $pdo->query("SELECT COUNT(*) as total FROM usuarios");
                $total_admins = $stmt->fetch()['total'];
                ?>
                <span class="text-4xl font-bold text-green-700"><?php echo $total_admins; ?></span>
                <span class="text-gray-700 mt-2">Administradores</span>
            </div>
            <!-- Card 3: Último Produto Cadastrado -->
            <div class="bg-white rounded shadow p-6 flex flex-col items-center">
                <?php
                $stmt = $pdo->query("SELECT nome FROM produtos ORDER BY id DESC LIMIT 1");
                $ultimo = $stmt->fetch();
                $ultimo_nome = $ultimo ? $ultimo['nome'] : 'Nenhum';
                ?>
                <span class="text-2xl font-bold text-purple-700"><?php echo htmlspecialchars($ultimo_nome); ?></span>
                <span class="text-gray-700 mt-2">Último produto cadastrado</span>
            </div>
        </div>
        <div class="bg-white rounded shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Ações rápidas</h3>
            <div class="flex flex-wrap gap-4">
                <a href="produtos.php"
                    class="flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                    </svg>
                    Ver Produtos
                </a>
                <a href="admin.php"
                    class="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.797.657 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Ver Administradores
                </a>
            </div>
        </div>
    </main>
</body>

</html>