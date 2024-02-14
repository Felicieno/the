<?php
$tab = array();
$tab[0] = "";
$tab[1] = "";

if (isset($_GET['erreur'])) {
    $erreur = $_GET['erreur'];
    $tab = explode(',', $erreur);
}

$tab1 = array();
$tab1[0] = "";
$tab1[1] = "";

if (isset($_GET['value'])) {
    $value = $_GET['value'];
    $tab1 = explode(',', $value);
}
?>

<?php include "../includes/liens.php" ?>
<body>
<?php include "../includes/header.php" ?>

<section class="login-clean" style="background-color: transparent;font-family: Poppins, sans-serif;">
    <form method="post" style="margin-top: 40px;" action="../inc/accessadm.php">
        <h2 class="visually-hidden">Login Form</h2>
        <div class="illustration"><i class="icon ion-person" style="color: #1b8dcd;border-color: #0dabee;"></i></div>
        <div class="form-group mb-3">
            <input class="form-control form-control-sm" type="email" name="email" placeholder="Veuillez entrer votre nom">
            <?php if (isset($tab[0]) && $tab[0] != "") { ?>
                <div class="form-group has-error">
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        <?php echo $tab[0]; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="form-group mb-3">
            <input class="form-control form-control-sm" type="password" name="password" placeholder="Veuillez entrer votre mot de passe">
            <?php if (isset($tab[1]) && $tab[1] != "") { ?>
                <div class="form-group has-error">
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        <?php echo $tab[1]; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="form-group mb-3">
            <button class="btn btn-primary d-block w-100" type="submit" style="background: #00b1fc;">Login admin</button>
        </div>
        <a class="forgot" href="#">Mot de passe oublié?</a>
    </form>
</section>
<?php include "../includes/footer.php" ?>
