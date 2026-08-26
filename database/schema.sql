SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;


CREATE TABLE setor (
    id_setor INT AUTO_INCREMENT PRIMARY KEY,
    nome_setor VARCHAR(100) NOT NULL,
    criado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    atualizado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_setor_nome (nome_setor)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE prioridade (
    id_prioridade INT AUTO_INCREMENT PRIMARY KEY,
    nome_prioridade VARCHAR(50) NOT NULL,
    UNIQUE KEY uk_prioridade_nome (nome_prioridade)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE status (
    id_status INT AUTO_INCREMENT PRIMARY KEY,
    nome_status VARCHAR(50) NOT NULL,
    UNIQUE KEY uk_status_nome (nome_status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE perfil (
    id_perfil INT AUTO_INCREMENT PRIMARY KEY,
    nome_perfil VARCHAR(50) NOT NULL,
    descricao_perfil VARCHAR(255) NULL,
    UNIQUE KEY uk_perfil_nome (nome_perfil)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE brinquedo (
    id_brinquedo INT AUTO_INCREMENT PRIMARY KEY,
    nome_brinquedo VARCHAR(100) NOT NULL,
    codigo_brinquedo VARCHAR(50) NOT NULL,
    brinquedo_ativo BOOLEAN NOT NULL DEFAULT TRUE,
    criado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    atualizado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY uk_brinquedo_codigo (codigo_brinquedo),
    INDEX idx_brinquedo_nome (nome_brinquedo),
    INDEX idx_brinquedo_ativo (brinquedo_ativo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE colaborador (
    id_colaborador INT AUTO_INCREMENT PRIMARY KEY,
    nome_colaborador VARCHAR(100) NOT NULL,
    fk_setor INT NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT TRUE,
    criado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    atualizado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_colaborador_nome (nome_colaborador),
    INDEX idx_colaborador_ativo (ativo),
    CONSTRAINT fk_colaborador_setor FOREIGN KEY (fk_setor) REFERENCES setor (id_setor)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(100) NOT NULL,
    login_usuario VARCHAR(50) NOT NULL,
    senha_usuario VARCHAR(255) NOT NULL,
    fk_perfil INT NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT TRUE,
    criado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    atualizado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY uk_usuario_login (login_usuario),
    INDEX idx_usuario_ativo (ativo),
    CONSTRAINT fk_usuario_perfil FOREIGN KEY (fk_perfil) REFERENCES perfil (id_perfil)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE ocorrencia (
    id_ocorrencia INT AUTO_INCREMENT PRIMARY KEY,
    ordem_producao VARCHAR(50) NULL,
    descricao_ocorrencia TEXT NOT NULL,
    solucao_ocorrencia TEXT NULL,
    data_abertura DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao DATETIME NULL,
    data_conclusao DATETIME NULL,
    fk_colaborador INT NOT NULL,
    fk_brinquedo INT NOT NULL,
    fk_prioridade INT NOT NULL,
    fk_status INT NOT NULL,
    fk_usuario INT NOT NULL,
    criado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    atualizado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_ocorrencia_ordem (ordem_producao),
    INDEX idx_ocorrencia_data_abertura (data_abertura),
    CONSTRAINT fk_ocorrencia_colaborador FOREIGN KEY (fk_colaborador) REFERENCES colaborador (id_colaborador),
    CONSTRAINT fk_ocorrencia_brinquedo FOREIGN KEY (fk_brinquedo) REFERENCES brinquedo (id_brinquedo),
    CONSTRAINT fk_ocorrencia_prioridade FOREIGN KEY (fk_prioridade) REFERENCES prioridade (id_prioridade),
    CONSTRAINT fk_ocorrencia_status FOREIGN KEY (fk_status) REFERENCES status (id_status),
    CONSTRAINT fk_ocorrencia_usuario FOREIGN KEY (fk_usuario) REFERENCES usuario (id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE encaminhamento (
    id_encaminhamento INT AUTO_INCREMENT PRIMARY KEY,
    fk_setor INT NOT NULL,
    fk_ocorrencia INT NOT NULL,
    criado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    atualizado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_encaminhamento_ocorrencia (fk_ocorrencia),
    CONSTRAINT fk_encaminhamento_setor FOREIGN KEY (fk_setor) REFERENCES setor (id_setor),
    CONSTRAINT fk_encaminhamento_ocorrencia FOREIGN KEY (fk_ocorrencia) REFERENCES ocorrencia (id_ocorrencia)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


SET FOREIGN_KEY_CHECKS = 1;