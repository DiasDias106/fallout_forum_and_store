<?php

include 'selos.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['selos'])) {
    $euros = intval($_POST['selos']);
    $resultado = selos($euros);
}
?>

<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.5.0/remixicon.min.css">
    <link rel="icon" href="../imagens/FoS_bottle_cap.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilos2.css">
    <link rel="stylesheet" href="../css/estilos4.css">
    <link href="https://fonts.googleapis.com/css2?family=Atomic+Age&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>
<body>
<header class="header" id="header">
    <nav class="nav container">
        <a href="../index.html" class="nav_logo"><img src="../imagens/wasteland_news_logo2.png" style="height: 50px"></a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="../index.html" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="../sobre.html" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>jogos</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="../fallout_76.html">Fallout 76</a></li>
                        <li><a href="../fallout_4.html">Fallout 4</a></li>
                        <li><a href="../fallout_3.html">Fallout 3</a></li>
                        <li><a href="../fallout_nv.html">Fallout New Vegas</a></li>
                        <li><a href="../falloutshelter.html">Fallout Shelter</a></li>
                        <li><a href="../fallouttactics.html">Fallout Tactics</a></li>
                        <li><a href="../fallout_2.html">Fallout 2</a></li>
                        <li><a href="../fallout_1.html">Fallout 1</a></li>
                    </ul>
                </li>

                <li class="nav__item dropdown">
                    <a href="../hub_aplicacoes.html" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Aplicações</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="../adivinhanum.php">Adivinha numero</a></li>
                        <li><a href="../calculadora.html">Calculadora</a></li>
                        <li><a href="../conversormoedas.php">Converosor Moedas</a></li>
                        <li><a href="../contador_final.php">Contador Final</a></li>
                        <li><a href="../jogoforca.php">Jogo Forca</a></li>
                        <li><a href="../jogodosdados.php">Jogo Dados</a></li>
                        <li><a href="../php/maquinadoselos.php">Maquina dos selos</a></li>
                        <li><a href="../Descarregaveis.html">Descarregaveis</a> </li>
                        <li><a href="../pesquisa_personagem.php">Central de Informações</a> </li>
                    </ul>
                </li>

                <li class="nav__item">
                    <a href="../loading_page2.html" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Outros</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="../contactos.html" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Contacts</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="../loginesignin.php">Login</a></li>
                        <li><a href="../loginesignin.php">Sign in</a></li>
                        <li><a href="../queixas.php">Queixas</a></li>
                        <li><a href="../localizacao.html">Localização</a></li>
                        <li><a href="../noticias.html">Noticias</a></li>
                        <li><a href="../Descarregaveis.html">Descarregaveis</a></li>
                    </ul>
                </li>
            </ul>

            <div class="nav__close" id="nav-close">
                <i class="ri-close-large-line"></i>
            </div>

            <div class="nav__social">
                <a href="../hub_leaderboard.html" target="_blank" class="nav__social-link">
                    <i class="ri-trophy-fill"></i>
                </a>
                <a href="../loginesignin.php" target="_blank" class="nav__social-link">
                    <i class="fa-solid fa-user"></i>
                </a>
                <a href="../hub_aplicacoes.html" target="_blank" class="nav__social-link">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
                <a href="../localizacao.html" target="_blank" class="nav__social-link">
                    <i class="fa-solid fa-location-dot"></i>
                </a>
            </div>
        </div>

        <div class="nav__toggle" id="nav-toggle" style="padding-right: 30px">
            <i class="ri-menu-line"></i>
        </div>
    </nav>
</header>
<div class="sfundo" style="padding-top: 120px">
<div class="alinhar" style="padding-top: 90px">
    <form method="post">
        <label for="txtselos">Insira a quantidade de euros:</label><br>
        <input name="selos" id="txtselos" type="number" min="0" required><br><br>
        <button type="submit">Calcular</button>
    </form>
    <?php if (isset($resultado)): ?>
        <div id="resultado">
            <?php echo $resultado; ?>
        </div>
    <?php endif; ?>
</div>
</div>
<footer>
    <div id="footer_content">
        <div id="footer_contacts">
            <img src="../imagens/wasteland_news_logo2.png" style="width: 200px;height:auto">

            <div id="footer_social_media">
                <a href="#" class="footer-link" id="instagram">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="#" class="footer-link" id="github">
                    <i class="fa-brands fa-github"></i>
                </a>
                <a href="#" class="footer-link" id="linkdin">
                    <i class="fa-brands fa-linkedin"></i>
                </a>
            </div>
        </div>
        <ul class="footer-list">
            <li>
                <h3>Forum</h3>
            </li>
            <li>
                <a href="../sobre.html" class="footer-link">Sobre</a>
            </li>
            <li>
                <a href="../noticias.html" class="footer-link">Noticias</a>
            </li>
            <li>
                <a href="#" class="footer-link">Aplicações</a>
            </li>
        </ul>
        <ul class="footer-list">
            <li>
                <h3>Loja</h3>
            </li>
            <li>
                <a href="../jogos.php" class="footer-link">Jogos</a>
            </li>
            <li>
                <a href="../index.html" class="footer-link">Items</a>
            </li>
            <li>
                <a href="../loja_index.html" class="footer-link">Destaques</a>
            </li>
        </ul>
        <div id="footer_subscribe">
            <h3>Subscribe</h3>
            <p>
                Enter your email to get notified about
                our news solutions
            </p>
            <div id="input_group">
                <label for="email"></label><input type="email" id="email">
                <button>
                    <i class="fa-solid fa-envelope"></i>
                </button>
            </div>
        </div>
    </div>
    <div id="footer_copyright">
        &#169
        2024 all right reserved
    </div>
</footer>
<script src="../bootstrap-5.3.3-dist/js/bootstrap.js"></script>
<script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script>
<script src="../bootstrap-5.3.3-dist/js/nav.js"></script>
</body>
</html>