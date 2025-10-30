<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $destino = isset($_POST['destino']) ? $_POST['destino'] : 'Sem nome';
    $emailAddress = isset($_POST['email']) ? $_POST['email'] : 'Sem email';
    $message = isset($_POST['message']) ? $_POST['message'] : 'Sem mensagem';
    $assunto = isset($_POST['assunto']) ? $_POST['assunto'] : 'Sem mensagem';

    $email = new PHPMailer(true);

    try {
        $email->isSMTP();
        $email->Host = '127.0.0.1';
        $email->Port = 1025;
        $email->SMTPAuth = false;

        $email->setFrom('alguem@alguem.com', "Eviador");
        $email->addAddress('alguem@alguem.com', "Recebedor");

        $email->isHTML(true);
        $email->Subject = $assunto;
        $email->Body = "
            <h1>Nova mensagem de contato</h1>
            <p><strong>E-mail:</strong> {$emailAddress}</p>
            <p><strong>Destinatario:</strong> {$destino}</p>
            <p><strong>Assunto:</strong> {$assunto}</p>
            <p><strong>Mensagem:</strong></p>
            <p>{$message}</p>
        ";

        $email->send();
        echo 'Mensagem enviada com sucesso!';
    } catch (Exception $e) {
        echo 'Erro ao enviar mensagem: ' . $e->getMessage();
    }
} else {
    echo 'Método inválido';
}
