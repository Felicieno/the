<?php include "../includes2/header.php" ?>

    <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div>
                        <form class="p-3 p-xl-4" method="post" action="mois_regeneration.php">
                        <label for="variete_the_id">Variété de Thé :</label>
                                <select name="variete_the_id" id="variete_the_id">
                                    <?php
                                    // Se connecter à la base de données
                                    $conn = new mysqli("localhost", "root", "", "the");

                                    // Vérifier la connexion
                                    if ($conn->connect_error) {
                                        die("La connexion a échoué : " . $conn->connect_error);
                                    }

                                    // Récupérer les variétés de thé depuis la base de données
                                    $sql = "SELECT id, nom_variete FROM variete_the";
                                    $result = $conn->query($sql);

                                    // Vérifier s'il y a des résultats
                                    if ($result->num_rows > 0) {
                                        // Afficher les options de sélection de la variété de thé
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='" . $row['id'] . "'>" . $row['nom_variete'] . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>Aucune variété de thé trouvée</option>";
                                    }

                                    // Fermer la connexion à la base de données
                                    $conn->close();
                                    ?>
                                </select>
                                <br><br>
                                <label>Mois de Régénération :</label><br>
                                    
                        <h4 style="color: rgb(42,116,45);font-weight: bold;margin-bottom: 16px;font-size: 32px;">Mois de regeneration</h4>
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Janvier</label></div>
                            <div class="form-check" style="margin-top: -1px;"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2" style="margin-bottom: -10px;margin-top: 0px;">Fevrier</label></div>
                            <p class="text-muted"></p>
                            <div class="mb-3"></div>
                            <div class="mb-3"></div>
                            <div class="mb-3">
                                <div class="form-check" style="margin-top: -14px;"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-3">Mars</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-4"><label class="form-check-label" for="formCheck-4">Avril</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5">Mai</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-6">Juin</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-7">Juillet</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-8"><label class="form-check-label" for="formCheck-8">Août</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-9"><label class="form-check-label" for="formCheck-9">Septembre</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-10"><label class="form-check-label" for="formCheck-10">Octobre</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-11"><label class="form-check-label" for="formCheck-11">Novembre</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-12"><label class="form-check-label" for="formCheck-12">Decembre</label></div><button class="btn btn-primary" type="submit" style="background: rgb(87,128,87);margin-top: 16px;">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col" style="background: url(&quot;assets/img/logo.jpg&quot;) center / auto no-repeat;">
                    <div></div>
                </div>
            </div>
        </div>
    </section>

<?php include "../includes2/footer.php" ?>