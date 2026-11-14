

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
(preu, nom, descripcio, imatge, actiu, id_categoria)
VALUES
(50, 'Cravo e canela', 'Espelma perfumada amb olor a clavell', 'https://images.pexels.com/photos/29737853/pexels-photo-29737853.jpeg', TRUE, (SELECT id_categoria FROM categoria WHERE nom = 'Aromàtica')),
(29.50, 'Volkov', 'Espelma sobre vidre amb aroma a herbes aromàtiques', 'https://images.pexels.com/photos/29534199/pexels-photo-29534199.jpeg', TRUE, (SELECT id_categoria FROM categoria WHERE nom = 'Aromàtica')),
(30, 'Espelma Bolovtsova', 'Espelma decorativa', 'https://images.pexels.com/photos/6311869/pexels-photo-6311869.jpeg', TRUE, (SELECT id_categoria FROM categoria WHERE nom = 'Decorativa')),
(49.99, 'Espelma torre Ince', 'Espelma decorativa alta', 'https://images.pexels.com/photos/10883607/pexels-photo-10883607.jpeg', TRUE, (SELECT id_categoria FROM categoria WHERE nom = 'Torre')),
(19.99, 'Sena', 'Espelma color fosc llamatiu', 'https://images.pexels.com/photos/9981052/pexels-photo-9981052.jpeg', TRUE, (SELECT id_categoria FROM categoria WHERE nom = 'Decorativa'));
-- ========================================
-- INSERTS: COMANDA
-- ========================================
-- Els id_user han de coincidir amb usuaris existents.

-- Els ids es busquen per nom/email perquè no depenguin dels valors IDENTITY.
INSERT INTO comanda (data_creacio, id_user)
SELECT d::date, (SELECT id_user FROM usuari WHERE email = 'daria@example.com')
FROM (VALUES ('2026-10-01'), ('2026-10-02'), ('2026-10-03')) AS v(d);

-- ========================================
-- INSERTS: LINIA_COMANDA
-- ========================================
-- n_comanda: 1a, 2a, 3a comanda inserida (per data)

INSERT INTO linia_comanda (id_producte, id_comanda, quantitat)
SELECT p.id_producte, c.id_comanda, v.quantitat
FROM (VALUES
    ('Cravo e canela',     1, 2),
    ('Espelma torre Ince', 1, 1),
    ('Espelma Bolovtsova', 2, 1),
    ('Sena',               2, 3),
    ('Volkov',             3, 1)
) AS v(producte, n_comanda, quantitat)
JOIN producte p ON p.nom = v.producte
JOIN (SELECT id_comanda, row_number() OVER (ORDER BY data_creacio, id_comanda) AS n
      FROM comanda) c ON c.n = v.n_comanda;
