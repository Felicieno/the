<?php include "../includes2/header_accueil.php" ?>
<?php include "../includes/liens.php" ?>
<div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-6 offset-xl-0" style="margin-top: 15px;">
                    <div class="p-5" style="border-radius: 60px;border-width: 1px;border-style: solid;">
                        <p style="font-size: 29px;"><strong><span style="color: rgb(18, 57, 96);">Saisie de depenses</span></strong></p>
                        <div class="text-center">
                            <h4 class="text-dark mb-4" style="color: rgb(18,57,96);border-color: rgb(139,175,211);"></h4>
                        </div><label class="form-label" style="margin: 0px;margin-bottom: 16px;">Date :</label>
                        <form class="user" action="resultat.php">
                            <div class="mb-3"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Veuillez entrer la date" name="email" style="margin-bottom: 16px;"></div><label class="form-label" style="margin-bottom: 16px;">Choix categorie depenses :</label>
                            <div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Veuillez entrer la categorie" name="password" style="margin-bottom: 16px;"><label class="form-label" style="margin-bottom: 16px;">Montant :</label><input class="form-control form-control-user" type="password" id="exampleInputPassword-1" placeholder="Veuillez entrer le montant" name="password" style="margin-bottom: 16px;"></div>
                            <div class="mb-3">
                                <div class="custom-control custom-checkbox small"></div>
                            </div><button class="btn btn-primary d-block btn-user w-100" type="submit" style="background: #4fbc7b;">Valider</button>
                            <hr>
                        </form>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" aria-label="Previous" href="saisie_cueillette.php"><span aria-hidden="true">«</span></a></li>
                                <li class="page-item"><a class="page-link" href="saisie_cueillette.php">1</a></li>
                                <li class="page-item"><a class="page-link" href="saisie_depenses.php">2</a></li>
                                <!-- <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                                <li class="page-item"><a class="page-link" aria-label="Next" href="saisie_depenses.php"><span aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "../includes2/footer.php" ?>