<?php
$servername = "localhost";
$username = "Seu_User";
$password = "Sua_Pass";
$dbname = "loja";

header('Content-Type: application/json');

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Falha na conexão com o banco de dados: ' . $e->getMessage()]);
    exit();
}

$termo = isset($_GET['termo']) ? strtolower($_GET['termo']) : "";

if ($termo !== "") {
    $sql = "SELECT titulo, url FROM paginas WHERE titulo LIKE :termo LIMIT 10";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':termo', $termo . "%", PDO::PARAM_STR);
        $stmt->execute();

        $sugestoes = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $sugestoes[] = [
                'titulo' => $row['titulo'],
                'url' => $row['url']
            ];
        }

        echo json_encode($sugestoes);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Erro ao executar a consulta: ' . $e->getMessage()]);
    }
} else {
    echo json_encode([]);
}

$conn = null;
?>

