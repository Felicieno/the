<?php
    include "../inc/fonction.php";
    $conn = connectDB();

    $id = $_GET['id'];

    $row = recuperer_donnees_par_id($conn, 'cueilleur', $id);

    if (!$row) {
        echo "Data not found.";
        exit();
    }
?>


<form class="p-3 p-xl-4" action="../inc/modifier.php" method="post">
<input type="hidden" name="condition" value="cueilleur">
    <h4 style="font-weight: bold; color: rgb(87, 128, 87);">Modification Cueillette</h4>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="mb-3">
        <label class="form-label" for="date_cueillette" style="color: rgb(87, 128, 87); margin-bottom: 16px;">Nom :</label>
        <input class="form-control" type="text" id="nom" name="nom" value="<?php echo $row['nom']; ?>" style="margin-bottom: 16px;">
    </div>
    <label class="form-label" for="cueilleur_id" style="color: rgb(87, 128, 87); margin-bottom: 16px;">Genre :</label>
    <input class="form-control" type="text" id="cueilleur_id" name="genre" value="<?php echo $row['genre']; ?>" style="margin-bottom: 16px;">
    <div class="mb-3" style="margin-bottom: 0px; padding-bottom: 86px;">
        <label class="form-label" for="parcelle_id" style="color: rgb(87, 128, 87); margin-bottom: 16px;">Date de naissance :</label>
        <input class="form-control" type="date" id="parcelle_id" name="dtn" value="<?php echo $row['date_naissance']; ?>" style="margin-bottom: 16px;">
    </div>
    <div class="mb-3">
        <button class="btn btn-primary" type="submit" style="background: rgb(87, 128, 87);">Enregistrer les modifications</button>
    </div>
</form>
