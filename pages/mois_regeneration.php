<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si la variété de thé et les mois ont été sélectionnés
    if (isset($_POST['variete_the_id']) && isset($_POST['mois_reg'])) {
        // Récupérer l'ID de la variété de thé
        $variete_the_id = $_POST['variete_the_id'];

        // Récupérer les mois sélectionnés
        $mois_reg = $_POST['mois_reg'];

        // Se connecter à la base de données
        $conn = new mysqli("localhost", "root", "", "the");

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("La connexion a échoué : " . $conn->connect_error);
        }

        // Préparer la requête d'insertion
        $stmt = $conn->prepare("INSERT INTO mois_regeneration (id_variete_the, mois) VALUES (?, ?)");

        // Vérifier la préparation de la requête
        if ($stmt === false) {
            die("Erreur de préparation de la requête : " . $conn->error);
        }

        // Boucler à travers les mois sélectionnés
        foreach ($mois_reg as $mois) {
            // Liaison des paramètres
            $bind_result = $stmt->bind_param("is", $variete_the_id, $mois);
            
            // Vérifier la liaison des paramètres
            if ($bind_result === false) {
                die("Erreur de liaison des paramètres : " . $stmt->error);
            }

            // Exécuter la requête d'insertion
            $execute_result = $stmt->execute();

            // Vérifier l'exécution de la requête
            if ($execute_result === false) {
                die("Erreur d'exécution de la requête : " . $stmt->error);
            }
        }

        // Fermer la requête
        $stmt->close();

        // Fermer la connexion à la base de données
        $conn->close();

        // Afficher un message de succès
        echo "Les mois de régénération ont été ajoutés avec succès.";
    } else {
        // Afficher un message d'erreur si la variété de thé ou les mois n'ont pas été sélectionnés
        echo "Veuillez sélectionner une variété de thé et au moins un mois de régénération.";
    }
}
?>
