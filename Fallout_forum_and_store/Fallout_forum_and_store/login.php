<?php

require 'cnn.php';



ini_set('session.cookie_lifetime', 3600);
ini_set('session.gc_maxlifetime', 3600);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Por favor, preencha ambos os campos.";
        exit;
    }

    try {
        $stmt = $pdo->prepare("SELECT * FROM utilizadores WHERE username = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        var_dump($user);


        if ($user) {

            if (password_verify($password, $user['password'])) {
                session_start();

                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['cargo'] = $user['cargo'];

                var_dump($_SESSION);

                header("Location: logout.php");
                exit;
            } else {
                header("Location: loginesignin.php?error= Senha incorreta.");
                exit;
            }
        } else {
            header("Location: loginesignin.php?error= User nao encontrado.");
            exit;
        }
    } catch (PDOException $e) {
        header("Location: loginesignin.php?error= Erro ao verificar User: " . $e->getMessage());
        exit;
    }
}

