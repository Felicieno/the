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
                                <th scope="col" class="col-3">Nom Categorie</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            // Inclure le fichier qui contient votre fonction getregisterDepense
                            include "../inc/fonction.php";
                            
                            $conn = connectDB();
                            $data = getDepense($conn);

                            if ($data) {
                                foreach ($data as $row) {
                                    echo "<tr>";
                                    echo "<th scope='row' class='col-3'>" . $row['id'] . "</th>";
                                    echo "<td class='col-3'>" . $row['nom_categorie'] . "</td>";
                                    echo "<td class='col-3'>
                                            <a href='modifierCatDep.php?table=categorie_depense&id=" . $row['id'] . "'>Modifier</a>
                                            <a href='supprimer.php?table=categorie_depense&id=" . $row['id'] . "'>Supprimer</a>
                                          </td>";                                   
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>Aucune donnée trouvée.</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="container position-relative">
            <div class="row" style="background: url(&quot;../assets/img/logo.jpg&quot;) top / cover no-repeat;margin: -33px;">
                <div class="col-md-6 col-xl-4">
                    <div>
                        <form class="p-3 p-xl-4" method="post" action="../inc/traitement.php">
                            <h4 style="font-weight: bold;color: rgb(87,128,87);">Insertions Categorie dépenses&nbsp;</h4>
                            <p class="text-muted"></p>
                            <input type="hidden" value = 'categ' name = 'condition'>
                            <div class="mb-3"><label class="form-label" for="name" style="color: rgb(87,128,87);">Nom catégorie :</label><input class="form-control" type="text" id="nomcat" name="nomcat" placeholder="Entrez la catégorie"></div>
                            <div class="mb-3" style="margin-bottom: 0px;padding-bottom: 86px;"></div>
                            <div class="mb-3"><button class="btn btn-primary" type="submit" style="background: rgb(87,128,87);">Valider</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include "../includes2/footer.php" ?>