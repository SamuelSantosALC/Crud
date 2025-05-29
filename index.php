<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
</head>
<body>
    <h1>Bem-vindo ao Adega control</h1>
    <button onclick="window.location.href='login.php'">Fazer Login</button>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $senha = $_POST['senha'] ?? '';

        $pdo = new PDO('mysql:host=localhost;dbname=crud', 'root', '');

        $sql = "INSERT INTO usuarios (nomecompleto, login, senha) VALUES (:nomecompleto, :login, :senha)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nomecompleto', 'Nome Exemplo'); 
        $stmt->bindValue(':login', 'login_exemplo');     
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();

        echo "Usuário cadastrado!";
    }
    ?>
</body>
</html>