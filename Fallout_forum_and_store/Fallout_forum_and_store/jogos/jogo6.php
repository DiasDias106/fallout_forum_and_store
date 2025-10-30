
<?php
session_start();


if (!isset($_SESSION['id_user'])) {
    header("Location: ../loginesignin1.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    session_destroy();
    session_unset();
    header("Location: ../loginesignin1.php");
    exit;
}
?>
<?php
include '../cnn1.php';
$id = 6;
$sql = "SELECT nome, preco , quantidade, descricao, imagem FROM jogos WHERE id_jogo = :id";
try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);
        $nome_produto = $produto['nome'];
        $preco_produto = $produto['preco'];
        $quantidade_produto = $produto['quantidade'];
        $descricao_produto = $produto['descricao'];
        $imagem_produto = $produto['imagem'];
        $caminho_imagem = "../" . $imagem_produto;
    } else {
        die("Produto não encontrado.");
    }
} catch (PDOException $e) {
    die("Erro ao buscar o produto: " . $e->getMessage());
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comprar'])) {
$id_usuario = $_SESSION['id_user'];
$nome_comprador = $_SESSION['username'];
$quantidade_venda = 1;

// Verifica se há quantidade suficiente
if ($quantidade_produto < $quantidade_venda) {
echo "<script>alert('Quantidade insuficiente em estoque!');</script>";
} else {
try {
// Atualiza a tabela `vendas`
$sql_venda = "INSERT INTO venda (comprador, produto, preco, id_user)
VALUES (:comprador, :produto, :preco, :id_user)";
$stmt_venda = $pdo->prepare($sql_venda);
$stmt_venda->bindParam(':comprador', $nome_comprador, PDO::PARAM_STR);
$stmt_venda->bindParam(':produto', $nome_produto, PDO::PARAM_STR);
$stmt_venda->bindParam(':preco', $preco_produto, PDO::PARAM_STR);
$stmt_venda->bindParam(':id_user', $id_usuario, PDO::PARAM_INT);
$stmt_venda->execute();

$sql_estoque = "UPDATE jogos SET quantidade = quantidade - :quantidade WHERE id_jogo = :id";
$stmt_estoque = $pdo->prepare($sql_estoque);
$stmt_estoque->bindParam(':quantidade', $quantidade_venda, PDO::PARAM_INT);
$stmt_estoque->bindParam(':id', $id, PDO::PARAM_INT);
$stmt_estoque->execute();

    echo "compra efetuada com sucesso!";
    header("Location: ../sucesso7.php");
} catch (PDOException $e) {
die("Erro ao registrar a compra: " . $e->getMessage());
}
}
}

?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar_carrinho'])) {
    $item = [
        'nome' => $nome_produto,
        'preco' => $preco_produto,
        'quantidade' => 1
    ];
    $_SESSION['carrinho'][] = $item;
    echo "<script>alert('Produto adicionado ao carrinho!');</script>";
    header('Location: ../sucesso5.php');
}
?>
<?php
include '../cnn1.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_produto'])) {
    $id_produto = $id;

    try {
        $sql = "DELETE FROM jogos WHERE id_jogo = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id_produto, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script>alert('Produto removido com sucesso!');</script>";
            header("Location: ../jogos.php");
            exit;
        } else {
            echo "<script>alert('Erro ao remover o produto.');</script>";
        }
    } catch (PDOException $e) {
        die("Erro ao remover produto: " . $e->getMessage());
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
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.5.0/remixicon.min.css">
    <link rel="icon" href="../imagens_loja/loja_ico.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilos2.css">
    <link rel="stylesheet" href="../css/estilos4.css">
    <link rel="stylesheet" href="../css/estilos8.css">
    <link href="https://fonts.googleapis.com/css2?family=Atomic+Age&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <title>Atomic Shop</title>
</head>
<body class="vendas">
<header class="header" id="header">
    <nav class="nav container">
        <a href="../loja_index.html" class="nav_logo"><img src="../imagens_loja/atomic_shop_logo.webp" style="height: 50px"></a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="../loja_index.html" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="../jogos.php" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Jogos</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="../jogos/jogo1.php">Fallout 4 G.O.T.Y</a></li>
                        <li><a href="../jogos/jogo2.php">Fallout 4 Standard</a></li>
                        <li><a href="../jogos/jogo3.php">Fallout 76 Standard</a></li>
                        <li><a href="../jogos/jogo4.php">Fallout 76 Skyline Valley</a></li>
                        <li><a href="../jogos/jogo5.php">Fallout 3 G.O.T.Y</a></li>
                        <li><a href="../jogos/jogo6.php">Fallout New Vegas Standard</a></li>
                        <li><a href="../jogos/jogo7.php">Fallout 2 Standard</a></li>
                        <li><a href="../jogos/jogo8.php">Fallout 1 Standard</a></li>
                        <li><a href="../jogos/jogo9.php">Fallout Shelter Standard</a></li>
                    </ul>
                </li>

                <li class="nav__item dropdown">
                    <a href="../figuras.php" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Figuras</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="../figuras/figura1.php">Pop Fallout Gold edition</a></li>
                        <li><a href="../figuras/figura2.php">Vault Dweller Pop</a></li>
                        <li><a href="../figuras/figura3.php">Super Mutant Pop</a></li>
                        <li><a href="../figuras/figura4.php">Piper Pop</a></li>
                        <li><a href="../figuras/figura5.php">T-60 Power Armor Pop</a></li>
                        <li><a href="../figuras/figura6.php">Liberty Prime Pop</a></li>
                        <li><a href="../figuras/figura7.php">Sole Survivor Pop</a></li>
                        <li><a href="../figuras/figura8.php">Codsworth Pop</a></li>
                        <li><a href="../figuras/figura9.php">Paladin Dance</a></li>
                    </ul>
                </li>

                <li class="nav__item dropdown">
                    <a href="../outros.php" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Outros</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="../outros/outros1.php">Limited edition fallout controller</a></li>
                        <li><a href="../outros/outros2.php">Nukacola edition fallout controller</a></li>
                        <li><a href="../outros/outros3.php">Vault Boy controller Suport</a></li>
                        <li><a href="../outros/outros4.php">Purified Water</a></li>
                        <li><a href="../outros/outros5.php">Nuke Lunchbox</a></li>
                        <li><a href="../outros/outros6.php">Fallout T-Shirt</a></li>
                        <li><a href="../outros/outros7.php">Pipboy Replica</a></li>
                        <li><a href="../outros/outros8.php">Suvenir bag</a></li>
                        <li><a href="../outros/outros9.php">T-60 Red Army Helmet</a></li>
                    </ul>
                </li>

                <li class="nav__item">
                    <a href="../contacto1.html" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Contacts</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="../loginesignin1.php">Login</a></li>
                        <li><a href="../loginesignin1.php">Sign in</a></li>
                        <li><a href="../queixas2.php">Queixas</a></li>
                        <li><a href="../localizacao2.html">Localização</a></li>
                        <li><a href="../lista_compras.php">Compras</a></li>
                        <li><a href="../Descarregaveis1.html">Descarregaveis</a></li>
                    </ul>
                </li>
            </ul>

            <div class="nav__close" id="nav-close">
                <i class="ri-close-large-line"></i>
            </div>

            <div class="nav__social">
                <a href="../Carrinho.php" target="_blank" class="nav__social-link">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
                <a href="../loginesignin1.php" target="_blank" class="nav__social-link">
                    <i class="fa-solid fa-user"></i>
                </a>
                <a href="../jogos.php" target="_blank" class="nav__social-link">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
                <a href="../localizacao2.html" target="_blank" class="nav__social-link">
                    <i class="fa-solid fa-location-dot"></i>
                </a>
            </div>
        </div>

        <div class="nav__toggle" id="nav-toggle" style="padding-right: 30px">
            <i class="ri-menu-line"></i>
        </div>
    </nav>
</header>
<section class="pres10">
<div class="con">
    <div class="letra">
    <div class="product-page">
        <div class="product-images">
            <img src="<?php echo $caminho_imagem; ?>" height="400px" alt="Imagem do Produto">
        </div>

        <div class="product-details">
            <h1 class="product-title"><?php echo htmlspecialchars($nome_produto); ?></h1>
            <div class="product-price">€ <?php echo number_format($preco_produto, 2, ',', '.'); ?></div>
            <h1 class="product-title" style="font-size: 18px">Quantidades Disponiveis: <?php echo htmlspecialchars($quantidade_produto); ?></h1>
            <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-alt"></i>
                <span>(4.5 / 5)</span>
            </div>
            <p class="product-description">
                <?php echo htmlspecialchars($descricao_produto);?>
            </p>

            <form method="post">
                <div class="btn-group" style="margin-bottom: 20px">
                    <button type="submit" name="adicionar_carrinho" class="btn">Adicionar ao Carrinho</button>
                    <button type="submit" name="comprar" class="btn btn-secondary">Comprar Agora</button>
                </div>
            </form>
            <?php

            if (isset($_SESSION['cargo']) && $_SESSION['cargo'] === 'admin') {
                echo '<form method="post">
            <div class="btn-group">
                 <a class="btn" style="text-effect: none;color: white;" href="../alterarjogo.php?id_produto=6">Alteração do Produto</a>
                <button type="submit" name="eliminar_produto" class="btn btn-secondary">Remover Agora</button>
            </div>
          </form>';
            }
            ?>
        </div>
    </div>


    <div class="related-products">
        <h2>Produtos Relacionados</h2>
        <div class="related-items">
            <div class="related-item">
                <img src="../imagens/fallout_nv_dlc1.avif" height="150px" alt="Produto 1">
                <h3>Fallout NV: Lonesome Road</h3>
                <div class="price">€ 4,99</div>
            </div>
            <div class="related-item">
                <img src="../imagens/fallout_nv_dlc2.webp" height="150px" alt="Produto 2">
                <h3>Fallout NV: Dead Money</h3>
                <div class="price">€ 4,99</div>
            </div>
            <div class="related-item">
                <img src="../imagens/fallout_nv_dlc3.webp" height="150px" alt="Produto 3">
                <h3>Fallout NV: Old World Blues</h3>
                <div class="price">€ 4,99</div>
            </div>
        </div>
        <div style="margin-top: 50px">
            <div class="related-items">
                <div class="related-item">
                    <img src="../imagens/fallout_nv_dlc4.jpg" height="150px" alt="Produto 4">
                    <h3>Fallout NV: Honest Hearts</h3>
                    <div class="price">€ 4,99</div>
                </div>
                <div class="related-item">
                    <img src="../imagens/fallout_nv_dlc5.webp" height="150px" alt="Produto 5">
                    <h3>Fallout NV: Gun Runners</h3>
                    <div class="price">€ 4,99</div>
                </div>
                <div class="related-item">
                    <img src="../imagens/fallout_nv_dlc6.webp" height="150px"  alt="Produto 6">
                    <h3>Fallout NV: Couriers Stash</h3>
                    <div class="price">€ 4,99</div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<footer style="margin-top: 80px">
    <div id="footer_content">
        <div id="footer_contacts">
            <img src="../imagens_loja/atomic_shop_logo.webp" style="width: 200px;height:auto">

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
                <a href="../hub_aplicacoes.html" class="footer-link">Aplicações</a>
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
                <a href="../outros.php" class="footer-link">Items</a>
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
            <form action="../newsletter1.php" method="post">
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
<script src="../bootstrap-5.3.3-dist/js/bootstrap.js"></script>
<script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script>
<script src="../bootstrap-5.3.3-dist/js/nav.js"></script>
</body>
</html>
