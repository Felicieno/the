<?php
session_start();
include 'fonction.php';

// Récupérer les données du formulaire
$email = $_POST['email'];
$password = $_POST['password'];

$conn = connectDB();

// Vérification de l'utilisateur
if (empty($erreurs)) {
    $checkadm = checkadmin($conn, $email, $password);

    if ($checkadm == 1) {
        // Stocker l'ID de l'utilisateur dans la session
        $_SESSION['user_id'] = $checkuser;

        // Redirection vers la page d'accueil de l'utilisateur si la vérification réussit
        header("Location: ../pages/accueil.php");
        exit();
    } else {
        // Gérer le cas où l'utilisateur n'est pas trouvé
        $erreurs[] = "Combinaison email/mot de passe incorrecte";
    }
}

// Si des erreurs sont présentes, rediriger avec les messages d'erreur et les données saisies
if (!empty($erreurs)) {
    $message_erreur = implode(',', $erreurs);
    $donnees_saisies['erreur'] = $message_erreur;
    header("Location: ../pages/loginadmin.php?" . http_build_query($donnees_saisies));
    exit();
}
?>
