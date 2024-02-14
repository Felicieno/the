<?php

include "fonction.php";


$date = $_POST['date'];
$cueilleur = $_POST['cueilleur'];
$parcelle = $_POST['parcelle'];
$poids = $_POST['poids'];


$result = validerCueillette($date, $cueilleur, $parcelle, $poids);


echo $result;
?>
