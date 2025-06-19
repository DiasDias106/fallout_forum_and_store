<?php
session_start();
require "cnn1.php";

if (!isset($_SESSION['id_user'])) {
    header("Location: loginesignin1.php");
    exit;
}

$comprador = $_SESSION['username'];

$query = "SELECT id_venda, produto, preco,dta_compra AS dta_compra 
          FROM venda WHERE comprador = :comprador order by id_venda DESC";

$stmt = $pdo->prepare($query);
$stmt->bindParam(':comprador', $comprador, PDO::PARAM_STR);
$stmt->execute();
$vendas = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($vendas)) {
    echo "Nenhuma compra encontrada para o usuário: " . htmlspecialchars($comprador);
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
    <link rel="icon" href="imagens_loja/loja_ico.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos2.css">
    <link rel="stylesheet" href="css/estilos4.css">
    <link href="https://fonts.googleapis.com/css2?family=Atomic+Age&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <title>Atomic Shop</title>
    <style>
        body {
            background-image: url('imagens/login_bg2.webp');
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        main.modular {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            color: black;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            margin: 2rem auto;
            text-align: center;
            margin-top: 100px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #ff7e5f;
            color: white;
        }

        button {
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            background: #ff7e5f;
            color: white;
            transition: background 0.3s;
        }

        button:hover {
            background: #e76d52;
        }
    </style>
</head>
<body class="f76">
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
<main class="modular">
    <h2 class="mb-4">Histórico de Compras</h2>
    <table id="vendasTable" class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Preço</th>
            <th>Data da Compra</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($vendas as $venda): ?>
            <tr>
                <td><?= htmlspecialchars($venda['id_venda']) ?></td>
                <td><?= htmlspecialchars($venda['produto']) ?></td>
                <td> <?= number_format($venda['preco'], 2, ',', '.') ?></td>
                <td><?= htmlspecialchars($venda['dta_compra']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>


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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#vendasTable').DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.4/i18n/Portuguese-Brasil.json"
            }
        });
    });

</script>
</body>
</html>
