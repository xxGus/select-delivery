-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Nov-2017 às 21:56
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estacionamento`
--
CREATE DATABASE IF NOT EXISTS `estacionamento` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `estacionamento`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Alterar` (IN `pid` INT, IN `pplaca` VARCHAR(8), IN `pmodelo` VARCHAR(45), IN `pproprietario` VARCHAR(45), IN `pdataentrada` DATETIME, IN `pdatasaida` DATETIME, IN `pvalor` DOUBLE)  BEGIN
	update estacionamento.movimenton 
    set placa = pplaca, modelo = pmodelo, proprietario = pproprietario, dataentrada = pdataentrada, datasaida = pdatasaida, valor = pvalor
    where id = pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Excluir` (IN `pid` INT)  BEGIN
	delete from estacionamento.movimento where id = pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Inserir` (IN `pplaca` VARCHAR(8), IN `pmodelo` VARCHAR(45), IN `pproprietario` VARCHAR(45), IN `pdataentrada` DATETIME, IN `pdatasaida` DATETIME, IN `pvalor` DOUBLE)  BEGIN
	insert into movimento (placa, modelo, proprietario, dataentrada, datasaida, valor) values
    (pplaca, pmodelo, pproprietario, pdataentrada, pdatasaida, pvalor);
    select * from estacionamento.movimento where id = last_insert_id();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelecionarMovimento` (IN `pfiltro` VARCHAR(30))  BEGIN
	if (pfiltro = "") then
		select * from estacionamento.movimento;
    else
		select * from estacionamento.movimento where 
		id like concat('%', pfiltro, '%') or
		placa like concat('%', pfiltro, '%') or
		modelo like concat('%', pfiltro, '%') or
		propriedade like concat('%', pfiltro, '%') or
		dataentrada like concat('%', pfiltro, '%') or
		datasaida like concat('%', pfiltro, '%') or
		valor like concat('%', pfiltro, '%');
    end if;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimento`
--

CREATE TABLE `movimento` (
  `idmovimento` int(11) NOT NULL,
  `placa` varchar(8) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `proprietario` varchar(45) DEFAULT NULL,
  `dataentrada` date DEFAULT NULL,
  `horaentrada` time DEFAULT NULL,
  `datasaida` date DEFAULT NULL,
  `horasaida` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movimento`
--
ALTER TABLE `movimento`
  ADD PRIMARY KEY (`idmovimento`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movimento`
--
ALTER TABLE `movimento`
  MODIFY `idmovimento` int(11) NOT NULL AUTO_INCREMENT;--
-- Database: `relatorios-google`
--
CREATE DATABASE IF NOT EXISTS `relatorios-google` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `relatorios-google`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `campanha`
--

CREATE TABLE `campanha` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `campanha`
--

INSERT INTO `campanha` (`id`, `nome`, `id_cliente`) VALUES
(1, 'campanhaTeste', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `canal`
--

CREATE TABLE `canal` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `medium` varchar(255) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `canal`
--

INSERT INTO `canal` (`id`, `nome`, `source`, `medium`, `id_cliente`) VALUES
(1, 'CanalTeste', 'SourceTeste', 'MediumTeste', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `id_view` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `url`, `id_view`) VALUES
(1, 'master', '', ''),
(2, 'boldercom', '', ''),
(3, 'boldermark', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `foto`, `id_cliente`, `nivel`) VALUES
(2, 'Administrador', 'admin@master', '21232f297a57a5a743894a0e4a801fc3', '6f73375bc1e492b1a336985544e5d015.jpg', 1, 0),
(5, 'Administrador', 'admin@com', '21232f297a57a5a743894a0e4a801fc3', '6f73375bc1e492b1a336985544e5d015.jpg', 2, 0),
(6, 'Administrador', 'admin@mark', '21232f297a57a5a743894a0e4a801fc3', '6f73375bc1e492b1a336985544e5d015.jpg', 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campanha`
--
ALTER TABLE `campanha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `canal`
--
ALTER TABLE `canal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campanha`
--
ALTER TABLE `campanha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `canal`
--
ALTER TABLE `canal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;--
-- Database: `selectdelivery`
--
CREATE DATABASE IF NOT EXISTS `selectdelivery` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `selectdelivery`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `endereco` varchar(35) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `complemento` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pizza`
--

CREATE TABLE `pizza` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `valor` varchar(10) DEFAULT NULL,
  `sabor` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pizza`
--

INSERT INTO `pizza` (`id`, `nome`, `valor`, `sabor`) VALUES
(1, 'marguerita', '20', 'queijo, tomate e molho de tomate'),
(2, 'bragantina', '13', 'atum e bacon'),
(5, 'lombo 3', '25', 'lombo, tomate');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `valor` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `valor`) VALUES
(1, 'coca-cola', '3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `foto`, `id_cliente`, `nivel`) VALUES
(2, 'Administrador', 'admin@master', '21232f297a57a5a743894a0e4a801fc3', '6f73375bc1e492b1a336985544e5d015.jpg', 1, 0),
(5, 'Administrador', 'admin@com', '21232f297a57a5a743894a0e4a801fc3', '6f73375bc1e492b1a336985544e5d015.jpg', 2, 0),
(6, 'Administrador', 'admin@mark', '21232f297a57a5a743894a0e4a801fc3', '6f73375bc1e492b1a336985544e5d015.jpg', 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
