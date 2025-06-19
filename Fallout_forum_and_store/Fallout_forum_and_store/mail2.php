<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $destino = $_POST['destino'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['message'];

    // Validação básica
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-mail inválido!";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = //introduza aqui o seu email
        $mail->Password = //introduza aqui a sua pass de aplicação
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($email, 'Email Encaminhado');
        $mail->addAddress($destino);

        $mail->isHTML(true);
        $mail->Subject = $assunto;
        $mail->Body    = nl2br($mensagem);
        $mail->AltBody = strip_tags($mensagem);

        $mail->send();
        echo 'Email enviado com sucesso para ' . $email . '!';
        header('Location: sucesso2.php?email=' . urlencode($email));
    } catch (Exception $e) {
        echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
        header('Location: erro2.php');
    }
} else {
    echo "Erro: Formulário não enviado corretamente.";
    header('Location: erro2.php');
}
?>

