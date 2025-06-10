<?php
include_once 'conexao.php';

$sql = "SELECT * FROM usuarios";
$stmt = $conn->prepare($sql);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admins</title>
</head>
<body>
    <h1>Admins</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Login</th>
        </tr>
        <?php foreach ($usuarios as $admin): ?>
        <tr>
            <td><?php echo $admin['id']; ?></td>
            <td><?php echo $admin['nomecompleto']; ?></td>
            <td><?php echo $admin['login']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <button onclick="window.location.href='dashboard.php'">Voltar</button>
</body>
</html>