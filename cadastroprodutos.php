<?php
include_once 'conexao.php';
session_start();
if (!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $fornecedor = $_POST['fornecedor'] ?? '';
    $preco = floatval(str_replace(',', '.', $_POST['preco'] ?? '0'));
    $litragem = $_POST['litragem'] ?? '';
    $unidade = $_POST['unidade'] ?? '';
    $estoque = intval($_POST['estoque'] ?? 0);

    if ($nome && $tipo && $fornecedor && $preco && $litragem && $unidade) {
        $stmt = $pdo->prepare("INSERT INTO produtos (nome, tipo, fornecedor, preco, litragem, unidade, estoque) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$nome, $tipo, $fornecedor, $preco, $litragem, $unidade, $estoque])) {
            header('Location: produtos.php');
            exit;
        } else {
            $erro = "Erro ao cadastrar produto!";
        }
    } else {
        $erro = "Preencha todos os campos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
<div class="max-w-lg mx-auto mt-12 bg-white rounded shadow p-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Adicionar Produto</h1>
    <?php if (!empty($erro)): ?>
        <div class="mb-4 text-red-600 font-bold"><?php echo $erro; ?></div>
    <?php endif; ?>
    <form method="post" class="space-y-5">
        <div>
            <label class="block mb-1">Nome</label>
            <input type="text" name="nome" required class="w-full px-4 py-2 border rounded">
        </div>
        <div>
            <label class="block mb-1">Tipo</label>
            <input type="text" name="tipo" required class="w-full px-4 py-2 border rounded">
        </div>
        <div>
            <label class="block mb-1">Fornecedor</label>
            <input type="text" name="fornecedor" required class="w-full px-4 py-2 border rounded">
        </div>
        <div>
            <label class="block mb-1">Preço</label>
            <input type="number" step="0.01" min="0" name="preco" required class="w-full px-4 py-2 border rounded">
        </div>
        <div>
            <label class="block mb-1">Litragem</label>
            <div class="flex gap-2">
                <input type="number" step="0.01" min="0" name="litragem" required class="w-full px-4 py-2 border rounded">
                <select name="unidade" class="px-2 py-2 border rounded">
                    <option value="ml">ml</option>
                    <option value="lt">lt</option>
                </select>
            </div>
        </div>
        <div>
            <label class="block mb-1">Estoque</label>
            <input type="number" min="0" name="estoque" required class="w-full px-4 py-2 border rounded">
        </div>
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">Cadastrar</button>
        <a href="produtos.php" class="bg-gray-500 hover:bg-gray-700 text-white px-6 py-2 rounded">Cancelar</a>
    </form>
</div>
</body>
</html>