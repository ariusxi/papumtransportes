-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Out-2017 às 01:34
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_papum`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargas`
--

CREATE TABLE `cargas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `retirada` varchar(255) NOT NULL,
  `entrega` varchar(255) NOT NULL,
  `categoria` int(11) NOT NULL,
  `subcategoria` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargas`
--

INSERT INTO `cargas` (`id`, `id_user`, `titulo`, `retirada`, `entrega`, `categoria`, `subcategoria`, `created_at`) VALUES
(1, 1, 'teste', 'SÃ£o Paulo', 'Osasco', 1, 1, '2017-10-03 14:49:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `imagem`, `views`) VALUES
(1, 'Mudancas', 'carga2.jpg', 1),
(2, 'Artigos Domesticos', 'moveis.jpg', 0),
(3, 'Cargas', 'box.jpg', 0),
(4, 'Veiculos', 'carros.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mensagem` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `nome`, `email`, `mensagem`) VALUES
(1, 'teste', 'teste@teste.com', 'teste'),
(2, 'teste', 'teste@teste.com', 'teste'),
(3, 'teste', 'teste@teste.com', 'teste'),
(4, 'Alef Felix de Farias', 'alef.farias@etec.sp.gov.br', 'Mensagem de teste no contato');

-- --------------------------------------------------------

--
-- Estrutura da tabela `forgotcodes`
--

CREATE TABLE `forgotcodes` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `forgotcodes`
--

INSERT INTO `forgotcodes` (`id`, `id_user`, `code`, `status`) VALUES
(1, 1, 'DV88-UBRM-REIK-1VU1', 0),
(2, 1, 'Y452-RU2L-PWP0-D9UK', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `items_cargas`
--

CREATE TABLE `items_cargas` (
  `id` int(11) NOT NULL,
  `id_cargas` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `comp` varchar(10) NOT NULL,
  `largura` varchar(10) NOT NULL,
  `altura` varchar(10) NOT NULL,
  `medida` varchar(10) NOT NULL,
  `peso` varchar(10) NOT NULL,
  `quantidade` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `items_cargas`
--

INSERT INTO `items_cargas` (`id`, `id_cargas`, `nome`, `comp`, `largura`, `altura`, `medida`, `peso`, `quantidade`) VALUES
(1, 1, 'teste', '10', '10', '10', 'M', '10', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `subcategoria` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `id_categoria`, `subcategoria`, `imagem`, `views`) VALUES
(1, 1, 'Apartamento de 3 quartos', 'box.jpg', 1),
(2, 1, 'Casa de 3 quartos', 'box.jpg', 0),
(3, 1, 'Casa de 4 quartos', 'box.jpg', 0),
(4, 1, 'Apartamento de 2 quartos', 'box.jpg', 0),
(5, 2, 'Moveis', 'moveis.jpg', 0),
(6, 2, 'Eletrodomesticos', 'tv.jpg', 0),
(7, 2, 'Antiguidades', 'antiguidades.jpg', 0),
(8, 2, 'Frageis', 'frageis.jpg', 0),
(9, 3, 'Carga Fracionada', 'carga2.jpg', 0),
(10, 3, 'Carga Completa', 'carga1.jpg', 0),
(11, 4, 'Motos', 'motos.jpg', 0),
(12, 4, 'Barcos', 'barcos.jpg', 0),
(13, 4, 'Carros', 'carros.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(10) NOT NULL,
  `celular` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `cpf`, `email`, `telefone`, `celular`, `password`, `level`, `created_at`) VALUES
(1, 'Alef', 'Felix de Farias', '40137300816', 'alef.farias@etec.sp.gov.br', '1135927481', '11977604520', '35924781', 1, '2017-09-12 14:33:51'),
(2, 'teste', 'teste', '99999999999', 'teste@teste.com', '9999999999', '999999999', '123', 2, '2017-09-12 14:47:57'),
(8, 'teste', 'teste', 'teste', 'teste@teste.com', '9999999999', '999999999', '123', 1, '2017-09-12 15:11:56'),
(7, 'teste', 'teste', 'teste', 'teste@teste.com', '9999999999', '999999999', '123', 1, '2017-09-12 15:11:23'),
(6, 'teste', 'teste', 'teste', 'teste@teste.com', '9999999999', '999999999', '123', 1, '2017-09-12 15:11:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargas`
--
ALTER TABLE `cargas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgotcodes`
--
ALTER TABLE `forgotcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_cargas`
--
ALTER TABLE `items_cargas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargas`
--
ALTER TABLE `cargas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `forgotcodes`
--
ALTER TABLE `forgotcodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `items_cargas`
--
ALTER TABLE `items_cargas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
