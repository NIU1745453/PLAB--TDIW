

-- Crear la extensión si todavía no existe
-- Insertar usuario de prueba
INSERT INTO usuari (
    nom,
    cognoms,
    aniversari,
    email,
    codi_postal,
    direccio,
    password
)
VALUES (
    'Daria',
    'Garcia',
    '2000-05-15',
    'daria@example.com',
    08001,
    'Carrer de prova 1',
    '1234'
);

INSERT INTO categoria (nom, descripcio) VALUES
('Aromàtica', 'Espelma aromàtica o perfumada'),
('Decorativa', 'Dissenyada per ser llamativa'),
('Torre', 'Decorativa');

-- ========================================
-- INSERTS: PRODUCTE
-- ========================================

INSERT INTO producte
(preu, nom, descripcio, imatge, actiu,id_categoria)
VALUES
(50, 'Cravo e canela', 'Espelma perfumada amb olor a clavell', 'https://images.pexels.com/photos/29737853/pexels-photo-29737853.jpeg', TRUE, 9),
(29.50, 'Volkov', 'Espelma sobre vidre amb aroma a herbes aromàtiques', 'https://images.pexels.com/photos/29534199/pexels-photo-29534199.jpeg', TRUE, 9),
(30, 'Espelma Bolovtsova', 'Espelma decorativa', 'https://images.pexels.com/photos/6311869/pexels-photo-6311869.jpeg', TRUE, 10),
(49.99, 'Espelma torre Ince', 'Espelma decorativa alta', 'https://images.pexels.com/photos/10883607/pexels-photo-10883607.jpeg', TRUE, 11),
(19.99, 'Sena', 'Espelma color fosc llamatiu', 'https://images.pexels.com/photos/9981052/pexels-photo-9981052.jpeg', TRUE, 10);
-- ========================================
-- INSERTS: COMANDA
-- ========================================
-- Els id_user han de coincidir amb usuaris existents.

INSERT INTO comanda (data_creacio, id_user) VALUES
('2026-10-01', 3),
('2026-10-02', 3),
('2026-10-03', 3);

-- ========================================
-- INSERTS: LINIA_COMANDA
-- ========================================

INSERT INTO linia_comanda
(id_producte, id_comanda, quantitat)
VALUES
(101, 1001, 2),
(104, 1001, 1),
(103, 1002, 1),
(105, 1002, 3),
(102, 1003, 1),
(106, 1003, 2);
