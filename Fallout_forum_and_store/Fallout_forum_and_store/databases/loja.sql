-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Fev-2025 às 13:21
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `figuras`
--

CREATE TABLE `figuras` (
  `id_figura` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` double(4,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `imagem` varchar(255) DEFAULT 'imagens_loja/produto_sem_imagem.png',
  `descricao` varchar(255) DEFAULT NULL,
  `caminho` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `figuras`
--

INSERT INTO `figuras` (`id_figura`, `nome`, `preco`, `quantidade`, `imagem`, `descricao`, `caminho`) VALUES
(1, 'Pop Fallout Gold Edition', 99.99, 5, 'imagens_loja/figura6_fallout.jpeg', 'Figura rara da iconica mascote Vaultboy pintada de dourado.', 'figuras/figura1.php'),
(2, 'Vault Dweller Pop', 19.99, 155, 'imagens_loja/figura4_fallout.jpg', 'Figura pop da personagem Vault Dweller', 'figuras/figura2.php'),
(3, 'Super Mutant Pop', 24.99, 120, 'imagens_loja/figura5_fallout.png', 'Figura pop da personagem Super Mutant', 'figuras/figura2.php'),
(4, 'Piper Pop', 19.99, 249, 'imagens_loja/figura7_fallout.jpg', 'Figura pop da personagem Piper', 'figuras/figura4.php'),
(5, 'T-60 Power Armor Pop', 29.99, 40, 'imagens_loja/figura8_fallout.jpg', 'Figura pop da Armadura Power Armor T-60', 'figuras/figura5.php'),
(6, 'Liberty Prime Pop', 49.99, 15, 'imagens_loja/figura9_fallout.jpg', 'Figura pop da Maquina de combate Liberty Prime', 'figuras/figura6.php'),
(7, 'Sole Survivor Pop', 19.99, 230, 'imagens_loja/figura10_fallout.webp', 'Figura pop da personagem Sole Survivor', 'figuras/figura7.php'),
(8, 'Codsworth Pop', 19.99, 400, 'imagens_loja/figura11_fallout.jpg', 'Figura pop da personagem Codsworth', 'figuras/figura8.php'),
(9, 'Paladin Danse', 24.99, 90, 'imagens_loja/figura12_fallout.webp', 'Figura pop da personagem iconica Paladin Danse', 'figuras/figura9.php');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `id_jogo` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` double(4,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `imagem` varchar(255) DEFAULT 'imagens_loja/produto_sem_imagem.png',
  `descricao` varchar(255) DEFAULT NULL,
  `caminho` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`id_jogo`, `nome`, `preco`, `quantidade`, `imagem`, `descricao`, `caminho`) VALUES
(1, 'Fallout 4 Standard', 69.99, 35, 'imagens/fallout4_card1.webp', 'Fallout 4 Standard é um RPG de ação em um mundo pós-apocalíptico, focado em exploração, combate e personalização de personagem.', 'jogos/jogo1.php'),
(2, 'Fallout 4 G.O.T.Y', 99.99, 4, 'imagens/fallout4_card2.avif', 'Fallout 4: GOTY é um RPG de ação em um mundo pós-apocalíptico, incluindo o jogo base e todas as expansões, com exploração, combate e personalização.', 'jogos/jogo2.php'),
(3, 'Fallout 76 Standard', 39.99, 200, 'imagens/car1_76.avif', 'Fallout 76 é um RPG de ação online em um mundo pós-apocalíptico, com exploração, combate e modo multiplayer cooperativo.', 'jogos/jogo3.php'),
(4, 'Fallout 76 Skyline Valley', 59.99, 10, 'imagens/card2_76.avif', 'Fallout 76 é um RPG de ação online em um mundo pós-apocalíptico, com exploração, combate e modo multiplayer cooperativo.', 'jogos/jogo4.php'),
(5, 'Fallout 3 G.O.T.Y', 19.99, 4, 'imagens/fallout3_card2.jpg', 'Fallout 3 é um RPG de ação em um mundo pós-apocalíptico, com narrativa imersiva, exploração e combate em primeira ou terceira pessoa.', 'jogos/jogo5.php'),
(6, 'Fallout New Vegas Standard', 15.99, 100, 'imagens/fallout_nv_card1.avif', '\nFallout: New Vegas é um RPG de ação em um mundo pós-apocalíptico, conhecido por sua narrativa ramificada, escolhas impactantes e ambientação no deserto de Mojave.', 'jogos/jogo6.php'),
(7, 'Fallout 2 Standard', 19.99, 50, 'imagens/fallout2_card1.avif', 'Fallout 2 é um RPG clássico isométrico em um mundo pós-apocalíptico, focado em narrativa profunda, exploração e escolhas morais complexas.', 'jogos/jogo7.php'),
(8, 'Fallout 1 Standard', 19.99, 50, 'imagens/fallout1_sugestao.jpg', 'Fallout 1 é um RPG clássico ambientado em um mundo pós-apocalíptico, com foco em exploração, narrativa envolvente e decisões que afetam o desenrolar da história.', 'jogos/jogo8.php'),
(9, 'Fallout Shelter Standard', 0.00, 99996, 'imagens/falloutshelter_sujestao.jpg', 'Fallout Shelter é um jogo de simulação onde o jogador gerencia um cofre subterrâneo pós-apocalíptico, equilibrando recursos, segurança e o bem-estar dos moradores.', 'jogos/jogo9.php');

-- --------------------------------------------------------

--
-- Estrutura da tabela `outros`
--

CREATE TABLE `outros` (
  `id_outros` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` double(5,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `imagem` varchar(255) DEFAULT 'imagens_loja/produto_sem_imagem.png',
  `descricao` varchar(255) DEFAULT NULL,
  `caminho` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `outros`
--

INSERT INTO `outros` (`id_outros`, `nome`, `preco`, `quantidade`, `imagem`, `descricao`, `caminho`) VALUES
(1, 'Limited edition fallout controller', 149.99, 4, 'imagens_loja/controller_fallout.png', 'Comando de Edição limitada para X-Box', 'outros/outros1.php'),
(2, 'Nukacola edition fallout controller', 79.99, 30, 'imagens_loja/controller_fallout2.webp', 'Comando Edição Nuka Cola Para Comando de Edição limitada para X-Box', 'outros/outros2.php'),
(3, 'Vault Boy X-box controller Suport', 49.99, 30, 'imagens_loja/controllers_suporter.png', 'Suporte para comando Vaultboy', 'outros/outros3.php'),
(4, 'Purified Water', 9.99, 400, 'imagens_loja/purified_water.png', 'Agua Purificada(Agua Mineral)', 'outros/outros4.php'),
(5, 'Nuke Lunchbox', 29.99, 50, 'imagens_loja/nuke_image.jpg', 'lancheira em forma de ogiva nuclear', 'outros/outros5.php'),
(6, 'Fallout T-Shirt', 16.99, 350, 'imagens_loja/camisola_fallout.webp', 'T-Shirt azul de tamanha variavel fallout', 'outros/outros6.php'),
(7, 'Pipboy Replica', 299.99, 4, 'imagens_loja/pipboy_item.webp', 'Replica autentica do PipBoy do Jogo Fallout 4', 'outros/outros7.php'),
(8, 'Suvenir bag', 39.99, 3000, 'imagens_loja/kit_tricentenal.jpg', 'Kit de Itens Fallout quee celebra o tricentenario da criação da Vaultec', 'outros/outros8.php'),
(9, 'T-60 Red Army Helmet', 199.99, 4, 'imagens_loja/kit_vault_76.jpg', 'Capacete Da Armadura T-60 edição Red Army', 'outros/outros9.php');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginas`
--

CREATE TABLE `paginas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `paginas`
--

INSERT INTO `paginas` (`id`, `titulo`, `descricao`, `url`) VALUES
(1, 'Home', 'Pagina principal da loja', 'loja_index.html'),
(2, 'Jogos', 'Pagina onde pode encontrar os jogos a venda', 'jogos.html'),
(3, 'Figuras', 'Pagina onde pode encontrar as figuras a venda', 'figuras.html'),
(4, 'Outros', 'Pagina onde pode encontrar outros itens a venda', 'outros.html'),
(5, 'Vaultec Mail', 'local onde pode enviar email para onde pretender', 'queixas2.php'),
(6, 'Login', 'pagina onde pode dar login', 'loginesignin1.php'),
(7, 'Signin', 'pagina onde pode criar conta', 'loginesignin1.php'),
(8, 'Descarregaveis', 'pagina onde pode descarregar conteudos', 'Descarregaveis1.html'),
(9, 'Localizacao', 'contem informacoes de contacto', 'localizacao2.html'),
(10, 'Carrinho', 'local onde pode armazenar as suas compras', 'Carrinho.html'),
(11, 'Pop Fallout Gold Edition', 'item compravel', 'figuras/figura1.php'),
(12, 'Vault Dweller Pop', 'item compravel', 'figura2.php'),
(13, 'Super Mutant Pop', 'item compravel', 'figura3.php'),
(14, 'Piper Pop', 'item compravel', 'figura4.php'),
(15, 'T-60 Power Armor Pop', 'item compravel', 'figura5.php'),
(16, 'Liberty Prime Pop', 'item compravel', 'figura6.php'),
(17, 'Sole Survivor Pop', 'item compravel', 'figura7.php'),
(18, 'Codsworth Pop', 'item compravel', 'figura8.php'),
(19, 'Paladin Dance', 'item compravel', 'figura9.php'),
(20, 'Limited edition fallout controller', 'item compravel', 'outros1.php'),
(21, 'Nukacola edition fallout controller', 'item compravel', 'outros2.php'),
(22, 'Vault Boy controller Suport', 'item compravel', 'outros3.php'),
(23, 'Purified Water', 'item compravel', 'outros4.php'),
(24, 'Nuke Lunchbox', 'item compravel', 'outros5.php'),
(25, 'Fallout T-Shirt', 'item compravel', 'outros6.php'),
(26, 'Pipboy Replica', 'item compravel', 'outros7.php'),
(27, 'Suvenir bag', 'item compravel', 'outros8.php'),
(28, 'T-60 Red Army Helmet', 'item compravel', 'outros9.php'),
(29, 'Fallout 4 Standard', 'item compravel', 'jogo1.php'),
(30, 'Fallout 4 G.O.T.Y', 'item compravel', 'jogo2.php'),
(31, 'Fallout 76 Standard', 'item compravel', 'jogo3.php'),
(32, 'Fallout 76 Skyline Valley', 'item compravel', 'jogo4.php'),
(33, 'Fallout 3 G.O.T.Y', 'item compravel', 'jogo5.php'),
(34, 'Fallout New Vegas Standard', 'item compravel', 'jogo6.php'),
(35, 'Fallout 2 Standard', 'item compravel', 'jogo7.php'),
(36, 'Fallout 1 Standard', 'item compravel', 'jogo8.php'),
(37, 'Fallout Shelter Standrad', 'item compravel', 'jogo9.php'),
(38, 'Contactos', 'local onde encontra todas as funcionalidades de contacto', 'contacto1.html');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` date DEFAULT current_timestamp(),
  `password` varchar(100) NOT NULL,
  `cargo` enum('admin','user') NOT NULL DEFAULT 'user',
  `imagem` varchar(255) DEFAULT 'imagens/nofoto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id_user`, `username`, `email`, `login`, `password`, `cargo`, `imagem`) VALUES
(4, 'teste1', 'teupai@gmail.com', '2024-12-30', '$2y$10$yqqX.fwRVgqhaFicCIBhteagrYD9V5Ldj5oajF1j4hrinpVx9Ak5W', 'user', NULL),
(5, 'administrador', 'azulinhodias6@gmail.com', '2025-01-08', '$2y$10$zSg7B6QRYK.KgisEhWpSheZlsH3DlNXJj.D.EH3StAeyVeIIh1YQC', 'admin', 'imagens/nofoto'),
(7, 'antoniodias', 'teste@gmail.com', '2025-02-20', '$2y$10$kU7XeN0gaiZRib79jZBHvuJVXnfak.R/GUkiYoO5h2xu7QIX2bsw2', 'user', 'imagens/nofoto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL,
  `comprador` varchar(50) DEFAULT NULL,
  `produto` varchar(100) NOT NULL,
  `preco` double(5,2) NOT NULL,
  `dta_compra` date DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id_venda`, `comprador`, `produto`, `preco`, `dta_compra`, `id_user`) VALUES
(1, 'teste1', 'Fallout Shelter Standrad', 0.00, '2024-12-30', 4),
(2, 'teste1', 'Fallout Shelter Standrad', 0.00, '2024-12-30', 4),
(3, 'teste1', 'Fallout Shelter Standrad', 0.00, '2024-12-30', 4),
(4, 'teste1', 'Fallout Shelter Standrad', 0.00, '2024-12-30', 4),
(5, 'teste1', 'Fallout Shelter Standrad', 0.00, '2024-12-30', 4),
(6, 'teste1', 'Fallout Shelter Standrad', 0.00, '2024-12-30', 4),
(7, 'teste1', 'Fallout Shelter Standrad', 0.00, '2024-12-30', 4),
(8, 'teste1', 'Fallout Shelter Standrad', 0.00, '2024-12-30', 4),
(9, 'teste1', 'Fallout Shelter Standrad', 0.00, '2024-12-30', 4),
(10, 'teste1', 'Fallout Shelter Standrad', 0.00, '2024-12-30', 4),
(11, 'teste1', 'Fallout Shelter Standrad', 0.00, '2024-12-30', 4),
(12, 'teste1', 'Suvenir bag', 39.99, '2024-12-31', 4),
(13, 'teste1', 'Sole Survivor Pop', 19.99, '2024-12-31', 4),
(14, 'teste1', 'Sole Survivor Pop', 19.99, '2024-12-31', 4),
(15, 'teste1', 'Suvenir bag', 39.99, '2024-12-31', 4),
(16, 'teste1', 'Suvenir bag', 39.99, '2024-12-31', 4),
(17, 'teste1', 'Purified Water', 9.99, '2025-01-03', 4),
(18, 'teste1', 'Purified Water', 9.99, '2025-01-03', 4),
(19, 'teste1', 'Purified Water', 9.99, '2025-01-03', 4),
(20, 'teste1', 'Purified Water', 9.99, '2025-01-04', 4),
(21, 'teste1', 'Purified Water', 9.99, '2025-01-04', 4),
(22, 'teste1', 'Fallout T-Shirt', 16.99, '2025-01-07', 4),
(23, 'teste1', 'Fallout T-Shirt', 16.99, '2025-01-07', 4),
(24, 'teste1', 'Suvenir bag', 39.99, '2025-01-08', 4),
(25, 'administrador', 'Fallout Shelter Standard', 0.00, '2025-01-10', 5),
(26, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-10', 4),
(27, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-14', 4),
(28, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-14', 4),
(29, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-14', 4),
(30, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-14', 4),
(31, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-14', 4),
(32, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-14', 4),
(33, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-14', 4),
(34, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-14', 4),
(35, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-14', 4),
(36, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-14', 4),
(37, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-14', 4),
(38, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-15', 4),
(39, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-15', 4),
(40, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-15', 4),
(41, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-15', 4),
(42, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-15', 4),
(43, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-15', 4),
(44, 'teste1', 'Vault Dweller Pop', 19.99, '2025-01-15', 4),
(45, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-15', 4),
(46, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-15', 4),
(47, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-15', 4),
(48, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-15', 4),
(49, 'teste1', 'Vault Dweller Pop', 19.99, '2025-01-15', 4),
(50, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-16', 4),
(51, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-16', 4),
(52, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-16', 4),
(53, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-16', 4),
(54, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-16', 4),
(55, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-16', 4),
(56, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-16', 4),
(57, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-16', 4),
(58, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-16', 4),
(59, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-16', 4),
(60, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-01-16', 4),
(61, 'administrador', 'Fallout Shelter Standard', 0.00, '2025-01-16', 5),
(63, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-02-19', 4),
(64, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-02-19', 4),
(67, 'antoniodias', 'Fallout Shelter Standard', 0.00, '2025-02-20', 7),
(68, 'antoniodias', 'Fallout Shelter Standard', 0.00, '2025-02-20', 7),
(69, 'administrador', 'Fallout Shelter Standard', 0.00, '2025-02-20', 5),
(70, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-02-21', 4),
(73, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-02-22', 4),
(74, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-02-22', 4),
(75, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-02-22', 4),
(76, 'teste1', 'Piper Pop', 19.99, '2025-02-22', 4),
(77, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-02-22', 4),
(78, 'teste1', 'Piper Pop', 19.99, '2025-02-22', 4),
(80, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-02-22', 4),
(81, 'administrador', 'Fallout Shelter Standard', 0.00, '2025-02-23', 5),
(82, 'administrador', 'Fallout Shelter Standard', 0.00, '2025-02-23', 5),
(83, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-02-23', 4),
(84, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-02-23', 4),
(85, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-02-23', 4),
(86, 'teste1', 'Piper Pop', 19.99, '2025-02-23', 4),
(87, 'teste1', 'Purified Water', 9.99, '2025-02-23', 4),
(88, 'teste1', 'Purified Water', 9.99, '2025-02-23', 4),
(89, 'teste1', 'Fallout Shelter Standard', 0.00, '2025-02-24', 4),
(90, 'administrador', 'Fallout Shelter Standard', 0.00, '2025-02-24', 5),
(91, 'administrador', 'Fallout Shelter Standard', 0.00, '2025-02-24', 5),
(92, 'administrador', 'Piper Pop', 19.99, '2025-02-24', 5);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `figuras`
--
ALTER TABLE `figuras`
  ADD PRIMARY KEY (`id_figura`);

--
-- Índices para tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id_jogo`);

--
-- Índices para tabela `outros`
--
ALTER TABLE `outros`
  ADD PRIMARY KEY (`id_outros`);

--
-- Índices para tabela `paginas`
--
ALTER TABLE `paginas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id_user`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `utelizador_fk` (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `figuras`
--
ALTER TABLE `figuras`
  MODIFY `id_figura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id_jogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `outros`
--
ALTER TABLE `outros`
  MODIFY `id_outros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `paginas`
--
ALTER TABLE `paginas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `utelizador_fk` FOREIGN KEY (`id_user`) REFERENCES `utilizadores` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
