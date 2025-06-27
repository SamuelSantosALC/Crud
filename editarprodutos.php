<?php
include_once 'conexao.php';
session_start();
if (!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }
$id = $_GET['id'] ?? null;
if (!$id) { header('Location: produtos.php'); exit; }
$stmt = $pdo->query("SELECT * FROM produtos WHERE id = $id");
$produto = $stmt->fetch(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $fornecedor = $_POST['fornecedor'];
    $preco = floatval(str_replace(',', '.', $_POST['preco']));
    $litragem = $_POST['litragem'];
    $unidade = $_POST['unidade'];
    $update = $pdo->prepare("UPDATE produtos SET nome=?, tipo=?, fornecedor=?, preco=?, litragem=?, unidade=? WHERE id=?");
    $update->execute([$nome, $tipo, $fornecedor, $preco, $litragem, $unidade, $id]);
    header("Location: produtos.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"><title>Editar Produto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
<div class="max-w-lg mx-auto mt-12 bg-white rounded shadow p-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Editar Produto</h1>
    <form method="post" class="space-y-5">
        <div>
            <label class="block mb-1">Nome</label>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required class="w-full px-4 py-2 border rounded">
        </div>
        <div>
            <label class="block mb-1">Tipo</label>
            <input type="text" name="tipo" value="<?php echo htmlspecialchars($produto['tipo']); ?>" required class="w-full px-4 py-2 border rounded">
        </div>
        <div>
            <label class="block mb-1">Fornecedor</label>
            <input type="text" name="fornecedor" value="<?php echo htmlspecialchars($produto['fornecedor']); ?>" required class="w-full px-4 py-2 border rounded">
        </div>
        <div>
            <label class="block mb-1">Preço</label>
            <input type="number" step="0.01" min="0" name="preco" value="<?php echo htmlspecialchars($produto['preco'] ?? ''); ?>" required class="w-full px-4 py-2 border rounded">
        </div>
        <div>
            <label class="block mb-1">Litragem</label>
            <div class="flex gap-2">
                <input type="number" step="0.01" min="0" name="litragem" value="<?php echo htmlspecialchars($produto['litragem'] ?? ''); ?>" required class="w-full px-4 py-2 border rounded">
                <select name="unidade" class="px-2 py-2 border rounded">
                    <option value="ml" <?php if(($produto['unidade'] ?? '') == 'ml') echo 'selected'; ?>>ml</option>
                    <option value="lt" <?php if(($produto['unidade'] ?? '') == 'lt') echo 'selected'; ?>>lt</option>
                </select>
            </div>
        </div>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Salvar</button>
        <a href="produtos.php" class="bg-gray-500 hover:bg-gray-700 text-white px-6 py-2 rounded">Cancelar</a>
    </form>
</div>
</body>
</html>