<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    header("Location: loginesignin1.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Vendas</title>
    <link rel="stylesheet" href="css/estilos10.css">
</head>
<body>
<h1>Últimas Compras do Usuário Logado</h1>
<button onclick="fetchPurchases()">Buscar Últimas 10 Compras</button>
<table id="salesTable">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Valor</th>
    </tr>
    </thead>
    <tbody></tbody>
</table>

<script>
    async function fetchPurchases() {
        try {
            const response = await fetch('lista_compras.php');
            const data = await response.json();

            if (data.error) {
                alert(data.error);
                return;
            }

            const tbody = document.querySelector("#salesTable tbody");
            tbody.innerHTML = "";

            data.forEach(purchase => {
                const row = `<tr>
                        <td>${purchase.id_venda}</td>
                        <td>${purchase.comprador}</td>
                        <td>${purchase.produto}</td>
                        <td>${purchase.dta_compra}</td>
                        <td>${purchase.preco}</td>
                    </tr>`;
                tbody.innerHTML += row;
            });
        } catch (error) {
            console.error("Erro ao buscar os dados:", error);
        }
    }
</script>
</body>
</html>
