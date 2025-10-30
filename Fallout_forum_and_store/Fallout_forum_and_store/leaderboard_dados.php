<?php
session_start();
include 'cnn.php';

if (!isset($_SESSION['id_user'])) {
    header("Location: loginesignin.php");
    exit;
}

try {
    $stmt = $pdo->query("SELECT * FROM jogodados");
    $jogos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar registros: " . htmlspecialchars($e->getMessage()));
}

if (isset($_GET['remover_id'])) {
    $id = filter_var($_GET['remover_id'], FILTER_SANITIZE_NUMBER_INT);
    try {
        $stmt = $pdo->prepare("DELETE FROM jogodados WHERE id_jogo = ?");
        $stmt->execute([$id]);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } catch (PDOException $e) {
        echo "Erro ao remover registro: " . htmlspecialchars($e->getMessage());
    }
}
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
    <link rel="icon" href="imagens/FoS_bottle_cap.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos2.css">
    <link rel="stylesheet" href="css/estilos4.css">
    <link href="https://fonts.googleapis.com/css2?family=Atomic+Age&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <title>WastelandNews</title>
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
            color: black;
            border-radius: 12px;
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
<main class="modular">
    <h1>Histórico de Jogos</h1>
    <!-- Adicionamos o ID para o DataTable -->
    <table id="jogosTable">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome do Jogador</th>
            <th>Quantidade</th>
            <th>Aposta</th>
            <?php if ($_SESSION['cargo'] == 'admin'): ?>
                <th>Ações</th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($jogos as $jogo): ?>
            <tr>
                <td><?= htmlspecialchars($jogo['id_jogo']) ?></td>
                <td><?= htmlspecialchars($jogo['nome_jogador']) ?></td>
                <td><?= htmlspecialchars($jogo['quantidade']) ?></td>
                <td><?= htmlspecialchars($jogo['aposta']) ?></td>
                <?php if ($_SESSION['cargo'] == 'admin'): ?>
                    <td>
                        <a href="?remover_id=<?= $jogo['id_jogo'] ?>"
                           onclick="return confirm('Deseja remover este registro?')">
                            <button>Remover</button>
                        </a>
                        <a href="editar_jogo2.php?id=<?= $jogo['id_jogo'] ?>">
                            <button>Editar</button>
                        </a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <p style="color: transparent">gognqjrjerrrnfjrffjffjrrnfrjfrnfr</p>
    <a href="jogodosdados.php"><button>Voltar ao Jogo</button></a>
</main>
<footer style="margin-top: 80px">
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const myCarousel = document.querySelector('#carouselExampleCaptions');
        const carousel = new bootstrap.Carousel(myCarousel);
        setInterval(() => {
            carousel.next();
        }, 6000);
    });
</script>
<script src="bootstrap-5.3.3-dist/js/bootstrap.js"></script>
<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script>
<script src="bootstrap-5.3.3-dist/js/nav.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#jogosTable').DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.4/i18n/Portuguese-Brasil.json"
            }
        });
    });
</script>
</body>
</html>
