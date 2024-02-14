<?php include "../includes2/header.php" ?>

    <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div>
                        <form class="p-3 p-xl-4" method="post">
                            <h4 style="color: rgb(42,116,45);font-weight: bold;margin-bottom: 16px;font-size: 32px;">Prix de vente</h4>
                            <p class="text-muted"></p>
                            <div class="mb-3"><label class="form-label" for="name" style="color: rgb(114,171,100);margin-bottom: 16px;">Thé :</label><select class="form-select">
                                    <optgroup label="This is a group">
                                        <option value="12" selected="">This is item 1</option>
                                        <option value="13">This is item 2</option>
                                        <option value="14">This is item 3</option>
                                    </optgroup>
                                </select></div>
                            <div class="mb-3"><label class="form-label" for="email" style="color: rgb(114,171,100);margin-bottom: 16px;">Prix :</label><input class="form-control form-control-sm" type="email" id="email" name="email" placeholder="veuillez entrer  le prix" style="margin-bottom: 16px;"></div>
                            <div class="mb-3"></div>
                            <div class="mb-3"><button class="btn btn-primary" type="submit" style="background: rgb(87,128,87);margin-top: 16px;">Send </button></div>
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