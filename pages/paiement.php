<?php include "../includes2/header_accueil.php" ?>
<?php include "../includes/liens.php" ?>

<div class="d-flex d-xl-flex align-items-center align-items-xl-center" style="width: 100%;height: 100%;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-6 offset-xl-0" style="margin-top: 15px;">
                    <div class="p-5" style="border-radius: 60px;border-width: 1px;border-style: solid;">
                        <p style="font-size: 29px;"><strong><span style="color: rgb(18, 57, 96);">Paiements</span></strong></p>
                        <div class="text-center">
                            <h4 class="text-dark mb-4" style="color: rgb(18,57,96);border-color: rgb(139,175,211);"></h4>
                        </div><label class="form-label" style="margin: 0px;margin-bottom: 16px;">Date :</label>
                        <form class="user" action="resultat_paiements.php">
                            <div class="mb-3"><input class="form-control form-control-user" type="date" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Veuillez entrer la date" name="date" style="margin-bottom: 16px;"></div><label class="form-label" style="margin-bottom: 16px;">Nom cueilleur :</label><select class="form-select" style="margin-bottom: 16px;">
                                    <option value="13">This is item 2</option>
                            </select>

                            <label class="form-label" style="margin-bottom: 16px;">Poids :</label>
                            <div class="mb-3"><input class="form-control form-control-user" type="text" id="exampleInputPassword" placeholder="Veuillez entrer le poids" name="poids" style="margin-bottom: 16px;"></div>

                            <label class="form-label" style="margin-bottom: 16px;">% Bonus :</label>
                            <div class="mb-3"><input class="form-control form-control-user" type="text" id="exampleInputPassword" placeholder="Veuillez entrer le % Bonus" name="bonus" style="margin-bottom: 16px;"></div>
                            <div class="mb-3">

                            <label class="form-label" style="margin-bottom: 16px;">% Mallus :</label>
                            <div class="mb-3"><input class="form-control form-control-user" type="text" id="exampleInputPassword" placeholder="Veuillez entrer le % Mallus" name="mallus" style="margin-bottom: 16px;"></div>
                            <div class="mb-3">

                            <label class="form-label" style="margin-bottom: 16px;">Montant Paiements :</label>
                            <div class="mb-3"><input class="form-control form-control-user" type="number" id="exampleInputPassword" placeholder="Veuillez entrer le montant" name="montant" style="margin-bottom: 16px;"></div>
                            <div class="mb-3">


                                <div class="custom-control custom-checkbox small"></div>
                            </div><button class="btn btn-primary d-block btn-user w-100" type="submit" style="background: #4fbc7b;">Valider</button>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "../includes2/footer.php" ?>