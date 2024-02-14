
<?php
    include "../inc/fonction.php";
    $conn = connectDB();

    $id = $_GET['id'];

    $row = recuperer_donnees_par_id($conn, 'saisie_depense', $id);

    if (!$row) {
        echo "Data not found.";
        exit();
    }
?>


<form class="p-3 p-xl-4" action="../inc/modifier.php" method="post">
<input type="hidden" name="condition" value="saisieDep">
    <h4 style="font-weight: bold; color: rgb(87, 128, 87);">Modification Saisie depenses</h4>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="mb-3">
        <label class="form-label" for="date_cueillette" style="color: rgb(87, 128, 87); margin-bottom: 16px;">date_depense :</label>
        <input class="form-control" type="date" id="nom" name="date" value="<?php echo $row['date_depense']; ?>" style="margin-bottom: 16px;">
    </div>
    <label class="form-label" for="cueilleur_id" style="color: rgb(87, 128, 87); margin-bottom: 16px;">categorie_depense_id :</label>
    <input class="form-control" type="text" id="cueilleur_id" name="categ" value="<?php echo $row['categorie_depense_id']; ?>" style="margin-bottom: 16px;">
    <div class="mb-3" style="margin-bottom: 0px; padding-bottom: 86px;">
        <label class="form-label" for="parcelle_id" style="color: rgb(87, 128, 87); margin-bottom: 16px;">montant :</label>
        <input class="form-control" type="text" id="parcelle_id" name="montant" value="<?php echo $row['montant']; ?>" style="margin-bottom: 16px;">
    </div>
    <div class="mb-3">
        <button class="btn btn-primary" type="submit" style="background: rgb(87, 128, 87);">Enregistrer les modifications</button>
    </div>
</form>
