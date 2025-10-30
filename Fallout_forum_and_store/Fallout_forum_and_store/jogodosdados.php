<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: loginesignin.php");
    exit;
}
?>
<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.5.0/remixicon.min.css">
    <link rel="icon" href="imagens/FoS_bottle_cap.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos2.css">
    <link rel="stylesheet" href="css/estilos4.css">
    <link href="https://fonts.googleapis.com/css2?family=Atomic+Age&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <title>WastelandNews</title>
</head>
<body>
<header class="header" id="header">
    <nav class="nav container">
        <a href="index.html" class="nav_logo"><img src="imagens/wasteland_news_logo2.png" style="height: 50px"></a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="index.html" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="sobre.html" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>jogos</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="fallout_76.html">Fallout 76</a></li>
                        <li><a href="fallout_4.html">Fallout 4</a></li>
                        <li><a href="fallout_3.html">Fallout 3</a></li>
                        <li><a href="fallout_nv.html">Fallout New Vegas</a></li>
                        <li><a href="falloutshelter.html">Fallout Shelter</a></li>
                        <li><a href="fallouttactics.html">Fallout Tactics</a></li>
                        <li><a href="fallout_2.html">Fallout 2</a></li>
                        <li><a href="fallout_1.html">Fallout 1</a></li>
                    </ul>
                </li>

                <li class="nav__item dropdown">
                    <a href="hub_aplicacoes.html" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Aplicações</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="adivinhanum.php">Adivinha numero</a></li>
                        <li><a href="calculadora.html">Calculadora</a></li>
                        <li><a href="conversormoedas.php">Converosor Moedas</a></li>
                        <li><a href="contador_final.php">Contador Final</a></li>
                        <li><a href="jogoforca.php">Jogo Forca</a></li>
                        <li><a href="jogodosdados.php">Jogo Dados</a></li>
                        <li><a href="php/maquinadoselos.php">Maquina dos selos</a></li>
                        <li><a href="Descarregaveis.html">Descarregaveis</a> </li>
                        <li><a href="pesquisa_personagem.php">Central de Informações</a> </li>
                    </ul>
                </li>

                <li class="nav__item">
                    <a href="loading_page2.html" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Outros</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="contactos.html" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Contacts</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="loginesignin.php">Login</a></li>
                        <li><a href="loginesignin.php">Sign in</a></li>
                        <li><a href="queixas.php">Queixas</a></li>
                        <li><a href="localizacao.html">Localização</a></li>
                        <li><a href="noticias.html">Noticias</a></li>
                        <li><a href="Descarregaveis.html">Descarregaveis</a></li>
                    </ul>
                </li>
            </ul>

            <div class="nav__close" id="nav-close">
                <i class="ri-close-large-line"></i>
            </div>

            <div class="nav__social">
                <a href="hub_leaderboard.html" target="_blank" class="nav__social-link">
                    <i class="ri-trophy-fill"></i>
                </a>
                <a href="loginesignin.php" target="_blank" class="nav__social-link">
                    <i class="fa-solid fa-user"></i>
                </a>
                <a href="hub_aplicacoes.html" target="_blank" class="nav__social-link">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
                <a href="localizacao.html" target="_blank" class="nav__social-link">
                    <i class="fa-solid fa-location-dot"></i>
                </a>
            </div>
        </div>

        <div class="nav__toggle" id="nav-toggle" style="padding-right: 30px">
            <i class="ri-menu-line"></i>
        </div>
    </nav>
</header>
<div class="jdados" style="padding-top: 1px;">
<section class="edicoes" style="color: white">
    <div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-3">
            <div class="col-4 text-center"></div>
        </div>
        <div class="col-xs-12 col-md-6">
            <fieldset>
                <legend>Jogo Dos Dados</legend>
                <form>
                    <div class="container">
                        <div class="row">
                            <div class="col-4 text-center"><img src="imagens/dados/1.png" id="img1" style="width:150px"/></div>
                            <div class="col-4 text-center">
                                <label for="txtjogador">Jogador</label>
                                <input type="text" class="form-control" id="txtjogador" name="txtjogador">
                                <label for="txtmontante">Aposta</label>
                                <input type="text" class="form-control" id="txtmontante" name="txtmontante">
                                <button id="btjogar" type="button" class="btn btn-danger mt-3" >Jogar</button>

                            </div>
                            <div class="col-4 text-center"><img src="imagens/dados/5.png" id="img2" style="width:150px"/></div>
                        </div>
                        <div id="tv" class="tv" style="border: 2px solid black;"></div>
                        <iframe
                                id="audioIframe"
                                width="560"
                                height="315"
                                src="https://www.youtube.com/embed/o-1U19vao78?autoplay=0&controls=0&mute=1&loop=1&playlist=o-1U19vao78"
                                style="display: none; visibility: hidden; width: 0; height: 0;"
                                title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin"
                                allowfullscreen>
                        </iframe>
                    </div>
                </form>
            </fieldset>
        </div>
        <div class="col-xs-12 col-md-3">
            <div class="col-4 text-center">

            </div>
        </div>
    </div>
    </div>
</section>
</div>
<footer>
    <div id="footer_content">
        <div id="footer_contacts">
            <img src="imagens/wasteland_news_logo2.png" style="width: 200px;height:auto">

            <div id="footer_social_media">
                <a href="leaderboard_dados.php" class="footer-link" id="instagram">
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
                <a href="sobre.html" class="footer-link">Sobre</a>
            </li>
            <li>
                <a href="noticias.html" class="footer-link">Noticias</a>
            </li>
            <li>
                <a href="hub_aplicacoes.html" class="footer-link">Aplicações</a>
            </li>
        </ul>
        <ul class="footer-list">
            <li>
                <h3>Loja</h3>
            </li>
            <li>
                <a href="jogos.php" class="footer-link">Jogos</a>
            </li>
            <li>
                <a href="outros.php" class="footer-link">Items</a>
            </li>
            <li>
                <a href="loja_index.html" class="footer-link">Destaques</a>
            </li>
        </ul>
        <div id="footer_subscribe">
            <h3>Subscribe</h3>
            <p>
                Enter your email to get notified about
                our news solutions
            </p>
            <form action="newsletter.php" method="post">
                <div id="input_group">
                    <label for="email"></label><input name="email" type="email" id="email">
                    <button  type="submit" name="enviar_newsletter">
                        <i class="fa-solid fa-envelope"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div id="footer_copyright">
        &#169
        2024 all right reserved
    </div>
</footer>
<script src="bootstrap-5.3.3-dist/js/bootstrap.js"></script>
<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script>
<script src="bootstrap-5.3.3-dist/js/Dados.js"></script>
<script src="bootstrap-5.3.3-dist/js/nav.js"></script>
</body>
</html>