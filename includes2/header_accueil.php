<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: loginuser.php");
    exit();
}

// Reste du code de votre page d'accueil utilisateur...
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="../assets/css/Contact-Details-icons.css">
    <link rel="stylesheet" href="../assets/css/Ludens-basic-login.css">
    <link rel="stylesheet" href="../assets/css/Ludens-Users---1-Login.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/swiper-icons.css">
    <link rel="stylesheet" href="../assets/css/Simple-Slider-swiper-bundle.min.css">
    <link rel="stylesheet" href="../assets/css/Simple-Slider.css">
</head>

<body>
    <nav class="navbar navbar-expand-md sticky-top navbar-shrink py-3 navbar-light" id="mainNav" style="background: url(&quot;../assets/img/durvill_logo.jpg&quot;);">
        <div class="container"><img src="assets/img/logo.jpg" width="84" height="81"><a class="navbar-brand d-flex align-items-center" href="/"><span>Thé Mol</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active" href="../pages/home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../pages/saisie_cueillette.php">Saisie</a></li>
                    <li class="nav-item"><a class="nav-link" href="../pages/paiement.php">Paiements</a></li>
                    <li class="nav-item"><a class="nav-link" href="../pages/prevision.php">Prevision</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li> -->
                    <!-- <li class="nav-item"><a class="nav-link" href="contacts.html">Contacts</a></li> -->
                </ul><a class="btn btn-primary shadow" role="button" href="../inc/deconnexion.php" style="background: #4aa25d;">Deconnexion</a>
            </div>
        </div>
    </nav>
    <header class="bg-primary-gradient"></header>