<?php 
    session_start();

    session_destroy();

    // Rediriger vers la page de connexion utilisateur
    header("Location: ../pages/loginuser.php");
    exit();
?>
