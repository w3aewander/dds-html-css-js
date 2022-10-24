
CREATE IF NOT EXISTS TABLE `usuarios` (   
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,    
    `nome` varchar(50) DEFAULT NULL,   
    `email` varchar(50) NOT NULL,   
    `perfil` enum('admin','professor','aluno') 
    NOT NULL DEFAULT 'aluno',   
    `senha` varchar(255) NOT NULL,   
    `ativo` tinyint(1) DEFAULT '1',   
    ) ;

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

