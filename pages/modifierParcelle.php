<?php
    include "../inc/fonction.php";
    $conn = connectDB();

    $id = $_GET['id'];

    $row = recuperer_donnees_par_id($conn, 'parcelle', $id);

    if (!$row) {
        echo "Data not found.";
        exit();
    }
?>


<form class="p-3 p-xl-4" action="../inc/modifier.php" method="post">
<input type="hidden" name="condition" value="variete">
    <h4 style="font-weight: bold; color: rgb(87, 128, 87);">Modification Parcelle</h4>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="mb-3">
        <label class="form-label" for="date_cueillette" style="color: rgb(87, 128, 87); margin-bottom: 16px;">numero_parcelle :</label>
        <input class="form-control" type="text" id="nom" name="num" value="<?php echo $row['numero_parcelle']; ?>" style="margin-bottom: 16px;">
    </div>
    <label class="form-label" for="cueilleur_id" style="color: rgb(87, 128, 87); margin-bottom: 16px;">surface_hectare :</label>
    <input class="form-control" type="text" id="cueilleur_id" name="surface" value="<?php echo $row['surface_hectare']; ?>" style="margin-bottom: 16px;">
    <div class="mb-3" style="margin-bottom: 0px; padding-bottom: 86px;">
        <label class="form-label" for="parcelle_id" style="color: rgb(87, 128, 87); margin-bottom: 16px;">variete_the_id :</label>
        <input class="form-control" type="text" id="parcelle_id" name="variete" value="<?php echo $row['variete_the_id']; ?>" style="margin-bottom: 16px;">
    </div>
    <div class="mb-3">
        <button class="btn btn-primary" type="submit" style="background: rgb(87, 128, 87);">Enregistrer les modifications</button>
    </div>
</form>
