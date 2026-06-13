<?php
require 'session_check.php';

// Pega os dados enviados pelo formulário da página anterior
$quantidade = isset($_POST['quantidade']) ? (int)$_POST['quantidade'] : 1;
$produto_nome = isset($_POST['produto_nome']) ? $_POST['produto_nome'] : 'Action Figure';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Compra Realizada! - Action Figures Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sucesso-container">
        <div class="sucesso-icone">✓</div>
        <h2>Compra Realizada com Sucesso!</h2>
        
        <div class="sucesso-detalhes">
            <p>Obrigado por comprar conosco!</p>
            <p>Seu pedido do produto <strong><?= htmlspecialchars($produto_nome) ?></strong> foi processado.</p>
            <p><strong>Quantidade:</strong> <?= $quantidade ?> unidade(s)</p>
        </div>

        <a href="index.php" class="btn-voltar-sucesso">Voltar para a Vitrine</a>
    </div>
</body>
</html>