<?php
session_start();
include 'cnn1.php';

if (!isset($_SESSION['id_user'])) {
    header("Location: loginesignin1.php");
    exit;
}

$id_produto = isset($_GET['id_produto']) ? $_GET['id_produto'] : null;

if ($id_produto) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM outros WHERE id_outros = ?");
        $stmt->execute([$id_produto]);
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar produto: " . $e->getMessage();
        exit;
    }
} else {
    echo "Produto não encontrado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['alterar_produto'])) {
    $novo_nome = $_POST['nome_produto'];
    $nova_quantidade = $_POST['quantidade_produto'];
    $novo_preco = $_POST['preco_produto'];
    $nova_descricao = $_POST['descricao_produto'];

    $novo_nome_imagem = null;
    $caminho_imagem = null;

    if (isset($_FILES['imagem_produto']) && $_FILES['imagem_produto']['error'] == UPLOAD_ERR_OK) {
        $imagem_nome = $_FILES['imagem_produto']['name'];
        $target_dir = "imagens_loja/";


        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . basename($imagem_nome);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowed_types)) {
            die("Formato de imagem não permitido. Apenas JPG, JPEG, PNG e GIF são aceitos.");
        }

        $check = getimagesize($_FILES['imagem_produto']['tmp_name']);
        if ($check === false) {
            die("O arquivo enviado não é uma imagem válida.");
        }

        if (move_uploaded_file($_FILES['imagem_produto']['tmp_name'], $target_file)) {
            $novo_nome_imagem = $imagem_nome;
            $caminho_imagem = $target_file;
        } else {
            echo "Erro ao fazer upload da imagem. Tente novamente.";
            exit;
        }
    } else {
        $caminho_imagem = $produto['imagem'];
    }

    try {
        $sql = "UPDATE outros SET nome = ?, quantidade = ?, preco = ?, descricao = ?, imagem = ? WHERE id_outros = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$novo_nome, $nova_quantidade, $novo_preco, $nova_descricao, $caminho_imagem, $id_produto]);

        echo "<script>alert('Produto alterado com sucesso!')</script>";
        header('Location: sucesso4.php');
    } catch (PDOException $e) {
        echo "Erro ao atualizar produto: " . $e->getMessage();
        header('Location: erro.php');
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
    <link href="https://fonts.googleapis.com/css2?family=Atomic+Age&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <title>Atomic Shop</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url("imagens/login_bg2.webp");
            background-size: cover;
            background-repeat: no-repeat;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
            text-align: left;
        }

        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            background: #ff7e5f;
            color: white;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #e76d52;
        }

        .btn-secondary {
            background: #ccc;
            margin-left: 10px;
        }

        .btn-secondary:hover {
            background: #b3b3b3;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Alterar Produto</h2>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome_produto">Nome do Produto</label>
            <input type="text" name="nome_produto" id="nome_produto" class="form-control" value="<?php echo htmlspecialchars($produto['nome']); ?>" required>

            <label for="quantidade_produto">Quantidade do Produto</label>
            <input type="number" name="quantidade_produto" id="quantidade_produto" class="form-control" value="<?php echo htmlspecialchars($produto['quantidade']); ?>" required>

            <label for="preco_produto">Preço</label>
            <input type="number" name="preco_produto" id="preco_produto" class="form-control" value="<?php echo htmlspecialchars($produto['preco']); ?>" required>

            <label for="descricao_produto">Descrição do Produto</label>
            <textarea name="descricao_produto" id="descricao_produto" class="form-control" required><?php echo htmlspecialchars($produto['descricao']); ?></textarea>

            <label for="imagem_produto">Imagem do Produto</label>
            <input type="file" name="imagem_produto" id="imagem_produto" class="form-control" accept="image/*">
        </div>

        <div class="form-group">
            <button type="submit" name="alterar_produto" class="btn btn-primary">Alterar Produto</button>

            <a href="outros.php" style="margin-top: 20px" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script>
</body>
</html>
