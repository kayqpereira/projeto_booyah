-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jun-2021 às 04:23
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
(12, 'Playstation 5'),
(13, 'Xbox One');

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
(3, 13, 'Leticia Silvera dos', 'Santos', '729.013.580-63', '(89) 3242-4242', '(89) 94234-2342', '2000-09-02', '', '1233', 'lele@gmail.com', '926be5420c68d3db8aadda4abb26b45b3eb6e1106158f319eb5a1813139e329c967b5c2d0e4f23219365c742c6a17904ee848d69f0a4b52e775fae89783e4e28'),
(5, 15, 'Jhonata Pereira da', 'Silva', '440.445.220-90', '', '(11) 92343-2432', '2000-09-08', '', '123e', 'jhow@gmail.com', '949ee2960f1bfd1f8c8b48af4d13d4008112d78fb8737d10ea20beb138c3d2496e4ab97cbf6bc27eb723e51480ad6806d6361039f5d8c3c19c4e49e8e5403d29'),
(6, 16, 'Kayque dos Santos', 'Oliveira', '249.804.510-47', '(11) 4564-5645', '(11) 94453-4543', '2000-12-03', '', '12312', 'kayq@gmail.com', '949ee2960f1bfd1f8c8b48af4d13d4008112d78fb8737d10ea20beb138c3d2496e4ab97cbf6bc27eb723e51480ad6806d6361039f5d8c3c19c4e49e8e5403d29'),
(7, 13, 'Kethellyn Beatriz da', 'Silva', '673.518.510-26', '(11) 4123-1231', '(11) 91232-1312', '2000-05-06', '', '3123', 'kety@gmail.com', '949ee2960f1bfd1f8c8b48af4d13d4008112d78fb8737d10ea20beb138c3d2496e4ab97cbf6bc27eb723e51480ad6806d6361039f5d8c3c19c4e49e8e5403d29');

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
(14, '07858-270', 'SP', 'Franco da Rocha', 'Pouso Alegre', 'Rua Pérola'),
(15, '07858-150', 'SP', 'Franco da Rocha', 'Parque Munhos', 'Rua Doutor Eugênio Vaqueiro Rodrigues'),
(16, '07855-270', 'SP', 'Franco da Rocha', 'Parque Vitória', 'Rua Zebedeu Marcolino');

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
(22, 9, 'd7efed277c5c1cdd71d5bdc732fde4d7.jpg'),
(23, 9, 'ff8bb5c6be1bc00f04136e24ea8c97bf.jpg'),
(24, 9, 'c45fd7e82ff50835ebe415347c3e49ba.jpg'),
(25, 9, '01ec2600d612490a38f1a981e6feb93d.jpg'),
(26, 10, '0779b63cd5aa9f620e657294e5d69132.jpg'),
(27, 10, 'a112baab9af4add2c74f561b4339e4d7.jpg'),
(28, 10, 'bed722a46be556135b57c498a39cdb8b.jpg'),
(29, 10, 'bdbc9f84810dc3d27951c86c2d74d14c.jpg'),
(30, 11, 'ee621a11d623238556bd934285d8c9db.jpg'),
(31, 11, '36a07177b2714b9ada1fe9a746ae65c3.jpg'),
(32, 12, '9722d142a112c5c81fe432bd9a76d183.jpg'),
(33, 12, 'f53435f59210b2455457f1c2de132043.jpg'),
(34, 12, '048395abc69695612b646a070860dd28.jpg'),
(35, 12, '1d6e7935253312cb401942edf449274a.jpg'),
(36, 13, 'fd7221837f44934d8a6879950b1b5f2d.jpg'),
(37, 13, '9aa05b63dab395abfce2be17df95ea81.jpg'),
(38, 14, 'd79cdfe3ba18c839f34689dd5778be88.jfif'),
(39, 14, 'def3d01391581e68f4214852634fc862.jfif'),
(40, 14, 'c3638bca4038f249b4d67b6320687772.jfif'),
(41, 14, '9c8a204dd313a6530f08d928973e3f65.jfif'),
(42, 15, '47b2e52f1a077101e84113619cda664e.webp'),
(43, 15, 'b3d944188fb77abb418def57f8a46de5.jpg'),
(44, 16, '2045e3a854e9c076bcd66ce287227b0f.jpg'),
(45, 16, 'dd9b553cc983289fe3434483dc8f2c41.jpg');

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
(18, 10, 16, 1, '259.00'),
(19, 11, 16, 1, '199.00'),
(20, 9, 16, 1, '239.00');

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
(2, 'Capcom'),
(5, 'CD Projekt'),
(6, 'Rockstar Games'),
(7, 'Ubsoft'),
(8, 'THQ Nordic');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbprodutos`
--

CREATE TABLE `tbprodutos` (
  `cod_produto` int(11) NOT NULL,
  `cod_categoria` int(11) NOT NULL,
  `cod_marca` int(11) NOT NULL,
  `nome_produto` varchar(100) NOT NULL,
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
(9, 1, 2, 'Resident Evil Village - PlayStation 4', 5, 0, 1, '239.00', '<ul>\r\n	<li>Nova experi&ecirc;ncia de ResidentEvil- Continuando de onde o risco biol&oacute;gico de Resident Evil 7 parou, Resident Evil Village &eacute; a oitava grande parcela da principal s&eacute;rie Resident Evil.</li>\r\n	<li>Ethan e Mia Winters est&atilde;o reunidos e colocando seus pesadelos compartilhados na planta&ccedil;&atilde;o do Baker para tr&aacute;s...at&eacute; que sua vida seja destru&iacute;da e Ethan se torne o ponto focal de um novo tormento.</li>\r\n	<li>A&ccedil;&atilde;o em primeira pessoa- os jogadores assumir&atilde;o o papel de Ethan Winters e vivenciar&atilde;o todas as batalhas de perto e persegui&ccedil;&otilde;es aterrorizantes em uma perspectiva de primeira pessoa.</li>\r\n	<li>Rostos familiares e novos inimigos- Chris Redfield tem sido tipicamente um her&oacute;i na s&eacute;rie Resident Evil, mas sua apari&ccedil;&atilde;o em Resident Evil Village aparentemente o envolve em motivos sinistros.</li>\r\n	<li>Uma vila viva que respira- Mais do que apenas um pano de fundo misterioso para os eventos horr&iacute;veis que se desenrolam, a aldeia &eacute; um personagem em si.</li>\r\n</ul>\r\n'),
(10, 12, 2, 'Resident Evil Village - PlayStation 5', 3, 1, 1, '259.00', '<ul>\r\n	<li>Nova experi&ecirc;ncia de ResidentEvil- Continuando de onde o risco biol&oacute;gico de Resident Evil 7 parou, Resident Evil Village &eacute; a oitava grande parcela da principal s&eacute;rie Resident Evil.</li>\r\n	<li>Ethan e Mia Winters est&atilde;o reunidos e colocando seus pesadelos compartilhados na planta&ccedil;&atilde;o do Baker para tr&aacute;s...at&eacute; que sua vida seja destru&iacute;da e Ethan se torne o ponto focal de um novo tormento.</li>\r\n	<li>A&ccedil;&atilde;o em primeira pessoa- os jogadores assumir&atilde;o o papel de Ethan Winters e vivenciar&atilde;o todas as batalhas de perto e persegui&ccedil;&otilde;es aterrorizantes em uma perspectiva de primeira pessoa.</li>\r\n	<li>Rostos familiares e novos inimigos- Chris Redfield tem sido tipicamente um her&oacute;i na s&eacute;rie Resident Evil, mas sua apari&ccedil;&atilde;o em Resident Evil Village aparentemente o envolve em motivos sinistros.</li>\r\n	<li>Uma vila viva que respira- Mais do que apenas um pano de fundo misterioso para os eventos horr&iacute;veis que se desenrolam, a aldeia &eacute; um personagem em si.</li>\r\n</ul>\r\n'),
(11, 12, 1, 'Marvel\'s Spider Man: Miles Morales - PlayStation 5', 4, 0, 1, '199.00', '<ul>\r\n	<li>Experimente a ascens&atilde;o de Miles Morales como o her&oacute;i que domina os novos, incr&iacute;veis e explosivos poderes para se tornar o pr&oacute;prio Spider-Man</li>\r\n	<li>Na aventura mais recente do universo de Marvel&#39;s Spider-Man, o adolescente Miles Morales est&aacute; se adaptando &agrave; sua nova casa enquanto segue os passos de seu mentor, Peter Parker, para se tornar um novo Spider-Man</li>\r\n	<li>Mas uma violenta disputa de for&ccedil;as amea&ccedil;a destruir seu novo lar e faz o aspirante a her&oacute;i perceber que com grandes poderes tamb&eacute;m v&ecirc;m grandes responsabilidades.</li>\r\n	<li>Para salvar a Nova York da Marvel, Miles precisa reconhecer e assumir o t&iacute;tulo de Spider-Man.</li>\r\n</ul>\r\n'),
(12, 1, 5, 'Cyberpunk 2077 - PlayStation 4', 7, 1, 1, '279.90', '<ul>\r\n	<li>JOGUE COMO UM MERCEN&Aacute;RIO FORA DA LEI: Torne-se um cyberpunk - um mercen&aacute;rio urbano equipado com melhorias cibern&eacute;ticas - e construa a sua lenda nas ruas de Night City.</li>\r\n	<li>VIVA NA CIDADE DO FUTURO: Entre no enorme mundo aberto de Night City, um lugar que define novos padr&otilde;es no quesito de complexidade, profundidade e visual.</li>\r\n	<li>ROUBE O IMPLANTE QUE CONCEDE A VIDA ETERNA: Aceite o trabalho mais arriscado da sua vida e corra atr&aacute;s de um prot&oacute;tipo de implante com a chave da imortalidade.</li>\r\n</ul>\r\n'),
(13, 1, 6, 'Red Dead Redemption 2 - PlayStation 4', 2, 0, 1, '178.00', '<ul>\r\n	<li>Os que n&atilde;o se rendem, nem sucumbem, s&atilde;o mortos</li>\r\n	<li>Com agentes federais e os melhores ca&ccedil;adores de recompensas no seu encal&ccedil;o, a gangue precisa roubar, assaltar e lutar para sobreviver no impiedoso cora&ccedil;&atilde;o dos estados unidos</li>\r\n	<li>Dos criadores de grand theft auto v e red dead redemption, red dead redemption 2 &eacute; uma hist&oacute;ria &eacute;pica sobre a vida nos estados unidos no alvorecer dos tempos modernos</li>\r\n	<li>Classifica&ccedil;&atilde;o indicativa: 18 anos</li>\r\n	<li>Idioma: Ingl&ecirc;s</li>\r\n</ul>\r\n'),
(14, 1, 7, 'Assassin\'s Creed Valhalla - PlayStation 4', 2, 0, 1, '203.90', '<ul>\r\n	<li>LIDERE INVAS&Otilde;ES &Eacute;PICAS &ndash; Inicie ataques em larga escala contra fortalezas e tropas sax&ocirc;nicas por toda a Inglaterra.</li>\r\n	<li>ESCREVA A SUA SAGA VIKING &ndash; Mec&acirc;nicas avan&ccedil;adas de RPG possibilitam a voc&ecirc; desenvolver seu personagem e influenciar o mundo &agrave; sua volta.</li>\r\n	<li>SISTEMA DE COMBATE VISCERAL &ndash; Use nas duas m&atilde;os armas poderosas.</li>\r\n	<li>UM MUNDO ABERTO NA IDADE DAS TREVAS &ndash; Veleje pelos mares misteriosos da Noruega at&eacute; os reinos belos e hostis da Inglaterra e al&eacute;m.</li>\r\n	<li>DESENVOLVA SEU ASSENTAMENTO &ndash; Crie e aprimore constru&ccedil;&otilde;es que possibilitem maior personaliza&ccedil;&atilde;o, incluindo quartel, ferreiro, casa de tatuagem e mais.</li>\r\n	<li>VIKINGS MERCEN&Aacute;RIOS &ndash; Crie e personalize um guerreiro viking &uacute;nico dentro do seu cl&atilde; e compartilhe online com amigos para que usem nas invas&otilde;es deles.</li>\r\n</ul>\r\n'),
(15, 12, 8, 'BioMutant - PlayStation 5', 4, 1, 1, '179.00', '<p>&quot;BIOMUTANT&reg; &eacute; um RPG fabuloso de Kung Fu p&oacute;s-apocal&iacute;ptico, de mundo aberto, com um sistema de combate estilo artes marciais exclusivo, permitindo que voc&ecirc; misture a&ccedil;&atilde;o corpo a corpo, de tiro e habilidades mutantes.<br />\r\n<br />\r\nUma praga est&aacute; arruinando a regi&atilde;o e a &Aacute;rvore da Vida est&aacute; sangrando pela morte de suas ra&iacute;zes. As Tribos est&atilde;o divididas. Explore um mundo tumultuado e defina seu destino: voc&ecirc; ser&aacute; seu salvador, ou o levar&aacute; a um destino ainda mais sombrio?<br />\r\n<br />\r\nPRINCIPAIS DESTAQUES<br />\r\n- Experimente uma liberdade m&aacute;xima de movimento ao misturar tiros, combate corpo a corpo e os poderes de suas muta&ccedil;&otilde;es<br />\r\n- Recodifique sua estrutura gen&eacute;tica para mudar a maneira como voc&ecirc; enxerga e joga, com muta&ccedil;&otilde;es f&iacute;sicas como garras de inseto e caudas com espinhos<br />\r\n- Explore um mundo aberto e vibrante a p&eacute;, com mechas, jet ski, bal&atilde;o de ar ou montarias &uacute;nicas do local<br />\r\n- Misture e combine pe&ccedil;as e crie suas pr&oacute;prias armas &uacute;nicas corpo a corpo de corte, esmagamento e perfura&ccedil;&atilde;o, al&eacute;m de rev&oacute;lveres, fuzis, espingardas e mais.<br />\r\n- Um contador de hist&oacute;rias narra cada passo de sua jornada, mas s&atilde;o suas a&ccedil;&otilde;es e escolhas que decidir&atilde;o como sua hist&oacute;ria de sobreviv&ecirc;ncia termina&quot;</p>\r\n'),
(16, 13, 7, 'Watch Dogs Legion - Xbox One', 3, 0, 1, '139.00', '<ul>\r\n	<li>JOGUE COMO QUALQUER PESSOA Recrute qualquer pessoa entre toda a popula&ccedil;&atilde;o de Londres para a sua resist&ecirc;ncia: desde um agente da MI6 a um lutador de rua, desde um hacker genial a um piloto de fugas, desde um torcedor hooligan a uma senhora idosa acima de qualquer suspeita: todos t&ecirc;m hist&oacute;rias, personalidades e habilidades diferentes que podem ser usadas em diferentes situa&ccedil;&otilde;es. Qualquer pessoa que voc&ecirc; veja pode se juntar &agrave; sua equipe.</li>\r\n	<li>UMA HIST&Oacute;RIA ENVOLVENTE Depois que um inimigo misterioso inicia ataques terroristas devastadores em Londres, a DedSec, uma resist&ecirc;ncia secreta clandestina que foi responsabilizada pelos ataques e est&aacute; &agrave; beira da aniquila&ccedil;&atilde;o, precisa da sua ajuda.</li>\r\n	<li>A INVAS&Atilde;O VIRTUAL &Eacute; A SUA ARMA Use a infraestrutura tecnol&oacute;gica de Londres como arma e libere o dom&iacute;nio da tecnologia da DedSec: assuma controle de drones de combate, reconstrua eventos passados usando realidade aumentada para descobrir quem est&aacute; por tr&aacute;s dos ataques terroristas e realize hacks nos sistemas de seguran&ccedil;a mais avan&ccedil;ados. Fa&ccedil;a upgrade e mobilize dispositivos tecnol&oacute;gicos como o manto de realidade aumentada, rob&ocirc; aranha, drone de m&iacute;sseis e o poderoso punho el&eacute;trico em um novo sistema de combate corpo a corpo.</li>\r\n	<li>LIBERE UMA LONDRES DE MUNDO ABERTO Explore um gigantesco mundo aberto urbano e lute para liberar muitos marcos famosos de Londres &mdash; incluindo Trafalgar Square, Big Ben, Tower Bridge, Camden, Piccadilly Circus ou o London Eye &mdash; e envolva-se em atividades paralelas como lutas de rua, dardos, futebol freestyle, contratos de courier ilegal ou arte de rua.</li>\r\n</ul>\r\n');

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
(16, 6, 'Boleto', 'SEDEX M', '2021-06-08', '00:20:21', '0.00');

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
  MODIFY `cod_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tbclientes`
--
ALTER TABLE `tbclientes`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificação do cliente', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbenderecos`
--
ALTER TABLE `tbenderecos`
  MODIFY `cod_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tbimagens`
--
ALTER TABLE `tbimagens`
  MODIFY `cod_imagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `tbitens`
--
ALTER TABLE `tbitens`
  MODIFY `cod_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tbmarcas`
--
ALTER TABLE `tbmarcas`
  MODIFY `cod_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbprodutos`
--
ALTER TABLE `tbprodutos`
  MODIFY `cod_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tbvendas`
--
ALTER TABLE `tbvendas`
  MODIFY `cod_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
