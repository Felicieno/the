<?php
// Save this file with a .php extension (e.g., saisie_cueillette.php)

// Your PHP code and functions can go here if needed
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisie des cueillettes</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

    <?php include "../includes2/header_accueil.php" ?>
    <?php include "../includes/liens.php" ?>

    <div class="d-flex d-xl-flex align-items-center align-items-xl-center" style="width: 100%;height: 100%;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-6 offset-xl-0" style="margin-top: 15px;">
                    <div class="p-5" style="border-radius: 60px;border-width: 1px;border-style: solid;">
                        <p style="font-size: 29px;"><strong><span style="color: rgb(18, 57, 96);">Saisie des cueillettes</span></strong></p>
                        <div class="text-center">
                            <h4 class="text-dark mb-4" style="color: rgb(18,57,96);border-color: rgb(139,175,211);"></h4>
                        </div>

                        <!-- Update the form tag with an ID for easier targeting -->
                        <form class="user" id="saisieForm" action="saisie_depenses.php">
                            <label class="form-label" style="margin: 0px;margin-bottom: 16px;">Date :</label>
                            <div class="mb-3"><input class="form-control form-control-user" type="date" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Veuillez entrer la date" name="email" style="margin-bottom: 16px;"></div>

                            <label class="form-label" style="margin-bottom: 16px;">Choix cueilleur :</label>
                            <select class="form-select" style="margin-bottom: 16px;"></select>

                            <label class="form-label" style="margin-bottom: 16px;">Choix parcelle :</label>
                            <select class="form-select" style="margin-bottom: 16px;"></select>

                            <label class="form-label" style="margin-bottom: 16px;">Poids recueilli :</label>
                            <div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Veuillez entrer le poids" name="password" style="margin-bottom: 16px;"></div>

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

    <?php include "../includes2/footer.php" ?>

    
    <script>
        $(document).ready(function() {
            $('form').submit(function(event) {
                
                event.preventDefault();

                
                var formData = $(this).serialize();

                
                $.ajax({
                    type: 'POST',
                    url: 'validationcueillette.php', 
                    data: formData,
                    success: function(response) {
                        
                        if (response === 'OK') {
                            
                            $('#saisieForm')[0].submit();
                        } else {
                            
                            alert('Validation failed: ' + response);
                        }
                    }
                });
            });
        });

       
        function validateForm() {
            
            var formData = $('#saisieForm').serialize();

           
            $.ajax({
                type: 'POST',
                url: 'validationcueillette.php', 
                data: formData,
                success: function(response) {
                    
                    if (response === 'OK') {
                        
                        $('#saisieForm')[0].submit();
                    } else {
                       
                        alert('Validation failed: ' + response);
                    }
                }
            });
        }
    </script>

</body>

</html>
