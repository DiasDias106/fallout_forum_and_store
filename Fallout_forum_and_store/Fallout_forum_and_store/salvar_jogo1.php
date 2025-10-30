<?php
session_start();
include 'cnn.php';

if (!isset($_SESSION['username'])) {
    die("Erro: Usuário não está logado.");
}

$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(["status" => "error", "message" => "Erro: Dados inválidos."]);
    exit;
}

$nome_jogador = $_SESSION['username'];
$ultimaLetra = $data['ultimaLetra'];
$palavraEscolhida = $data['palavra'];
$venceu = $data['venceu'];

if (empty($ultimaLetra) || empty($palavraEscolhida)) {
    echo json_encode(["status" => "error", "message" => "Erro: Todos os campos devem ser preenchidos."]);
    exit;
}


$sql = "INSERT INTO forca (nome_jogador, letra_escolhida, palavra_certa, venceu) VALUES (?, ?, ?, ?)";


try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome_jogador, $ultimaLetra, $palavraEscolhida, $venceu]);

    echo json_encode(["status" => "success", "message" => "Dados salvos com sucesso!"]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Erro ao salvar dados: " . htmlspecialchars($e->getMessage())]);
}
?>
