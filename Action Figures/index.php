<?php
require 'session_check.php';
require 'produtos_data.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Action Figures Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <h1>Action Figures Store</h1>
    <a href="logout.php" class="btn-sair">Sair da Conta</a>
</header>

    <div class="banner-container">
        <div class="slide active">
            <img src="banner_1.jpg" alt="Banner Promocional 1">
        </div>
        <div class="slide">
            <img src="banner_2.jpg" alt="Banner Promocional 2">
        </div>
        <div class="slide">
            <img src="banner_3.jpg" alt="Banner Promocional 3">
        </div>

        <div class="banner-dots">
            <span class="dot active" onclick="mudarSlide(0)"></span>
            <span class="dot" onclick="mudarSlide(1)"></span>
            <span class="dot" onclick="mudarSlide(2)"></span>
        </div>
    </div>

    <main>
        <h2>Nossos Produtos</h2>
        <div class="grid-produtos">
            <?php foreach ($produtos as $id => $item): ?>
                <div class="card-produto">
                    <img src="<?= $item['img'] ?>" alt="<?= $item['nome'] ?>">
                    <h3><?= $item['nome'] ?></h3>
                    <p class="preco"><?= $item['preco'] ?></p>
                    <a href="produto.php?id=<?= $id ?>" class="btn-detalhes">Ver Detalhes</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <script>
        let slideIndex = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');

        function mostrarSlide(index) {
            slides.forEach(s => s.classList.remove('active'));
            dots.forEach(d => d.classList.remove('active'));
            
            slideIndex = index;
            if (slideIndex >= slides.length) slideIndex = 0;
            if (slideIndex < 0) slideIndex = slides.length - 1;
            
            slides[slideIndex].classList.add('active');
            dots[slideIndex].classList.add('active');
        }

        function proximoSlide() {
            mostrarSlide(slideIndex + 1);
        }

        // Altera automaticamente a cada 3000ms (3 segundos)
        let autoSlider = setInterval(proximoSlide, 3000);

        // Função para quando o usuário clica nos pontos seletores
        function mudarSlide(index) {
            clearInterval(autoSlider); // Pausa o tempo automático
            mostrarSlide(index);       // Muda para o slide clicado
            autoSlider = setInterval(proximoSlide, 3000); // Reinicia o contador
        }
    </script>
</body>
</html>