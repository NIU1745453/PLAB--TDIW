

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
('Electrònica', 'Dispositius electrònics'),
('Informàtica', 'Ordinadors i perifèrics'),
('Accessoris', 'Accessoris tecnològics'),
('Videojocs', 'Jocs i consoles');

-- ========================================
-- INSERTS: PRODUCTE
-- ========================================

INSERT INTO producte
(preu, nom, descripcio, imatge, actiu,id_categoria)
VALUES
(299.99, 'Auriculars Bluetooth', 'Auriculars sense fils', 'dawd', TRUE, 9),
(599.99, 'Smartphone', 'Telefon intel·ligent', 'dawd', TRUE, 10),
(899.99, 'Portatil', 'Ordinador portatil', 'dawd', TRUE, 11),
(49.99, 'Ratoli gaming', 'Ratoli per jugar', 'dawd', TRUE, 12),
(19.99, 'Alfombreta', 'Alfombreta per al ratoli', 'dawd', TRUE, 12),
(69.99, 'Videojoc', 'Joc per a consola', 'dawd', TRUE, 9);

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
