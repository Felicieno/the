<?php include "../includes2/header_accueil.php" ?>
<?php include "../includes/liens.php" ?>

<!-- Add jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<div class="d-flex d-xl-flex align-items-center align-items-xl-center" style="width: 100%;height: 100%;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-xl-6 offset-xl-0" style="margin-top: 15px;">
                <div class="p-5" style="border-radius: 60px;border-width: 1px;border-style: solid;">
                    <p style="font-size: 29px;"><strong><span style="color: rgb(18, 57, 96);">Saisie des cueillettes</span></strong></p>
                    <div class="text-center">
                        <h4 class="text-dark mb-4" style="color: rgb(18,57,96);border-color: rgb(139,175,211);"></h4>
                    </div>
                    <label class="form-label" style="margin: 0px;margin-bottom: 16px;">Date :</label>

                    <!-- Update the form tag with an ID for easier targeting -->
                    <form class="user" id="saisieForm" action="saisie_depenses.php">

                        <div class="mb-3">
                            <input class="form-control form-control-user" type="date" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Veuillez entrer la date" name="email" style="margin-bottom: 16px;">
                        </div>

                        <label class="form-label" style="margin-bottom: 16px;">Choix cueilleur :</label>
                        <select class="form-select" style="margin-bottom: 16px;"></select>

                        <label class="form-label" style="margin-bottom: 16px;">Choix parcelle :</label>
                        <select class="form-select" style="margin-bottom: 16px;"></select>

                        <label class="form-label" style="margin-bottom: 16px;">Poids recueilli :</label>
                        <div class="mb-3">
                            <input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Veuillez entrer le poids" name="password" style="margin-bottom: 16px;">
                        </div>

                        <div class="mb-3">
                            <div class="custom-control custom-checkbox small"></div>
                        </div>

                        <!-- Add the onclick event to trigger AJAX validation -->
                        <button class="btn btn-primary d-block btn-user w-100" type="button" onclick="validateForm()" style="background: #4fbc7b;">Suivant</button>
                        <hr>
                    </form>

                    <nav>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" aria-label="Previous" href="saisie_cueillette.php"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item"><a class="page-link" href="saisie_cueillette.php">1</a></li>
                            <li class="page-item"><a class="page-link" href="saisie_depenses.php">2</a></li>
                            <li class="page-item"><a class="page-link" aria-label="Next" href="saisie_depenses.php"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- AJAX validation script -->
<script>
    function validateForm() {
        // Get form data
        var formData = $('#saisieForm').serialize();

        // AJAX request to your PHP validation script
        $.ajax({
            type: 'POST',
            url: '../inc/validation_cueillette_logique.php', // Replace with your actual validation script URL
            data: formData,
            success: function(response) {
                // Handle the response from the server
                if (response === 'OK') {
                    // If validation is successful, submit the form
                    $('#saisieForm')[0].submit();
                } else {
                    // If validation fails, display an alert
                    alert('Validation failed: ' + response);
                }
            }
        });
    }
</script>

<?php include "../includes2/footer.php" ?>
