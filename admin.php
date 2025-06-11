<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>

</head>
<body>
   <h1>Usuários Cadastrados</h1>
    <button onclick="window.location.href='cadastroadmin.php'">Cadastrar Novo Usuário</button>
   <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome Completo</th>
            <th>Login</th>
            <th>Ações</th>
        </tr>
   <?php 
include_once 'conexao.php';
$sql = "SELECT id, nomecompleto, login FROM usuarios";
        $stmt = $pdo->query($sql);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nomecompleto']) . "</td>";
                echo "<td>" . htmlspecialchars($row['login']) . "</td>";
                echo "<td><button onclick=\"window.location.href='editar.php?id=" . $row['id'] . "'\">Editar</button> ";
                echo "<button onclick=\"window.location.href='excluir.php?id=" . $row['id'] . "'\">Excluir</button></td>";
                echo "</tr>";
            }
        }
   ?> 
   </table>
    <button onclick="window.location.href='dashboard.php'">Voltar</button>
</body>
</html>
