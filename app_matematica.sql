-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           9.1.0 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.11.0.7065
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para app_matematica
CREATE DATABASE IF NOT EXISTS `app_matematica` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `app_matematica`;

-- Copiando estrutura para tabela app_matematica.creditos_projeto
CREATE TABLE IF NOT EXISTS `creditos_projeto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo` enum('orientador','curso','aluno','grupo','instituicao') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci,
  `foto_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela app_matematica.creditos_projeto: 0 rows
/*!40000 ALTER TABLE `creditos_projeto` DISABLE KEYS */;
/*!40000 ALTER TABLE `creditos_projeto` ENABLE KEYS */;

-- Copiando estrutura para tabela app_matematica.professores
CREATE TABLE IF NOT EXISTS `professores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `criado_em` datetime DEFAULT (now()),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela app_matematica.professores: 2 rows
/*!40000 ALTER TABLE `professores` DISABLE KEYS */;
INSERT INTO `professores` (`id`, `nome`, `email`, `senha`, `criado_em`) VALUES
	(1, 'Beatriz', 'xximenes8@gmail.com', '12345', '2025-11-22 21:15:28'),
	(2, 'Jose', 'jose@gmail.com', '123456', '2025-12-05 11:16:37');
/*!40000 ALTER TABLE `professores` ENABLE KEYS */;

-- Copiando estrutura para tabela app_matematica.progresso_usuario
CREATE TABLE IF NOT EXISTS `progresso_usuario` (
  `usuario_id` int NOT NULL,
  `xp_total` int NOT NULL DEFAULT '0',
  `funcionalidades_json` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`usuario_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela app_matematica.progresso_usuario: 1 rows
/*!40000 ALTER TABLE `progresso_usuario` DISABLE KEYS */;
INSERT INTO `progresso_usuario` (`usuario_id`, `xp_total`, `funcionalidades_json`) VALUES
	(1, 1275, '{}'),
	(6, 0, '{}');
/*!40000 ALTER TABLE `progresso_usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela app_matematica.questoes
CREATE TABLE IF NOT EXISTS `questoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tema_id` int NOT NULL,
  `nivel` enum('Ensino Medio','Ensino Fundamental I','Ensino Fundamental II') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enunciado` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternativa_a` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `alternativa_b` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `alternativa_c` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `alternativa_d` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `alternativa_e` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correta` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback_pedagogico` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `criado_por` int DEFAULT NULL,
  `criado_em` datetime DEFAULT (now()),
  `excluida` tinyint(1) NOT NULL DEFAULT '0',
  `motivo_exclusao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `tema_id` (`tema_id`) USING BTREE,
  KEY `criado_por` (`criado_por`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela app_matematica.questoes: 6 rows
/*!40000 ALTER TABLE `questoes` DISABLE KEYS */;
INSERT INTO `questoes` (`id`, `tema_id`, `nivel`, `enunciado`, `imagem`, `alternativa_a`, `alternativa_b`, `alternativa_c`, `alternativa_d`, `alternativa_e`, `correta`, `feedback_pedagogico`, `criado_por`, `criado_em`, `excluida`, `motivo_exclusao`) VALUES
	(1, 4, 'Ensino Fundamental II', '(SPAECE). Na reta numérica abaixo, M e N representam números inteiros.\r\nOs números correspondentes a M e N, são, respectivamente:', '6591a9257c58ee985d5c6d6c14a25e46.jpg', '-3 e 4.', '-3 e 6.', '-6 e 4.', '-6 e 6.', '-6 e 7.', 'D', '', 2, '2025-12-05 12:06:09', 0, NULL),
	(2, 4, 'Ensino Fundamental II', '(SIMAVE). Luísa desenhou uma reta numérica, em que as distâncias entre duas marcas consecutivas são todas iguais. Ela marcou nessa reta um número entre 23 e 63. \r\nO número que Luísa marcou é igual a:', '403264c393eca5a78260fd0a6f649a14.jpg', '27', '39', '40', '43', '50', 'B', '', 2, '2025-12-05 13:31:22', 0, NULL),
	(3, 4, 'Ensino Fundamental II', '(SARESP). Os números –2 e –1 ocupam na reta numérica abaixo as posições indicadas respectivamente pelas letras:', '77a1b22c1f7173909ebc0287834bbaac.jpg', 'P, Q', 'Q, P', 'R, S', 'S, R', 'Q, S', 'A', '', 2, '2025-12-05 13:33:04', 0, NULL),
	(4, 4, 'Ensino Fundamental II', '(PAEBES). Observe a reta numérica abaixo. Ela está dividida em segmentos de mesma medida.\r\nQual é o ponto que melhor representa a localização do número  5/4  nessa reta?', 'bcbf6fc7ba83ff2e01b4c35b6566cfc0.jpg', 'M', 'L', 'K', 'J', 'L, M', 'B', '', 2, '2025-12-05 13:34:27', 0, NULL),
	(5, 4, 'Ensino Fundamental II', '(SAERJ). Veja a reta numérica abaixo.  \r\nO número 33,5 está representado pela letra', NULL, 'P', 'Q', 'R', 'S', 'O, P', 'D', '', 2, '2025-12-05 13:36:37', 0, NULL),
	(6, 4, 'Ensino Fundamental II', '(SARESP). Observe a reta numérica:\r\nA letra K está assinalando o número 132,268. Qual é o número que a letra M está marcando?', '49277f904161c3bc962c67c8f570396c.jpg', '132,280', '132,283', '133,001', '133,300', '133,350', 'D', '', 2, '2025-12-05 13:45:56', 0, NULL);
/*!40000 ALTER TABLE `questoes` ENABLE KEYS */;

-- Copiando estrutura para tabela app_matematica.temas
CREATE TABLE IF NOT EXISTS `temas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela app_matematica.temas: 5 rows
/*!40000 ALTER TABLE `temas` DISABLE KEYS */;
INSERT INTO `temas` (`id`, `slug`, `titulo`) VALUES
	(1, 'geometria', 'Geometria'),
	(2, 'algebra', 'Álgebra'),
	(3, 'estatistica', 'Probabilidade e Estatística'),
	(4, 'numeros', 'Números'),
	(5, 'grandezas', 'Grandezas e Medidas');
/*!40000 ALTER TABLE `temas` ENABLE KEYS */;

-- Copiando estrutura para tabela app_matematica.tentativas
CREATE TABLE IF NOT EXISTS `tentativas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `questao_id` int NOT NULL,
  `escolhida` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correta` tinyint(1) DEFAULT '0',
  `pontos` int DEFAULT '0',
  `criado_em` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `questao_id` (`questao_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela app_matematica.tentativas: 0 rows
/*!40000 ALTER TABLE `tentativas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tentativas` ENABLE KEYS */;

-- Copiando estrutura para tabela app_matematica.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `papel` enum('aluno','professor','licenciado','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'aluno',
  `criado_em` datetime DEFAULT (now()),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela app_matematica.usuarios: 5 rows
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `papel`, `criado_em`) VALUES
	(1, 'bia', 'beatriceximenes13@gmail.com', '12345', 'aluno', '2025-11-23 00:15:54'),
	(3, 'Jose', 'jose@gmail.com', '123456', 'aluno', '2025-11-24 14:19:58'),
	(4, 'Jose', 'milton@gmail.com', '123456', 'aluno', '2025-11-24 14:21:40'),
	(5, 'gfdgdfg', 'admin@gmail.com', '123456', 'aluno', '2025-12-13 23:27:11'),
	(6, 'Fellype', 'fellype@gmail.com', '123456', 'aluno', '2025-12-13 23:33:39');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
