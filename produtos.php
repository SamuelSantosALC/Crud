<?php
include_once 'conexao.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

// Alerta de estoque baixo
$alerta = $pdo->query("SELECT COUNT(*) as qtd FROM produtos WHERE estoque <= 5 AND estoque > 0");
$tem_baixo = $alerta->fetch()['qtd'] > 0;

// Busca produtos com estoque baixo para o card
$produtos_baixo = $pdo->query("SELECT nome, estoque FROM produtos WHERE estoque <= 5 AND estoque > 0");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos - Adega Control</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-5xl mx-auto mt-10 bg-white rounded shadow p-8">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
            </svg>
            Lista de Produtos
        </h1>

        <?php if ($tem_baixo): ?>
        <div class="mb-6 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 rounded shadow">
            <strong>Atenção:</strong> Os seguintes produtos estão com baixo estoque:
            <ul class="list-disc ml-6 mt-2">
                <?php while($p = $produtos_baixo->fetch()): ?>
                    <li><?php echo htmlspecialchars($p['nome']); ?> (<?php echo $p['estoque']; ?> unidades)</li>
                <?php endwhile; ?>
            </ul>
        </div>
        <?php endif; ?>

        <a href="cadastroprodutos.php" class="mb-6 inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow transition">
            + Adicionar Produto
        </a>
        <table class="min-w-full bg-white border rounded overflow-hidden shadow">
            <thead class="bg-blue-100">
                <tr>
                    <th class="py-3 px-4 border-b text-left font-semibold text-blue-900">ID</th>
                    <th class="py-3 px-4 border-b text-left font-semibold text-blue-900">Nome</th>
                    <th class="py-3 px-4 border-b text-left font-semibold text-blue-900">Tipo</th>
                    <th class="py-3 px-4 border-b text-left font-semibold text-blue-900">Fornecedor</th>
                    <th class="py-3 px-4 border-b text-left font-semibold text-blue-900">Litragem</th>
                    <th class="py-3 px-4 border-b text-left font-semibold text-blue-900">Preço</th>
                    <th class="py-3 px-4 border-b text-left font-semibold text-blue-900">Estoque</th>
                    <th class="py-3 px-4 border-b text-left font-semibold text-blue-900">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $pdo->query("SELECT id, nome, tipo, fornecedor, litragem, unidade, preco, estoque FROM produtos");
                while ($row = $result->fetch()) {
                    $estoque = (int)$row['estoque'];
                    $status = $estoque == 0 ? "<span class='text-red-600 font-bold'>Esgotado</span>" : $estoque;
                    $litragem = htmlspecialchars($row['litragem']) . ' ' . htmlspecialchars($row['unidade']);
                    $preco = 'R$ ' . number_format($row['preco'], 2, ',', '.');
                    echo "<tr class='hover:bg-blue-50 transition'>
                        <td class='py-2 px-4 border-b'>{$row['id']}</td>
                        <td class='py-2 px-4 border-b'>{$row['nome']}</td>
                        <td class='py-2 px-4 border-b'>{$row['tipo']}</td>
                        <td class='py-2 px-4 border-b'>{$row['fornecedor']}</td>
                        <td class='py-2 px-4 border-b'>{$litragem}</td>
                        <td class='py-2 px-4 border-b'>{$preco}</td>
                        <td class='py-2 px-4 border-b text-center'>{$status}</td>
                        <td class='py-2 px-4 border-b flex gap-2'>
                            <a href='editarprodutos.php?id={$row['id']}' class='bg-blue-500 hover:bg-blue-700 text-white px-3 py-1 rounded shadow transition'>Editar</a>
                            <a href='estoque.php?id={$row['id']}' class='bg-yellow-500 hover:bg-yellow-700 text-white px-3 py-1 rounded shadow transition'>Mudar Estoque</a>
                            <a href='excluirproduto.php?id={$row['id']}' onclick=\"return confirm('Tem certeza que deseja excluir este produto?');\" class='bg-red-500 hover:bg-red-700 text-white px-3 py-1 rounded shadow transition'>Excluir</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <a href='dashboard.php' class='mt-6 inline-block bg-gray-700 hover:bg-gray-900 text-white px-4 py-2 rounded shadow transition'>Voltar ao Dashboard</a>
    </div>
</body>
</html>