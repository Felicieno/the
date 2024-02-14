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
                                <th scope="col" class="col-3">Nom</th>
                                <th scope="col" class="col-3">Genre</th>
                                <th scope="col" class="col-3">Date de naissance </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            // Inclure le fichier qui contient votre fonction getregisterDepense
                            include "../inc/fonction.php";
                            
                            $conn = connectDB();
                            $data = getCueilleur($conn);

                            if ($data) {
                                foreach ($data as $row) {
                                    echo "<tr>";
                                    echo "<th scope='row' class='col-3'>" . $row['id'] . "</th>";
                                    echo "<td class='col-3'>" . $row['nom'] . "</td>";
                                    echo "<td class='col-3'>" . $row['genre'] . "</td>";
                                    echo "<td class='col-3'>" . $row['date_naissance'] . "</td>";
                                    echo "<td class='col-3'>
                                            <a href='modifierCueilleur.php?table=cueilleur&id=" . $row['id'] . "'>Modifier</a>
                                            <a href='supprimer.php?table=cueilleur&id=" . $row['id'] . "'>Supprimer</a>
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
                                        <h4 style="font-weight: bold;color: rgb(87,128,87);">Insertions Cueilleur</h4>
                                        <p class="text-muted"></p>
                                        <input type="hidden" value = 'cueilleur' name = 'condition'>
                                        <div class="mb-3"><label class="form-label" for="name" style="color: rgb(87,128,87);">Nom :</label><input class="form-control" type="text" id="name" name="nom" placeholder="Entrez le nom"></div>
                                        <div class="mb-3" style="margin-bottom: 0px;padding-bottom: 86px;"><label class="form-label" for="email" style="margin-bottom: 16px;">Genre:</label><input class="form-control" type="text" id="name-1" name="genre" placeholder="Entrez le genre" style="margin-bottom: 16px;"><label class="form-label" style="margin-bottom: 19px;">Date de naissance :</label><input class="form-control" type="date" id="name-2" name="dtn" placeholder="Entrez le nom" style="margin-bottom: 16px;"></div>
                                        <div class="mb-3"><button class="btn btn-primary" type="submit" style="background: rgb(87,128,87);">Valider</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
<?php include "../includes2/footer.php" ?>
