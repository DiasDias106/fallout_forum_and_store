<?php

session_start();
include 'cnn.php';

if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] !== 'admin') {
    die("Acesso negado!");
}

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("SELECT * FROM forca WHERE id_jogo = ?");
    $stmt->execute([$id]);
    $jogo = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar jogo: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome_jogador'];
    $ultima_letra = $_POST['ultima_letra'];
    $palavra_certa  = $_POST['palavra_certa'];
    $venceu = $_POST['venceu'];

    try {
        $stmt = $pdo->prepare("UPDATE forca SET nome_jogador = ?, ultima_letra = ?, palavra_certa = ?, venceu = ? WHERE id_jogo = ?");
        $stmt->execute([$nome, $ultima_letra, $palavra_certa, $venceu, $id]);
        header("Location: leaderboard_forca.php");
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
        <input type="text" name="nome_jogador" class="form-control"
               value="<?= htmlspecialchars($jogo['nome_jogador']) ?>" required>

        <label for="ultima_letra">Última Letra Escolhida</label>
        <input type="text" name="ultima_letra" class="form-control"
               value="<?= htmlspecialchars($jogo['ultima_letra']) ?>" required>

        <label for="palavra_certa">Palavra Correta</label>
        <input type="text" name="palavra_certa" class="form-control"
               value="<?= htmlspecialchars($jogo['palavra_certa']) ?>" required>

        <label for="venceu">Resultado</label>
        <select name="venceu" class="form-control" required>
            <option value="1" <?= $jogo['venceu'] == 1 ? 'selected' : '' ?>>Venceu</option>
            <option value="0" <?= $jogo['venceu'] == 0 ? 'selected' : '' ?>>Perdeu</option>
        </select>

        <button type="submit" class="btn btn-success mt-3">Salvar Alterações</button>
        <a href="leaderboard_forca.php" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
</body>
</html>
