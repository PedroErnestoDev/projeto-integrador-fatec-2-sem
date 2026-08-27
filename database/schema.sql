USE playpark;

CREATE TABLE setor (
    id_setor INT AUTO_INCREMENT PRIMARY KEY,
    nome_setor VARCHAR(100) NOT NULL,
    criado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    atualizado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE prioridade (
    id_prioridade INT AUTO_INCREMENT PRIMARY KEY,
    nome_prioridade VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE status (
    id_status INT AUTO_INCREMENT PRIMARY KEY,
    nome_status VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE perfil (
    id_perfil INT AUTO_INCREMENT PRIMARY KEY,
    nome_perfil VARCHAR(50) NOT NULL UNIQUE,
    descricao_perfil VARCHAR(255)
);

CREATE TABLE brinquedo (
    id_brinquedo INT AUTO_INCREMENT PRIMARY KEY,
    nome_brinquedo VARCHAR(100) NOT NULL,
    codigo_brinquedo VARCHAR(50) NOT NULL UNIQUE,
    brinquedo_ativo BOOLEAN NOT NULL DEFAULT TRUE,
    criado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    atualizado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE colaborador (
    id_colaborador INT AUTO_INCREMENT PRIMARY KEY,
    nome_colaborador VARCHAR(100) NOT NULL,
    fk_setor INT NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT TRUE,
    criado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    atualizado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (fk_setor) REFERENCES setor(id_setor)
);

CREATE TABLE usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(100) NOT NULL,
    login_usuario VARCHAR(50) NOT NULL UNIQUE,
    senha_usuario VARCHAR(255) NOT NULL,
    fk_perfil INT NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT TRUE,
    criado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    atualizado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (fk_perfil) REFERENCES perfil(id_perfil)
);

CREATE TABLE ocorrencia (
    id_ocorrencia INT AUTO_INCREMENT PRIMARY KEY,
    ordem_producao VARCHAR(50),
    descricao_ocorrencia TEXT NOT NULL,
    solucao_ocorrencia TEXT,
    data_abertura DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao DATETIME,
    data_conclusao DATETIME,
    fk_colaborador INT NOT NULL,
    fk_brinquedo INT NOT NULL,
    fk_prioridade INT NOT NULL,
    fk_status INT NOT NULL,
    fk_usuario INT NOT NULL,
    criado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    atualizado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (fk_colaborador) REFERENCES colaborador(id_colaborador),
    FOREIGN KEY (fk_brinquedo) REFERENCES brinquedo(id_brinquedo),
    FOREIGN KEY (fk_prioridade) REFERENCES prioridade(id_prioridade),
    FOREIGN KEY (fk_status) REFERENCES status(id_status),
    FOREIGN KEY (fk_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE encaminhamento (
    id_encaminhamento INT AUTO_INCREMENT PRIMARY KEY,
    fk_setor INT NOT NULL,
    fk_ocorrencia INT NOT NULL,
    criado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    atualizado_em DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (fk_setor) REFERENCES setor(id_setor),
    FOREIGN KEY (fk_ocorrencia) REFERENCES ocorrencia(id_ocorrencia)
);