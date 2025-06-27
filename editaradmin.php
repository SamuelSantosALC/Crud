<?php
include_once 'conexao.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: admin.php');
    exit;
}
$stmt = $pdo->query("SELECT * FROM usuarios WHERE id = $id");
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomecompleto = $_POST['nomecompleto'];
    $login = $_POST['login'];
    $update = $pdo->prepare("UPDATE usuarios SET nomecompleto=?, login=? WHERE id=?");
    $update->execute([$nomecompleto, $login, $id]);
    header("Location: admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Administrador - Adega Control</title>
    <link rel="icon" type="image/x-icon" href="assets/images/adegacontrol_logo.PNG">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-lg mx-auto mt-12 bg-white rounded shadow p-8">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m6 0a6 6 0 11-12 0 6 6 0 0112 0z" />
            </svg>
            Editar Administrador
        </h1>
        <form action="editaradmin.php?id=<?php echo $id; ?>" method="post" class="space-y-5">
            <div>
                <label class="block text-gray-700 font-semibold mb-1" for="nomecompleto">Nome Completo</label>
                <input type="text" id="nomecompleto" name="nomecompleto" value="<?php echo htmlspecialchars($admin['nomecompleto']); ?>" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1" for="login">Usuário</label>
                <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($admin['login']); ?>" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1" for="senha">Senha <span class="text-xs text-gray-500">(preencha apenas se for alterar)</span></label>
                <input type="password" id="senha" name="senha" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow transition">Salvar</button>
                <a href="admin.php" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded shadow transition">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>