DROP VIEW IF EXISTS vista_comanda;
DROP VIEW IF EXISTS user_login;

CREATE OR REPLACE VIEW vista_comanda AS
SELECT
    c.id_comanda,
    c.data_creacio,
    c.id_user,
    COALESCE(SUM(p.preu * lc.quantitat), 0) AS total -- El COALESCE retorna el valor de la suma si no és NULL, si ho és retorna 0.
FROM comanda c
LEFT JOIN linia_comanda lc
    ON c.id_comanda = lc.id_comanda
LEFT JOIN producte p
    ON lc.id_producte = p.id_producte
GROUP BY
    c.id_comanda,
    c.data_creacio,
    c.id_user;

CREATE OR REPLACE VIEW user_login AS
SELECT
    u.id_user,
    u.email
FROM usuari u;
