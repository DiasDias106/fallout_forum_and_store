<?php
include 'cnn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_jogador = $_POST['nome_jogador'];
    $numero_escolhido = $_POST['numero_escolhido'];
    $numero_correto = $_POST['numero_correto'];
    $tentativas = $_POST['tentativas'];

    $sql = "INSERT INTO adivinhanumero (nome_jogador, numero_escolhido, numero_correto, tentativas)
VALUES (?, ?, ?, ?)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome_jogador, $numero_escolhido, $numero_correto, $tentativas]);
        echo "Dados salvos com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao salvar dados: " . $e->getMessage();
    }
}
?>