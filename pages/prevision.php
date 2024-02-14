<?php include "../includes2/header_accueil.php" ?>
<?php include "../includes/liens.php" ?>

    <div class="container py-4 py-xl-5">
        <div class="row mb-5">
            <div class="col">
                <section class="position-relative py-4 py-xl-5">
                    <h2 style="color: rgb(12,143,9);font-weight: bold;font-size: 50px;margin-bottom: 21px;">Prevision</h2>
                    <div class="container position-relative">
                        <div class="row d-flex justify-content-center" style="height: 69px;">
                            <div class="col-xl-12"><label class="form-label" style="transform: translate(-4px);margin-right: 15px;">Date :</label><input type="text" id="name-3" name="name" placeholder="Veuillez entrer un date" style="margin-right: 0px;"><button class="btn btn-primary" type="button" style="transform: translate(21px);background: rgb(33,163,12);width: 73px;height: 35px;">Valider</button></div>
                        </div>
                    </div><label class="form-label" style="font-size: 16px;margin-right: 224px;margin-top: 0px;">Poids total thé restant :</label><label class="form-label" style="font-size: 16px;margin-right: 314px;">Montant :&nbsp;</label>
                </section>
            </div>
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <p class="w-lg-50"></p>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <div class="col">
                <div class="card"><img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="assets/img/parcelle1.jpg">
                    <div class="card-body p-4">
                        <p class="text-primary card-text mb-0">PARCELLE #1</p>
                        <h4 class="card-title"><label class="form-label"></label>Nom du parcelle</h4>
                        <p class="card-text">Nombre de pied :</p>
                        <p class="card-text">Poids Thé restant :</p>
                        <div class="d-flex">
                            <div></div><label class="form-label">15,2 ha</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card"></div>
            </div>
            <div class="col">
                <div class="card"></div>
            </div>
        </div>
    </div>

<?php include "../includes2/footer.php" ?>