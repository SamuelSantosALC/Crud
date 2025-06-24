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
    <label for="nomecompleto">Nome:</label>
    <input type="text" name="Nome" id="Nome" required><br><br>
    <label for="login">Tipo:</label>   
    <input type="text" name="Tipo" id="Tipo" required><br><br>
    <label for="Fornecedor">Fornecedor:</label>
    <input type="text" name="Fornecedor" id="Fornecedor" required><br><br>
    <input type="submit" value="Cadastrar">
</form>

<?php

include_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nomecompleto = $_POST['Nome'] ?? '';
    $login = $_POST['Tipo'] ?? '';
    $senha = $_POST['Fornecedor'] ?? '';

    if (empty($nome) || empty($tipo) || empty($fornecedor)) {
        echo "Por favor, preencha todos os campos!";
    } else {
        $sql = "INSERT INTO usuarios (nome, tipo, fornecedor) VALUES (:nome, :tipo, :fornecedor)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':tipo', $tipo);
        $stmt->bindValue(':fornecedor', $fornecedor);
        $stmt->execute();

        echo "Produto cadastrado com sucesso!";
        echo "<br><button onclick=\"window.location.href='admin.php'\">Voltar</button>";
    }
}
?>
</body>
</html>