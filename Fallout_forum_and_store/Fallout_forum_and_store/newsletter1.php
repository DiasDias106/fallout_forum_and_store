<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviar_newsletter'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = //introduza aqui o seu email
            $mail->Password = // introduza aqui a sua pass de aplicação
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';


            $mail->setFrom('seuemail@gmail.com', 'Wasteland News');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = '🌟 Atomic Shop News - Edição de Março 2025';
            $mail->Body = nl2br('
Data: Março de 2025

Olá, Sobreviventes do Wasteland! 👋

Sejam bem-vindos à Atomic Shop News, onde trazemos todas as novidades e promoções sobre nossa loja dedicada a Jogos, Figuras e Itens Colecionáveis inspirados no universo Fallout. Prepare-se para encontrar a coleção perfeita para expandir seu acervo e enriquecer sua experiência no apocalipse nuclear.

🔥 <b>Ofertas Imperdíveis de Março</b><br>
Este mês, nossa loja está com descontos incríveis para você garantir seus itens favoritos da série Fallout. Se você é fã de colecionáveis ou está em busca de novos jogos, temos ofertas para todos!<br><br>

<b>Desconto de 30% em todos os Jogos Fallout!</b><br>
Não perca a chance de adquirir seu jogo favorito da franquia Fallout com preços super acessíveis. Fallout 4 e Fallout 76 com preços especiais!<br><br>

<b>Colecionáveis Exclusivos - Desconto de 25%!</b><br>
Aumente sua coleção com figuras incríveis do Fallout 76, Vault Boy e muito mais, com 25% de desconto nesta edição limitada.<br><br>

<b>Pacote de Figuras Fallout - Compre 2 e ganhe 1 grátis!</b><br>
Adquira figuras exclusivas dos seus personagens favoritos de Fallout e ganhe uma surpresa grátis!<br><br>

🛍️ <b>Novos Produtos na Atomic Shop</b><br>
Este mês, nossa loja recebeu novos itens colecionáveis e edições especiais de jogos para deixar sua coleção ainda mais completa. Confira alguns dos lançamentos imperdíveis!<br><br>

- <b>Figura Fallout 4 - Power Armor</b><br>
- <b>Figura Vault Boy - Edição Limitada</b><br>
- <b>Jogos Fallout - Edição GOTY (Game of the Year)</b><br><br>

🌍 <b>Itens de Coleção Exclusivos</b><br>
A Atomic Shop tem o prazer de trazer itens raros e exclusivos para os verdadeiros fãs de Fallout. Não deixe de conferir as peças mais disputadas da nossa loja:<br><br>

- <b>Vault Tec - Mochila de Coleção</b><br>
- <b>Miniaturas Fallout 76 - Coleção Completa</b><br>
- <b>Posters e Arte Fallout - Edição Limitada</b><br><br>

💥 <b>Fique de Olho nas Promoções Relâmpago!</b><br>
Fique atento às promoções relâmpago que ocorrem regularmente na Atomic Shop. Itens limitados e descontos exclusivos, disponíveis por tempo limitado. Não perca a chance de conseguir um item raro a preços reduzidos!<br><br>

⚡ <b>Participe da Comunidade e Ganhe Prêmios!</b><br>
Participe da nossa comunidade e ganhe prêmios exclusivos da Atomic Shop! Compartilhe fotos da sua coleção, seus jogos ou suas figuras e use a hashtag <b>#AtomicShopFallout</b> nas redes sociais para concorrer a brindes!<br><br>

🔮 <b>Não Perca as Nossas Ofertas!</b><br>
Visite nossa loja online e aproveite os preços especiais da Atomic Shop! Não se esqueça de assinar nossa newsletter para receber todas as novidades diretamente no seu e-mail e nunca perder uma promoção.<br><br>

<b>Assine agora e ganhe 10% de desconto no seu primeiro pedido!</b><br><br>

💬 <b>Conecte-se com a Atomic Shop:</b><br>
Temos orgulho de fazer parte da sua jornada no universo Fallout! Acompanhe-nos nas redes sociais e fique por dentro de todas as novidades:<br><br>

- <b>Facebook:</b> @AtomicShopOfficial<br>
- <b>Instagram:</b> @AtomicShopFallout<br>
- <b>Twitter:</b> @AtomicShopVault<br><br>

Equipe Atomic Shop<br>
<b>Sua loja oficial de Jogos, Figuras e Itens Colecionáveis Fallout!</b><br><br>

💥 <b>Conecte-se com a Comunidade:</b><br>
Compartilhe suas compras e construções com a hashtag <b>#AtomicShopAdventures</b> e mostre ao mundo como você está aproveitando os itens exclusivos da Atomic Shop!<br><br>

<b>Equipe Atomic Shop</b><br>
<b>O Futuro do Wasteland está na sua Mão! 🛒</b><br>
');
            $mail->AltBody = nl2br('
Data: Março de 2025

Olá, Sobreviventes do Wasteland! 👋

Sejam bem-vindos à Atomic Shop News, onde trazemos todas as novidades e promoções sobre nossa loja dedicada a Jogos, Figuras e Itens Colecionáveis inspirados no universo Fallout. Prepare-se para encontrar a coleção perfeita para expandir seu acervo e enriquecer sua experiência no apocalipse nuclear.

🔥 <b>Ofertas Imperdíveis de Março</b><br>
Este mês, nossa loja está com descontos incríveis para você garantir seus itens favoritos da série Fallout. Se você é fã de colecionáveis ou está em busca de novos jogos, temos ofertas para todos!<br><br>

<b>Desconto de 30% em todos os Jogos Fallout!</b><br>
Não perca a chance de adquirir seu jogo favorito da franquia Fallout com preços super acessíveis. Fallout 4 e Fallout 76 com preços especiais!<br><br>

<b>Colecionáveis Exclusivos - Desconto de 25%!</b><br>
Aumente sua coleção com figuras incríveis do Fallout 76, Vault Boy e muito mais, com 25% de desconto nesta edição limitada.<br><br>

<b>Pacote de Figuras Fallout - Compre 2 e ganhe 1 grátis!</b><br>
Adquira figuras exclusivas dos seus personagens favoritos de Fallout e ganhe uma surpresa grátis!<br><br>

🛍️ <b>Novos Produtos na Atomic Shop</b><br>
Este mês, nossa loja recebeu novos itens colecionáveis e edições especiais de jogos para deixar sua coleção ainda mais completa. Confira alguns dos lançamentos imperdíveis!<br><br>

- <b>Figura Fallout 4 - Power Armor</b><br>
- <b>Figura Vault Boy - Edição Limitada</b><br>
- <b>Jogos Fallout - Edição GOTY (Game of the Year)</b><br><br>

🌍 <b>Itens de Coleção Exclusivos</b><br>
A Atomic Shop tem o prazer de trazer itens raros e exclusivos para os verdadeiros fãs de Fallout. Não deixe de conferir as peças mais disputadas da nossa loja:<br><br>

- <b>Vault Tec - Mochila de Coleção</b><br>
- <b>Miniaturas Fallout 76 - Coleção Completa</b><br>
- <b>Posters e Arte Fallout - Edição Limitada</b><br><br>

💥 <b>Fique de Olho nas Promoções Relâmpago!</b><br>
Fique atento às promoções relâmpago que ocorrem regularmente na Atomic Shop. Itens limitados e descontos exclusivos, disponíveis por tempo limitado. Não perca a chance de conseguir um item raro a preços reduzidos!<br><br>

⚡ <b>Participe da Comunidade e Ganhe Prêmios!</b><br>
Participe da nossa comunidade e ganhe prêmios exclusivos da Atomic Shop! Compartilhe fotos da sua coleção, seus jogos ou suas figuras e use a hashtag <b>#AtomicShopFallout</b> nas redes sociais para concorrer a brindes!<br><br>

🔮 <b>Não Perca as Nossas Ofertas!</b><br>
Visite nossa loja online e aproveite os preços especiais da Atomic Shop! Não se esqueça de assinar nossa newsletter para receber todas as novidades diretamente no seu e-mail e nunca perder uma promoção.<br><br>

<b>Assine agora e ganhe 10% de desconto no seu primeiro pedido!</b><br><br>

💬 <b>Conecte-se com a Atomic Shop:</b><br>
Temos orgulho de fazer parte da sua jornada no universo Fallout! Acompanhe-nos nas redes sociais e fique por dentro de todas as novidades:<br><br>

- <b>Facebook:</b> @AtomicShopOfficial<br>
- <b>Instagram:</b> @AtomicShopFallout<br>
- <b>Twitter:</b> @AtomicShopVault<br><br>

Equipe Atomic Shop<br>
<b>Sua loja oficial de Jogos, Figuras e Itens Colecionáveis Fallout!</b><br><br>

💥 <b>Conecte-se com a Comunidade:</b><br>
Compartilhe suas compras e construções com a hashtag <b>#AtomicShopAdventures</b> e mostre ao mundo como você está aproveitando os itens exclusivos da Atomic Shop!<br><br>

<b>Equipe Atomic Shop</b><br>
<b>O Futuro do Wasteland está na sua Mão! 🛒</b><br>
');

            if ($mail->send()) {
                echo 'Newsletter enviada com sucesso para ' . $email . '!';
                header('Location: sucesso3.php?email=' . urlencode($email));
            } else {
                echo 'Erro ao enviar a newsletter. Tente novamente.';
                header('Location: erro3.php');
            }
        } catch (Exception $e) {
            echo "Erro ao enviar o e-mail. Erro: {$mail->ErrorInfo}";
            header('Location: erro3.php');
        }
    } else {
        echo "Por favor, insira um e-mail válido.";
        header('Location: erro3.php');
    }
}
?>

