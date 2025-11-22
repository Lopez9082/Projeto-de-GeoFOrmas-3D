create database app_matematica
    character set utf8mb4
    collate utf8mb4_general_ci;

CREATE TABLE `creditos_projeto` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`tipo` ENUM('orientador','curso','aluno','grupo','instituicao') NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`nome` VARCHAR(200) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`descricao` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`foto_path` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=MyISAM
;


CREATE TABLE `professores` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`email` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`senha` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`criado_em` DATETIME NULL DEFAULT (CURRENT_TIMESTAMP),
	PRIMARY KEY (`id`) USING BTREE,
	UNIQUE INDEX `email` (`email`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=MyISAM
AUTO_INCREMENT=2
;


CREATE TABLE `progresso_usuario` (
	`usuario_id` INT NOT NULL,
	`pontuacao` INT NULL DEFAULT '0',
	`recursos_json` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`atualizado_em` DATETIME NULL DEFAULT (CURRENT_TIMESTAMP) ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`usuario_id`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=MyISAM
;


CREATE TABLE `questoes` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`tema_id` INT NOT NULL,
	`nivel` ENUM('facil','medio','dificil') NULL DEFAULT 'facil' COLLATE 'utf8mb4_unicode_ci',
	`enunciado` TEXT NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`imagem` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`alternativa_a` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`alternativa_b` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`alternativa_c` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`alternativa_d` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`alternativa_e` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`correta` CHAR(1) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`feedback_pedagogico` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`criado_por` INT NULL DEFAULT NULL,
	`criado_em` DATETIME NULL DEFAULT (now()),
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `tema_id` (`tema_id`) USING BTREE,
	INDEX `criado_por` (`criado_por`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=MyISAM
AUTO_INCREMENT=3
;


CREATE TABLE `recuperacao_senha` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`usuario_id` INT NOT NULL,
	`token` VARCHAR(64) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`usado` TINYINT(1) NULL DEFAULT '0',
	`criado_em` DATETIME NULL DEFAULT (CURRENT_TIMESTAMP),
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `usuario_id` (`usuario_id`) USING BTREE,
	INDEX `idx_token` (`token`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=MyISAM
;


CREATE TABLE `temas` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`slug` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`titulo` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE,
	UNIQUE INDEX `slug` (`slug`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=MyISAM
AUTO_INCREMENT=4
;


CREATE TABLE `tentativas` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`usuario_id` INT NOT NULL,
	`questao_id` INT NOT NULL,
	`escolhida` CHAR(1) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`correta` TINYINT(1) NULL DEFAULT '0',
	`pontos` INT NULL DEFAULT '0',
	`criado_em` DATETIME NULL DEFAULT (CURRENT_TIMESTAMP),
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `usuario_id` (`usuario_id`) USING BTREE,
	INDEX `questao_id` (`questao_id`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=MyISAM
;


CREATE TABLE `usuarios` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`email` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`senha_hash` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`papel` ENUM('aluno','professor','licenciado','admin') NULL DEFAULT 'aluno' COLLATE 'utf8mb4_unicode_ci',
	`criado_em` DATETIME NULL DEFAULT (CURRENT_TIMESTAMP),
	PRIMARY KEY (`id`) USING BTREE,
	UNIQUE INDEX `email` (`email`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=MyISAM
AUTO_INCREMENT=2
;
CREATE TABLE `missoes_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `missao_id` int(11) NOT NULL,
  `concluida` tinyint(1) NOT NULL DEFAULT 0,
  `progresso_atual` int(11) NOT NULL DEFAULT 0,
  `progresso_total` int(11) NOT NULL DEFAULT 1,
  `data_inicio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_conclusao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
);
CREATE TABLE `missoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `meta` int(11) NOT NULL,
  `xp_recompensa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);
CREATE TABLE `badges_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `badge_id` int(11) NOT NULL,
  `data_conquista` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);



/* NOVAS ATUALIZAÇÕES */
CREATE TABLE `professores` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`email` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`senha` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`criado_em` DATETIME NULL DEFAULT (CURRENT_TIMESTAMP),
	PRIMARY KEY (`id`) USING BTREE,
	UNIQUE INDEX `email` (`email`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=MyISAM
AUTO_INCREMENT=2
;


CREATE TABLE `progresso_usuario` (
	`usuario_id` INT NOT NULL,
	`xp_total` INT NOT NULL DEFAULT '0',
	`funcionalidades_json` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	PRIMARY KEY (`usuario_id`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=MyISAM
;


CREATE TABLE `questoes` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`tema_id` INT NOT NULL,
	`nivel` ENUM('facil','medio','dificil') NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`enunciado` TEXT NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`imagem` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`alternativa_a` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`alternativa_b` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`alternativa_c` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`alternativa_d` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`alternativa_e` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`correta` CHAR(1) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`feedback_pedagogico` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`criado_por` INT NULL DEFAULT NULL,
	`criado_em` DATETIME NULL DEFAULT (now()),
	`excluida` TINYINT(1) NOT NULL DEFAULT '0',
	`motivo_exclusao` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `tema_id` (`tema_id`) USING BTREE,
	INDEX `criado_por` (`criado_por`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=MyISAM
AUTO_INCREMENT=10
;


CREATE TABLE `temas` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`slug` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`titulo` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE,
	UNIQUE INDEX `slug` (`slug`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=MyISAM
AUTO_INCREMENT=4
;


CREATE TABLE `usuarios` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`email` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`senha` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`papel` ENUM('aluno','professor','licenciado','admin') NULL DEFAULT 'aluno' COLLATE 'utf8mb4_unicode_ci',
	`criado_em` DATETIME NULL DEFAULT (CURRENT_TIMESTAMP),
	PRIMARY KEY (`id`) USING BTREE,
	UNIQUE INDEX `email` (`email`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=MyISAM
AUTO_INCREMENT=3
;
