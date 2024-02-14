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
                            <th scope="col" class="col-3">numero_parcelle</th>
                            <th scope="col" class="col-3">surface_hectare</th>
                            <th scope="col" class="col-3">variete_the_id </th>
                            <th scope="col" class="col-3">poids<th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Inclure le fichier qui contient votre fonction getregisterDepense
                            include "../inc/fonction.php";
                            
                            $conn = connectDB();
                            $data = getParcelle($conn);

                            if ($data) {
                                foreach ($data as $row) {
                                    echo "<tr>";
                                    echo "<th scope='row' class='col-3'>" . $row['id'] . "</th>";
                                    echo "<td class='col-3'>" . $row['numero_parcelle'] . "</td>";
                                    echo "<td class='col-3'>" . $row['surface_hectare'] . "</td>";
                                    echo "<td class='col-3'>" . $row['variete_the_id'] . "</td>";
                                    echo "<td class='col-3'>" . $row['poids'] . "</td>";
                                    echo "<td class='col-3'>
                                            <a href='modifierParcelle.php?table=parcelle&id=" . $row['id'] . "'>Modifier</a>
                                            <a href='supprimer.php?table=parcelle&id=" . $row['id'] . "'>Supprimer</a>
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
                    <form class="p-3 p-xl-4" action="../inc/traitement.php" method="post">
                        <h4 style="font-weight: bold;color: rgb(87,128,87);">Insertions Parcelle</h4>
                        <p class="text-muted"></p>
                        <input type="hidden" value = 'parcelle' name = 'condition'>
                        <div class="mb-3"><label class="form-label" for="name" style="color: rgb(87,128,87);">Numero parcelle :</label><input class="form-control" type="text" id="name" name="num" placeholder="Entrez le numero"></div>
                        <div class="mb-3" style="margin-bottom: 0px;padding-bottom: 86px;"><label class="form-label" for="email" style="margin-bottom: 16px;">Surface hectare :</label><input class="form-control" type="text" id="name-1" name="surface" placeholder="Entrez la surface " style="margin-bottom: 16px;"><label class="form-label" for="email" style="margin-bottom: 16px;">Variété :</label><input class="form-control" type="text" id="name-2" name="variete" placeholder="Entrez la variété" style="margin-bottom: 16px;"></div>
                        <div class="mb-3"><button class="btn btn-primary" type="submit" style="background: rgb(87,128,87);">Valider</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "../includes2/footer.php" ?>
