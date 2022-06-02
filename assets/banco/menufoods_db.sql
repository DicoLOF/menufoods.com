-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 01-Maio-2018 às 17:34
-- Versão do servidor: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `menufoods_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_compra`
--

CREATE TABLE `cad_compra` (
  `id_compra` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `rua` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `complemento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cad_compra`
--

INSERT INTO `cad_compra` (`id_compra`, `id_produto`, `id_login`, `rua`, `numero`, `complemento`, `bairro`, `estado`, `cidade`, `pais`) VALUES
(1, 1, 1, 'Rua', 'Numero', 'Complemento', 'Bairro', 'SP', 'Cidade', 'Pais');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id_img` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `foto_topo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mensagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id_img`, `id_login`, `foto_topo`, `mensagem`) VALUES
(6, 1, 'banner.jpg', ' ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `linha_tempo`
--

CREATE TABLE `linha_tempo` (
  `id_tempo` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `foto_tempo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comentario` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apelido` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id_login`, `nome`, `senha`, `apelido`, `email`, `foto`) VALUES
(1, '2D Analises', '070ceb826403ba5e3252151324e2c40e', 'Admin', '2danalises@gmail.com', 'avatar.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cad_compra`
--
ALTER TABLE `cad_compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_login` (`id_login`);

--
-- Indexes for table `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `id_login` (`id_login`);

--
-- Indexes for table `linha_tempo`
--
ALTER TABLE `linha_tempo`
  ADD PRIMARY KEY (`id_tempo`),
  ADD KEY `id_login` (`id_login`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cad_compra`
--
ALTER TABLE `cad_compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `linha_tempo`
--
ALTER TABLE `linha_tempo`
  MODIFY `id_tempo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cad_compra`
--
ALTER TABLE `cad_compra`
  ADD CONSTRAINT `cad_compra_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `imagens_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `linha_tempo`
--
ALTER TABLE `linha_tempo`
  ADD CONSTRAINT `linha_tempo_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
