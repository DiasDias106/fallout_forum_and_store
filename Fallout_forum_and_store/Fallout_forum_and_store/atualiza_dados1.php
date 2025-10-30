<?php
session_start();
include 'cnn1.php';

if (!isset($_SESSION['id_user'])) {
    header("Location: loginesignin.php");
    exit;
}

$stmt = $pdo->prepare("SELECT username, email, imagem FROM utilizadores WHERE id_user = ?");
$stmt->execute([$_SESSION['id_user']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    try {
        $novo_nome_imagem = $user['foto_perfil'];

        if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] == UPLOAD_ERR_OK) {
            $foto_nome = $_FILES['foto_perfil']['name'];
            $target_dir = "imagens_perfil/";

            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            $target_file = $target_dir . basename($foto_nome);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($imageFileType, $allowed_types)) {
                die("Formato de imagem não permitido. Apenas JPG, JPEG, PNG e GIF são aceitos.");
            }

            $check = getimagesize($_FILES['foto_perfil']['tmp_name']);
            if ($check === false) {
                die("O arquivo enviado não é uma imagem válida.");
            }

            if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $target_file)) {
                $novo_nome_imagem = $foto_nome;
            } else {
                echo "Erro ao fazer upload da foto. Tente novamente.";
                exit;
            }
        }

        $stmt = $pdo->prepare("UPDATE utilizadores SET username = ?, email = ?, imagem = ? WHERE id_user = ?");
        $stmt->execute([
            $_POST['username'],
            $_POST['email'],
            $novo_nome_imagem,
            $_SESSION['id_user']
        ]);

        $_SESSION['username'] = $_POST['username'];
        echo "<script>alert('Dados atualizados com sucesso!'); window.location.href='atualiza_dados.php';</script>";
        exit;
    } catch (PDOException $e) {
        echo "Erro ao atualizar: " . $e->getMessage();
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

        h1 {
            color: #333;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
            text-align: left;
        }

        input[type="text"], input[type="email"] {
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
    <h1>Atualizar Conta</h1>
    <form method="post">
        <label for="username">Nome de Usuário:</label>
        <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

        <label for="foto_perfil">Foto de Perfil:</label>
        <input type="file" name="foto_perfil" id="foto_perfil" accept="image/*">

        <button type="submit" name="update">Salvar</button>
        <a href="logout1.php"><button type="button" class="cancel-button">Cancelar</button></a>
    </form>
</div>
</body>
</html>
