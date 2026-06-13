<?php
session_start();

// 1. Limpa todas os dados salvos na sessão atual
session_unset();

// 2. encerra a sessão no servidor
session_destroy();

// 3. Redireciona o usuário de volta para a tela de início de sessão
header('Location: login.php');
exit;
?>