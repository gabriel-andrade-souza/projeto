-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Nov-2017 às 13:23
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto-2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `Veiculo_Usuario_id` int(10) UNSIGNED NOT NULL,
  `veiculo_id` int(10) UNSIGNED NOT NULL,
  `cliente_Usuario_id` int(10) UNSIGNED NOT NULL,
  `hora` time DEFAULT NULL,
  `data_2` date DEFAULT NULL,
  `criado` datetime NOT NULL,
  `modificado` datetime DEFAULT NULL,
  `situacao` int(10) NOT NULL,
  `usuarios_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `cliente_id`, `Veiculo_Usuario_id`, `veiculo_id`, `cliente_Usuario_id`, `hora`, `data_2`, `criado`, `modificado`, `situacao`, `usuarios_id`) VALUES
(5, 4, 0, 10, 0, '09:00:00', '2017-10-20', '2017-10-20 01:09:33', '2017-10-28 18:42:02', 3, 1),
(6, 16, 0, 2, 0, '08:00:00', '2017-10-21', '2017-10-20 03:23:35', '2017-10-29 13:24:41', 3, 1),
(7, 4, 0, 1, 0, '00:00:00', '2017-10-20', '2017-10-20 22:59:51', '2017-10-28 22:36:24', 1, 1),
(10, 19, 0, 1, 0, '13:00:00', '2017-10-26', '2017-10-28 04:09:27', '2017-10-28 22:37:38', 2, 1),
(11, 18, 0, 1, 0, '11:00:00', '2017-10-19', '2017-10-28 18:37:41', '2017-10-28 18:42:11', 3, 1),
(12, 16, 0, 10, 0, '13:00:00', '2017-10-20', '2017-10-28 22:22:35', '2017-10-28 22:22:35', 1, 1),
(13, 16, 0, 1, 0, '09:00:00', '2017-10-28', '2017-10-28 22:33:25', '2017-10-29 13:24:18', 2, 1),
(15, 23, 0, 11, 0, '10:00:00', '2017-10-19', '2017-10-29 20:42:36', '2017-10-29 20:42:36', 2, 1),
(16, 23, 0, 10, 0, '00:00:00', '2017-10-03', '2017-10-29 22:28:41', '2017-10-29 22:28:41', 1, 1),
(24, 22, 0, 10, 0, '08:00:00', '2017-11-01', '2017-11-01 12:26:11', '2017-11-01 12:26:11', 1, 0),
(25, 22, 0, 11, 0, '08:00:00', '2017-11-01', '0000-00-00 00:00:00', '2017-11-01 16:28:37', 1, 1),
(26, 18, 0, 11, 0, '12:00:00', '2017-11-01', '2017-11-01 12:52:14', '2017-11-01 16:28:01', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartao`
--

CREATE TABLE `cartao` (
  `id` int(10) UNSIGNED NOT NULL,
  `Pagamento_id` int(10) UNSIGNED NOT NULL,
  `numeroCart` int(10) UNSIGNED DEFAULT NULL,
  `bandeiraCart` varchar(25) DEFAULT NULL,
  `dataValid` date DEFAULT NULL,
  `parcelas` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `Usuarios_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `rg` varchar(13) NOT NULL,
  `cpf` varchar(13) NOT NULL,
  `datanasc` date DEFAULT NULL,
  `sexo` varchar(15) DEFAULT NULL,
  `estadocivil` varchar(15) DEFAULT NULL,
  `cep` varchar(10) NOT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `numero` int(10) UNSIGNED NOT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `telefone` varchar(12) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `sex` varchar(4) DEFAULT NULL,
  `uf` varchar(4) DEFAULT NULL,
  `criado` datetime NOT NULL,
  `modificado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `Usuarios_id`, `nome`, `rg`, `cpf`, `datanasc`, `sexo`, `estadocivil`, `cep`, `rua`, `bairro`, `numero`, `complemento`, `telefone`, `email`, `sex`, `uf`, `criado`, `modificado`) VALUES
(4, 1, 'Alessandro', '21', '', '1987-03-20', 'Masculino', 'Solteiro(a)', '21775800', 'Justino de Araujo', 'padre Miguel', 309, 'casa 1, apto 201', '21987509081', 'alessandro.nunes.ti@gmail.com', NULL, 'RJ', '2017-09-26 19:52:29', '2017-11-03 02:08:54'),
(16, 1, 'Jessica ', '222222', '111111111111', '1991-04-20', 'Feminino', 'Solteiro(a)', '21775800', 'Justino de Araujo', 'padre miguel', 309, 'casa 1, apto 201', '21987509081', 'alessandro.nunes.ti@gmail.com', NULL, 'rj', '2017-10-05 16:43:57', '2017-10-28 18:12:32'),
(18, 1, 'Thais', '0111111111111', '111111111111', '2017-10-05', 'Feminino', 'Casado(a)', '21775800', 'Rua Justino de AraÃºjo', 'Padre Miguel', 66666, '111111111', '21987509081', 'alessandro.nunes.ti@gmail.com', NULL, 'RJ', '2017-10-05 19:59:07', '2017-10-28 18:12:39'),
(19, 1, 'arnaldo', '111111111', '111111111111', '1987-10-19', 'Masculino', 'Solteiro(a)', '21775800', 'Rua Justino de AraÃºjo', 'Padre Miguel', 2, '222', '21987509081', 'alessandro.nunes.ti@gmail.com', NULL, 'RJ', '2017-10-19 20:59:40', '2017-10-28 18:13:11'),
(22, 2, 'Reinaldo', '', '', '0000-00-00', '', '', '', '', '', 0, '', '', '', NULL, '', '2017-10-21 19:09:02', '2017-10-21 19:09:02'),
(23, 1, 'Alessandro Nunes dos Santos', '', '', '0000-00-00', '', '', '21775800', 'Rua Justino de AraÃºjo', 'Padre Miguel', 0, '', '', '', NULL, 'RJ', '2017-10-28 18:05:36', '2017-11-03 02:09:02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id` int(10) UNSIGNED NOT NULL,
  `Veiculo_Usuarios_id` int(10) UNSIGNED NOT NULL,
  `Veiculo_id` int(10) UNSIGNED NOT NULL,
  `produto` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `cnpj` int(10) UNSIGNED DEFAULT NULL,
  `endforn` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemtroca`
--

CREATE TABLE `itemtroca` (
  `id` int(10) UNSIGNED NOT NULL,
  `Troca_id` int(10) UNSIGNED NOT NULL,
  `data_2` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemvenda`
--

CREATE TABLE `itemvenda` (
  `id` int(10) UNSIGNED NOT NULL,
  `Venda_id` int(10) UNSIGNED NOT NULL,
  `produto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `usuarios_id` int(10) UNSIGNED NOT NULL,
  `usuarios` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentoparcelado`
--

CREATE TABLE `pagamentoparcelado` (
  `id` int(10) UNSIGNED NOT NULL,
  `Cartao_id` int(10) UNSIGNED NOT NULL,
  `dataInic` date DEFAULT NULL,
  `dataFim` date DEFAULT NULL,
  `valor` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `Usuarios_id` int(10) UNSIGNED NOT NULL,
  `tipoPag` varchar(25) NOT NULL,
  `dataPag` date NOT NULL,
  `valor` double NOT NULL,
  `criado` datetime NOT NULL,
  `modificado` datetime DEFAULT NULL,
  `clientes_id` int(10) UNSIGNED NOT NULL,
  `veiculo_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `troca`
--

CREATE TABLE `troca` (
  `id` int(10) UNSIGNED NOT NULL,
  `Usuarios_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(60) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(60) NOT NULL,
  `ano` int(11) NOT NULL,
  `placa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(60) NOT NULL,
  `rg` varchar(10) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `tipoPerfil` int(11) DEFAULT NULL,
  `criado` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `rg`, `cpf`, `endereco`, `tel`, `tipoPerfil`, `criado`, `modificado`, `login`, `senha`) VALUES
(1, 'Alessandro nunes dos santos', '0', '', 'Rua justino de araujo, 309 casa 1, apto 201', '21987509081', 1, '2017-09-23 00:00:00', '2017-10-26 18:57:11', 'admin', '1'),
(2, 'Arnaldo Rhay', '0', '0', '', '0', 3, '2017-09-26 20:29:00', '2017-10-05 16:38:19', 'Arnaldo', '1'),
(6, 'Gabriel Andrade', '0', '0', '', '0', 2, '2017-10-05 16:38:45', '2017-10-05 16:39:06', 'ge', '1'),
(7, 'Marcus Felipe', '0', '', '', '0', 3, '2017-10-07 18:27:28', '2017-11-03 02:09:20', 've', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veicul`
--

CREATE TABLE `veicul` (
  `id` int(10) UNSIGNED NOT NULL,
  `Usuarios_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(60) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `cor` varchar(45) NOT NULL,
  `ano` int(11) NOT NULL,
  `km` int(10) UNSIGNED NOT NULL,
  `combustivel` int(10) UNSIGNED NOT NULL,
  `portas` int(10) UNSIGNED NOT NULL,
  `opcionais` varchar(45) NOT NULL,
  `preco` double NOT NULL,
  `placa` varchar(6) NOT NULL,
  `data_2` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id` int(10) UNSIGNED NOT NULL,
  `Usuarios_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(60) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `cor` varchar(45) NOT NULL,
  `ano` int(11) NOT NULL,
  `km` int(10) UNSIGNED NOT NULL,
  `combustivel` int(10) UNSIGNED NOT NULL,
  `portas` int(10) UNSIGNED NOT NULL,
  `opcionais` varchar(250) NOT NULL,
  `preco` double NOT NULL,
  `placa` varchar(10) NOT NULL,
  `criado` datetime NOT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `Usuarios_id`, `nome`, `modelo`, `marca`, `cor`, `ano`, `km`, `combustivel`, `portas`, `opcionais`, `preco`, `placa`, `criado`, `modificado`) VALUES
(1, 1, 'FIAT Novo Uno 2018', 'Novo Uno', 'FIAT', 'Vermelho', 2018, 0, 2, 2, 'Freios ABS, Ar Condicionado', 39, 'RPM198', '2017-10-05 00:23:56', '2017-10-29 20:28:57'),
(2, 1, 'Hyunday HB20 2.0', 'HB20', 'Hyunday ', 'Prata', 2017, 0, 1, 2, 'Ar condicionado', 41.2, 'KLB200', '2017-10-05 12:40:30', '2017-10-29 20:27:02'),
(10, 1, 'BMW M2 COUPÃ‰ M DCT 2018', 'M2 COUPÃ‰', 'BMW', 'Prata', 2018, 0, 2, 4, 'Ar condicionado', 339.43, 'MGM197', '2017-10-05 18:08:43', '2017-10-28 18:15:09'),
(11, 1, 'FERRARI F360', 'F360 3.6 F1 SPIDER V8', 'FERRARI', 'Amarelo', 2004, 16000, 2, 2, 'Freios ABS, Ar Condicionado', 539.43, 'KGB1980', '2017-10-15 18:34:27', '2017-11-07 01:56:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(10) UNSIGNED NOT NULL,
  `Usuarios_id` int(10) UNSIGNED NOT NULL,
  `valor` double DEFAULT NULL,
  `datavend` date DEFAULT NULL,
  `criado` datetime NOT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `Usuarios_id`, `valor`, `datavend`, `criado`, `modificado`) VALUES
(1, 1, 39, '2017-11-11', '0000-00-00 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cartao`
--
ALTER TABLE `cartao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Cartao_FKIndex1` (`Pagamento_id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`,`Usuarios_id`),
  ADD KEY `Clientes_FKIndex1` (`Usuarios_id`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fornecedor_FKIndex1` (`Veiculo_id`,`Veiculo_Usuarios_id`);

--
-- Indexes for table `itemtroca`
--
ALTER TABLE `itemtroca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemTroca_FKIndex1` (`Troca_id`);

--
-- Indexes for table `itemvenda`
--
ALTER TABLE `itemvenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemVenda_FKIndex1` (`Venda_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD KEY `Login_FKIndex1` (`usuarios_id`);

--
-- Indexes for table `pagamentoparcelado`
--
ALTER TABLE `pagamentoparcelado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PagamentoParcelado_FKIndex1` (`Cartao_id`);

--
-- Indexes for table `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Pagamento_FKIndex1` (`Usuarios_id`);

--
-- Indexes for table `troca`
--
ALTER TABLE `troca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Troca_FKIndex1` (`Usuarios_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indexes for table `veicul`
--
ALTER TABLE `veicul`
  ADD PRIMARY KEY (`id`,`Usuarios_id`),
  ADD KEY `Veiculo_FKIndex1` (`Usuarios_id`);

--
-- Indexes for table `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`,`Usuarios_id`),
  ADD KEY `Veiculo_FKIndex1` (`Usuarios_id`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Venda_FKIndex1` (`Usuarios_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `cartao`
--
ALTER TABLE `cartao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `itemtroca`
--
ALTER TABLE `itemtroca`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `itemvenda`
--
ALTER TABLE `itemvenda`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pagamentoparcelado`
--
ALTER TABLE `pagamentoparcelado`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `troca`
--
ALTER TABLE `troca`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `veicul`
--
ALTER TABLE `veicul`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cartao`
--
ALTER TABLE `cartao`
  ADD CONSTRAINT `cartao_ibfk_1` FOREIGN KEY (`Pagamento_id`) REFERENCES `pagamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`Usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD CONSTRAINT `fornecedor_ibfk_1` FOREIGN KEY (`Veiculo_id`,`Veiculo_Usuarios_id`) REFERENCES `veicul` (`id`, `Usuarios_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itemtroca`
--
ALTER TABLE `itemtroca`
  ADD CONSTRAINT `itemtroca_ibfk_1` FOREIGN KEY (`Troca_id`) REFERENCES `troca` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itemvenda`
--
ALTER TABLE `itemvenda`
  ADD CONSTRAINT `itemvenda_ibfk_1` FOREIGN KEY (`Venda_id`) REFERENCES `vendas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`Usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pagamentoparcelado`
--
ALTER TABLE `pagamentoparcelado`
  ADD CONSTRAINT `pagamentoparcelado_ibfk_1` FOREIGN KEY (`Cartao_id`) REFERENCES `cartao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `pagamentos_ibfk_1` FOREIGN KEY (`Usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `troca`
--
ALTER TABLE `troca`
  ADD CONSTRAINT `troca_ibfk_1` FOREIGN KEY (`Usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `veicul`
--
ALTER TABLE `veicul`
  ADD CONSTRAINT `veicul_ibfk_1` FOREIGN KEY (`Usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD CONSTRAINT `veiculos_ibfk_1` FOREIGN KEY (`Usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`Usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
