<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adega Control</title>
    <link rel="icon" type="image/x-icon" href="assets/images/adegacontrol_logo.PNG"
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="bg-white min-h-screen flex items-center justify-center bg-[url(assets/images/wave.jpeeg)] bg-cover bg-center relative z-10">
        <div class="bg-white/70 rounded-3xl shadow-2xl flex flex-col md:flex-row items-center p-10 gap-10">
            <div class="flex flex-col items-center">
                <img src="assets/images/adegacontrol_logo_dark.png" alt="Logo Adega Control" class="w-60 h-60 object-contain mb-4 drop-shadow-lg">
                <h1 class="text-2xl font-extrabold text-black mb-2">Bem-vindo ao Adega Control</h1>
                <p class="text-gray-600 mb-4">Fazer Login</p>
            </div>
            <form action="login.php" method="POST" id="form" class="flex flex-col gap-4 bg-white/90 rounded-xl p-8 shadow-lg min-w-[300px]">
                <div>
                    <label for="login" class="block text-gray-700 font-semibold mb-1">Usuário</label>
                    <input type="text" id="login" name="login" placeholder="Digite seu login" required class="border border-gray-300 p-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                </div>
                <div class="relative">
                    <label for="senha" class="block text-gray-700 font-semibold mb-1">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required class="border border-gray-300 p-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition pr-16">
                    <button type="button" id="toggleSenha" class="absolute right-2 top-8 text-blue-500 hover:text-blue-700 text-sm font-semibold focus:outline-none">Mostrar</button>
                </div>
                <button type="submit" id="button" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-lg transition duration-150 ease-in-out shadow-md mt-2">Entrar</button>
            </form>
        </div>
    </div>
    <!-- SVG da wave fora da div principal -->
    <div class="fixed bottom-0 left-0 w-full z-0 pointer-events-none">
      <svg class="w-full h-100" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill="#3b82f6" fill-opacity="1" d="M0,160L48,170.7C96,181,192,203,288,197.3C384,192,480,160,576,133.3C672,107,768,85,864,101.3C960,117,1056,171,1152,186.7C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>
    </div>
    <script>
        const toggleSenha = document.getElementById('toggleSenha');
        const senhaInput = document.getElementById('senha');

        toggleSenha.addEventListener('click', () => {
            if (senhaInput.type === 'password') {
                senhaInput.type = 'text';
                toggleSenha.textContent = 'Esconder';
            } else {
                senhaInput.type = 'password';
                toggleSenha.textContent = 'Mostrar';
            }
        });
        const button = document.getElementById('button');
</script>
</body>
</html>