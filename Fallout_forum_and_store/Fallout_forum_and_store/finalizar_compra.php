<?php
session_start();
include 'cnn1.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['finalizar_compra'])) {
    $id_usuario = $_SESSION['id_user'];
    $nome_comprador = $_SESSION['username'];

    try {
        // Iniciar transação
        $pdo->beginTransaction();

        foreach ($_SESSION['carrinho'] as $item) {
            // Inserir a compra
            $sql = "INSERT INTO venda (comprador, produto, preco, id_user) 
                    VALUES (:comprador, :produto, :preco, :id_user)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':comprador', $nome_comprador);
            $stmt->bindParam(':produto', $item['nome']);
            $stmt->bindParam(':preco', $item['preco']);
            $stmt->bindParam(':id_user', $id_usuario);
            $stmt->execute();

            $produtoAtualizado = false;
            $tabelas = ['jogos', 'figuras', 'outros'];

            foreach ($tabelas as $tabela) {
                $sql_update = "UPDATE $tabela 
                               SET quantidade = quantidade - 1 
                               WHERE nome = :produto AND quantidade > 0";
                $stmt_update = $pdo->prepare($sql_update);
                $stmt_update->bindParam(':produto', $item['nome']);
                $stmt_update->execute();

                if ($stmt_update->rowCount() > 0) {
                    $produtoAtualizado = true;
                    break;
                }
            }

            if (!$produtoAtualizado) {
                $pdo->rollBack();
                echo "<script>alert('Produto esgotado ou não encontrado: " . htmlspecialchars($item['nome']) . "');</script>";
                exit;
            }
        }

        $_SESSION['carrinho'] = [];
        $pdo->commit();

        header("Location: loja_index.html");
        exit;

    } catch (PDOException $e) {
        $pdo->rollBack();
        die("Erro ao finalizar a compra: " . $e->getMessage());
    }
}
?>
