

CREATE TABLE admin (
                       id SERIAL  PRIMARY KEY,
                       email VARCHAR(50) UNIQUE NOT NULL,
                       password VARCHAR(100) NOT NULL,
                       nom VARCHAR(50)
);
INSERT INTO admin (email, password, nom)
VALUES ('kotozandry@gmail.com', 'koto', 'jean');

INSERT INTO admin (email, password, nom)
VALUES ('jeandupont@gmail.com', SHA1('dupont'), 'Jean');

CREATE TABLE admin (
                       id SERIAL  PRIMARY KEY,
                       email VARCHAR(50) UNIQUE NOT NULL,
                       password VARCHAR(100) NOT NULL,
                       nom VARCHAR(50)
);
INSERT INTO admin (email, password, nom)
VALUES ('cedibobo@gmail.com', 'bobo', 'cedy');

CREATE TABLE cueilleur (
                           id SERIAL PRIMARY KEY,
                           nom VARCHAR(100) NOT NULL,
                           genre VARCHAR(10) NOT NULL, 
                           date_naissance DATE NOT NULL
);
INSERT INTO cueilleur (nom, genre, date_naissance)
VALUES ('Jean Dupont', 'M', '1990-05-15');

CREATE TABLE variete_the (
                             id SERIAL PRIMARY KEY,
                             nom_variete VARCHAR(100) UNIQUE NOT NULL,
                             occupation_m2 DECIMAL(10,2) NOT NULL 
);
INSERT INTO variete_the (nom_variete, occupation_m2) VALUES ('Thé vert', 1.8);
INSERT INTO variete_the (nom_variete, occupation_m2) VALUES ('Thé noir', 2.0);
INSERT INTO variete_the (nom_variete, occupation_m2) VALUES ('Thé blanc', 1.5);


CREATE TABLE parcelle (
                          id SERIAL PRIMARY KEY,
                          numero_parcelle VARCHAR(20) UNIQUE NOT NULL,
                          surface_hectare DECIMAL(10,2) NOT NULL,
                          variete_the_id INT REFERENCES variete_the(id)
);
INSERT INTO parcelle (numero_parcelle, surface_hectare, variete_the_id) VALUES ('Parcelle A', 2.5, 1);

CREATE TABLE categorie_depense (
            T NULL id SERIAL PRIMARY KEY,
            nom_categorie VARCHAR(100) UNIQUE NO
);
INSERT INTO categorie_depense (nom_categorie) VALUES ('Engrais');
INSERT INTO categorie_depense (nom_categorie) VALUES ('Carburant');
INSERT INTO categorie_depense (nom_categorie) VALUES ('Logistique');


CREATE TABLE saisie_depense (
                                id SERIAL PRIMARY KEY,
                                date_depense DATE NOT NULL,
                                categorie_depense_id INT REFERENCES categorie_depense(id),
                                montant DECIMAL(10, 2) NOT NULL
);

INSERT INTO saisie_depense (date_depense, categorie_depense_id, montant) VALUES ('2024-02-12', 1, 150.00);






CREATE TABLE cueillette (
                            id SERIAL PRIMARY KEY,
                            date_cueillette DATE NOT NULL,
                            cueilleur_id INT REFERENCES cueilleur(id),
                            parcelle_id INT REFERENCES parcelle(id),
                            poids_cueilli DECIMAL(10,2) NOT NULL
);


CREATE VIEW poids_parcelle_view AS
SELECT
    p.id AS parcelle_id,
    p.numero_parcelle,
    p.surface_hectare,
    v.nom_variete AS variete_the,
    v.occupation_m2,
    COALESCE(SUM(c.poids_cueilli), 0)::DECIMAL(10,2) AS poids_cueilli,
        COALESCE((p.surface_hectare * 10000 / v.occupation_m2) - SUM(c.poids_cueilli), (p.surface_hectare * 10000 / v.occupation_m2))::DECIMAL(10,2) AS poids_restant,
        (p.surface_hectare * 10000 / v.occupation_m2)::DECIMAL(10,2) AS poids_disponible
FROM
    parcelle p
        JOIN
    variete_the v ON p.variete_the_id = v.id
        LEFT JOIN
    cueillette c ON p.id = c.parcelle_id
GROUP BY
    p.id, p.numero_parcelle, p.surface_hectare, v.nom_variete, v.occupation_m2;


CREATE TABLE cueilleur (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    genre VARCHAR(10) NOT NULL,
    
    date_naissance DATE NOT NULL
);

INSERT INTO
    cueilleur (nom, genre, date_naissance)
VALUES
    ('Jean Dupont', 'M', '1990-05-15');

CREATE TABLE variete_the (
    id SERIAL PRIMARY KEY,
    nom_variete VARCHAR(100) UNIQUE NOT NULL,
    occupation_m2 DECIMAL(10, 2) NOT NULL 
);

INSERT INTO
    variete_the (nom_variete, occupation_m2)
VALUES
    ('Thé vert', 1.8);

INSERT INTO
    variete_the (nom_variete, occupation_m2)
VALUES
    ('Thé noir', 2.0);

INSERT INTO
    variete_the (nom_variete, occupation_m2)
VALUES
    ('Thé blanc', 1.5);


CREATE TABLE parcelle (
    id SERIAL PRIMARY KEY,
    numero_parcelle VARCHAR(20) UNIQUE NOT NULL,
    surface_hectare DECIMAL(10, 2) NOT NULL,
    variete_the_id INT REFERENCES variete_the(id),
    poids DECIMAL(10,2)
);

CREATE table rendement(
    id_rendement SERIAL PRIMARY,
    mois date,
    id_variete_the INT REFERENCES variethe_the(id),
    id_parcelle INT REFERENCES parcelle(id),
    poids DECIMAL(10,2)
);

create table resultat(
    id_resultat SERIAL PRIMARY,

);
INSERT INTO
    parcelle (numero_parcelle, surface_hectare, variete_the_id)
VALUES
    ('Parcelle A', 3.5, 1),
    ('Parcelle B', 4.5, 2),
    ('Parcelle C', 1.5, 3),
    ('Parcelle D', 3.5, 4);

CREATE TABLE categorie_depense (
    id SERIAL PRIMARY KEY,
    nom_categorie VARCHAR(100) UNIQUE NOT NULL
);

INSERT INTO
    categorie_depense (nom_categorie)
VALUES
    ('Engrais');

INSERT INTO
    categorie_depense (nom_categorie)
VALUES
    ('Carburant');

INSERT INTO
    categorie_depense (nom_categorie)
VALUES
    ('Logistique');

CREATE TABLE saisie_depense (
    id SERIAL PRIMARY KEY,
    date_depense DATE NOT NULL,
    categorie_depense_id INT REFERENCES categorie_depense(id),
    montant DECIMAL(10, 2) NOT NULL
);

INSERT INTO
    saisie_depense (date_depense, categorie_depense_id, montant)
VALUES
    ('2024-02-12', 1, 150.00),
    ('2024-02-13', 2, 250.00),
    ('2024-02-14', 3, 350.00);


CREATE TABLE cueillette (
    id SERIAL PRIMARY KEY,
    date_cueillette DATE NOT NULL,
    cueilleur_id INT REFERENCES cueilleur(id),
    parcelle_id INT REFERENCES parcelle(id),
    poids_cueilli DECIMAL(10, 2) NOT NULL
);

CREATE TABLE mois_regeneration (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_variete_the INT,
    mois VARCHAR(20) NOT NULL
);


INSERT INTO cueillette (date_cueillette, cueilleur_id, parcelle_id, poids_cueilli) VALUES ('2024-02-12', 1, 1, 20.5);
INSERT INTO cueillette (date_cueillette, cueilleur_id, parcelle_id, poids_cueilli) VALUES ('2024-02-13', 1, 2, 10.5);
INSERT INTO cueillette (date_cueillette, cueilleur_id, parcelle_id, poids_cueilli) VALUES ('2024-02-14', 1, 3, 30.5);

CREATE VIEW poids_parcelle_view AS
WITH RECURSIVE months AS (
    SELECT 1 AS month
    UNION ALL
    SELECT month + 1
    FROM months
    WHERE month < 12
),
years AS (
    SELECT DISTINCT EXTRACT(YEAR FROM date_cueillette) AS year
    FROM cueillette
)
SELECT
    p.id AS parcelle_id,
    p.numero_parcelle,
    p.surface_hectare,
    vt.nom_variete AS variete_the,
    vt.occupation_m2,
    COALESCE(SUM(c.poids_cueilli), 0) AS poids_cueilli,
    CAST(
        (p.surface_hectare * 10000 / vt.occupation_m2) - COALESCE(SUM(c.poids_cueilli), 0) AS DECIMAL(10, 2)
    ) AS poids_restant,
    CAST(
        (p.surface_hectare * 10000 / vt.occupation_m2) AS DECIMAL(10, 2)
    ) AS poids_disponible,
    y.year,
    m.month
FROM
    months m
CROSS JOIN
    years y
JOIN
    parcelle p ON 1=1
JOIN
    variete_the vt ON p.variete_the_id = vt.id
LEFT JOIN
    cueillette c ON p.id = c.parcelle_id AND EXTRACT(YEAR FROM c.date_cueillette) = y.year AND EXTRACT(MONTH FROM c.date_cueillette) = m.month
GROUP BY
    p.id,
    p.numero_parcelle,
    p.surface_hectare,
    vt.nom_variete,
    vt.occupation_m2,
    y.year,
    m.month;



CREATE VIEW liste_saisie_depense AS
SELECT
    sd.id AS id_saisie_depense,
    sd.date_depense,
    cd.nom_categorie AS categorie_depense,
    sd.montant
FROM
    saisie_depense sd
    JOIN categorie_depense cd ON sd.categorie_depense_id = cd.id;

CREATE VIEW info_parcelle AS
SELECT
    p.id AS parcelle_id,
    p.numero_parcelle,
    p.surface_hectare,
    vt.nom_variete AS variete_the,
    vt.occupation_m2
FROM
    parcelle p
    JOIN variete_the vt ON p.variete_the_id = vt.id;

CREATE VIEW info_cueillette AS
SELECT
    c.id AS cueillette_id,
    c.date_cueillette,
    cu.nom AS nom_cueilleur,
    p.numero_parcelle,
    p.surface_hectare,
    vt.nom_variete AS variete_the,
    vt.occupation_m2,
    c.poids_cueilli
FROM
    cueillette c
    JOIN cueilleur cu ON c.cueilleur_id = cu.id
    JOIN parcelle p ON c.parcelle_id = p.id
    JOIN variete_the vt ON p.variete_the_id = vt.id;    