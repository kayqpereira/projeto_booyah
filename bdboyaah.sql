-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Jun-2021 às 06:36
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdboyaah`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcategorias`
--

CREATE TABLE `tbcategorias` (
  `cod_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbclientes`
--

CREATE TABLE `tbclientes` (
  `cod_cliente` int(11) NOT NULL COMMENT 'Identificação do cliente',
  `cod_endereco` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `sobrenome` varchar(40) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `data_nasc` date NOT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `numero` varchar(6) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbenderecos`
--

CREATE TABLE `tbenderecos` (
  `cod_endereco` int(11) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `cidade` varchar(35) NOT NULL,
  `bairro` varchar(35) NOT NULL,
  `endereco` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbitens`
--

CREATE TABLE `tbitens` (
  `cod_item` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `cod_venda` int(11) NOT NULL,
  `quantidade` int(6) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmarcas`
--

CREATE TABLE `tbmarcas` (
  `cod_marca` int(11) NOT NULL,
  `nome_marca` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbprodutos`
--

CREATE TABLE `tbprodutos` (
  `cod_produto` int(11) NOT NULL,
  `cod_categoria` int(11) NOT NULL,
  `cod_marca` int(11) NOT NULL,
  `nome_produto` varchar(30) NOT NULL,
  `estoque` int(6) NOT NULL,
  `destaque` tinyint(4) NOT NULL DEFAULT 0,
  `ativo` tinyint(4) NOT NULL DEFAULT 1,
  `preco` decimal(10,2) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbvendas`
--

CREATE TABLE `tbvendas` (
  `cod_venda` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `forma_pag` varchar(20) NOT NULL,
  `meio_entrega` varchar(20) NOT NULL,
  `data_venda` date NOT NULL,
  `hora` time NOT NULL,
  `frete` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbcategorias`
--
ALTER TABLE `tbcategorias`
  ADD PRIMARY KEY (`cod_categoria`),
  ADD UNIQUE KEY `UQ_tbcategorias_nome` (`nome_categoria`) USING BTREE;

--
-- Índices para tabela `tbclientes`
--
ALTER TABLE `tbclientes`
  ADD PRIMARY KEY (`cod_cliente`),
  ADD UNIQUE KEY `UQ_tbclientes_cpf` (`cpf`) USING BTREE,
  ADD UNIQUE KEY `UQ_tbclientes_email` (`email`) USING BTREE,
  ADD KEY `FK_tbclientes_tbenderecos_cod_endereco` (`cod_endereco`) USING BTREE;

--
-- Índices para tabela `tbenderecos`
--
ALTER TABLE `tbenderecos`
  ADD PRIMARY KEY (`cod_endereco`);

--
-- Índices para tabela `tbitens`
--
ALTER TABLE `tbitens`
  ADD PRIMARY KEY (`cod_item`),
  ADD KEY `FK_tbitens_tbvendas_cod_venda` (`cod_venda`) USING BTREE,
  ADD KEY `FK_tbitens_tbprodutos_cod_produto` (`cod_produto`) USING BTREE;

--
-- Índices para tabela `tbmarcas`
--
ALTER TABLE `tbmarcas`
  ADD PRIMARY KEY (`cod_marca`);

--
-- Índices para tabela `tbprodutos`
--
ALTER TABLE `tbprodutos`
  ADD PRIMARY KEY (`cod_produto`),
  ADD UNIQUE KEY `UQ_tbprodutos_nome` (`nome_produto`) USING BTREE,
  ADD KEY `FK_tbprodutos_tbcategorias_cod_categoria` (`cod_categoria`) USING BTREE,
  ADD KEY `FK_tbprodutos_tbmarcas_cod_marca` (`cod_marca`);

--
-- Índices para tabela `tbvendas`
--
ALTER TABLE `tbvendas`
  ADD PRIMARY KEY (`cod_venda`),
  ADD KEY `FK_tbvendas_tbclientes_cod_cliente` (`cod_cliente`) USING BTREE;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcategorias`
--
ALTER TABLE `tbcategorias`
  MODIFY `cod_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbclientes`
--
ALTER TABLE `tbclientes`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificação do cliente';

--
-- AUTO_INCREMENT de tabela `tbenderecos`
--
ALTER TABLE `tbenderecos`
  MODIFY `cod_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tbitens`
--
ALTER TABLE `tbitens`
  MODIFY `cod_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbmarcas`
--
ALTER TABLE `tbmarcas`
  MODIFY `cod_marca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbprodutos`
--
ALTER TABLE `tbprodutos`
  MODIFY `cod_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbvendas`
--
ALTER TABLE `tbvendas`
  MODIFY `cod_venda` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbclientes`
--
ALTER TABLE `tbclientes`
  ADD CONSTRAINT `FK_tbcliente_tbendereco_cod_endereco` FOREIGN KEY (`cod_endereco`) REFERENCES `tbenderecos` (`cod_endereco`);

--
-- Limitadores para a tabela `tbitens`
--
ALTER TABLE `tbitens`
  ADD CONSTRAINT `FK_tbitens_tbproduto_cod_produto` FOREIGN KEY (`cod_produto`) REFERENCES `tbprodutos` (`cod_produto`),
  ADD CONSTRAINT `FK_tbitens_tbvenda_cod_venda` FOREIGN KEY (`cod_venda`) REFERENCES `tbvendas` (`cod_venda`);

--
-- Limitadores para a tabela `tbprodutos`
--
ALTER TABLE `tbprodutos`
  ADD CONSTRAINT `FK_tbproduto_tbcategoria_cod_categoria` FOREIGN KEY (`cod_categoria`) REFERENCES `tbcategorias` (`cod_categoria`),
  ADD CONSTRAINT `FK_tbprodutos_tbmarcas_cod_marca` FOREIGN KEY (`cod_marca`) REFERENCES `tbmarcas` (`cod_marca`);

--
-- Limitadores para a tabela `tbvendas`
--
ALTER TABLE `tbvendas`
  ADD CONSTRAINT `FK_tbvenda_tbcliente_cod_cliente` FOREIGN KEY (`cod_cliente`) REFERENCES `tbclientes` (`cod_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
