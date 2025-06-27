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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adega Control</title>
    <link rel="icon" type="image/x-icon" href="assets/images/adegacontrol_logo.PNG">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-4xl mx-auto mt-10 bg-white rounded shadow p-8">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.797.657 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Lista de Administradores
            <a href="cadastroadmin.php" class="ml-auto flex items-center gap-1 bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded shadow transition text-base">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Adicionar Admin
            </a>
        </h1>
        <table class="min-w-full bg-white border rounded">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Nome</th>
                    <th class="py-2 px-4 border-b">Usuário</th>
                    <th class="py-2 px-4 border-b">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM usuarios");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                        <td class='py-2 px-4 border-b'>{$row['id']}</td>
                        <td class='py-2 px-4 border-b'>{$row['nomecompleto']}</td>
                        <td class='py-2 px-4 border-b'>{$row['login']}</td>
                        <td class='py-2 px-4 border-b'>
                            <button onclick=\"window.location.href='editaradmin.php?id=" . $row['id'] . "'\" class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded'>Editar</button>
                            <button onclick=\"if(confirm('Tem certeza que deseja excluir este registro?')){ window.location.href='excluiradmin.php?id=" . $row['id'] . "'; }\" class='bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded'>Excluir</button>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="dashboard.php" class="mt-6 inline-block bg-gray-700 hover:bg-gray-900 text-white px-4 py-2 rounded">Voltar ao Dashboard</a>
    </div>
</body>
</html>
