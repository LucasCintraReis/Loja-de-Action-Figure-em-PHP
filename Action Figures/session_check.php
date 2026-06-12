<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Verifica se o usuário está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.php');
    exit;
}

// 2. Verifica se o tempo absoluto de 3 minutos expirou
if (time() > $_SESSION['expira_em']) {
    session_unset();
    session_destroy();
    
    // Redireciona com um aviso na URL para o usuário saber o que houve
    header('Location: login.php?erro=tempo_esgotado');
    exit;
}
?>