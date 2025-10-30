<?php

require 'cnn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);


    if (!$email) {
        echo "Email inválido.";
        exit;
    }


    if (empty($username) || empty($password)) {
        echo "Por favor, preencha ambos os campos.";
        exit;
    }

    try {

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM utilizadores WHERE username = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->fetchColumn() > 0) {
            echo "User já existe.";
        } else {

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);


            $stmt = $pdo->prepare("INSERT INTO utilizadores (username, password, email) VALUES (:username, :password, :email)");
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $passwordHash, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            header("Location: loginesignin.php");
            exit;
        }
    } catch (PDOException $e) {
        echo "Erro ao registrar usuário: " . $e->getMessage();
    }
}

