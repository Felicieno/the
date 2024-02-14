<?php include "../includes2/header.php" ?>

    <section class="position-relative py-4 py-xl-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-7 mx-auto bg-white rounded shadow">

                    <!-- Fixed header table-->
                    <div class="table-responsive">
                    <table class="table table-fixed">
                            <thead>
                            <tr>
                                <th scope="col" class="col-3">Id</th>
                                <th scope="col" class="col-3">date_depense</th>
                                <th scope="col" class="col-3">categorie_depense_id</th>
                                <th scope="col" class="col-3">montant </th>
                                <th scope="col" class="col-3">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            // Inclure le fichier qui contient votre fonction getregisterDepense
                            include "../inc/fonction.php";
                            
                            $conn = connectDB();
                            $data = getregisterDepense($conn);

                            if ($data) {
                                foreach ($data as $row) {
                                    echo "<tr>";
                                    echo "<th scope='row' class='col-3'>" . $row['id'] . "</th>";
                                    echo "<td class='col-3'>" . $row['date_depense'] . "</td>";
                                    echo "<td class='col-3'>" . $row['categorie_depense_id'] . "</td>";
                                    echo "<td class='col-3'>" . $row['montant'] . "</td>";
                                    echo "<td class='col-3'>
                                            <a href='modifierSaisiDep.php?table=saisie_depense&id=" . $row['id'] . "'>Modifier</a>
                                            <a href='inc/supprimer.php?table=saisie_depense&id=" . $row['id'] . "'>Supprimer</a>
                                          </td>";                                    
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>Aucune donnée trouvée.</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div><!-- End -->

                </div>
            </div>
        </div>
        <div class="container position-relative">
            <div class="row" style="background: url(&quot;../assets/img/logo.jpg&quot;) top / cover no-repeat;margin: -33px;">
                <div class="col-md-6 col-xl-4">
                    <div>
                        <form class="p-3 p-xl-4" method="post" action="../inc/traitement.php">
                            <h4 style="font-weight: bold;color: rgb(87,128,87);">Insertions Saisie depenses</h4>
                            <p class="text-muted"></p>
                            <input type="hidden" value="depense" name="condition">
                            <div class="mb-3"><label class="form-label" for="name" style="color: rgb(87,128,87);margin-bottom: 16px;">Date depense :</label><input class="form-control" type="date" id="date" name="date" placeholder="Entrez la depense" style="margin-bottom: 16px;"></div><label class="form-label" for="name" style="color: rgb(87,128,87);margin-bottom: 16px;">Categorie depenses :</label><input class="form-control" type="text" id="categ" name="categ" placeholder="Entrez la categorie" style="margin-bottom: 16px;">
                            <div class="mb-3" style="margin-bottom: 0px;padding-bottom: 86px;"><label class="form-label" for="name" style="color: rgb(87,128,87);margin-bottom: 16px;">Montant :</label><input class="form-control" type="text" id="montant" name="montant" placeholder="Entrez le montant"></div>
                            <div class="mb-3"><button class="btn btn-primary" type="submit" style="background: rgb(87,128,87);">Valider</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include "../includes2/footer.php" ?>
<?php
