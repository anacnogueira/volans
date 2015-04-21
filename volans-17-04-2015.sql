-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17-Abr-2015 às 00:17
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `volans`
--
CREATE DATABASE IF NOT EXISTS `volans` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `volans`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
`id_admin` int(6) NOT NULL,
  `nome` varchar(10) DEFAULT NULL,
  `senha` varchar(10) DEFAULT NULL,
  `permissao` varchar(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id_admin`, `nome`, `senha`, `permissao`) VALUES
(1, 'anaclaudia', 'volans', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aeroporto`
--

DROP TABLE IF EXISTS `aeroporto`;
CREATE TABLE IF NOT EXISTS `aeroporto` (
  `id_aeroporto` varchar(4) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cidade` varchar(20) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aeroporto`
--

INSERT INTO `aeroporto` (`id_aeroporto`, `nome`, `cidade`, `estado`) VALUES
('BSB', 'Aeroporto Juscelino Kubitschek', 'Bras?lia', 'DF'),
('CPQ', 'Aeroporto Internacional de Viracopos', 'Campinas', 'SP'),
('CGR', 'Aeroporto Internacional de Campo Grande', 'Campo Grande', 'MS'),
('CXJ', 'Aeroporto de Caxias do Sul - Campo do Borges', 'Caxias do Sul', 'RS'),
('AJU', 'Aeroporto Internacional de Aracaju', 'Aracaju', 'SE'),
('CGB', 'Aeroporto Internacional Marechal Rondon', 'Cuiab', 'MT'),
('CWB', 'Aeroporto Internacional Afonso Pena', 'Curitiba', 'PR'),
('FLN', 'Aeroporto Internacional Florian?nopolis', 'Florianopolis', 'SC'),
('FOR', 'Aeroporto Internacional Pinto Martins', 'Fortaleza', 'CE'),
('IGU', 'Aeroporto Intl de Foz do Igua', 'Foz do Igua', 'PR'),
('GYN', 'Aeroporto de Goi?nia', 'Goi?nia', 'GO'),
('JPA', ' Aeroporto Int Presidente Castro Pinto', 'Jo?o Pessoa', 'PB'),
('JOI', 'Aeroporto de Joinville-Lauro Carneiro Loyola', 'Joinville', 'SC'),
('LDB', 'Aeroporto de Londrina', 'Londrina', 'PR'),
('MCP', 'Aeroporto Internacional de Macap', 'Macap', 'AP'),
('MCZ', 'Aeroporto Int de Macei?-Zumbi dos Palmares', 'Macei', 'AL'),
('MAO', 'Aeroporto Internacional Eduardo Gomes-Manaus', 'Manaus', 'AM'),
('MGF', 'Aeroporto Regional de Maring', 'Maring', 'PR'),
('NAT', 'Aeroporto Internacional Augusto Severo', 'Natal', 'RN'),
('NVT', 'Aeroporto Int  Navegantes - Ministro Victor Konder', 'Navegantes', 'SC'),
('PMW', 'Aeroporto de Palmas', 'Palmas', 'TO'),
('PLU', 'Pampulha', 'Belo Horizonte', 'MG'),
('POA', 'Aeroporto Internacional Salgado Filho', 'Porto Alegre', 'RS'),
('BPS', 'Aeroporto Internacional de Porto Seguro', 'Porto Seguro', 'BA'),
('PVH', 'Aeroporto Int Porto Velho/Governador Jorge Teixeir', 'Porto Velho', 'RO'),
('REC', 'Aeroporto Int Recife/Guararapes-Gilberto Freyre', 'Recife', 'PE'),
('RAO', 'Aeroporto Leite Lopes', 'Riber?o Preto', 'SP'),
('RBR', 'Aeroporto Internacional de Rio Branco', 'Rio Branco', 'AC'),
('GIG', ' Aeroporto Internacional do Rio de Janeiro/Gale', 'Rio de janeiro', 'RJ'),
('SDU', 'Aeroporto - Santos Dumont', 'Rio de Janeiro', 'RJ'),
('SSA', 'Aeroporto Int Salvador-Deputado Lu?s Eduardo Magal', 'Salvador', 'BA'),
('SLZ', 'Aeroporto Internacional Marechal Cunha Machado', 'S?o Lu', 'MA'),
('CGH', 'Aeroporto Internacional de S?o Paulo/Congonhas', 'S?o Paulo', 'SP'),
('GRU', 'Aeroporto Internacional de S?o Paulo/Guarulhos', 'S?o Paulo', 'SP'),
('THE', 'Aeroporto de Teresina/Senador Petr?nio Portella', 'Teresina', 'PI'),
('UDI', 'Aeroporto Uberl?ndia-Ten. Cel. Av. C?sar Bombonato', 'Uberl?ndia', 'MG'),
('VIX', 'Aeroporto de Vit?ria', 'Vit?ria', 'ES'),
('PNZ', 'Aeroporto de Petrolina-Senador Nilo Coelho', 'Petrolina', 'PE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
`id_user` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `sobrenome` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `pais` varchar(3) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `permite_pub` varchar(1) DEFAULT NULL,
  `senha` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_user`, `nome`, `sobrenome`, `cidade`, `estado`, `pais`, `telefone`, `email`, `sexo`, `rg`, `cpf`, `permite_pub`, `senha`) VALUES
(2, 'Ana Claudia', 'Nogueira', 'Jacare', 'SP', 'BR', '12 39516900', 'ana@bol.com.br', 'f', '432498904', '33087264830', 'n', '123456'),
(5, 'Juliana', 'Pereira', 'Jacare', 'SP', 'BRA', '1239516900', 'ju@lac.inpe.br', 'f', '123456789', '33087264830', 'n', 'juliana');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
`id_compra` int(11) NOT NULL,
  `id_pass` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `data_compra` date DEFAULT NULL,
  `n_adultos` int(11) DEFAULT NULL,
  `n_criancas1` int(11) DEFAULT NULL,
  `n_criancas2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra_pgto`
--

DROP TABLE IF EXISTS `compra_pgto`;
CREATE TABLE IF NOT EXISTS `compra_pgto` (
  `id_compra` int(11) DEFAULT NULL,
  `forma_pgto` char(20) DEFAULT NULL,
  `n_cartao` int(11) DEFAULT NULL,
  `valor_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `passageiros`
--

DROP TABLE IF EXISTS `passageiros`;
CREATE TABLE IF NOT EXISTS `passageiros` (
`id_pass` int(6) NOT NULL,
  `id_resp` int(5) DEFAULT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE IF NOT EXISTS `reserva` (
`id_reserva` int(11) NOT NULL,
  `id_voo_data` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `adultos` int(4) DEFAULT NULL,
  `criancas1` int(4) DEFAULT NULL,
  `criancas2` int(4) DEFAULT NULL,
  `classe` int(11) DEFAULT NULL,
  `preco_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `voo`
--

DROP TABLE IF EXISTS `voo`;
CREATE TABLE IF NOT EXISTS `voo` (
`id_voo` int(11) NOT NULL,
  `id_aeronave` int(11) DEFAULT NULL,
  `origem` varchar(30) DEFAULT NULL,
  `destino` varchar(30) DEFAULT NULL,
  `tempo_voo` time DEFAULT NULL,
  `distancia` varchar(10) DEFAULT NULL,
  `valor` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `voo`
--

INSERT INTO `voo` (`id_voo`, `id_aeronave`, `origem`, `destino`, `tempo_voo`, `distancia`, `valor`) VALUES
(1, 1, 'S?o Lu?s MA(SLZ)', 'Rio de janeiro RJ(GIG)', '03:30:00', '560', 420),
(2, 1, 'Jo?o Pessoa PB(JPA)', 'Campinas SP(CPQ)', '15:40:00', '456', 520),
(4, 1, 'Rio de janeiro RJ(GIG)', 'S?o Lu?s MA(SLZ)', '03:40:00', '560', 120);

-- --------------------------------------------------------

--
-- Estrutura da tabela `voo_data`
--

DROP TABLE IF EXISTS `voo_data`;
CREATE TABLE IF NOT EXISTS `voo_data` (
`id_voo_data` int(11) NOT NULL,
  `id_voo_semana` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `1classe_data` int(5) DEFAULT NULL,
  `executiva_data` int(5) DEFAULT NULL,
  `economica_data` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
 ADD PRIMARY KEY (`id_compra`);

--
-- Indexes for table `passageiros`
--
ALTER TABLE `passageiros`
 ADD PRIMARY KEY (`id_pass`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
 ADD PRIMARY KEY (`id_reserva`);

--
-- Indexes for table `voo`
--
ALTER TABLE `voo`
 ADD PRIMARY KEY (`id_voo`);

--
-- Indexes for table `voo_data`
--
ALTER TABLE `voo_data`
 ADD PRIMARY KEY (`id_voo_data`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
MODIFY `id_admin` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `passageiros`
--
ALTER TABLE `passageiros`
MODIFY `id_pass` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `voo`
--
ALTER TABLE `voo`
MODIFY `id_voo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `voo_data`
--
ALTER TABLE `voo_data`
MODIFY `id_voo_data` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
