
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adega Control</title>
    <link rel="stylesheet" href="style_index.css">
    
</head>
<body id="index_page">
    <img src="assets/adegacontrol_logo_dark.png" alt="Logo Adega Control" id="logo">
    <div id="content_container">
        <h1 id="welcome">Bem-vindo ao Adega control</h1>
        <p>Fazer Login</p>
        <form action="login.php" method="POST">
            <input type="text" name="login" placeholder="Login" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
    <footer id="footer">
        <p>Desenvolvido por Samuel Santos</p>
        &copy; 2025 Adega Control. Todos os direitos reservados.
    </footer>
</body>
</html>        