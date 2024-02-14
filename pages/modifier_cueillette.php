<?php
    include "../inc/fonction.php";
    $conn = connectDB();

    $id = $_GET['id'];

    $row = recuperer_donnees_par_id($conn, 'cueillette', $id);

    if (!$row) {
        echo "Data not found.";
        exit();
    }
?>


<form class="p-3 p-xl-4" action="../inc/modifier.php" method="post">
<input type="hidden" name="condition" value="cueillette">
    <h4 style="font-weight: bold; color: rgb(87, 128, 87);">Modification Cueillette</h4>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="mb-3">
        <label class="form-label" for="date_cueillette" style="color: rgb(87, 128, 87); margin-bottom: 16px;">Date cueillette :</label>
        <input class="form-control" type="date" id="date_cueillette" name="date_cueillette" value="<?php echo $row['date_cueillette']; ?>" style="margin-bottom: 16px;">
    </div>
    <label class="form-label" for="cueilleur_id" style="color: rgb(87, 128, 87); margin-bottom: 16px;">Cueilleur :</label>
    <input class="form-control" type="text" id="cueilleur_id" name="cueilleur_id" value="<?php echo $row['cueilleur_id']; ?>" style="margin-bottom: 16px;">
    <div class="mb-3" style="margin-bottom: 0px; padding-bottom: 86px;">
        <label class="form-label" for="parcelle_id" style="color: rgb(87, 128, 87); margin-bottom: 16px;">Parcelle :</label>
        <input class="form-control" type="text" id="parcelle_id" name="parcelle_id" value="<?php echo $row['parcelle_id']; ?>" style="margin-bottom: 16px;">
        <label class="form-label" for="poids_cueilli" style="color: rgb(87, 128, 87); margin-bottom: 16px;">Poids recueilli :</label>
        <input class="form-control" type="text" id="poids_cueilli" name="poids_cueilli" value="<?php echo $row['poids_cueilli']; ?>">
    </div>
    <div class="mb-3">
        <button class="btn btn-primary" type="submit" style="background: rgb(87, 128, 87);">Enregistrer les modifications</button>
    </div>
</form>
