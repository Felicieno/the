
<?php
    include "../inc/fonction.php";
    $conn = connectDB();

    $id = $_GET['id'];

    $row = recuperer_donnees_par_id($conn, 'variete_the', $id);

    if (!$row) {
        echo "Data not found.";
        exit();
    }
?>


<form class="p-3 p-xl-4" action="../inc/modifier.php" method="post">
<input type="hidden" name="condition" value="varieteThe">
    <h4 style="font-weight: bold; color: rgb(87, 128, 87);">Modification Variete Thé</h4>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label class="form-label" for="cueilleur_id" style="color: rgb(87, 128, 87); margin-bottom: 16px;">nom_variete :</label>
    <input class="form-control" type="text" id="cueilleur_id" name="nom" value="<?php echo $row['nom_variete']; ?>" style="margin-bottom: 16px;">
    <div class="mb-3" style="margin-bottom: 0px; padding-bottom: 86px;">
        <label class="form-label" for="parcelle_id" style="color: rgb(87, 128, 87); margin-bottom: 16px;">occupation_m2 :</label>
        <input class="form-control" type="text" id="parcelle_id" name="occupation" value="<?php echo $row['occupation_m2']; ?>" style="margin-bottom: 16px;">
    </div>
    <div class="mb-3">
        <button class="btn btn-primary" type="submit" style="background: rgb(87, 128, 87);">Enregistrer les modifications</button>
    </div>
</form>
