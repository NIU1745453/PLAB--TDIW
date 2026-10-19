DROP TABLE IF EXISTS linia_comanda;
DROP TABLE IF EXISTS producte;
DROP TABLE IF EXISTS comanda;
DROP TABLE IF EXISTS usuari;
DROP TABLE IF EXISTS categoria;


CREATE TABLE categoria
(
  id_categoria integer GENERATED ALWAYS AS IDENTITY,
  nom          text    NOT NULL,
  descripcio   text   ,
  PRIMARY KEY (id_categoria)
);

CREATE TABLE comanda
(
  id_comanda   integer GENERATED ALWAYS AS IDENTITY,
  id_user      integer NOT NULL,
  data_creacio DATE    NOT NULL,
  PRIMARY KEY (id_comanda)
);

CREATE TABLE linia_comanda
(
  id_linia_comanda integer GENERATED ALWAYS AS IDENTITY,
  id_producte      integer NOT NULL,
  id_comanda       integer NOT NULL,
  quantitat        integer NOT NULL,
  PRIMARY KEY (id_linia_comanda)
);

CREATE TABLE producte
(
  id_producte  integer GENERATED ALWAYS AS IDENTITY,
  nom          text    NOT NULL,
  preu         float   NOT NULL,
  descripcio   text   ,
  imatge       bytea   NOT NULL,
  actiu        BOOLEAN NOT NULL,
  id_categoria integer NOT NULL,
  PRIMARY KEY (id_producte)
);

CREATE TABLE usuari
(
  id_user     integer GENERATED ALWAYS AS IDENTITY,
  nom         text    NOT NULL,
  cognoms     text   ,
  aniversari  DATE   ,
  email       text    NOT NULL,
  password    text    NOT NULL,
  codi_postal NUMERIC,
  direccio    text   ,
  PRIMARY KEY (id_user)
);

ALTER TABLE producte
  ADD CONSTRAINT FK_categoria_TO_producte
    FOREIGN KEY (id_categoria)
    REFERENCES categoria (id_categoria);

ALTER TABLE linia_comanda
  ADD CONSTRAINT FK_producte_TO_linia_comanda
    FOREIGN KEY (id_producte)
    REFERENCES producte (id_producte);

ALTER TABLE linia_comanda
  ADD CONSTRAINT FK_comanda_TO_linia_comanda
    FOREIGN KEY (id_comanda)
    REFERENCES comanda (id_comanda);

ALTER TABLE comanda
  ADD CONSTRAINT FK_usuari_TO_comanda
    FOREIGN KEY (id_user)
    REFERENCES usuari (id_user);

CREATE INDEX idx_linia_comanda
  ON linia_comanda (id_comanda);

CREATE INDEX idx_user_comanda
  ON comanda (id_user);