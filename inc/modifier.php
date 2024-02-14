<?php include "../inc/fonction.php";

    $conn = connectDB();

    $condition = $_POST['condition'];

    if ($condition == "categ") {

        include "../pages/modifier_categ.php";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id']; // Assuming you have an input field with name 'id' in your form
            $nom_categorie = $_POST['nom_categorie']; // Assuming you have an input field with name 'nom_categorie' in your form

            // Appeler la fonction pour mettre à jour l'enregistrement
            $updateResult = updateCategDepense($conn, $id, $nom_categorie);

            if ($updateResult) {
                header('Location: ../pages/insertcatDep.php');
                exit();
            } else {
                echo "Échec de la modification.";
            }
        }
    }
        else if ($condition == "cueillette") {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $nom = $_POST['date_cueillette'];
            $cueilleur_id = $_POST['cueilleur_id'];
            $parcelle_id = $_POST['parcelle_id'];
            $poids_cueilli = $_POST['poids_cueilli'];

            // Appeler la fonction pour mettre à jour l'enregistrement
            $updateResult = updateCueillette($conn, $id, $date_cueillette, $cueilleur_id, $parcelle_id, $poids_cueilli);

            if ($updateResult) {
                header('Location:../pages/insertCueillette.php');
                exit();
            } else {
                echo "Échec de la modification.";
            }
        }   
    }
        else if ($condition == "cueilleur") {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $id = $_POST['id'];
                $nom = $_POST['nom'];
                $genre = $_POST['genre'];
                $date_naissance = $_POST['dtn'];

                // Appeler la fonction pour mettre à jour l'enregistrement
                $updateResult = updateCueilleur($conn, $id, $nom, $genre, $date_naissance);

                if ($updateResult) {
                    header('Location:../pages/insertCueilleur.php');
                    exit();
                } else {
                    echo "Échec de la modification.";
                }
            }   
        }

        else if ($condition == "variete") {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $id = $_POST['id'];
                $num = $_POST['num'];
                $surface = $_POST['surface'];
                $variete = $_POST['variete'];

                // Appeler la fonction pour mettre à jour l'enregistrement
                $updateResult = updateParcelle($conn, $id, $num, $surface, $variete);

                if ($updateResult) {
                    header('Location:../pages/insertParcelle.php');
                    exit();
                } else {
                    echo "Échec de la modification.";
                }
            }   
        }

        else if ($condition == "saisieDep") {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $id = $_POST['id'];
                $date = $_POST['date'];
                $categ = $_POST['categ'];
                $montant = $_POST['montant'];

                // Appeler la fonction pour mettre à jour l'enregistrement
                $updateResult = updateSaisieDep($conn, $id, $date, $categ, $montant);

                if ($updateResult) {
                    header('Location:../pages/insertsaisieDep.php');
                    exit();
                } else {
                    echo "Échec de la modification.";
                }
            }   
        }

        
        else if ($condition == "varieteThe") {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $id = $_POST['id'];
                $nom = $_POST['nom'];
                $occupation = $_POST['occupation'];

                // Appeler la fonction pour mettre à jour l'enregistrement
                $updateResult = updateVarieteThe($conn, $id, $nom, $occupation);

                if ($updateResult) {
                    header('Location:../pages/insertvarietThe.php');
                    exit();
                } else {
                    echo "Échec de la modification.";
                }
            }   
        }
    

?>