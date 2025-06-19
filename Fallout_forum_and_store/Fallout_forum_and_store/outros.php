<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.5.0/remixicon.min.css">
    <link rel="icon" href="imagens_loja/loja_ico.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos2.css">
    <link rel="stylesheet" href="css/estilos4.css">
    <link rel="stylesheet" href="css/estilos6.css">
    <link rel="stylesheet" href="css/estilos8.css">
    <link href="https://fonts.googleapis.com/css2?family=Atomic+Age&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <title>Atomic Shop</title>
    <style>
        .con {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .card-style {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            width: 300px;
            padding: 15px;
            text-align: center;
            transition: transform 0.2s ease-in-out;
            background-color: #fff;
        }

        .card-style img {
            max-width: 100%;
            border-radius: 8px;
        }

        .card-style h3 {
            color: #007BFF;
            font-size: 1.2rem;
            margin: 15px 0;
        }

        .card-style p {
            color: #555;
            font-size: 1rem;
        }

        .card-style:hover {
            transform: scale(1.05);
        }

        .price {
            font-weight: bold;
            font-size: 1.2rem;
            color: #28a745;
        }
    </style>
</head>
<body class="vendas">
<header class="header" id="header">
    <nav class="nav container">
        <a href="loja_index.html" class="nav_logo"><img src="imagens_loja/atomic_shop_logo.webp" style="height: 50px"></a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="loja_index.html" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="jogos.php" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Jogos</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="jogos/jogo1.php">Fallout 4 G.O.T.Y</a></li>
                        <li><a href="jogos/jogo2.php">Fallout 4 Standard</a></li>
                        <li><a href="jogos/jogo3.php">Fallout 76 Standard</a></li>
                        <li><a href="jogos/jogo4.php">Fallout 76 Skyline Valley</a></li>
                        <li><a href="jogos/jogo5.php">Fallout 3 G.O.T.Y</a></li>
                        <li><a href="jogos/jogo6.php">Fallout New Vegas Standard</a></li>
                        <li><a href="jogos/jogo7.php">Fallout 2 Standard</a></li>
                        <li><a href="jogos/jogo8.php">Fallout 2 Standard</a></li>
                        <li><a href="jogos/jogo9.php">Fallout Shelter Standard</a></li>
                    </ul>
                </li>

                <li class="nav__item dropdown">
                    <a href="figuras.php" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Figuras</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="figuras/figura1.php">Pop Fallout Gold edition</a></li>
                        <li><a href="figuras/figura2.php">Vault Dweller Pop</a></li>
                        <li><a href="figuras/figura3.php">Super Mutant Pop</a></li>
                        <li><a href="figuras/figura4.php">Piper Pop</a></li>
                        <li><a href="figuras/figura5.php">T-60 Power Armor Pop</a></li>
                        <li><a href="figuras/figura6.php">Liberty Prime Pop</a></li>
                        <li><a href="figuras/figura7.php">Sole Survivor Pop</a></li>
                        <li><a href="figuras/figura8.php">Codsworth Pop</a></li>
                        <li><a href="figuras/figura9.php">Paladin Dance</a></li>
                    </ul>
                </li>

                <li class="nav__item dropdown">
                    <a href="outros.php" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Outros</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="outros/outros1.php">Limited edition fallout controller</a></li>
                        <li><a href="outros/outros2.php">Nukacola edition fallout controller</a></li>
                        <li><a href="outros/outros3.php">Vault Boy controller Suport</a></li>
                        <li><a href="outros/outros4.php">Purified Water</a></li>
                        <li><a href="outros/outros5.php">Nuke Lunchbox</a></li>
                        <li><a href="outros/outros6.php">Fallout T-Shirt</a></li>
                        <li><a href="outros/outros7.php">Pipboy Replica</a></li>
                        <li><a href="outros/outros8.php">Suvenir bag</a></li>
                        <li><a href="outros/outros9.php">T-60 Red Army Helmet</a></li>
                    </ul>
                </li>

                <li class="nav__item">
                    <a href="contacto1.html" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Contacts</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="loginesignin1.php">Login</a></li>
                        <li><a href="loginesignin1.php">Sign in</a></li>
                        <li><a href="queixas2.php">Queixas</a></li>
                        <li><a href="localizacao2.html">Localização</a></li>
                        <li><a href="lista_compras.php">Compras</a></li>
                        <li><a href="Descarregaveis1.html">Descarregaveis</a></li>
                    </ul>
                </li>
            </ul>

            <div class="nav__close" id="nav-close">
                <i class="ri-close-large-line"></i>
            </div>

            <div class="nav__social">
                <a href="Carrinho.php" target="_blank" class="nav__social-link">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
                <a href="loginesignin1.php" target="_blank" class="nav__social-link">
                    <i class="fa-solid fa-user"></i>
                </a>
                <a href="jogos.php" target="_blank" class="nav__social-link">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
                <a href="localizacao2.html" target="_blank" class="nav__social-link">
                    <i class="fa-solid fa-location-dot"></i>
                </a>
            </div>
        </div>

        <div class="nav__toggle" id="nav-toggle" style="padding-right: 30px">
            <i class="ri-menu-line"></i>
        </div>
    </nav>
</header>
<div class="search-container" style="margin-top: 120px;justify-self: center">
    <input type="text" id="pesquisa" placeholder="Pesquisar..." autocomplete="off" class="search-bar">
    <button class="search-button">🔍</button>
    <div id="ss"></div>
</div>
<div class="con">
    <?php
    include 'cnn1.php';

    try {

        $sql = "SELECT nome, descricao, caminho, preco, imagem FROM outros";
        $stmt = $pdo->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);


        if (count($resultados) > 0) {
            foreach ($resultados as $row) {
                $product_url = htmlspecialchars($row['caminho']);
                echo "<a href='$product_url' class='card-link'>";
                echo "<div class='card-style'>";
                echo "<img src='" . htmlspecialchars($row['imagem']) . "' alt='" . htmlspecialchars($row['nome']) . "'>";
                echo "<h3>" . htmlspecialchars($row['nome']) . "</h3>";
                echo "<p class='price'>Preço: €" . number_format($row['preco'], 2, ',', '.') . "</p>";
                echo "</div>";
                echo "</a>";
            }
        } else {
            echo "<p>Nenhum produto encontrado.</p>";
        }

    } catch (PDOException $e) {
        echo "Erro ao buscar produtos: " . $e->getMessage();
    }

    ?>

    <?php
    if (isset($_SESSION['cargo']) && $_SESSION['cargo'] == 'admin') {
        echo '<div style="text-align: center; margin-top: 20px;">
            <a href="adicionaroutros.php" class="btn btn-primary">Adicionar itens a lista de outros</a>
          </div>';
    }
    ?>
</div>
<footer style="margin-top: 80px">
    <div id="footer_content">
        <div id="footer_contacts">
            <img src="imagens_loja/atomic_shop_logo.webp" style="width: 200px;height:auto">

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
            <form action="newsletter1.php" method="post">
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
<script src="bootstrap-5.3.3-dist/js/nav.js"></script>
<script src="bootstrap-5.3.3-dist/js/sistema_de_pesquisas2.js"></script>
</body>
</html>
