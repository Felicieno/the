
create database the;
CREATE TABLE admin (
                       id SERIAL  PRIMARY KEY,
                       email VARCHAR(50) UNIQUE NOT NULL,
                       password VARCHAR(100) NOT NULL,
                       nom VARCHAR(50)
);
INSERT INTO admin (email, password, nom)
VALUES ('kotozandry@gmail.com', 'koto', 'jean');
-- Exemple d'insertion d'une nouvelle ligne dans la table admin
INSERT INTO admin (email, password, nom)
VALUES ('jeandupont@gmail.com', SHA1('dupont'), 'Jean');

-- La table "cueilleur" contient les informations sur les cueilleurs. Chaque cueilleur a un identifiant unique, un nom, un genre (par exemple, "M" pour masculin et "F" pour féminin) et une date de naissance.
CREATE TABLE cueilleur (
                           id SERIAL PRIMARY KEY,
                           nom VARCHAR(100) NOT NULL,
                           genre VARCHAR(10) NOT NULL, -- Vous pouvez utiliser "M" pour masculin et "F" pour féminin par exemple
                           date_naissance DATE NOT NULL
);
INSERT INTO cueilleur (nom, genre, date_naissance)
VALUES ('Jean Dupont', 'M', '1990-05-15');

-- La colonne "id" est un identifiant unique pour chaque variété de thé, généré automatiquement.
-- La colonne "nom_variete" stocke le nom de la variété de thé. Cette colonne est définie comme UNIQUE pour s'assurer qu'aucune variété de thé n'est dupliquée dans la base de données.
-- La colonne "occupation_m2" représente la quantité d'espace (en mètres carrés) qu'un pied de cette variété de thé occupe lorsqu'il est planté.
CREATE TABLE variete_the (
                             id SERIAL PRIMARY KEY,
                             nom_variete VARCHAR(100) UNIQUE NOT NULL,
                             occupation_m2 DECIMAL(10,2) NOT NULL -- En mètres carrés
);
INSERT INTO variete_the (nom_variete, occupation_m2) VALUES ('Thé vert', 1.8);
INSERT INTO variete_the (nom_variete, occupation_m2) VALUES ('Thé noir', 2.0);
INSERT INTO variete_the (nom_variete, occupation_m2) VALUES ('Thé blanc', 1.5);


-- La colonne "id" est un identifiant unique pour chaque parcelle, généré automatiquement.
-- La colonne "numero_parcelle" stocke le numéro de la parcelle. Cette colonne est définie comme UNIQUE pour s'assurer qu'aucun numéro de parcelle n'est dupliqué dans la base de données.
-- La colonne "surface_hectare" représente la surface de la parcelle en hectares.
-- La colonne "variete_the_id" est une clé étrangère faisant référence à l'identifiant de la variété de thé plantée dans cette parcelle, provenant de la table "variete_the".
CREATE TABLE parcelle (
                          id SERIAL PRIMARY KEY,
                          numero_parcelle VARCHAR(20) UNIQUE NOT NULL,
                          surface_hectare DECIMAL(10,2) NOT NULL,
                          variete_the_id INT REFERENCES variete_the(id)
);
-- Supposons que la variété de thé vert ait l'identifiant 1 dans la table variete_the
INSERT INTO parcelle (numero_parcelle, surface_hectare, variete_the_id) VALUES ('Parcelle A', 2.5, 1);

-- La colonne "id" est un identifiant unique pour chaque catégorie de dépenses, généré automatiquement.
-- La colonne "nom_categorie" stocke le nom de la catégorie de dépenses. Cette colonne est définie comme UNIQUE pour s'assurer qu'aucune catégorie de dépenses n'est dupliquée dans la base de données.
CREATE TABLE categorie_depense (
            T NULL id SERIAL PRIMARY KEY,
            nom_categorie VARCHAR(100) UNIQUE NO
);
INSERT INTO categorie_depense (nom_categorie) VALUES ('Engrais');
INSERT INTO categorie_depense (nom_categorie) VALUES ('Carburant');
INSERT INTO categorie_depense (nom_categorie) VALUES ('Logistique');


-- La colonne "id" est un identifiant unique pour chaque saisie de dépense, généré automatiquement.
-- La colonne "date_depense" stocke la date à laquelle la dépense a été effectuée.
-- La colonne "categorie_depense_id" est une clé étrangère faisant référence à l'identifiant de la catégorie de dépense associée, provenant de la table "categorie_depense".
-- La colonne "montant" stocke le montant de la dépense.
CREATE TABLE saisie_depense (
                                id SERIAL PRIMARY KEY,
                                date_depense DATE NOT NULL,
                                categorie_depense_id INT REFERENCES categorie_depense(id),
                                montant DECIMAL(10, 2) NOT NULL
);
-- Supposons que la catégorie de dépense "Engrais" ait l'identifiant 1 dans la table categorie_depense
INSERT INTO saisie_depense (date_depense, categorie_depense_id, montant) VALUES ('2024-02-12', 1, 150.00);





-- Occupation de la variété de thé : L'occupation de la variété de thé vous indique combien de surface une plante de thé occupe dans la parcelle.
-- Par exemple, si une variété de thé occupe 1,8 mètres carrés par pied, cela signifie qu'un pied de cette variété de thé occupe 1,8 mètres carrés de la parcelle.

-- Surface de la parcelle : La surface de la parcelle vous indique combien de mètres carrés au total la parcelle a.

-- En combinant ces deux informations, vous pouvez estimer la capacité maximale de la parcelle à produire des feuilles de thé.
-- Par exemple, si une parcelle a une surface de 100 mètres carrés et que la variété de thé plantée occupe 1,8 mètres carrés par pied, alors vous pouvez estimer qu'il y a potentiellement 55,56 (100 / 1,8) pieds de thé sur cette parcelle.

-- Lorsque vous saisissez une cueillette, vous pouvez comparer le poids de cueillette demandé avec le poids de feuille restant sur la parcelle en fonction de cette estimation.
-- Si le poids de cueillette demandé est supérieur au poids de feuille restant sur la parcelle, cela signifie que la quantité demandée dépasse la capacité de production estimée de la parcelle avec les pieds de thé actuellement plantés.

-- Ainsi, la validation du poids de cueillette par rapport au poids de feuille restant sur la parcelle prend en compte à la fois l'occupation
-- de la variété de thé et la surface de la parcelle pour assurer que la cueillette ne dépasse pas la capacité de production estimée de la parcelle.

CREATE TABLE cueillette (
                            id SERIAL PRIMARY KEY,
                            date_cueillette DATE NOT NULL,
                            cueilleur_id INT REFERENCES cueilleur(id),
                            parcelle_id INT REFERENCES parcelle(id),
                            poids_cueilli DECIMAL(10,2) NOT NULL
);


-- Vous pourrez ensuite interroger cette vue pour obtenir le poids cueilli, le poids restant et le poids disponible de chaque parcelle.
-- Cette vue vous donnera une vue d'ensemble pratique de l'état de chaque parcelle et vous permettra de prendre des décisions éclairées concernant la cueillette.
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


-- Dans le résultat donné :

-- "parcelle_id" : Il s'agit de l'identifiant unique de la parcelle.
-- "numero_parcelle" : C'est le numéro de la parcelle.
-- "surface_hectare" : C'est la surface de la parcelle en hectares.
-- "variete_the" : C'est le nom de la variété de thé plantée dans la parcelle.
-- "occupation_m2" : C'est la quantité d'espace (en mètres carrés) qu'un pied de la variété de thé occupe dans la parcelle.
-- "poids_cueilli" : C'est le poids total de feuilles de thé cueillies dans la parcelle jusqu'à présent.
-- "poids_restant" : C'est le poids estimé de feuilles de thé restant à cueillir sur la parcelle, calculé en soustrayant le poids cueilli total de la capacité totale de la parcelle (surface en hectares multipliée par l'occupation en mètres carrés par pied de thé).
-- "poids_disponible" : C'est le poids total de feuilles de thé disponible à cueillir sur la parcelle, basé sur la capacité totale de la parcelle (surface en hectares multipliée par l'occupation en mètres carrés par pied de thé).
-- Dans cet exemple spécifique :

-- La parcelle avec l'identifiant 1 (parcelle_id) a le numéro "Parcelle A" et une surface de 2,5 hectares (surface_hectare).
-- La variété de thé plantée dans cette parcelle est "Thé vert" (variete_the) et chaque pied de cette variété occupe 1,8 mètres carrés (occupation_m2).
-- Jusqu'à présent, aucun poids de feuilles de thé n'a été cueilli dans cette parcelle, donc le poids cueilli est null.
-- Le poids restant à cueillir est calculé comme la capacité totale de la parcelle (2,5 hectares * 10000 / 1,8 mètres carrés par pied) moins le poids cueilli, ce qui donne 13888,888888888889.
-- Le poids disponible à cueillir est simplement la capacité totale de la parcelle, donc 13888,888888888889.
CREATE TABLE cueilleur (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    genre VARCHAR(10) NOT NULL,
    -- Vous pouvez utiliser "M" pour masculin et "F" pour féminin par exemple
    date_naissance DATE NOT NULL
);

INSERT INTO
    cueilleur (nom, genre, date_naissance)
VALUES
    ('Jean Dupont', 'M', '1990-05-15');

-- La colonne "id" est un identifiant unique pour chaque variété de thé, généré automatiquement.
-- La colonne "nom_variete" stocke le nom de la variété de thé. Cette colonne est définie comme UNIQUE pour s'assurer qu'aucune variété de thé n'est dupliquée dans la base de données.
-- La colonne "occupation_m2" représente la quantité d'espace (en mètres carrés) qu'un pied de cette variété de thé occupe lorsqu'il est planté.
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