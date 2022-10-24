-- Active: 1665153721659@@127.0.0.1@3306@dds311
create DATABASE IF NOT EXISTS "dds311";

drop table if exists `dds311`.`usuarios`;

create table `dds311`.`usuarios`(
    id int not null primary key auto_increment,
    nome varchar(50),
    email varchar(50) not null,
    perfil enum('admin','professor','aluno') not null default  'aluno', 
    senha varchar(255) not null,
    ativo boolean default TRUE
);

insert into `dds311`.`usuarios`(id, nome, email, perfil, senha)
values(0, 'Wanderlei Silva do Carmo', 'wander.silva@gmail.com', 'admin', '$2y$10$LDBR.kfYL4YXWCAPFjFIWuF8Hd8wQAEyZhvlA3VCKosJGRHW17cqS');


create table if not exists `dds311`.`contatos`(
    id int not null primary key auto_increment,
    nome varchar(50) not null,
    email varchar(50) not null,
    assunto varchar(30) not null,
    mensagem varchar(255),
    created_at timestamp not null default CURRENT_TIMESTAMP,
    updated_at datetime 
);

select id,email,senha from usuarios;




CREATE IF NOT EXISTS TABLE `usuarios` (   
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,    
    `nome` varchar(50) DEFAULT NULL,   
    `email` varchar(50) NOT NULL,   
    -- `perfil_id` int null null, 
    `perfil` enum('admin','professor','aluno') 
    NOT NULL DEFAULT 'aluno',   
    `senha` varchar(255) NOT NULL,   
    `ativo` tinyint(1) DEFAULT '1',   
    ) ;

ALTER TABLE usuarios
ADD COLUMN perfil_id int not null after email;

ALTER TABLE usuarios 
ADD CONSTRAINT fk_usuario_perfil_id Foreign Key (perfil_id) REFERENCES perfis(id);


CREATE TABLE IF NOT EXISTS modulos (  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    descricao varchar(50) not null
) COMMENT 'módulos';

CREATE TABLE IF NOT EXISTS telas (  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    descricao varchar(50) not null,
    url varchar(50), 
    modulo_id int not null
) COMMENT 'gestão de telas do sistema';

-- especificando a chave primaria
ALTER TABLE telas 
ADD CONSTRAINT `fk_tela_modulos` 
FOREIGN KEY(modulo_id) 
REFERENCES modulos(id);

CREATE TABLE IF NOT EXISTS modulos_telas (  
    modulo_id int not null, 
    tela_id int not null,
    primary key(modulo_id, tela_id)
) COMMENT 'módulos';

-- não especificando a chave primaria
ALTER TABLE modulos_telas
ADD FOREIGN KEY(modulo_id) REFERENCES modulos(id),
ADD FOREIGN KEY(tela_id) REFERENCES telas(id);


CREATE TABLE IF NOT EXISTS perfis (

    id int not null primary key auto_increment,
    nome varchar(20) not null

);

CREATE TABLE IF NOT EXISTS perfis_modulos (
  perfil_id int not null,
  modulo_id int not null,
  primary key (perfil_id, modulo_id)
);

ALTER TABLE perfis_modulos 
ADD constraint fk_perfis_modulos_perfil_idForeign Key (perfil_id) REFERENCES perfis (id),
ADD constraint fk_perfis_modulos_modulo_id Foreign Key (modulo_id) REFERENCES modulos(id);


INSERT INTO perfis (nome) values ('admin'), ('professor'), ('aluno');

SELECT * FROM perfis;

SELECT * FROM usuarios;
UPDATE usuarios SET perfil_id = 1 WHERE id = 1;

SELECT u.id, u.nome, p.nome FROM usuarios u
INNER JOIN perfis p
ON u.perfil_id = p.id; 
