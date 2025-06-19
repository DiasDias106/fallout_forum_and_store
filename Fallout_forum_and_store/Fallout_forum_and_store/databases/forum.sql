-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Fev-2025 às 13:20
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
-- Banco de dados: `forum`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adivinhanumero`
--

CREATE TABLE `adivinhanumero` (
  `id_jogo` int(11) NOT NULL,
  `nome_jogador` varchar(255) NOT NULL,
  `numero_escolhido` int(11) NOT NULL,
  `numero_correto` int(11) NOT NULL,
  `tentativas` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `adivinhanumero`
--

INSERT INTO `adivinhanumero` (`id_jogo`, `nome_jogador`, `numero_escolhido`, `numero_correto`, `tentativas`, `data`) VALUES
(1, 'Francisco', 11, 10, 5, '2025-01-10 21:37:38'),
(2, 'teste', 43, 40, 5, '2025-01-13 21:38:56'),
(3, 'Denis', 21, 25, 5, '2025-02-20 15:44:50'),
(4, 'teste', 9, 10, 5, '2025-02-21 12:42:33'),
(5, 'teste', 18, 15, 5, '2025-02-21 12:43:18'),
(6, 'teste', 32, 33, 5, '2025-02-23 16:59:41'),
(7, 'jose neves', 31, 47, 5, '2025-02-24 11:06:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `forca`
--

CREATE TABLE `forca` (
  `id_jogo` int(11) NOT NULL,
  `nome_jogador` varchar(255) NOT NULL,
  `letra_escolhida` char(1) NOT NULL,
  `palavra_certa` varchar(20) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `venceu` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `forca`
--

INSERT INTO `forca` (`id_jogo`, `nome_jogador`, `letra_escolhida`, `palavra_certa`, `data`, `venceu`) VALUES
(1, 'teste1', 'U', 'FALLOUT', '2025-01-11 18:25:46', '1'),
(2, 'antoniodias', 'N', 'VAULTEC', '2025-02-20 13:09:07', ''),
(3, 'administrador', 'T', 'VAULT', '2025-02-20 15:47:59', '1'),
(4, 'teste1', 'T', 'VAULT', '2025-02-21 12:45:39', '1'),
(5, 'teste1', 'T', 'FALLOUT', '2025-02-21 12:46:40', '1'),
(6, 'teste1', 'D', 'RADIATION', '2025-02-22 15:00:00', '1'),
(7, 'teste1', 'T', 'VAULTEC', '2025-02-22 20:17:45', '1'),
(8, 'teste1', 'E', 'COMMONWEALTH', '2025-02-23 17:03:46', '1'),
(9, 'teste1', 'M', 'PIPBOY', '2025-02-23 17:04:53', ''),
(10, 'administrador', 'D', 'RADIATION', '2025-02-24 11:08:05', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogodados`
--

CREATE TABLE `jogodados` (
  `id_jogo` int(11) NOT NULL,
  `nome_jogador` varchar(255) NOT NULL,
  `quantidade` char(1) NOT NULL,
  `aposta` varchar(20) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `jogodados`
--

INSERT INTO `jogodados` (`id_jogo`, `nome_jogador`, `quantidade`, `aposta`, `data`) VALUES
(1, 'Francisco', '1', '100', '2025-01-11 19:55:30'),
(2, 'teste', '1', '100', '2025-02-21 12:44:05'),
(3, 'teste', '1', '100', '2025-02-21 12:44:09'),
(4, 'teste', '1', '100', '2025-02-21 12:44:12'),
(5, 'teste', '1', '100', '2025-02-21 12:44:20'),
(6, 'teste', '1', '100', '2025-02-21 12:44:22'),
(7, 'teste', '1', '100', '2025-02-21 12:44:23'),
(8, 'teste', '6', '100', '2025-02-21 12:44:24'),
(9, 'teste', '1', '100', '2025-02-21 12:44:24'),
(10, 'teste', '1', '100', '2025-02-21 12:44:25'),
(11, 'teste', '1', '100', '2025-02-21 12:44:26'),
(12, 'Francisco', '1', '100', '2025-02-21 12:44:50'),
(13, 'Francisco', '1', '100', '2025-02-21 12:45:03'),
(14, 'teste', '1', '100', '2025-02-23 15:32:06'),
(15, 'henrique', '-', '100', '2025-02-23 15:38:53'),
(16, 'henrique', '-', '100', '2025-02-23 15:39:00'),
(17, 'henrique', '-', '100', '2025-02-23 15:39:28'),
(18, 'henrique', 'N', '100', '2025-02-23 15:39:33'),
(19, 'henrique', 'N', '100', '2025-02-23 15:39:57'),
(20, 'henrique', 'N', '100', '2025-02-23 15:39:58'),
(21, 'henrique', 'N', '100', '2025-02-23 15:39:58'),
(22, 'henrique', 'N', '100', '2025-02-23 15:39:58'),
(23, 'henrique', 'N', '100', '2025-02-23 15:39:59'),
(24, 'henrique', 'N', '100', '2025-02-23 15:39:59'),
(25, 'henrique', 'N', '100', '2025-02-23 15:39:59'),
(26, 'henrique', '-', '100', '2025-02-23 15:46:33'),
(27, 'henrique', '-', '100', '2025-02-23 15:46:35'),
(28, 'henrique', '-', '100', '2025-02-23 15:46:36'),
(29, 'henrique', '1', '100', '2025-02-23 15:46:36'),
(30, 'henrique', '-', '100', '2025-02-23 15:56:59'),
(31, 'henrique', '-', '100', '2025-02-23 15:57:00'),
(32, 'henrique', '-', '100', '2025-02-23 15:57:01'),
(33, 'henrique', '-', '100', '2025-02-23 15:57:01'),
(34, 'henrique', '-', '100', '2025-02-23 15:57:03'),
(35, 'henrique', '-', '100', '2025-02-23 15:57:03'),
(36, 'henrique', '-', '100', '2025-02-23 15:57:04'),
(37, 'henrique', '-', '100', '2025-02-23 15:57:04'),
(38, 'henrique', '-', '100', '2025-02-23 15:57:04'),
(39, 'henrique', '-', '100', '2025-02-23 15:57:05'),
(40, 'henrique', '-', '100', '2025-02-23 15:57:05'),
(41, 'henrique', '4', '100', '2025-02-23 15:57:05'),
(42, 'henrique', '8', '100', '2025-02-23 15:57:06'),
(43, 'henrique', '-', '100', '2025-02-23 16:01:49'),
(44, 'henrique', '-', '100', '2025-02-23 16:01:51'),
(45, 'Francisco', '-', '100', '2025-02-23 16:01:57'),
(46, 'Francisco', 'u', '[object HTMLInputEle', '2025-02-23 16:20:29'),
(47, 'Francisco', 'u', '100', '2025-02-23 16:21:10'),
(48, 'Francisco', '1', '100', '2025-02-23 16:21:35'),
(49, 'Francisco', '4', '100', '2025-02-23 16:21:36'),
(50, 'Francisco', '1', '100', '2025-02-23 16:21:38'),
(51, 'Francisco', '1', '100', '2025-02-23 16:21:38'),
(52, 'Francisco', '1', '100', '2025-02-23 16:21:38'),
(53, 'Francisco', '2', '100', '2025-02-23 16:21:39'),
(54, 'Francisco', '1', '100', '2025-02-23 16:21:39'),
(55, 'Francisco', '1', '100', '2025-02-23 16:21:39'),
(56, 'Francisco', '1', '100', '2025-02-23 16:21:40'),
(57, 'Francisco', '1', '100', '2025-02-23 16:21:40'),
(58, 'Francisco', '1', '100', '2025-02-23 16:21:40'),
(59, 'Francisco', '2', '100', '2025-02-23 16:21:40'),
(60, 'Francisco', '1', '100', '2025-02-23 16:21:40'),
(61, 'Francisco', '1', '100', '2025-02-23 16:21:41'),
(62, 'Francisco', '1', '100', '2025-02-23 16:21:41'),
(63, 'Francisco', '1', '100', '2025-02-23 16:21:41'),
(64, 'Francisco', '1', '100', '2025-02-23 16:21:41'),
(65, 'Francisco', '1', '100', '2025-02-23 16:21:42'),
(66, 'Francisco', '5', '500', '2025-02-23 16:53:38'),
(67, 'Francisco', '5', '500', '2025-02-23 16:53:41'),
(68, 'Francisco', '5', '500', '2025-02-23 16:53:42'),
(69, 'Francisco', '5', '500', '2025-02-23 16:53:42'),
(70, 'Francisco', '5', '500', '2025-02-23 16:53:43'),
(71, 'Francisco', '5', '500', '2025-02-23 16:53:43'),
(72, 'Francisco', '5', '500', '2025-02-23 16:53:43'),
(73, 'Francisco', '5', '500', '2025-02-23 16:53:44'),
(74, 'Francisco', '5', '500', '2025-02-23 16:53:44'),
(75, 'Francisco', '5', '500', '2025-02-23 16:53:45'),
(76, 'Francisco', '5', '500', '2025-02-23 16:53:45'),
(77, 'Francisco', '5', '500', '2025-02-23 16:53:46'),
(78, 'Francisco', '5', '500', '2025-02-23 16:53:47');

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
(1, 'adivinha numero', 'jogo que consiste em adivinhar um numero aleatorio', 'adivinhanum.html'),
(2, 'calculadora', 'aplicação que permite realizar diversos tipos de calculos', 'calculadora.html'),
(3, 'contactos', 'pagina de contactos', 'contactos.html'),
(4, 'contador final', 'conta os dias ate ocorrer um ataque nuclear', 'contador_final.html'),
(5, 'conversor de moedas', 'converte valores de uma moeda para o valor de outras', 'conversormoedas.html'),
(6, 'descarregaveis', 'conteudo descarregavel ', 'Descarregaveis.html'),
(7, 'fallout 1', 'informações sobre o jogo fallout 1', 'fallout_1.html'),
(8, 'fallout 2', 'informações sobre o jogo fallout 2', 'fallout_2.html'),
(9, 'fallout 3', 'informações sobre o jogo fallout 3', 'fallout_3.html'),
(10, 'fallout 4', 'informações sobre o jogo fallout 4', 'fallout_4.html'),
(11, 'fallout 76', 'informações sobre o jogo fallout 76', 'fallout_76.html'),
(12, 'fallout new vegas', 'informações sobre o jogo fallout new vegas', 'fallout_nv.html'),
(13, 'fallout shelter', 'informações sobre o jogo fallout shelter', 'falloutshelter.html'),
(14, 'fallout tactics', 'informações sobre o jogo fallout tactics', 'fallouttactics.html'),
(15, 'hub aplicações', 'atalho de acesso a todas as aplicações', 'hub_aplicacoes.html'),
(16, 'home', 'pagina principal do site', 'index.html'),
(17, 'jogo dos dados', 'jogo que consiste em apostar nas faces de dois dados', 'jogodosdados.html'),
(18, 'jogo da forca', 'jogo que consiste em adivinhar a palavra antes que o boneco morra', 'jogoforca.html'),
(19, 'localização', 'local e contactos', 'localizacao.html'),
(20, 'login e sign in', 'crie ou aceda a uma conta no nosso site', 'loginesignin.html'),
(21, 'noticias', 'contem varias noticias sobre a saga fallout', 'noticias.html'),
(22, 'pesquisa personagem', 'uma api que conteu varios conteudos da franquia fallout', 'pesquisa_personagem.html'),
(23, 'queixas', 'aqui podera dar nos concelhos atraves de email ou realizar queixas', 'queixas.php'),
(24, 'sobre', 'aqui pode encontrar informaçoes sobre a lore e jogos', 'sobre.html'),
(25, 'maquina dos selos', 'aqui pode obter calculos sobre uma quantidade de selos', 'php/maquinadoselos.php'),
(26, 'leaderboard jogo dos dados', 'pode verificar a sua pontuação e a de outros jogoadores no jogo dos dados', 'leaderboard_dados.php'),
(27, 'leaderboard jogo da forca', 'pode verificar a sua pontuação e a de outros jogoadores no jogo da forca', 'leaderboard_forca.php'),
(28, 'leaderboard adivinhe o numero', 'pode verificar a sua pontuação e a de outros jogoadores no jogo adivinhe o numero', 'leaderboard_adnum.php');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` date DEFAULT current_timestamp(),
  `password` varchar(255) DEFAULT NULL,
  `cargo` enum('admin','user') NOT NULL DEFAULT 'user',
  `imagem` varchar(255) DEFAULT 'imagens/nofoto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id_user`, `username`, `email`, `login`, `password`, `cargo`, `imagem`) VALUES
(10, 'franciscoh', 'teupai@gmail.com', '2024-12-19', '$2y$10$9ZmKP4R3NMGlw', 'user', 'imagens/nofoto'),
(11, 'franciscod1', 'teupai@gmail.com', '2024-12-19', '$2y$10$simtvaK6cNYqv', 'user', 'imagens/nofoto'),
(12, 'franciscoh1', 'teupai@gmail.com', '2024-12-19', '$2y$10$lh6HKXmWIr2TFp1Sx0Hb8u5eX4kW8LGsP29ztPjMJuM/sML83v7jy', 'user', 'imagens/nofoto'),
(13, 'luissilva', 'luispedroclementinosilva15@gmail.com', '2024-12-19', '$2y$10$75qdFj95/fBTNYtlAl560ePD4B4Ku2vcKgFb6NuhHBtxwbui4EY06', 'user', 'imagens/nofoto'),
(14, 'goncalofelix', 'goncalocardosofelix4@gmail.com', '2024-12-19', '$2y$10$MaW5DKEB3i2SDVcqOSoyT.xSgZS.fTeAQ7hf9JPNZyGwSO2gpU2.e', 'user', 'imagens/nofoto'),
(15, 'franciscodias', 'teupai@gmail.com', '2024-12-20', '$2y$10$5HDtd.oXYyJCHdL9K5H1T.Ia8j5DwKMh4K7cPvFjJdB3Glmw.4hwO', 'user', 'imagens/nofoto'),
(16, 'rickfer', 'ricfer@gmail.com', '2024-12-23', '$2y$10$jx7MaeK05tMfocJZZpMyse4hhaUemcHuCKybhsyAhmepptjeIFgSO', 'user', 'imagens/nofoto'),
(17, 'teste', 'teupai@gmail.com', '2024-12-28', '$2y$10$WVSPXZ/AbOZC12bPdTxyxOsmFKBtZJCphJSmQe7kwRZ7/pj65OtsW', 'user', 'imagens/nofoto'),
(18, 'administrador', 'azulinhodias6@gmail.com', '2025-01-08', '$2y$10$e3eIZEs3/Q5DwIiJrYMWluU4wXFHeFTsuxuhwPN9KMFVlCIgRSQC2', 'admin', 'imagens/nofoto'),
(21, 'teste1', 'teupai@gmail.com', '2025-01-09', '$2y$10$23z9EW.qsA8JAQzZZ.NmPuPDUUoAZtE1J89q/ixU/jn8CGuSuDxf6', 'user', NULL),
(22, 'antoniodias', 'teste@gmail.com', '2025-02-20', '$2y$10$giO.zMSPFyqpAW7LJAGjIucsz5wBzzqeQBkrr8hhQRdyqtVB.0Nla', 'user', 'imagens/nofoto'),
(23, 'neves', 'teupai@gmail.com', '2025-02-24', '$2y$10$zVPGjxFcCWooXeB4Aeter.UL6BnkzcjhuPL65fUPsOweFqEvyMW9K', 'user', 'imagens/nofoto');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adivinhanumero`
--
ALTER TABLE `adivinhanumero`
  ADD PRIMARY KEY (`id_jogo`);

--
-- Índices para tabela `forca`
--
ALTER TABLE `forca`
  ADD PRIMARY KEY (`id_jogo`);

--
-- Índices para tabela `jogodados`
--
ALTER TABLE `jogodados`
  ADD PRIMARY KEY (`id_jogo`);

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
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adivinhanumero`
--
ALTER TABLE `adivinhanumero`
  MODIFY `id_jogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `forca`
--
ALTER TABLE `forca`
  MODIFY `id_jogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `jogodados`
--
ALTER TABLE `jogodados`
  MODIFY `id_jogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de tabela `paginas`
--
ALTER TABLE `paginas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
