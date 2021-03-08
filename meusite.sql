-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Mar-2021 às 17:56
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `meusite`
--

-- --------------------------------------------------------

CREATE DATABASE `meusite`;


--
-- Estrutura da tabela `album`
--


CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `url_img` varchar(254) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `curtidas` int(11) NOT NULL DEFAULT 0,
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `album`
--

INSERT INTO `album` (`id`, `url_img`, `nome`, `descricao`, `curtidas`, `ativo`) VALUES
(5, '1295437d51d23ed8e6b016f0218fe0db.jpg', 'Floresta florida', 'Imagem da grande floresta florida', 0, 1),
(6, '5e082cce68e829b1a700e99ec5c8ffe5.jpg', 'Grande Árvore Gigante', 'Imagem da famosa Grande Árvore Gigante, exibindo suas lindas copas verdes há 220 anos. Serve de abrigo à diversos animais que transformar a Grande Árvore em um lar.', 0, 1),
(7, 'adb267d2d681ccc790bb06b7870a7ee8.jpg', 'Morador da Grande Árvore Gigante', 'Registro de um dos moradores da Grande Árvore Gigante, segurando seu principal alimento, uma pequenina noz.', 0, 1),
(9, 'ea8da888055bd40f038298c672cc7621.jpg', 'Panda diz oi', 'Registro do nada tímido panda Pandoso.', 0, 1),
(10, 'd322246b41d23b3cd35ef44defa2e68d.jpg', 'Praia Praiosa', 'Imagem da praia mais famosa no mundo, Praia Praiosa, visitada por turistas de todos os lugares atraídos por sua beleza e agua cristalina.', 0, 1),
(11, '8e656b0c2959ddc555730a0768040ff0.jpg', 'Calor do Deserto', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 1),
(12, '9e42c2d04942177dcb86d8ab12916252.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 1),
(13, '7e929848d3112c946243ae2f607e545d.jpg', 'Novo Álbum sobre o mar ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `facebook` varchar(140) DEFAULT NULL,
  `twitter` varchar(140) DEFAULT NULL,
  `flickr` varchar(140) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `img_perfil` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `nome`, `descricao`, `facebook`, `twitter`, `flickr`, `telefone`, `img_perfil`) VALUES
(1, 'Vitor Afonso Andreotto dos Santos', 'Lorem ipsum dolor sit amet, lorem consectetur elit. Aliquam id mi ipsum sed ligula sollicitudin fermentum dolor. Aliquam suscipit, massa quis posuere consecttur, enim libero tempor enim, ultriies est turpis nec risus. Nam in libero nulla, eu adipiscing nibh. In vitae massa vitae suscipit scelerisque lorem psum amed.', 'vitorandreotto', 'vandreotto', 'vitorandreotto', '16997527787', 'e11f71e96bb005092d8fb5ef47a5f35b.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
