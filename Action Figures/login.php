<?php
session_start();

// Se o usuário já estiver logado, redireciona direto para a vitrine (index.php)
if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    header('Location: index.php');
    exit;
}

$mensagem_erro = '';
if (isset($_GET['erro']) && $_GET['erro'] === 'tempo_esgotado') {
    $mensagem_erro = 'Sua sessão expirou após 3 minutos. Faça login novamente.';
}

// Verifica se o usuário tentou enviar o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email_digitado = isset($_POST['email']) ? $_POST['email'] : '';
    $senha_digitada = isset($_POST['senha']) ? $_POST['senha'] : '';

   
    $email_correto = 'admin@teste.com';
    $senha_correta = '123456';

    if ($email_digitado === $email_correto && $senha_digitada === $senha_correta) {
        
        $_SESSION['logado'] = true;
        
        // 180 segundos (3 minutos)
        $_SESSION['expira_em'] = time() + 180; 
        
        header('Location: index.php');
        exit;
    } else {
        $mensagem_erro = 'E-mail ou senha incorretos!';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Action Figures Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>

        <?php if (!empty($mensagem_erro)): ?>
            <p style="color: #e74c3c; text-align: center; font-weight: bold; margin-bottom: 5px;">
                <?= $mensagem_erro ?>
            </p>
        <?php endif; ?>

        <form action="login.php" method="POST" style="display: flex; flex-direction: column; gap: 22px;">
            <input type="email" name="email" placeholder="Digite seu e-mail" required>
            <input type="password" name="senha" placeholder="Digite sua senha" required>
            <button type="submit">Entrar</button>
        </form>
    </div>

</body>
</html>