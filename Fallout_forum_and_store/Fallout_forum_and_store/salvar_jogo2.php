<?php
include 'cnn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['nome_jogador'], $_POST['quantidade'], $_POST['aposta'])) {
        $nome_jogador = $_POST['nome_jogador'];
        $quantidade = $_POST['quantidade'];
        $aposta = $_POST['aposta'];

        $sql = "INSERT INTO jogodados (nome_jogador, quantidade, aposta) VALUES (?, ?, ?)";

        try {

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nome_jogador, $quantidade, $aposta]);


            echo json_encode(['status' => 'success']);
        } catch (PDOException $e) {

            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    } else {

        echo json_encode(['status' => 'error', 'message' => 'Dados incompletos']);
    }
}
?>
