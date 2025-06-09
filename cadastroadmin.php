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
    <input type="text" name="nome" id="nome"><br><br>

    <label for="login">Login:</label>
    <input type="text" name="login" id="login"><br><br>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" required><br><br>

    <input type="submit" value="Cadastrar">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pegando os dados enviados pelo formulário
    $nome = $_POST['nome'] ?? '';
    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Validação: impede campos vazios
    if (empty($nome) || empty($login) || empty($senha)) {
        echo "Por favor, preencha todos os campos!";
    } else {
        // Conexão com o banco de dados
        $pdo = new PDO('mysql:host=localhost;dbname=crud', 'root', '');

        // Aqui acontece a mágica: a senha é criptografada!
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        // Agora salvamos o hash da senha no banco, não a senha original
        $sql = "INSERT INTO usuarios (nome, login, senha) VALUES (:nome, :login, :senha)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':login', $login);
        $stmt->bindValue(':senha', $senhaHash); // Aqui vai o hash!
        $stmt->execute();

        echo "Usuário cadastrado com sucesso!";
    }
}
?>
</body>
</html>