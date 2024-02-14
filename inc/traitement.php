<?php
include 'fonction.php';
$conn = connectDB();

// Traitement de l'insertion de saisie de dépense ou de catégorie
$condition = $_POST['condition'];

if ($condition == "depense") {
    $date = $_POST['date'];
    $categ = $_POST['categ'];
    $montant = $_POST['montant'];

    $insertCatDep = registerDepense($conn, $date, $categ, $montant);

    if ($insertCatDep == 1) {
        header('Location: ../pages/insertsaisieDep.php');
        exit(); // Assure que le script s'arrête après la redirection
    } else {
        echo 'Erreur insertion';
    }
} elseif ($condition == "categ") {
    $nomcat = $_POST['nomcat'];

    $insertNomDep = insertDepense($conn, $nomcat);

    if ($insertNomDep == 1) {
        header('Location: ../pages/insertcatDep.php');
        exit();
    } else {
        header('Location: ../pages/insertcatDep.php?error=0');
        exit();
    }
}

else if($condition == "cueillette"){
    if (isset($_POST['date_cueillette'], $_POST['cueilleur_id'], $_POST['parcelle_id'], $_POST['poids_cueilli'])) {
        $date = $_POST['date_cueillette'];
        $cueilleur = $_POST['cueilleur_id'];
        $parcelle = $_POST['parcelle_id'];
        $poids = $_POST['poids_cueilli'];

    $insertcueillette = inserer_cueillette($conn, $date, $cueilleur, $parcelle, $poids);

    if ($insertcueillette == 1) {
        header('Location: ../pages/insertCueillette.php');
        exit();
    } else {
        header('Location: ../pages/insertCueillette.php?error=0');
        exit();
    }

    }
}

else if($condition == "cueilleur"){
        $nom = $_POST['nom'];
        $genre = $_POST['genre'];
        $dtn = $_POST['dtn'];

    $insertcueillette = inserer_cueilleur($conn, $nom, $genre, $dtn);

    if ($insertcueillette == 1) {
        header('Location: ../pages/insertCueillette.php');
        exit();
    } else {
        header('Location: ../pages/insertCueillette.php?error=0');
        exit();
    }
}

else if($condition == "parcelle"){
    $num = $_POST['num'];
    $occupation = $_POST['surface'];
    $variete = $_POST['variete'];

$insertcueillette = inserer_parcelle($conn, $num, $occupation, $variete);

if ($insertcueillette == 1) {
    header('Location: ../pages/insertCueillette.php');
    exit();
} else {
    header('Location: ../pages/insertCueillette.php?error=0');
    exit();
}
}

else if($condition == "variete_the"){
    $nom = $_POST['nom'];
    $occupation = $_POST['occupation'];

$insertcueillette = inserer_variete($conn, $nom, $occupation);

if ($insertcueillette == 1) {
    header('Location: ../pages/insertvarietThe.php');
    exit();
} else {
    header('Location: ../pages/insertvarietThe.php?error=0');
    exit();
}
}

?>
