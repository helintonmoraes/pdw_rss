-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE portal (
id_portal integer PRIMARY KEY,
nm_portal varchar,
email varchar,
site varchar
);

CREATE TABLE noticia (
id_noticia integer PRIMARY KEY,
link varchar,
conteudo text,
titulo varchar,
data date,
gravata varchar,
id_portal integer,
FOREIGN KEY(id_portal) REFERENCES portal (id_portal)
);

CREATE TABLE imagens (
id_imagem integer PRIMARY KEY,
imagem varchar,
destaque boolean,
id_noticia integer,
FOREIGN KEY(id_noticia) REFERENCES noticia (id_noticia)
);

CREATE TABLE comentarios (
id_comentario integer PRIMARY KEY,
comentario text,
email varchar,
id_noticia integer,
FOREIGN KEY(id_noticia) REFERENCES noticia (id_noticia)
);

