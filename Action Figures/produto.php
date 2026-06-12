<?php
require 'session_check.php';
require 'produtos_data.php';

$id_produto = isset($_GET['id']) ? (int)$_GET['id'] : 1;
if (!array_key_exists($id_produto, $produtos)) { $id_produto = 1; }

$produto = $produtos[$id_produto];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= $produto['nome'] ?> - Detalhes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-produto">
        <a href="index.php" class="btn-voltar">⬅ Voltar para o Menu</a>
        
        <div class="detalhes-layout">
            <div class="galeria">
                <img src="<?= $produto['img'] ?>" class="img-principal" id="foto-foco" alt="<?= $produto['nome'] ?>">
                <div class="miniaturas">
                    <?php foreach ($produto['extras'] as $img): ?>
                        <img src="<?= $img ?>" alt="Miniatura" onclick="alternarFoto('<?= $img ?>')">
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="info-produto">
     <h2><?= $produto['nome'] ?></h2>
     <p class="preco-destaque"><?= $produto['preco'] ?></p>
    
      <form action="comprar.php" method="POST">
        <input type="hidden" name="produto_nome" value="<?= $produto['nome'] ?>">
        
        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" value="1" min="1" max="10">
        
        <button type="submit" class="btn-comprar">Comprar Agora</button>
     </form>

     <div class="produto-descricao">
        <h3>Descrição do Produto</h3>
        <p>
            <?php 
            // Se você esquecer de colocar a descrição no produtos_data, ele exibe um texto padrão
            echo isset($produto['descricao']) ? htmlspecialchars($produto['descricao']) : 'Nenhuma descrição disponível para este produto.'; 
            ?>
        </p>
    </div>


    <script>
        function alternarFoto(caminhoImagem) {
            document.getElementById('foto-foco').src = caminhoImagem;
        }
    </script>
</body>
</html>