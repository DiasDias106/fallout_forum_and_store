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
            $mail->Password = //introduz aqui a sua pass de aplicação
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';

            $mail->setFrom('seuemail@gmail.com', 'Wasteland News');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = '🎮 Wasteland News: A Última Edição - Fallout Universe';
            $mail->Body = nl2br('
<h2>Data: Março de 2025</h2>
<p>Olá, Wastelanders! 👋</p>

<p>Bem-vindos à mais recente edição da nossa <b>Wasteland News</b>, a newsletter que traz tudo sobre o icônico universo de Fallout! Vamos dar uma olhada nos últimos lançamentos, dicas e muito mais sobre este universo pós-apocalíptico que conquistou corações ao redor do mundo.</p>

<h3>💥 Novidades: Fallout 5?</h3>
<p>O que há de novo no horizonte? <b>Fallout 5</b> está em desenvolvimento? A resposta ainda é um pouco incerta, mas fontes da Bethesda confirmaram que o estúdio está muito ocupado com novos projetos, incluindo <i>The Elder Scrolls VI</i>. Enquanto isso, o universo de Fallout continua a se expandir com atualizações e conteúdos para <b>Fallout 76</b>.</p>

<h3>🛠️ Fallout 76 - A Nova Era!</h3>
<p>Para os fãs de <b>Fallout 76</b>, o jogo continua a receber grandes atualizações. O mais recente <b>Season Pass</b> trouxe novas missões, equipamentos e mais eventos. Agora é o momento perfeito para se juntar a seus amigos e explorar a Appalachia.</p>

<h3>🎮 Fallout 4 - Uma Odisseia de Sobrevivência</h3>
<p>A edição <b>Game of the Year (GOTY)</b> de <b>Fallout 4</b> inclui todas as expansões como <i>Far Harbor</i> e <i>Nuka-World</i>, oferecendo uma experiência completa. Dica: visite o <i>Memory Den</i> em Diamond City para explorar missões emocionantes ligadas ao passado do protagonista.</p>

<h3>🔧 Fallout New Vegas - O Clássico que Nunca Sai de Moda</h3>
<p>Lançado em 2010, <b>Fallout New Vegas</b> continua sendo um dos RPGs mais icônicos. Graças à comunidade de modding, você pode experimentar melhorias gráficas e novos conteúdos.</p>

<h3>📰 História e Cultura de Fallout</h3>
<p>O universo de Fallout aborda temas como o poder das corporações e o impacto das armas nucleares. Se você ama a lore, confira os livros e quadrinhos da série!</p>

<h3>🌍 Fallout no Mundo Real</h3>
<p>A franquia Fallout vai além dos jogos! Desde convenções até itens colecionáveis oficiais, como camisetas e action figures, há sempre algo novo para os fãs.</p>

<h3>🎁 Ofertas Exclusivas</h3>
<p>A <b>Wasteland News</b> preparou promoções exclusivas para nossos leitores! Fique atento ao site e garanta descontos especiais em itens da série Fallout.</p>

<h3>🔮 O Futuro de Fallout</h3>
<p>Embora <b>Fallout 5</b> ainda não tenha sido anunciado, o universo da franquia continua crescendo. Novos produtos e atualizações estão a caminho!</p>

<h3>💬 Conecte-se Conosco!</h3>
<p>Gostou da edição de hoje? Tem sugestões ou quer compartilhar suas aventuras no Wasteland? Responda esta newsletter ou nos encontre nas redes sociais!</p>

<h4><b>Conecte-se nas Redes Sociais:</b></h4>
<ul>
<li><b>Facebook:</b> @FalloutFans</li>
<li><b>Twitter:</b> @WastelandNews</li>
<li><b>Instagram:</b> @FalloutUnite</li>
<li><b>YouTube:</b> Wasteland Broadcasting</li>
</ul>

<p><b>Obrigado por ser um Wastelander!</b><br>
Mantenha-se seguro, mantenha-se informado e continue explorando o deserto nuclear com coragem.</p>

<p><b>Até a próxima edição!<br>
Equipe Wasteland News</b></p>
');


            $mail->AltBody = nl2br('
<h2>Data: Março de 2025</h2>
<p>Olá, Wastelanders! 👋</p>

<p>Bem-vindos à mais recente edição da nossa <b>Wasteland News</b>, a newsletter que traz tudo sobre o icônico universo de Fallout! Vamos dar uma olhada nos últimos lançamentos, dicas e muito mais sobre este universo pós-apocalíptico que conquistou corações ao redor do mundo.</p>

<h3>💥 Novidades: Fallout 5?</h3>
<p>O que há de novo no horizonte? <b>Fallout 5</b> está em desenvolvimento? A resposta ainda é um pouco incerta, mas fontes da Bethesda confirmaram que o estúdio está muito ocupado com novos projetos, incluindo <i>The Elder Scrolls VI</i>. Enquanto isso, o universo de Fallout continua a se expandir com atualizações e conteúdos para <b>Fallout 76</b>.</p>

<h3>🛠️ Fallout 76 - A Nova Era!</h3>
<p>Para os fãs de <b>Fallout 76</b>, o jogo continua a receber grandes atualizações. O mais recente <b>Season Pass</b> trouxe novas missões, equipamentos e mais eventos. Agora é o momento perfeito para se juntar a seus amigos e explorar a Appalachia.</p>

<h3>🎮 Fallout 4 - Uma Odisseia de Sobrevivência</h3>
<p>A edição <b>Game of the Year (GOTY)</b> de <b>Fallout 4</b> inclui todas as expansões como <i>Far Harbor</i> e <i>Nuka-World</i>, oferecendo uma experiência completa. Dica: visite o <i>Memory Den</i> em Diamond City para explorar missões emocionantes ligadas ao passado do protagonista.</p>

<h3>🔧 Fallout New Vegas - O Clássico que Nunca Sai de Moda</h3>
<p>Lançado em 2010, <b>Fallout New Vegas</b> continua sendo um dos RPGs mais icônicos. Graças à comunidade de modding, você pode experimentar melhorias gráficas e novos conteúdos.</p>

<h3>📰 História e Cultura de Fallout</h3>
<p>O universo de Fallout aborda temas como o poder das corporações e o impacto das armas nucleares. Se você ama a lore, confira os livros e quadrinhos da série!</p>

<h3>🌍 Fallout no Mundo Real</h3>
<p>A franquia Fallout vai além dos jogos! Desde convenções até itens colecionáveis oficiais, como camisetas e action figures, há sempre algo novo para os fãs.</p>

<h3>🎁 Ofertas Exclusivas</h3>
<p>A <b>Wasteland News</b> preparou promoções exclusivas para nossos leitores! Fique atento ao site e garanta descontos especiais em itens da série Fallout.</p>

<h3>🔮 O Futuro de Fallout</h3>
<p>Embora <b>Fallout 5</b> ainda não tenha sido anunciado, o universo da franquia continua crescendo. Novos produtos e atualizações estão a caminho!</p>

<h3>💬 Conecte-se Conosco!</h3>
<p>Gostou da edição de hoje? Tem sugestões ou quer compartilhar suas aventuras no Wasteland? Responda esta newsletter ou nos encontre nas redes sociais!</p>

<h4><b>Conecte-se nas Redes Sociais:</b></h4>
<ul>
<li><b>Facebook:</b> @FalloutFans</li>
<li><b>Twitter:</b> @WastelandNews</li>
<li><b>Instagram:</b> @FalloutUnite</li>
<li><b>YouTube:</b> Wasteland Broadcasting</li>
</ul>

<p><b>Obrigado por ser um Wastelander!</b><br>
Mantenha-se seguro, mantenha-se informado e continue explorando o deserto nuclear com coragem.</p>

<p><b>Até a próxima edição!<br>
Equipe Wasteland News</b></p>
');

            if ($mail->send()) {
                echo 'Newsletter enviada com sucesso para ' . $email . '!';
                header('Location: sucesso.php?email=' . urlencode($email));
            } else {
                echo 'Erro ao enviar a newsletter. Tente novamente.';
                header('Location: erro.php');
            }
        } catch (Exception $e) {
            echo "Erro ao enviar o e-mail. Erro: {$mail->ErrorInfo}";
            header('Location: erro.php');
        }
    } else {
        echo "Por favor, insira um e-mail válido.";
        header('Location: erro.php');
    }
}
?>
