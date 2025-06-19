
<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    header("Location: loginesignin.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    session_destroy();
    session_unset();
    header("Location: loginesignin.php");
    exit;
}
?>
<?php
include 'cnn.php';

if (!isset($_SESSION['id_user'])) {
    header("Location: loginesignin.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    try {
        $stmt = $pdo->prepare("DELETE FROM utilizadores WHERE id_user = ?");
        $stmt->execute([$_SESSION['id_user']]);

        session_unset();
        session_destroy();

        header("Location: loginesignin.php");
        exit;
    } catch (PDOException $e) {
        echo "Erro ao excluir: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
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
    <link rel="stylesheet" href="css/estilos5.css">
    <link href="https://fonts.googleapis.com/css2?family=Atomic+Age&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <title>WastelandNews</title>
</head>
<body>
<body>
<div class="ajustar">
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
    <div class="form-container">
        <div class="form-col">
            <form class="form-box login-form" method="post">
                <div class="form-title">
                    <span>Bem Vindo</span>
                </div>
                <div class="form-inputs">
                    <div class="input-box">
                        <h1 style="text-align: center;color: white">Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
                        <p style="text-align: center;color: white">Você está logado.</p>
                    </div>
                    <div class="input-box">
                        <button class="inputs submit-btn" type="submit" name="logout">
                            <span>Logout</span>
                            <ion-icon name="arrow-forward-outline"></ion-icon>
                        </button>
                    </div>
                    <div class="input-box">
                        <a class="inputs submit-btn" style="text-decoration: none" href="atualiza_dados.php">
                            <span>Atualizar Dados</span>
                            <ion-icon name="arrow-forward-outline"></ion-icon>
                        </a>
                </div>
                    <div class="input-box">
                <button class="inputs submit-btn" type="submit" name="delete">
                    <span>Eliminar conta</span>
                    <ion-icon name="arrow-forward-outline"></ion-icon>
                </button>
        </div>
                </div>
                <div class="social-login">
                    <div class="social-login-box">
                        <ion-icon name="logo-google" class="social-login-icon"></ion-icon>
                    </div>
                    <div class="social-login-box">
                        <ion-icon name="logo-youtube" class="social-login-icon"></ion-icon>
                    </div>
                    <div class="social-login-box">
                        <ion-icon name="logo-linkedin" class="social-login-icon"></ion-icon>
                    </div>
                    <div class="social-login-box">
                        <ion-icon name="logo-github" class="social-login-icon"></ion-icon>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    <footer>
        <div id="footer_content">
            <div id="footer_contacts">
                <img src="imagens/wasteland_news_logo2.png" style="width: 200px;height:auto">

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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="bootstrap-5.3.3-dist/js/login.js"></script>
    <script src="bootstrap-5.3.3-dist/js/nav.js"></script>
</body>
</html>
