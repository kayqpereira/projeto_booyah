-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Jun-2021 às 11:16
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

--
-- Extraindo dados da tabela `tbcategorias`
--

INSERT INTO `tbcategorias` (`cod_categoria`, `nome_categoria`) VALUES
(1, 'Playstation 4'),
(2, 'Playstation 5');

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

--
-- Extraindo dados da tabela `tbclientes`
--

INSERT INTO `tbclientes` (`cod_cliente`, `cod_endereco`, `nome`, `sobrenome`, `cpf`, `telefone`, `celular`, `data_nasc`, `complemento`, `numero`, `email`, `senha`) VALUES
(1, 13, 'Jhonata dos', 'Santos', '164.166.170-48', '(11) 3323-2323', '(11) 99323-2323', '1992-12-12', 'Casa azul do lado da padaria', '2131', 'jhow@gmail.com', '949ee2960f1bfd1f8c8b48af4d13d4008112d78fb8737d10ea20beb138c3d2496e4ab97cbf6bc27eb723e51480ad6806d6361039f5d8c3c19c4e49e8e5403d29'),
(2, 14, 'Kayqur Pereira da', 'Silva', '688.594.320-73', '(12) 3434-3434', '(12) 93212-3123', '1970-12-13', 'qwewqe', '233', 'kay@gmail.com', 'cfb4d7b6f6236348aca4a58dc559f08bdddc400219493f19610befb430ea0bb658d9f3e008c2d811f04eb0e6e76a09d53f7abbc168705cbbb420b44173a6cc31'),
(3, 13, 'Leticia Silvera dos', 'Santos', '729.013.580-63', '(89) 3242-4242', '(89) 94234-2342', '2000-09-02', '', '1233', 'lele@gmail.com', '926be5420c68d3db8aadda4abb26b45b3eb6e1106158f319eb5a1813139e329c967b5c2d0e4f23219365c742c6a17904ee848d69f0a4b52e775fae89783e4e28');

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

--
-- Extraindo dados da tabela `tbenderecos`
--

INSERT INTO `tbenderecos` (`cod_endereco`, `cep`, `estado`, `cidade`, `bairro`, `endereco`) VALUES
(13, '07855-110', 'SP', 'Franco da Rocha', 'Parque Vitória', 'Rua Belfast'),
(14, '07858-270', 'SP', 'Franco da Rocha', 'Pouso Alegre', 'Rua Pérola');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbimagens`
--

CREATE TABLE `tbimagens` (
  `cod_imagem` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `nome_imagem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbimagens`
--

INSERT INTO `tbimagens` (`cod_imagem`, `cod_produto`, `nome_imagem`) VALUES
(1, 1, 'aa8a14c4bb3aa8ca92103bedbcfc207e.jpg'),
(10, 2, 'ee937951507f363db8a2ad5d30655fb9.png'),
(15, 2, '06a661111cdaa3820e44de9b04f88870.jpg'),
(16, 2, 'a4b54eb22c5386b140fd52aadfbcb270.jpg'),
(17, 1, '13b862821f207feb4912d3ee61eb6a47.jpg'),
(18, 1, '3730f1e4dd29972b7cb071e74ac61d56.jpg');

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

--
-- Extraindo dados da tabela `tbitens`
--

INSERT INTO `tbitens` (`cod_item`, `cod_produto`, `cod_venda`, `quantidade`, `preco`) VALUES
(8, 2, 10, 1, '230.00'),
(9, 1, 10, 1, '123.00'),
(10, 1, 11, 1, '123.00'),
(11, 2, 11, 2, '230.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmarcas`
--

CREATE TABLE `tbmarcas` (
  `cod_marca` int(11) NOT NULL,
  `nome_marca` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbmarcas`
--

INSERT INTO `tbmarcas` (`cod_marca`, `nome_marca`) VALUES
(1, 'Sony'),
(2, 'Capcom');

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

--
-- Extraindo dados da tabela `tbprodutos`
--

INSERT INTO `tbprodutos` (`cod_produto`, `cod_categoria`, `cod_marca`, `nome_produto`, `estoque`, `destaque`, `ativo`, `preco`, `descricao`) VALUES
(1, 1, 1, 'God of War 4', 5, 0, 1, '123.00', '<p>&Eacute; um novo come&ccedil;o para Kratos. Vivendo como um homem longe da sombra dos deuses, ele se aventura pelas selvagens florestas n&oacute;rdicas com seu filho Atreus, lutando para cumprir uma miss&atilde;o profundamente pessoal.<br />\r\n<br />\r\nO Santa Monica Studio e o diretor de cria&ccedil;&atilde;o Cory Barlog lan&ccedil;am um novo come&ccedil;o para um dos personagens mais conhecidos dos jogos. Vivendo como um homem, fora da sombra dos deuses, Kratos deve se adaptar a terras desconhecidas, amea&ccedil;as inesperadas e a uma segunda oportunidade de ser pai. Junto ao seu filho, Atreus, os dois v&atilde;o se aventurar pelas selvagens florestas n&oacute;rdicas e lutar para cumprir uma miss&atilde;o profundamente <strong>pessoal</strong>.</p>\r\n'),
(2, 2, 2, 'Resident Evil Village', 5, 1, 1, '230.00', '<p>Resident Evil 8: Village, conhecido no Jap&atilde;o como Biohazard 8: Village &eacute; um jogo eletr&ocirc;nico de survival horror desenvolvido e publicado pela Capcom. &Eacute; a sequ&ecirc;ncia de Resident Evil 7: Biohazard, de 2017, e foi anunciado pela primeira vez no evento de revela&ccedil;&atilde;o do PlayStation 5 em 11 de junho de 2020.</p>\r\n\r\n<p>&nbsp;</p>\r\n');

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
-- Extraindo dados da tabela `tbvendas`
--

INSERT INTO `tbvendas` (`cod_venda`, `cod_cliente`, `forma_pag`, `meio_entrega`, `data_venda`, `hora`, `frete`) VALUES
(10, 1, 'Boleto', 'SEDEX M', '2021-06-07', '00:20:21', '0.00'),
(11, 1, 'Boleto', 'Total Express EXP', '2021-06-07', '00:20:21', '0.00');

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
-- Índices para tabela `tbimagens`
--
ALTER TABLE `tbimagens`
  ADD PRIMARY KEY (`cod_imagem`),
  ADD KEY `FK_tbimagens_tbprodutos_cod_produto` (`cod_produto`);

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
  MODIFY `cod_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tbclientes`
--
ALTER TABLE `tbclientes`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificação do cliente', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbenderecos`
--
ALTER TABLE `tbenderecos`
  MODIFY `cod_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tbimagens`
--
ALTER TABLE `tbimagens`
  MODIFY `cod_imagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tbitens`
--
ALTER TABLE `tbitens`
  MODIFY `cod_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tbmarcas`
--
ALTER TABLE `tbmarcas`
  MODIFY `cod_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbprodutos`
--
ALTER TABLE `tbprodutos`
  MODIFY `cod_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbvendas`
--
ALTER TABLE `tbvendas`
  MODIFY `cod_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbclientes`
--
ALTER TABLE `tbclientes`
  ADD CONSTRAINT `FK_tbcliente_tbendereco_cod_endereco` FOREIGN KEY (`cod_endereco`) REFERENCES `tbenderecos` (`cod_endereco`);

--
-- Limitadores para a tabela `tbimagens`
--
ALTER TABLE `tbimagens`
  ADD CONSTRAINT `FK_tbimagens_tbprodutos_cod_produto` FOREIGN KEY (`cod_produto`) REFERENCES `tbprodutos` (`cod_produto`);

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
