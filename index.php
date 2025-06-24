
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adega Control</title>
    <link rel="stylesheet" href="assets/css/style_index.css">
    
</head>
<body id="index_page">
    <div class="wave-background">
    <svg viewBox="0 0 1440 320" preserveAspectRatio="none">
      <path fill="#0099ff" fill-opacity="1"
        d="M0,64L48,85.3C96,107,192,149,288,176C384,203,480,213,576,197.3C672,181,768,139,864,133.3C960,128,1056,160,1152,165.3C1248,171,1344,149,1392,138.7L1440,128L1440,0L1392,0C1344,0,1248,0,
        1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
      </path>
    </svg>
  </div>
    <div id="div_logo">
        <img src="assets/images/adegacontrol_logo_dark.PNG" alt="Logo Adega Control" id="logo">
    </div>
    <div id="content_container">
        <div>
            <h1 id="welcome">Bem-vindo ao Adega control</h1>
        </div>
        <div>
            <p id="fazer_login">Fazer Login</p>
        </div>
        <form action="login.php" method="POST" id="form">
            <input type="text" name="login" placeholder="Login" required class="input1">
            <input type="password" name="senha" placeholder="Senha" required class="input2">
            <button type="submit" id="button">Entrar</button>
        </form>
    </div>
    <footer id="footer">
        <p>Desenvolvido por Samuel Santos</p>
        &copy; 2025 Adega Control. Todos os direitos reservados.
    </footer>
</body>
</html>        