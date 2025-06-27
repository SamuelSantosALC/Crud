<?php
include_once 'conexao.php';
session_start();
if (!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }
$id = $_GET['id'] ?? null;
if (!$id) { header('Location: produtos.php'); exit; }
$stmt = $pdo->query("SELECT * FROM produtos WHERE id = $id");
$produto = $stmt->fetch(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $estoque = intval($_POST['estoque']);
    $update = $pdo->prepare("UPDATE produtos SET estoque=? WHERE id=?");
    $update->execute([$estoque, $id]);
    header("Location: produtos.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"><title>Mudar Estoque</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
<div class="max-w-lg mx-auto mt-12 bg-white rounded shadow p-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Mudar Estoque</h1>
    <form method="post" class="space-y-5">
        <div>
            <label class="block mb-1">Produto: <?php echo htmlspecialchars($produto['nome']); ?></label>
            <input type="number" name="estoque" value="<?php echo $produto['estoque']; ?>" min="0" required class="w-full px-4 py-2 border rounded">
        </div>
        <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2 rounded">Salvar</button>
        <a href="produtos.php" class="bg-gray-500 hover:bg-gray-700 text-white px-6 py-2 rounded">Cancelar</a>
    </form>
</div>
</body>
</html>