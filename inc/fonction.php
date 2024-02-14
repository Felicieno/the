<?php

function connectDB() {
    $servername = "localhost";
    $username = "ETU002677";
    $password = "vPT14Lucijvp";
    $dbname = "db_p16_ETU002677";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    return $conn;
}

function checkadmin($conn, $email, $password) {
    $sql = "SELECT * FROM admin WHERE email='$email' AND password=('$password')";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        return 1;
    } else {
        return 0;
    }
}

function checkuser($conn, $email, $password) {
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        return 1;
    } else {
        return 0;
    }
}

function variete($conn, $nom){
    // Préparation de la requête
    $stmt = $conn->prepare("SELECT * FROM variete_the WHERE nom_variete = ?");
    $stmt->bind_param("s", $nom);
    $stmt->execute();
    $stmt->bind_result($idvariete, $nom_variete, $occupation_m2, $rendement);

    // Récupération des résultats
    $variety = array();
    if ($stmt->fetch()) {
        $variety['idvariete'] = $idvariete;
        $variety['nom_variete'] = $nom_variete;
        $variety['occupation_m2'] = $occupation_m2;
        $variety['rendement'] = $rendement;
    }

    return $variety;
}


function insertIntoTable($conn, $table, $data) {
    $keys = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    $sql = "INSERT INTO $table ($keys) VALUES ($values)";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}



function registerDepense($conn, $Datedepense, $categorieDepense_id, $montant) {

    // Préparation de la requête
    $stmt = $conn->prepare("INSERT INTO saisie_depense (date_depense, categorie_depense_id, montant) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $Datedepense, $categorieDepense_id, $montant);

    // Exécution de la requête
    if ($stmt->execute()) {
        return 1;
    } else {
        return 0;
    }
}

function getregisterDepense($conn)
{
    $sql = "SELECT * FROM saisie_depense";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Tableau pour stocker les résultats
        $data = array();

        // Boucle à travers les résultats
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    } else {
        // Aucune ligne trouvée
        return null;
    }
}

function getCueillette($conn)
{
    $sql = "SELECT * FROM cueillette";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Tableau pour stocker les résultats
        $data = array();

        // Boucle à travers les résultats
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    } else {
        // Aucune ligne trouvée
        return null;
    }
}

function getCueilleur($conn)
{
    $sql = "SELECT * FROM cueilleur";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Tableau pour stocker les résultats
        $data = array();

        // Boucle à travers les résultats
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    } else {
        // Aucune ligne trouvée
        return null;
    }
}

function getParcelle($conn)
{
    $sql = "SELECT * FROM parcelle";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Tableau pour stocker les résultats
        $data = array();

        // Boucle à travers les résultats
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    } else {
        // Aucune ligne trouvée
        return null;
    }
}

function getVariete($conn)
{
    $sql = "SELECT * FROM variete_the";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Tableau pour stocker les résultats
        $data = array();

        // Boucle à travers les résultats
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    } else {
        // Aucune ligne trouvée
        return null;
    }
}


function getDepense($conn) {
    // Préparation de la requête
    $sql = "SELECT * FROM categorie_depense";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Tableau pour stocker les résultats
        $data = array();

        // Boucle à travers les résultats
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    } else {
        // Aucune ligne trouvée
        return null;
    }
}


function insertDepense($conn, $nom) {
    // Préparation de la requête
    $stmt = $conn->prepare("INSERT INTO categorie_depense (nom_categorie) VALUES (?)");

    // Vérification de la préparation de la requête
    if ($stmt === false) {
        die("Erreur de préparation de la requête");
    }

    // Liaison des paramètres
    $stmt->bind_param("s", $nom);

    // Exécution de la requête
    $result = $stmt->execute();

    // Vérification de l'exécution de la requête
    if ($result === false) {
        die("Erreur lors de l'exécution de la requête");
    }

    // Fermeture du statement
    $stmt->close();

    return 1;
}



function startSession() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function createCookie($name, $value, $expiration) {
    setcookie($name, $value, time() + $expiration, "/");
}

function sendEmail($to, $subject, $message) {
    mail($to, $subject, $message);
}

function convm2($ha)
{
    $result = $ha * 10000;
    return $result;
}

function convpied($m2)
{
    $result = $m2/1.82;
    return $result;
}

function selectionner_cueilleurs($connexion)
{
  $query = "SELECT * FROM cueilleur";
  $resultat = $connexion->query($query);
  $cueilleurs = array();
  if ($resultat->num_rows > 0) {
    while ($row = $resultat->fetch_assoc()) {
      $cueilleurs[] = $row;
    }
  }
  return $cueilleurs;
}

function inserer_cueilleur($connexion, $nom, $genre, $date_naissance)
{
    $query = $connexion->prepare("INSERT INTO cueilleur (nom, genre, date_naissance) VALUES (?, ?, ?)");
    $query->bind_param("sss", $nom, $genre, $date_naissance);
    $query->execute();
    $query->close();
}

function inserer_variete($connexion, $nom_variete, $occupation)
{
    $query = $connexion->prepare("INSERT INTO variete_the (nom_variete, occupation_m2) VALUES (?, ?)");
    $query->bind_param("sd", $nom_variete, $occupation);
    $query->execute();
    $query->close();
}


function selectionner_parcelles($connexion)
{
  $query = "SELECT parcelle.id, parcelle.numero, parcelle.surface, the.id AS id_the, the.nom AS nom_the, parcelle.plantation
            FROM parcelle
            JOIN the ON parcelle.the = the.id";
  $resultat = $connexion->query($query);
  $parcelles = array();
  if ($resultat->num_rows > 0) {
    while ($row = $resultat->fetch_assoc()) {
      $parcelles[] = $row;
    }
  }
  return $parcelles;
}

function inserer_parcelle($connexion, $numero, $surface, $variete)
{
    // Calcul du poids
    $poids = 1 * $surface * 1000 / 1.8;

    // Préparation de la requête
    $query = $connexion->prepare("INSERT INTO parcelle (numero_parcelle, surface_hectare, variete_the_id, poids) VALUES (?, ?, ?, ?)");

    // Liaison des paramètres
    $query->bind_param("sdsd", $numero, $surface, $variete, $poids);

    // Exécution de la requête
    $query->execute();

    // Fermeture de la requête
    $query->close();
}


function duree_plantation_parcelle($connexion, $id_parcelle, $date_limite)
{
  $query = $connexion->prepare("SELECT DATEDIFF(?, plantation) / 30 AS duree_en_mois FROM parcelle WHERE id = ?");
  $query->bind_param("si", $date_limite, $id_parcelle);
  $query->execute();
  $result = $query->get_result();
  $row = $result->fetch_assoc();
  $query->close();
  return $row['duree_en_mois'];
}

function obtenirPoidsParcelleVariete($conn, $parcelle_id, $variete_id) {
  $query = $conn->prepare("SELECT poids FROM parcelle WHERE id = ? AND variete_the_id = ?");
  $query->bind_param("ii", $parcelle_id, $variete_id);
  $query->execute();
  $query->bind_result($poids);

  if ($query->fetch()) {
      $query->close();
      return $poids;
  } else {
      $query->close();
      return false;
  }
}

function production_mensuelle($connexion, $id_parcelle)
{
  $query = "
    SELECT
      (parcelle.surface * 10000 / the.occupation) * the.rendement AS nombre_tiges
    FROM
      parcelle
    JOIN the ON parcelle.the = the.id
    WHERE
      parcelle.id = ?
  ";
  $stmt = $connexion->prepare($query);
  $stmt->bind_param("i", $id_parcelle);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $stmt->close();
  return $row['nombre_tiges'];
}

function poids_total_production($connexion, $id_parcelle, $date_limite)
{
  $duree = duree_plantation_parcelle($connexion, $id_parcelle, $date_limite);
  $production = production_mensuelle($connexion, $id_parcelle);
  return $duree * $production;
}

function somme_poids_cueillette($connexion, $id_parcelle)
{
  $query = "
    SELECT
      COALESCE(SUM(poids), 0) AS somme_poids
    FROM
      cueillette
    WHERE
      parcelle = ?
  ";
  $stmt = $connexion->prepare($query);
  $stmt->bind_param("i", $id_parcelle);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $stmt->close();
  return $row['somme_poids'];
}


function modifier_salaire_cueilleur($connexion, $nouveauMontant)
{
  $query = $connexion->prepare("UPDATE salaire_cueilleur SET montant = ?");
  $query->bind_param("d", $nouveauMontant);
  $query->execute();
  $query->close();
}

function supprimer_enregistrement($connexion, $table, $id) {
    $query = $connexion->prepare("DELETE FROM $table WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $query->close();
}

function recuperer_donnees_par_id($connexion, $table, $id) {
    $query = $connexion->prepare("SELECT * FROM $table WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();
    $data = $result->fetch_assoc();
    $query->close();
    return $data;
}

function updateCueillette($connexion, $id, $date_cueillette, $cueilleur_id, $parcelle_id, $poids_cueilli)
{
    $query = $connexion->prepare("UPDATE cueillette SET date_cueillette = ?, cueilleur_id = ?, parcelle_id = ?, poids_cueilli = ? WHERE id = ?");
    $query->bind_param("ssssi", $date_cueillette, $cueilleur_id, $parcelle_id, $poids_cueilli, $id);

    if ($query->execute()) {
        $query->close();
        return true; // Succès
    } else {
        $query->close();
        return false; // Échec
    }
}

function updateCategDepense($connexion, $id, $nom)
{
    $query = $connexion->prepare("UPDATE categorie_depense SET nom_categorie = ? WHERE id = ?");
    $query->bind_param("si", $nom, $id);

    if ($query->execute()) {
        $query->close();
        return true;
    } else {
        $query->close();
        return false;
    }
}

function updateCueilleur($connexion, $id, $nom, $genre, $date_naissance)
{
    $query = $connexion->prepare("UPDATE cueilleur SET nom = ?, genre = ?, date_naissance = ? WHERE id = ?");
    $query->bind_param("sssi", $nom, $genre, $date_naissance, $id);

    if ($query->execute()) {
        $query->close();
        return true;
    } else {
        $query->close();
        return false;
    }
}

function updateParcelle($connexion, $id, $num, $surface, $variete)
{
    $query = $connexion->prepare("UPDATE parcelle SET numero_parcelle = ?, surface_hectare = ?, variete_the_id = ? WHERE id = ?");
    $query->bind_param("sssi", $num, $surface, $variete, $id);

    if ($query->execute()) {
        $query->close();
        return true;
    } else {
        $query->close();
        return false;
    }
}

function updateSaisieDep($connexion, $id, $date, $categ, $montant)
{
    $query = $connexion->prepare("UPDATE saisie_depense SET date_depense = ?, categorie_depense_id = ?, montant = ? WHERE id = ?");
    $query->bind_param("sssi", $date, $categ, $montant, $id);

    if ($query->execute()) {
        $query->close();
        return true;
    } else {
        $query->close();
        return false;
    }
}

function updateVarieteThe($connexion, $id, $nom, $occupation)
{
    $query = $connexion->prepare("UPDATE variete_the SET nom_variete = ?, occupation_m2 = ? WHERE id = ?");
    $query->bind_param("sds", $nom, $occupation ,$id);

    if ($query->execute()) {
        $query->close();
        return true;
    } else {
        $query->close();
        return false;
    }
}

function selectionner_extra($connexion)
{
  $query = "SELECT * FROM extra";
  $result = $connexion->query($query);
  $row = $result->fetch_assoc();
  return $row;
}

function modifier_extra($connexion, $bonus, $mallus)
{
  $query = "UPDATE extra SET bonus = ?, mallus = ?";
  $stmt = $connexion->prepare($query);
  $stmt->bind_param("dd", $bonus, $mallus);
  $stmt->execute();
  $stmt->close();
}

function selectionner_paiements_entre_deux_dates($connexion, $date_debut, $date_fin)
{
  $query = "
    SELECT
      paiement.id,
      paiement.date,
      paiement.poids,
      paiement.bonus,
      paiement.mallus,
      paiement.montant,
      cueilleur.nom AS nom
    FROM
      paiement
    INNER JOIN
      cueilleur ON paiement.cueilleur = cueilleur.id
    WHERE
      paiement.date BETWEEN ? AND ?
  ";
  $stmt = $connexion->prepare($query);
  $stmt->bind_param("ss", $date_debut, $date_fin);
  $stmt->execute();
  $result = $stmt->get_result();
  $paiements = array();
  while ($row = $result->fetch_assoc()) {
    $paiements[] = $row;
  }
  $stmt->close();
  return $paiements;
}

function paiement_entre_deux_date($connexion, $date_debut, $date_fin)
{
  $query = "
    SELECT
      COALESCE(SUM(montant), 0) AS montant_total
    FROM
      paiement
    WHERE
      date BETWEEN ? AND ?
  ";
  $stmt = $connexion->prepare($query);
  $stmt->bind_param("ss", $date_debut, $date_fin);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $montantTotal = $row['montant_total'];
  $stmt->close();
  return $montantTotal !== null ? $montantTotal : 0;
}
function selectionner_poids_minimum_cueilleur($connexion)
{
  $query = "SELECT poids FROM poids_minimum_cueilleur";
  $resultat = $connexion->query($query);
  if ($resultat->num_rows > 0) {
    $poids_minimum = $resultat->fetch_assoc();
    return $poids_minimum['poids'];
  } else {
    return null;
  }
}

function inserer_cueillette($conn, $date, $cueilleur, $parcelle, $poids)
{
    $query = $conn->prepare("INSERT INTO cueillette (date_cueillette, cueilleur_id, parcelle_id, poids_cueilli) VALUES (?, ?, ?, ?)");
    $query->bind_param("sddd", $date, $cueilleur, $parcelle, $poids);

    // Weight validation logic
    $poidsAutorise = obtenirPoidsParcelleVariete($conn, $parcelle, $variete);
    if ($poids > $poidsAutorise) {
        // Weight is greater than the allowed limit
        $query->close();
        return 2; // Indicate weight validation failure
    }

    $query->execute();

    if ($query->affected_rows > 0) {
        $query->close();
        return 1; // Success
    } else {
        $query->close();
        return 0; // Failure
    }
}
function modifier_poids_minimum_cueilleur($connexion, $nouveau_poids)
{
  $query = $connexion->prepare("UPDATE poids_minimum_cueilleur SET poids = ?");
  $query->bind_param("d", $nouveau_poids);
  $query->execute();
  $query->close();
}
function selectionner_salaire_cueilleur($connexion)
{
  $query = "SELECT montant FROM salaire_cueilleur";
  $resultat = $connexion->query($query);
  if ($resultat->num_rows > 0) {
    $salaire = $resultat->fetch_assoc();
    return $salaire['montant'];
  } else {
    return null;
  }
}


?>