-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.46 - MySQL Community Server - GPL
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              12.17.0.7270
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela playpark.brinquedo
CREATE TABLE IF NOT EXISTS `brinquedo` (
  `id_brinquedo` int NOT NULL AUTO_INCREMENT,
  `nome_brinquedo` varchar(100) NOT NULL,
  `codigo_brinquedo` varchar(50) NOT NULL,
  `brinquedo_ativo` tinyint(1) NOT NULL DEFAULT '1',
  `criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `atualizado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_brinquedo`),
  UNIQUE KEY `codigo_brinquedo` (`codigo_brinquedo`)
) ENGINE=InnoDB AUTO_INCREMENT=236 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela playpark.brinquedo: ~114 rows (aproximadamente)
INSERT INTO `brinquedo` (`id_brinquedo`, `nome_brinquedo`, `codigo_brinquedo`, `brinquedo_ativo`, `criado_em`, `atualizado_em`) VALUES
	(120, 'Futebol de Sabão Premium', 'BRQ001', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(121, 'Chute à Gol Premium', 'BRQ002', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(122, 'Combo 3 em 1 Dino', 'BRQ003', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(123, 'Combo 3 em 1 Patrulha Canina', 'BRQ004', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(124, 'Arco e Play', 'BRQ005', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(125, 'Combo Pocket Pirata', 'BRQ006', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(126, 'Colchão para Giro Radical Aventura na Praia', 'BRQ007', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(127, 'Colchão para Giro Radical Relógio Maluco', 'BRQ008', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(128, 'Colchão para Giro Radical Premium', 'BRQ009', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(129, 'Colchão Giro Radical Aventura na África', 'BRQ010', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(130, 'Chute à Gol Copa', 'BRQ011', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(131, 'Kiddie Play Capi Park', 'BRQ012', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(132, 'Tobogã Invasão Espacial', 'BRQ013', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(133, 'Combo 3 em 1 Super Mario', 'BRQ014', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(134, 'Tobogã Tigrão 3D', 'BRQ015', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(135, 'Tobogã Super', 'BRQ016', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(136, 'Tobogã Splash Premium', 'BRQ017', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(137, 'Tobogã Premium Mickey', 'BRQ018', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(138, 'Tobogã Premium', 'BRQ019', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(139, 'Tobogã Mega', 'BRQ020', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(140, 'Tobogã Hiper', 'BRQ021', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(141, 'Tobogã Dual Slide Tigrinho', 'BRQ022', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(142, 'Splash Savana', 'BRQ023', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(143, 'Radical Slide', 'BRQ024', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(144, 'Pula Pula Aventura Mickey', 'BRQ025', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(145, 'Pula Pula Aventura', 'BRQ026', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(146, 'Piscina de Bolinhas Yupi Tigre 3D', 'BRQ027', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(147, 'Piscina de Bolinhas Yupi Tigre', 'BRQ028', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(148, 'Piscina de Bolinhas Yupi Fantasia', 'BRQ029', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(149, 'Piscina de Bolinhas Yupi circo', 'BRQ030', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(150, 'Piscina de Bolinhas Yupi', 'BRQ031', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(151, 'Piscina de Bolinhas Soft Colorê', 'BRQ032', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(152, 'Piscina de Bolinhas Soft Candy Color', 'BRQ033', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(153, 'Piscina de Bolinhas Plus Minnie', 'BRQ034', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(154, 'Piscina de Bolinhas Plus Mickey', 'BRQ035', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(155, 'Piscina de Bolinhas Minnie', 'BRQ036', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(156, 'Piscina de Bolinhas Mickey', 'BRQ037', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(157, 'Piscina de Bolinhas Baby Mickey', 'BRQ038', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(158, 'Piscina de Bolinhas Baby Disney', 'BRQ039', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(159, 'Parque do Mickey', 'BRQ040', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(160, 'Mult Play Patrulha Canina', 'BRQ041', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(161, 'Mult Play Jardim Encantado', 'BRQ042', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(162, 'Mult Play Invasão Jurássica', 'BRQ043', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(163, 'Mult Play Homem Aranha', 'BRQ044', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(164, 'Kiddie Play Vaquinha', 'BRQ045', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(165, 'Kiddie Play Tigrão', 'BRQ046', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(166, 'Kiddie Play Soft Patrulha Canina', 'BRQ047', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(167, 'Kiddie Play Soft Mickey', 'BRQ048', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(168, 'Kiddie Play Soft Girafa', 'BRQ049', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(169, 'Kiddie Play Soft Dino', 'BRQ050', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(170, 'Kiddie Play Soft Circo', 'BRQ051', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(171, 'Mult Play Safari', 'BRQ052', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(172, 'Mult Play Dino Park', 'BRQ053', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(173, 'Kiddie Play Circo', 'BRQ054', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(174, 'Kiddie Play Baby Fantasia', 'BRQ055', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(175, 'Jogo das Argolas', 'BRQ056', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(176, 'Guerra de Cotonetes Street', 'BRQ057', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(177, 'Futebol de Sabão Super', 'BRQ058', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(178, 'Futebol de Sabão Standard', 'BRQ059', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(179, 'Futebol de Sabão Hiper', 'BRQ060', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(180, 'Futebol de Sabão Coberto', 'BRQ061', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(181, 'Futebol de Sabão Brasileirão Super', 'BRQ062', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(182, 'Futebol de Sabão Brasileirão Standard', 'BRQ063', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(183, 'Dual Splash Mundo Azul', 'BRQ064', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(184, 'Dual Radical', 'BRQ065', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(185, 'Croco Kiddie', 'BRQ066', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(186, 'Corrida Maluca', 'BRQ067', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(187, 'Combo T-Rex', 'BRQ068', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(188, 'Combo Mini Pocket Girafa', 'BRQ069', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(189, 'Combo Pocket Vaquinha', 'BRQ070', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(190, 'Combo Pocket Tigre', 'BRQ071', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(191, 'Combo Pocket Minnie', 'BRQ072', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(192, 'Combo Pocket Mickey', 'BRQ073', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(193, 'Combo Pocket Girafa', 'BRQ074', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(194, 'Combo Pocket Clube dos Dinossauros', 'BRQ075', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(195, 'Combo Pocket Dino', 'BRQ076', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(196, 'Combo 3 em 1 Vaquinha', 'BRQ077', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(197, 'Combo 3 em 1 Tigre', 'BRQ078', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(198, 'Combo 3 em 1 Roda Gigante', 'BRQ079', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(199, 'Combo 3 em 1 Pirata', 'BRQ080', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(200, 'Combo 3 em 1 Mickey', 'BRQ081', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(201, 'Colchão Inflável p/ Touro Mecânico Standard', 'BRQ082', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(202, 'Colchão Inflável para Touro Mecânico Standard Rodeio', 'BRQ083', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(203, 'Colchão Inflável Touro Choquito', 'BRQ084', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(204, 'Air Soccer', 'BRQ085', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(205, 'Tobogã Kong', 'BRQ086', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(206, 'Pula Pula Fundo do Mar', 'BRQ087', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(207, 'Piscina de Bolinhas Soft Circo', 'BRQ088', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(208, 'Futebol de Sabão Coberto Champions League', 'BRQ089', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(209, 'Combo Pocket Circo', 'BRQ090', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(210, 'Combo 3 em 1 Minnie', 'BRQ091', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(211, 'Combo 3 em 1 Balão Mágico', 'BRQ092', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(212, 'Colchão para Touro Mecânico Rodeio Super', 'BRQ093', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(213, 'Crocogã Mega Radical com Piscina', 'BRQ094', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(214, 'Colchão Inflável para Touro Mecânico Super', 'BRQ095', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(215, 'Tobogã Super 3 em 1', 'BRQ096', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(216, 'Tobogã Hiper Dual Slide Mickey', 'BRQ097', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(217, 'Piscina de Bolinhas Yupi Dino 3D', 'BRQ098', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(218, 'Piscina de Bolinhas Soft Fundo do Mar', 'BRQ099', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(219, 'Piscina de Bolinhas Soft Dino', 'BRQ100', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(220, 'Mult Play Everest', 'BRQ101', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(221, 'Mult Play Aventura na África', 'BRQ102', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(222, 'Futebol de Sabão Super Play', 'BRQ103', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(223, 'Combo Pocket Fundo do Mar', 'BRQ104', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(224, 'Combo 3 em 1 Girafa', 'BRQ105', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(225, 'Colchão Bola Maluca Circo', 'BRQ106', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(226, 'Chute à Gol', 'BRQ107', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(227, 'Alpinismo Inflável Super', 'BRQ108', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(228, 'Piscina de Bolinhas Yupi Fundo do Mar', 'BRQ109', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(229, 'Alpinismo Inflável Tropical', 'BRQ110', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(230, 'Kiddie Play Patrulha Canina', 'BRQ111', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(231, 'Combo 3 em 1 Homem-Aranha', 'BRQ112', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(232, 'Toboshark Radical com Piscina', 'BRQ113', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45'),
	(233, 'Mecanismo de Giro Radical', 'BRQ114', 1, '2026-09-05 22:09:45', '2026-09-05 22:09:45');

-- Copiando estrutura para tabela playpark.colaborador
CREATE TABLE IF NOT EXISTS `colaborador` (
  `id_colaborador` int NOT NULL AUTO_INCREMENT,
  `nome_colaborador` varchar(100) NOT NULL,
  `fk_setor` int NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `atualizado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_colaborador`),
  KEY `fk_setor` (`fk_setor`),
  CONSTRAINT `colaborador_ibfk_1` FOREIGN KEY (`fk_setor`) REFERENCES `setor` (`id_setor`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela playpark.colaborador: ~5 rows (aproximadamente)
INSERT INTO `colaborador` (`id_colaborador`, `nome_colaborador`, `fk_setor`, `ativo`, `criado_em`, `atualizado_em`) VALUES
	(1, 'Pedro Henrique Ernesto de Souza', 1, 1, '2026-08-27 23:31:45', '2026-09-05 21:34:41'),
	(2, 'Maria Oliveira', 2, 1, '2026-08-27 23:31:45', '2026-08-27 23:31:45'),
	(5, 'Lucas Ferreira Souza', 5, 1, '2026-08-27 23:31:45', '2026-09-17 10:34:22'),
	(6, 'Italo Santos', 3, 1, '2026-09-08 10:25:51', '2026-09-08 10:25:51'),
	(7, 'Gustavo Vitroriano', 3, 1, '2026-09-08 10:34:57', '2026-09-08 10:34:57');

-- Copiando estrutura para tabela playpark.historico_ocorrencia
CREATE TABLE IF NOT EXISTS `historico_ocorrencia` (
  `id_historico` int NOT NULL AUTO_INCREMENT,
  `ocorrencia` int NOT NULL,
  `usuario` int NOT NULL,
  `acao` varchar(30) NOT NULL,
  `campo` varchar(50) DEFAULT NULL,
  `anterior` text,
  `novo` text,
  `data_alteracao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_historico`),
  KEY `fk_historico_usuario` (`usuario`),
  CONSTRAINT `fk_historico_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela playpark.historico_ocorrencia: ~28 rows (aproximadamente)
INSERT INTO `historico_ocorrencia` (`id_historico`, `ocorrencia`, `usuario`, `acao`, `campo`, `anterior`, `novo`, `data_alteracao`) VALUES
	(1, 7, 11, 'ALTERACAO', 'Setor', '2', '3', '2026-09-17 10:31:43'),
	(2, 7, 11, 'ALTERACAO', 'Status', '1', '3', '2026-09-17 10:32:38'),
	(3, 7, 11, 'EXCLUSAO', NULL, 'Ocorrência existente', 'Ocorrência excluída', '2026-09-17 10:32:48'),
	(4, 4, 11, 'ALTERACAO', 'Brinquedo', '126', '201', '2026-09-17 10:33:12'),
	(5, 8, 9, 'CRIACAO', NULL, NULL, 'Ocorrência criada', '2026-09-17 10:33:52'),
	(6, 8, 1, 'ALTERACAO', 'Ordem de Produção', '123562', '12334355', '2026-09-17 10:34:45'),
	(7, 8, 1, 'ALTERACAO', 'Descrição', 'teste', 'teste 3', '2026-09-17 10:34:45'),
	(8, 8, 1, 'ALTERACAO', 'Colaborador', '6', '2', '2026-09-17 10:34:45'),
	(9, 8, 1, 'ALTERACAO', 'Solução', NULL, 'solucionado', '2026-09-17 10:35:34'),
	(10, 8, 1, 'ALTERACAO', 'Setor', '2', '5', '2026-09-17 10:36:14'),
	(11, 8, 1, 'ALTERACAO', 'Setor', '5', '3', '2026-09-17 20:45:47'),
	(12, 8, 1, 'ALTERACAO', 'Status', '1', '3', '2026-09-17 20:46:54'),
	(13, 8, 11, 'EXCLUSAO', NULL, 'Ocorrência existente', 'Ocorrência excluída', '2026-09-17 20:47:24'),
	(14, 5, 11, 'ALTERACAO', 'Solução', NULL, 'teste', '2026-09-17 21:06:12'),
	(15, 5, 1, 'EXCLUSAO', NULL, 'Ocorrência existente', 'Ocorrência excluída', '2026-09-17 22:44:14'),
	(16, 4, 1, 'ALTERACAO', 'Brinquedo', '201', '225', '2026-09-17 23:24:53'),
	(17, 4, 1, 'ALTERACAO', 'Ordem de Produção', '1209876543', '1209876543werw', '2026-09-18 00:00:20'),
	(18, 4, 1, 'ALTERACAO', 'Descrição', 'Teste', 'Testeee', '2026-09-18 00:00:20'),
	(19, 4, 1, 'ALTERACAO', 'Solução', NULL, 'testet', '2026-09-18 00:00:20'),
	(20, 4, 1, 'ALTERACAO', 'Colaborador', '5', '2', '2026-09-18 00:00:20'),
	(21, 4, 1, 'ALTERACAO', 'Brinquedo', '225', '227', '2026-09-18 00:00:20'),
	(22, 4, 1, 'ALTERACAO', 'Prioridade', '3', '1', '2026-09-18 00:00:20'),
	(23, 4, 1, 'ALTERACAO', 'Status', '3', '2', '2026-09-18 00:00:20'),
	(24, 4, 11, 'EXCLUSAO', NULL, 'Ocorrência existente', 'Ocorrência excluída', '2026-09-18 00:08:28'),
	(25, 3, 12, 'ALTERACAO', 'Setor', '4', '3', '2026-09-19 12:41:54'),
	(26, 2, 12, 'ALTERACAO', 'Setor', '5', '3', '2026-09-19 12:43:38'),
	(27, 1, 12, 'ALTERACAO', 'Setor', '5', '2', '2026-09-19 12:44:20'),
	(28, 9, 12, 'CRIACAO', NULL, NULL, 'Ocorrência criada', '2026-09-19 12:50:16');

-- Copiando estrutura para tabela playpark.ocorrencia
CREATE TABLE IF NOT EXISTS `ocorrencia` (
  `id_ocorrencia` int NOT NULL AUTO_INCREMENT,
  `ordem_producao` varchar(50) DEFAULT NULL,
  `descricao_ocorrencia` text NOT NULL,
  `solucao_ocorrencia` text,
  `data_abertura` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` datetime DEFAULT NULL,
  `data_conclusao` datetime DEFAULT NULL,
  `fk_colaborador` int NOT NULL,
  `fk_brinquedo` int NOT NULL,
  `fk_prioridade` int NOT NULL,
  `fk_status` int NOT NULL,
  `fk_usuario` int NOT NULL,
  `criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `atualizado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fk_setor` int DEFAULT NULL,
  PRIMARY KEY (`id_ocorrencia`),
  KEY `fk_colaborador` (`fk_colaborador`),
  KEY `fk_brinquedo` (`fk_brinquedo`),
  KEY `fk_prioridade` (`fk_prioridade`),
  KEY `fk_status` (`fk_status`),
  KEY `fk_usuario` (`fk_usuario`),
  KEY `fk_ocorrencia_setor` (`fk_setor`),
  CONSTRAINT `fk_ocorrencia_setor` FOREIGN KEY (`fk_setor`) REFERENCES `setor` (`id_setor`),
  CONSTRAINT `ocorrencia_ibfk_1` FOREIGN KEY (`fk_colaborador`) REFERENCES `colaborador` (`id_colaborador`),
  CONSTRAINT `ocorrencia_ibfk_2` FOREIGN KEY (`fk_brinquedo`) REFERENCES `brinquedo` (`id_brinquedo`),
  CONSTRAINT `ocorrencia_ibfk_3` FOREIGN KEY (`fk_prioridade`) REFERENCES `prioridade` (`id_prioridade`),
  CONSTRAINT `ocorrencia_ibfk_4` FOREIGN KEY (`fk_status`) REFERENCES `status` (`id_status`),
  CONSTRAINT `ocorrencia_ibfk_5` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela playpark.ocorrencia: ~4 rows (aproximadamente)
INSERT INTO `ocorrencia` (`id_ocorrencia`, `ordem_producao`, `descricao_ocorrencia`, `solucao_ocorrencia`, `data_abertura`, `data_atualizacao`, `data_conclusao`, `fk_colaborador`, `fk_brinquedo`, `fk_prioridade`, `fk_status`, `fk_usuario`, `criado_em`, `atualizado_em`, `fk_setor`) VALUES
	(1, '1233423543', '123123123', NULL, '2026-09-08 21:00:23', NULL, NULL, 6, 227, 3, 1, 11, '2026-09-08 21:00:23', '2026-09-19 12:44:20', 2),
	(2, '1we1e', 'qweqweqwe', NULL, '2026-09-08 21:02:15', NULL, NULL, 5, 226, 3, 1, 1, '2026-09-08 21:02:15', '2026-09-19 12:43:38', 3),
	(3, '635248', 'Cones menores', NULL, '2026-09-08 22:08:15', '2026-09-16 10:40:45', NULL, 6, 124, 3, 2, 9, '2026-09-08 22:08:15', '2026-09-19 12:41:54', 3),
	(9, '-0987654321', 'Sou incompetente e indiotaw', NULL, '2026-09-19 12:50:16', NULL, NULL, 1, 124, 3, 1, 12, '2026-09-19 12:50:16', '2026-09-19 12:50:16', 2);

-- Copiando estrutura para tabela playpark.perfil
CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int NOT NULL AUTO_INCREMENT,
  `nome_perfil` varchar(50) NOT NULL,
  `descricao_perfil` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`),
  UNIQUE KEY `nome_perfil` (`nome_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela playpark.perfil: ~3 rows (aproximadamente)
INSERT INTO `perfil` (`id_perfil`, `nome_perfil`, `descricao_perfil`) VALUES
	(1, 'Administrador', 'Acesso completo ao sistema'),
	(2, 'Supervisor', 'Gerencia ocorrências e colaboradores'),
	(3, 'Colaborador', 'Registra e acompanha ocorrências');

-- Copiando estrutura para tabela playpark.prioridade
CREATE TABLE IF NOT EXISTS `prioridade` (
  `id_prioridade` int NOT NULL AUTO_INCREMENT,
  `nome_prioridade` varchar(50) NOT NULL,
  PRIMARY KEY (`id_prioridade`),
  UNIQUE KEY `nome_prioridade` (`nome_prioridade`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela playpark.prioridade: ~3 rows (aproximadamente)
INSERT INTO `prioridade` (`id_prioridade`, `nome_prioridade`) VALUES
	(1, 'Baixa'),
	(2, 'Média'),
	(3, 'Alta');

-- Copiando estrutura para tabela playpark.setor
CREATE TABLE IF NOT EXISTS `setor` (
  `id_setor` int NOT NULL AUTO_INCREMENT,
  `nome_setor` varchar(100) NOT NULL,
  `criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `atualizado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_setor`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela playpark.setor: ~5 rows (aproximadamente)
INSERT INTO `setor` (`id_setor`, `nome_setor`, `criado_em`, `atualizado_em`) VALUES
	(1, 'Administração', '2026-08-27 23:31:45', '2026-09-05 21:16:37'),
	(2, 'Projeto', '2026-08-27 23:31:45', '2026-09-05 17:51:44'),
	(3, 'Corte', '2026-08-27 23:31:45', '2026-09-05 17:51:49'),
	(4, 'Impressão', '2026-08-27 23:31:45', '2026-09-05 17:52:01'),
	(5, 'Produção', '2026-08-27 23:31:45', '2026-09-04 10:27:46');

-- Copiando estrutura para tabela playpark.status
CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int NOT NULL AUTO_INCREMENT,
  `nome_status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_status`),
  UNIQUE KEY `nome_status` (`nome_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela playpark.status: ~4 rows (aproximadamente)
INSERT INTO `status` (`id_status`, `nome_status`) VALUES
	(1, 'Aberta'),
	(2, 'Em andamento'),
	(3, 'Concluída'),
	(4, 'Cancelada');

-- Copiando estrutura para tabela playpark.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(100) NOT NULL,
  `login_usuario` varchar(50) NOT NULL,
  `senha_usuario` varchar(255) NOT NULL,
  `fk_perfil` int NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `criado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `atualizado_em` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `login_usuario` (`login_usuario`),
  KEY `fk_perfil` (`fk_perfil`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`fk_perfil`) REFERENCES `perfil` (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela playpark.usuario: ~3 rows (aproximadamente)
INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `fk_perfil`, `ativo`, `criado_em`, `atualizado_em`) VALUES
	(1, 'Marcelo', 'marcelo', '$2a$12$qpJByu6o.c2F2VFyK092a.DFxf7i.U9.Fzfd8H.s3P41EVR5kpeKe', 1, 1, '2026-08-27 23:31:45', '2026-09-19 12:39:10'),
	(9, 'Costura', 'costura', '$2y$10$p1xyXyjz2aAAJGhC7tLJ3.0s3DEyz0WUmvnp0u6V/gttsIBl7zgD6', 3, 1, '2026-09-08 10:13:39', '2026-09-08 10:13:39'),
	(11, 'Supervisor', 'supervisor', '$2y$10$Juo8WnXeOHigdQ6IM/KQ8.Gqsuhh7wjiXDSre2fiu76jjauhGS4Ly', 2, 1, '2026-09-08 20:56:44', '2026-09-08 20:56:44'),
	(12, 'Gustavo', 'gustavo', '$2y$10$7sq.3KZryIKt1PESraViR.VCJdo6RBoFZmGkShnMXRxTRa8qWiFhO', 1, 1, '2026-09-19 12:40:59', '2026-09-19 12:40:59');

-- Copiando estrutura para view playpark.vw_historico_ocorrencias
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `vw_historico_ocorrencias` (
	`ocorrencia` INT NOT NULL,
	`usuario` VARCHAR(1) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`acao` VARCHAR(1) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`campo` VARCHAR(1) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`anterior` MEDIUMTEXT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`novo` MEDIUMTEXT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`data` DATETIME NOT NULL
);

-- Copiando estrutura para trigger playpark.trg_historico_ocorrencia_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_historico_ocorrencia_delete` AFTER DELETE ON `ocorrencia` FOR EACH ROW BEGIN

    INSERT INTO historico_ocorrencia (
        ocorrencia,
        usuario,
        acao,
        campo,
        anterior,
        novo
    )
    VALUES (
        OLD.id_ocorrencia,
        @usuario_logado,
        'EXCLUSAO',
        NULL,
        'Ocorrência existente',
        'Ocorrência excluída'
    );

END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Copiando estrutura para trigger playpark.trg_historico_ocorrencia_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_historico_ocorrencia_insert` AFTER INSERT ON `ocorrencia` FOR EACH ROW BEGIN

    INSERT INTO historico_ocorrencia (
        ocorrencia,
        usuario,
        acao,
        campo,
        anterior,
        novo
    )
    VALUES (
        NEW.id_ocorrencia,
        @usuario_logado,
        'CRIACAO',
        NULL,
        NULL,
        'Ocorrência criada'
    );

END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Copiando estrutura para trigger playpark.trg_historico_ocorrencia_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_historico_ocorrencia_update` AFTER UPDATE ON `ocorrencia` FOR EACH ROW BEGIN

    -- Ordem de produção
    IF NOT (OLD.ordem_producao <=> NEW.ordem_producao) THEN
        INSERT INTO historico_ocorrencia
            (ocorrencia, usuario, acao, campo, anterior, novo)
        VALUES
            (NEW.id_ocorrencia, @usuario_logado, 'ALTERACAO',
             'Ordem de Produção', OLD.ordem_producao, NEW.ordem_producao);
    END IF;


    -- Descrição
    IF NOT (OLD.descricao_ocorrencia <=> NEW.descricao_ocorrencia) THEN
        INSERT INTO historico_ocorrencia
            (ocorrencia, usuario, acao, campo, anterior, novo)
        VALUES
            (NEW.id_ocorrencia, @usuario_logado, 'ALTERACAO',
             'Descrição', OLD.descricao_ocorrencia, NEW.descricao_ocorrencia);
    END IF;


    -- Solução
    IF NOT (OLD.solucao_ocorrencia <=> NEW.solucao_ocorrencia) THEN
        INSERT INTO historico_ocorrencia
            (ocorrencia, usuario, acao, campo, anterior, novo)
        VALUES
            (NEW.id_ocorrencia, @usuario_logado, 'ALTERACAO',
             'Solução', OLD.solucao_ocorrencia, NEW.solucao_ocorrencia);
    END IF;


    -- Colaborador
    IF NOT (OLD.fk_colaborador <=> NEW.fk_colaborador) THEN
        INSERT INTO historico_ocorrencia
            (ocorrencia, usuario, acao, campo, anterior, novo)
        VALUES
            (NEW.id_ocorrencia, @usuario_logado, 'ALTERACAO',
             'Colaborador', OLD.fk_colaborador, NEW.fk_colaborador);
    END IF;


    -- Brinquedo
    IF NOT (OLD.fk_brinquedo <=> NEW.fk_brinquedo) THEN
        INSERT INTO historico_ocorrencia
            (ocorrencia, usuario, acao, campo, anterior, novo)
        VALUES
            (NEW.id_ocorrencia, @usuario_logado, 'ALTERACAO',
             'Brinquedo', OLD.fk_brinquedo, NEW.fk_brinquedo);
    END IF;


    -- Prioridade
    IF NOT (OLD.fk_prioridade <=> NEW.fk_prioridade) THEN
        INSERT INTO historico_ocorrencia
            (ocorrencia, usuario, acao, campo, anterior, novo)
        VALUES
            (NEW.id_ocorrencia, @usuario_logado, 'ALTERACAO',
             'Prioridade', OLD.fk_prioridade, NEW.fk_prioridade);
    END IF;


    -- Status
    IF NOT (OLD.fk_status <=> NEW.fk_status) THEN
        INSERT INTO historico_ocorrencia
            (ocorrencia, usuario, acao, campo, anterior, novo)
        VALUES
            (NEW.id_ocorrencia, @usuario_logado, 'ALTERACAO',
             'Status', OLD.fk_status, NEW.fk_status);
    END IF;


    -- Setor
    IF NOT (OLD.fk_setor <=> NEW.fk_setor) THEN
        INSERT INTO historico_ocorrencia
            (ocorrencia, usuario, acao, campo, anterior, novo)
        VALUES
            (NEW.id_ocorrencia, @usuario_logado, 'ALTERACAO',
             'Setor', OLD.fk_setor, NEW.fk_setor);
    END IF;

END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_historico_ocorrencias`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vw_historico_ocorrencias` AS select `h`.`ocorrencia` AS `ocorrencia`,`u`.`nome_usuario` AS `usuario`,`h`.`acao` AS `acao`,`h`.`campo` AS `campo`,(case when (`h`.`campo` = 'Status') then (select `s`.`nome_status` from `status` `s` where (`s`.`id_status` = cast(`h`.`anterior` as unsigned))) when (`h`.`campo` = 'Setor') then (select `st`.`nome_setor` from `setor` `st` where (`st`.`id_setor` = cast(`h`.`anterior` as unsigned))) when (`h`.`campo` = 'Brinquedo') then (select `b`.`nome_brinquedo` from `brinquedo` `b` where (`b`.`id_brinquedo` = cast(`h`.`anterior` as unsigned))) when (`h`.`campo` = 'Colaborador') then (select `c`.`nome_colaborador` from `colaborador` `c` where (`c`.`id_colaborador` = cast(`h`.`anterior` as unsigned))) when (`h`.`campo` = 'Prioridade') then (select `p`.`nome_prioridade` from `prioridade` `p` where (`p`.`id_prioridade` = cast(`h`.`anterior` as unsigned))) else `h`.`anterior` end) AS `anterior`,(case when (`h`.`campo` = 'Status') then (select `s`.`nome_status` from `status` `s` where (`s`.`id_status` = cast(`h`.`novo` as unsigned))) when (`h`.`campo` = 'Setor') then (select `st`.`nome_setor` from `setor` `st` where (`st`.`id_setor` = cast(`h`.`novo` as unsigned))) when (`h`.`campo` = 'Brinquedo') then (select `b`.`nome_brinquedo` from `brinquedo` `b` where (`b`.`id_brinquedo` = cast(`h`.`novo` as unsigned))) when (`h`.`campo` = 'Colaborador') then (select `c`.`nome_colaborador` from `colaborador` `c` where (`c`.`id_colaborador` = cast(`h`.`novo` as unsigned))) when (`h`.`campo` = 'Prioridade') then (select `p`.`nome_prioridade` from `prioridade` `p` where (`p`.`id_prioridade` = cast(`h`.`novo` as unsigned))) else `h`.`novo` end) AS `novo`,`h`.`data_alteracao` AS `data` from (`historico_ocorrencia` `h` join `usuario` `u` on((`u`.`id_usuario` = `h`.`usuario`)))
;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;