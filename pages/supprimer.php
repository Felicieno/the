<?php
include '../inc/fonction.php';
$conn = connectDB();

if (isset($_GET['table']) && isset($_GET['id'])) {
    $table = $_GET['table'];
    $id = $_GET['id'];

    supprimer_enregistrement($conn, $table, $id);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
} else {
    echo "Paramètres manquants";
}
