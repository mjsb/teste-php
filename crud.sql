-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 15/06/2018 às 21:14
-- Versão do servidor: 5.6.39
-- Versão do PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `qtd` int(5) NOT NULL,
  `preco` float NOT NULL,
  `criado` datetime NOT NULL,
  `alterado` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `qtd`, `preco`, `criado`, `alterado`) VALUES
(1, 'AAAA', 'Produto AAAA', 1, 2.99, '2018-06-14 14:06:17', '2018-06-15 07:06:26'),
(2, 'BBBB', 'Produto BBBB', 5, 3.76, '2018-06-14 14:07:00', '2018-06-15 08:06:22'),
(3, 'CCCC', 'Produto CCCC', 121, 15.55, '2018-06-15 01:06:25', '0000-00-00 00:00:00'),
(4, 'DDDD', 'Produto DDDD', 3, 3.99, '2018-06-15 01:06:13', '2018-06-15 07:06:11'),
(6, 'FFFF', 'sdffgffd', 1, 1, '2018-06-15 07:06:48', '0000-00-00 00:00:00'),
(7, 'G GGG', 'Id erat in volutpat proin elementum eros himenaeos placerat, habitant primis porttitor pellentesque velit condimentum dui nulla, maecenas ultricies ante fringilla dictumst integer sociosqu. dapibus iaculis placerat gravida praesent luctus etiam, dui est auctor fringilla volutpat sagittis, at mauris sem orci convallis. sociosqu lobortis per habitant donec suscipit maecenas lobortis duis, habitasse quisque volutpat nullam molestie auctor dolor, malesuada suscipit odio in laoreet tempor porta. habitant aliquam habitant ligula mattis cursus sodales arcu pharetra donec faucibus aenean quisque, viverra himenaeos libero elementum libero litora pretium elit gravida morbi erat, venenatis eleifend adipiscing blandit aptent convallis rutrum neque euismod dictum sit. ', 3, 3.76, '2018-06-15 08:06:58', '2018-06-15 09:06:19'),
(8, 'HHHH', 'Nulla euismod pharetra orci placerat donec eget nullam turpis vivamus lacus, ac enim scelerisque quam semper ipsum rhoncus tristique quis, pretium lacinia hendrerit platea pretium nibh himenaeos accumsan cras. vehicula rhoncus sagittis blandit netus mattis netus vel, diam conubia vitae at a eros, ante ornare fusce elit nec lobortis. fames condimentum etiam nisi curabitur etiam lectus cursus libero urna non, bibendum mi elit ut nunc sagittis nisi leo quisque luctus in, fames consequat vestibulum ultrices sed nulla convallis ligula at. velit conubia mattis congue dolor laoreet per sodales, duis vel placerat quam suspendisse malesuada, nunc class pulvinar inceptos commodo hendrerit. ', 6, 3.71, '2018-06-15 08:06:18', '0000-00-00 00:00:00'),
(9, 'J J J J', 'Ultricies turpis curabitur tristique gravida eu nam luctus interdum, neque curae volutpat urna sodales arcu in, adipiscing dui scelerisque enim fermentum convallis conubia. convallis justo dapibus elementum faucibus quisque vivamus ante ultrices, nostra suspendisse ultrices ad elementum vel rhoncus. est cursus tortor praesent fusce tempor euismod, malesuada integer tempor quisque euismod, platea convallis blandit duis est. aliquam urna fames amet sodales euismod imperdiet taciti lacus hendrerit, imperdiet egestas ornare nunc morbi ac donec et tempor duis, velit conubia nullam ac proin sapien volutpat habitasse. mollis class vitae himenaeos tellus et, egestas pharetra phasellus volutpat dictum volutpat, tellus rhoncus aptent primis. ', 8, 1.99, '2018-06-15 09:06:19', '2018-06-15 09:06:13'),
(10, 'K K K K', 'Primis nibh ut fusce duis eu fringilla luctus, duis habitasse non ipsum tincidunt quisque enim dolor, imperdiet aliquam aenean commodo ut turpis. ut pharetra felis erat purus ullamcorper quam sollicitudin potenti felis elit hendrerit nec tincidunt enim, netus massa aenean platea ligula torquent eu sed tristique duis senectus cubilia condimentum. fringilla consectetur curae arcu nullam gravida laoreet purus non, cursus amet etiam nisi bibendum augue mattis consequat, lacus eu magna sociosqu cubilia ullamcorper nunc. sollicitudin enim mattis quisque faucibus hendrerit laoreet, placerat lobortis primis ligula diam suscipit, gravida lacinia placerat tempus pretium. ', 7, 3.99, '2018-06-15 09:06:14', '2018-06-15 09:06:36');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
