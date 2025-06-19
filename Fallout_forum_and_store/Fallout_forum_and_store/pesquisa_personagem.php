<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: loginesignin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.5.0/remixicon.min.css">
  <link rel="icon" href="imagens/FoS_bottle_cap.ico" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="css/estilos2.css">
  <link rel="stylesheet" href="css/estilos4.css">
  <link href="https://fonts.googleapis.com/css2?family=Atomic+Age&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
  <title>WastelandNews</title>
  <style>
    body {
      background: linear-gradient(120deg, #1e293b, #0f172a);
      color: #ffffff;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
    }
    .conter {
      max-width: 600px;
      background: rgba(0, 0, 0, 0.8);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
      text-align: center;
    }
    h1 {
      margin-bottom: 20px;
      font-size: 2rem;
      color: #facc15;
    }
    select, input[type="number"] {
      width: 100%;
      margin: 10px 0;
      padding: 10px;
      font-size: 1rem;
      border: none;
      border-radius: 5px;
    }
    button.afi {
      width: 100%;
      padding: 10px;
      background-color: #3b82f6;
      border: none;
      border-radius: 5px;
      color: #fff;
      font-size: 1.2rem;
      cursor: pointer;
      margin-top: 10px;
    }
    button:hover {
      background-color: #2563eb;
    }
    #result {
      margin-top: 20px;
      padding: 15px;
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 5px;
      text-align: left;
    }
    #loading {
      color: #facc15;
    }
  </style>
</head>
<body>
<header class="header" id="header">
    <nav class="nav container">
        <a href="index.html" class="nav_logo"><img src="imagens/wasteland_news_logo2.png" style="height: 50px"></a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="index.html" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="sobre.html" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>jogos</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="fallout_76.html">Fallout 76</a></li>
                        <li><a href="fallout_4.html">Fallout 4</a></li>
                        <li><a href="fallout_3.html">Fallout 3</a></li>
                        <li><a href="fallout_nv.html">Fallout New Vegas</a></li>
                        <li><a href="falloutshelter.html">Fallout Shelter</a></li>
                        <li><a href="fallouttactics.html">Fallout Tactics</a></li>
                        <li><a href="fallout_2.html">Fallout 2</a></li>
                        <li><a href="fallout_1.html">Fallout 1</a></li>
                    </ul>
                </li>

                <li class="nav__item dropdown">
                    <a href="hub_aplicacoes.html" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Aplicações</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="adivinhanum.php">Adivinha numero</a></li>
                        <li><a href="calculadora.html">Calculadora</a></li>
                        <li><a href="conversormoedas.php">Converosor Moedas</a></li>
                        <li><a href="contador_final.php">Contador Final</a></li>
                        <li><a href="jogoforca.php">Jogo Forca</a></li>
                        <li><a href="jogodosdados.php">Jogo Dados</a></li>
                        <li><a href="php/maquinadoselos.php">Maquina dos selos</a></li>
                        <li><a href="Descarregaveis.html">Descarregaveis</a> </li>
                        <li><a href="pesquisa_personagem.php">Central de Informações</a> </li>
                    </ul>
                </li>

                <li class="nav__item">
                    <a href="loading_page2.html" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Outros</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="contactos.html" class="nav__link">
                        <i class="ri-arrow-right-up-line"></i>
                        <span>Contacts</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="loginesignin.php">Login</a></li>
                        <li><a href="loginesignin.php">Sign in</a></li>
                        <li><a href="queixas.php">Queixas</a></li>
                        <li><a href="localizacao.html">Localização</a></li>
                        <li><a href="contactos.html">Contactos</a></li>
                        <li><a href="Descarregaveis.html">Descarregaveis</a></li>
                    </ul>
                </li>
            </ul>

            <div class="nav__close" id="nav-close">
                <i class="ri-close-large-line"></i>
            </div>

            <div class="nav__social">
                <a href="hub_leaderboard.html" target="_blank" class="nav__social-link">
                    <i class="ri-trophy-fill"></i>
                </a>
                <a href="loginesignin.php" target="_blank" class="nav__social-link">
                    <i class="fa-solid fa-user"></i>
                </a>
                <a href="hub_aplicacoes.html" target="_blank" class="nav__social-link">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
                <a href="localizacao.html" target="_blank" class="nav__social-link">
                    <i class="fa-solid fa-location-dot"></i>
                </a>
            </div>
        </div>

        <div class="nav__toggle" id="nav-toggle" style="padding-right: 30px">
            <i class="ri-menu-line"></i>
        </div>
    </nav>
</header>
<div class="pres10">
<div class="conter">
  <h1>Fallout API Selector</h1>
  <p>Escolha uma categoria e insira um número para descobrir detalhes:</p>
  <label for="category">Escolha a categoria:</label>
  <select id="category">
    <option value="characters">Personagens</option>
    <option value="locations">Locais</option>
    <option value="items">Itens</option>
  </select>
  <label for="itemId">Insira um Número:</label>
  <input type="number" id="itemId" placeholder="Ex: 1">
  <button class="afi" id="fetchButton">Procurar</button>
  <div id="loading" style="display: none;">Carregando...</div>
  <div id="result"></div>
</div>
</div>
<footer style="margin-top: 80px">
  <div id="footer_content">
    <div id="footer_contacts">
      <img src="imagens/wasteland_news_logo2.png" style="width: 200px;height:auto">

      <div id="footer_social_media">
        <a href="#" class="footer-link" id="instagram">
          <i class="fa-brands fa-instagram"></i>
        </a>
        <a href="#" class="footer-link" id="github">
          <i class="fa-brands fa-github"></i>
        </a>
        <a href="#" class="footer-link" id="linkdin">
          <i class="fa-brands fa-linkedin"></i>
        </a>
      </div>
    </div>
    <ul class="footer-list">
      <li>
        <h3>Forum</h3>
      </li>
      <li>
        <a href="sobre.html" class="footer-link">Sobre</a>
      </li>
      <li>
        <a href="noticias.html" class="footer-link">Noticias</a>
      </li>
      <li>
        <a href="hub_aplicacoes.html" class="footer-link">Aplicações</a>
      </li>
    </ul>
    <ul class="footer-list">
      <li>
        <h3>Loja</h3>
      </li>
      <li>
        <a href="jogos.php" class="footer-link">Jogos</a>
      </li>
      <li>
        <a href="outros.php" class="footer-link">Items</a>
      </li>
      <li>
        <a href="loja_index.html" class="footer-link">Destaques</a>
      </li>
    </ul>
    <div id="footer_subscribe">
      <h3>Subscribe</h3>
      <p>
        Enter your email to get notified about
        our news solutions
      </p>
      <form action="newsletter.php" method="post">
        <div id="input_group">
          <label for="email"></label><input name="email" type="email" id="email">
          <button  type="submit" name="enviar_newsletter">
            <i class="fa-solid fa-envelope"></i>
          </button>
        </div>
      </form>
    </div>
  </div>
  <div id="footer_copyright">
    &#169
    2024 all right reserved
  </div>
</footer>
<script src="bootstrap-5.3.3-dist/js/bootstrap.js"></script>
<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script>
<script src="bootstrap-5.3.3-dist/js/nav.js"></script>
<script>
  const apiUrl = 'Fallout_API.json';

  const categorySelect = document.getElementById('category');
  const itemIdInput = document.getElementById('itemId');
  const fetchButton = document.getElementById('fetchButton');
  const resultDiv = document.getElementById('result');
  const loadingDiv = document.getElementById('loading');

  async function fetchFalloutAPI() {
    try {
      const response = await fetch(apiUrl);
      const data = await response.json();
      return data.falloutAPI;
    } catch (error) {
      console.error("Erro ao buscar os dados:", error);
      resultDiv.innerHTML = '<p style="color: red;">Erro ao buscar os dados. Tente novamente mais tarde.</p>';
      return null;
    }
  }

  async function fetchByCategoryAndId() {
    const category = categorySelect.value;
    const itemId = parseInt(itemIdInput.value);

    if (isNaN(itemId) || itemId < 1) {
      resultDiv.innerHTML = '<p style="color: red;">Por favor, insira um ID válido.</p>';
      return;
    }

    loadingDiv.style.display = 'block';
    resultDiv.innerHTML = '';

    const data = await fetchFalloutAPI();
    loadingDiv.style.display = 'none';

    if (!data) return;

    const categoryData = data[category];
    const item = categoryData.find(entry => entry.id === itemId);

    if (item) {
      const specialStats = item.special
              ? Object.entries(item.special)
                      .map(([stat, value]) => `<p><strong>${stat.toUpperCase()}:</strong> ${value}</p>`)
                      .join('')
              : '';
      resultDiv.innerHTML = `
          <h2>${item.name}</h2>
          <p>${item.description || 'Descrição não disponível.'}</p>
          ${item.role ? `<p><strong>Role:</strong> ${item.role}</p>` : ''}
          ${item.region ? `<p><strong>Região:</strong> ${item.region}</p>` : ''}
          ${item.type ? `<p><strong>Tipo:</strong> ${item.type}</p>` : ''}
          ${specialStats}
        `;
    } else {
      resultDiv.innerHTML = `<p style="color: red;">Nenhum item encontrado com o ID ${itemId} na categoria ${category}.</p>`;
    }
  }

  fetchButton.addEventListener('click', fetchByCategoryAndId);
</script>
</body>
</html>

