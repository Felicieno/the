<?php
    include "../inc/fonction.php";
    $conn = connectDB();

    $id = $_GET['id'];

    $row = recuperer_donnees_par_id($conn, 'categorie_depense', $id);

    if (!$row) {
        echo "Data not found.";
        exit();
    }
?>


<form class="p-3 p-xl-4" action="../inc/modifier.php" method="post">
<input type="hidden" name="condition" value="categ">
    <h4 style="font-weight: bold; color: rgb(87, 128, 87);">Modification categorie depenses</h4>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="mb-3">
        <label class="form-label" for="date_cueillette" style="color: rgb(87, 128, 87); margin-bottom: 16px;">Nom categorie :</label>
        <input class="form-control" type="text" id="nom" name="nom_categorie" value="<?php echo $row['nom_categorie']; ?>" style="margin-bottom: 16px;">
    </div>
    <div class="mb-3">
        <button class="btn btn-primary" type="submit" style="background: rgb(87, 128, 87);">Enregistrer les modifications</button>
    </div>
</form>
