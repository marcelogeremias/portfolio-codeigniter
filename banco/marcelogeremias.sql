-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: 179.188.16.21
-- Generation Time: Jun 29, 2016 at 10:08 PM
-- Server version: 5.6.30-76.3-log
-- PHP Version: 5.6.22-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marcelogeremias`
--

-- --------------------------------------------------------

--
-- Table structure for table `lp_contatos`
--

CREATE TABLE `lp_contatos` (
  `cont_id` int(10) NOT NULL,
  `cont_nm` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `cont_em` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `cont_as` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `cont_ms` text COLLATE latin1_general_ci NOT NULL,
  `cont_inse_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `lp_contatos`
--

INSERT INTO `lp_contatos` (`cont_id`, `cont_nm`, `cont_em`, `cont_as`, `cont_ms`, `cont_inse_dt`) VALUES
(1, 'Nome', 'teste@teste.com', 'Assunto', 'Mensagem', '2016-06-26 19:09:20'),
(2, 'Marcelo', 'mhenrique1994@gmail.com', 'Assunto', 'Teste', '2016-06-26 20:15:32'),
(3, 'Reginaldo', 'reginaldo@prado.com.br', 'Teste', 'Mensagem', '2016-06-27 21:28:21'),
(4, 'Marcelo', 'mhenrique1994@gmail.com', 'Assunto', 'Mensagem', '2016-06-29 00:05:06'),
(5, 'Caetano', 'caetano@veloso.com', 'Teste', 'Mensagem.', '2016-06-29 00:08:44'),
(6, 'Marcelo', 'mhenrique1994@gmail.com', 'Assunto teste', 'Mensagem de teste', '2016-06-29 21:48:41'),
(7, 'Marcelo Henrique', 'marcelo@teste.com', 'Teste', 'Teste', '2016-06-29 21:52:19'),
(8, 'Marcelo Henrique', 'mhenrique1994@gmail.com', 'Teste de assunto', 'Mensagem de teste', '2016-06-29 21:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `lp_formacoes`
--

CREATE TABLE `lp_formacoes` (
  `form_id` int(5) NOT NULL,
  `form_usua_id` int(1) NOT NULL,
  `form_nm` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `form_in` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `form_tp` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `form_ini_dt` date NOT NULL,
  `form_ter_dt` date NOT NULL,
  `form_inse_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `lp_formacoes`
--

INSERT INTO `lp_formacoes` (`form_id`, `form_usua_id`, `form_nm`, `form_in`, `form_tp`, `form_ini_dt`, `form_ter_dt`, `form_inse_dt`) VALUES
(1, 1, 'Análise e Desenvolvimento de Sistemas', 'Instituto Federal de Educação, Ciência e Tecnologia de São Paulo - Campus Guarulhos', 'Ensino Superior', '2014-08-01', '2017-07-15', '2016-06-26 16:07:22'),
(2, 1, 'Técnico em Informática', 'ETEC Professor Horácio Augusto da Silveira', 'Ensino Técnico', '2012-02-01', '2013-07-15', '2016-06-28 00:35:22'),
(3, 1, 'Técnico em Eletrônica', 'ETEC Professor Horácio Augusto da Silveira', 'Ensino Técnico', '2010-02-01', '2011-12-15', '2016-06-28 00:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `lp_trabalhos`
--

CREATE TABLE `lp_trabalhos` (
  `trab_id` int(8) NOT NULL,
  `trab_usua_id` int(1) NOT NULL,
  `trab_nm` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `trab_ds` text COLLATE latin1_general_ci NOT NULL,
  `trab_inse_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `lp_trabalhos`
--

INSERT INTO `lp_trabalhos` (`trab_id`, `trab_usua_id`, `trab_nm`, `trab_ds`, `trab_inse_dt`) VALUES
(1, 1, 'Joico', 'Site desenvolvido entre Outubro de 2013 e Maio de 2014. Visite http://www.joico.com.br', '2016-06-26 16:09:19'),
(2, 1, 'Vigor', 'Desenvolvimento de sites, landing pages e sistemas de publicador de produtos e receitas', '0000-00-00 00:00:00'),
(3, 1, 'Embracon', 'Desenvolvimento do novo site', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lp_usuario`
--

CREATE TABLE `lp_usuario` (
  `usua_id` int(11) NOT NULL,
  `usua_nm` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `usua_ds` text COLLATE latin1_general_ci NOT NULL,
  `usua_em` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `usua_sn` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `usua_inse_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `lp_usuario`
--

INSERT INTO `lp_usuario` (`usua_id`, `usua_nm`, `usua_ds`, `usua_em`, `usua_sn`, `usua_inse_dt`) VALUES
(1, 'Marcelo Geremias', '<p>Olá, eu sou o Marcelo, tenho 22 anos e trabalho com desenvolvimento Front e Back-end desde 2013. Apesar de pouco tempo de experiência, aprendi e desenvolvi conhecimentos de tecnologias utilizadas para \r\ndesenvolver aplicações para web.</p>\r\n\r\n<p>As tecnologias mais utilizadas por mim para o desenvolvimento são HTML, CSS, JavaScript, jQuery, PHP, MySQL e WordPress, sendo esta última a que possuo mais habilidades e que tenho utilizado para desenvolver meus últimos serviços.</p>\r\n\r\n<p>Moro em São Paulo, aqui encontro diversas oportunidades de crescimento. Atualmente trabalho na Agência Mestre e estou cursando Análise e Desenvolvimento de Sistemas no Instituto Federal de Educação, Ciência e Tecnologia de São Paulo - Campus Guarulhos.</p>', 'mhenrique1994@gmail.com', '995bf053c4694e1e353cfd42b94e4447', '2016-06-26 16:03:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lp_contatos`
--
ALTER TABLE `lp_contatos`
  ADD PRIMARY KEY (`cont_id`);

--
-- Indexes for table `lp_formacoes`
--
ALTER TABLE `lp_formacoes`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `form_usua_id` (`form_usua_id`);

--
-- Indexes for table `lp_trabalhos`
--
ALTER TABLE `lp_trabalhos`
  ADD PRIMARY KEY (`trab_id`),
  ADD KEY `trab_usua_id` (`trab_usua_id`);

--
-- Indexes for table `lp_usuario`
--
ALTER TABLE `lp_usuario`
  ADD PRIMARY KEY (`usua_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lp_contatos`
--
ALTER TABLE `lp_contatos`
  MODIFY `cont_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `lp_formacoes`
--
ALTER TABLE `lp_formacoes`
  MODIFY `form_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lp_trabalhos`
--
ALTER TABLE `lp_trabalhos`
  MODIFY `trab_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `lp_formacoes`
--
ALTER TABLE `lp_formacoes`
  ADD CONSTRAINT `lp_formacoes_fk_id_usuario` FOREIGN KEY (`form_usua_id`) REFERENCES `lp_usuario` (`usua_id`);

--
-- Constraints for table `lp_trabalhos`
--
ALTER TABLE `lp_trabalhos`
  ADD CONSTRAINT `lp_trabalhos_ibfk_1` FOREIGN KEY (`trab_usua_id`) REFERENCES `lp_usuario` (`usua_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
