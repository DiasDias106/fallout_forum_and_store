<?php
session_start();
include 'cnn.php';

if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] !== 'admin') {
    die("Acesso negado!");
}

$id = $_GET['id'];
try {
    $stmt = $pdo->prepare("SELECT * FROM adivinhanumero WHERE id_jogo = ?");
    $stmt->execute([$id]);
    $jogo = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar jogo: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome_jogador'];
    $numero_escolhido = $_POST['numero_escolhido'];
    $numero_correto = $_POST['numero_correto'];
    $tentativas = $_POST['tentativas'];

    try {
        $stmt = $pdo->prepare("UPDATE adivinhanumero SET nome_jogador = ?, numero_escolhido = ?, numero_correto = ?, tentativas = ? WHERE id_jogo = ?");
        $stmt->execute([$nome, $numero_escolhido, $numero_correto, $tentativas, $id]);
        header("Location: leaderboard_adnum.php");
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
<div class="container mt-5">
    <h2>Editar Jogo</h2>
    <form method="POST">
        <label for="nome_jogador">Nome do Jogador</label>
        <input type="text" name="nome_jogador" class="form-control" value="<?= htmlspecialchars($jogo['nome_jogador']) ?>" required>

        <label for="numero_escolhido">Número Escolhido</label>
        <input type="number" name="numero_escolhido" class="form-control" value="<?= htmlspecialchars($jogo['numero_escolhido']) ?>" required>

        <label for="numero_correto">Número Correto</label>
        <input type="number" name="numero_correto" class="form-control" value="<?= htmlspecialchars($jogo['numero_correto']) ?>" required>

        <label for="tentativas">Tentativas</label>
        <input type="number" name="tentativas" class="form-control" value="<?= htmlspecialchars($jogo['tentativas']) ?>" required>

        <button type="submit" class="btn btn-success mt-3">Salvar Alterações</button>
        <a href="leaderboard_adnum.php" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
</body>
</html>

