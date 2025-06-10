<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adega Control</title>

</head>
<body>
    <h1>Cadastro</h1>
    <form method="POST">
    <label for="nome">Nome:</label>
    <input type="text" name="nomecompleto" id="nomecompleto"><br><br>

    <label for="login">Login:</label>
    <input type="text" name="login" id="login"><br><br>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha"><br><br>

    <input type="submit" value="Cadastrar">
</form>

<?php

include_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nomecompleto = $_POST['nomecompleto'] ?? '';
    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (empty($nomecompleto) || empty($login) || empty($senha)) {
        echo "Por favor, preencha todos os campos!";
    } else {
        $pdo = new PDO('mysql:host=localhost;dbname=crud', 'root', '');

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nomecompleto, login, senha) VALUES (:nomecompleto, :login, :senha)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nomecompleto', $nomecompleto);
        $stmt->bindValue(':login', $login);
        $stmt->bindValue(':senha', $senhaHash);
        $stmt->execute();

        echo "Usuário cadastrado com sucesso!";
        echo "<br><button onclick=\"window.location.href='admin.php'\">Voltar</button>";
    }
}
?>
</body>
</html>