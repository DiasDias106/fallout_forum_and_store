<?php
include 'cnn1.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        $caminho = filter_input(INPUT_POST, 'caminho', FILTER_SANITIZE_URL);
        $preco = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);

        if (!$nome || !$descricao || !$caminho || !$preco) {
            echo "Por favor, preencha todos os campos obrigatórios corretamente!";
            exit;
        }

        if ($preco <= 0) {
            echo "O preço deve ser um valor maior que zero.";
            exit;
        }

        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK) {
            $imagem = $_FILES['imagem']['name'];
            $target_dir = "imagens_loja/";

            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            $target_file = $target_dir . basename($imagem);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($imageFileType, $allowed_types)) {
                die("Formato de imagem não permitido. Apenas JPG, JPEG, PNG e GIF são aceites.");
            }

            $check = getimagesize($_FILES['imagem']['tmp_name']);
            if ($check === false) {
                die("O arquivo enviado não é uma imagem válida.");
            }

            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $target_file)) {
                $sql = "INSERT INTO jogos (nome, descricao, caminho, preco, imagem) 
                        VALUES (:nome, :descricao, :caminho, :preco, :imagem)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':descricao', $descricao);
                $stmt->bindParam(':caminho', $caminho);
                $stmt->bindParam(':preco', $preco);
                $stmt->bindParam(':imagem', $target_file);

                if ($stmt->execute()) {
                    echo "Item inserido com sucesso!";
                    header('Location: sucesso6.php');
                } else {
                    echo "Erro ao inserir item no banco de dados.";
                }
            } else {
                echo "Erro ao fazer upload da imagem. Tente novamente.";
            }
        } else {
            echo "Por favor, envie uma imagem válida.";
        }
    }
} catch (PDOException $e) {
    echo "Erro no banco de dados: " . $e->getMessage();
} catch (Exception $e) {
    echo "Erro inesperado: " . $e->getMessage();
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
    <link rel="icon" href="imagens_loja/loja_ico.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos2.css">
    <link rel="stylesheet" href="css/estilos4.css">
    <link href="https://fonts.googleapis.com/css2?family=Atomic+Age&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <title>Atomic Shop</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url("imagens/login_bg2.webp");
            background-position: center;
            background-attachment: fixed;
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

        input[type="text"], input[type="number"], input[type="file"], textarea {
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

        .cancel-button {
            background: #ccc;
            margin-left: 10px;
        }

        .cancel-button:hover {
            background: #b3b3b3;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Adicionar Novo Jogo</h2>
    <form action="adicionarfigura.php" method="post" enctype="multipart/form-data">
        <label for="nome">Nome do Item:</label>
        <input type="text" name="nome" id="nome" required>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" required></textarea>

        <label for="caminho">Caminho do Produto (URL):</label>
        <input type="text" name="caminho" id="caminho" required>

        <label for="preco">Preço (€):</label>
        <input type="number" step="0.01" name="preco" id="preco" required>

        <label for="imagem">Imagem do Produto:</label>
        <input type="file" name="imagem" id="imagem" accept="image/*" required>

        <button type="submit">Adicionar Item</button>
        <button type="button" class="cancel-button" onclick="window.location.href='jogos.php';">Voltar à Loja</button>
    </form>
</div>
</body>
</html>
