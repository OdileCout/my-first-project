<div class="container text-center my-5">
    <h1>Connexion</h1>
    <form class="mt-5" method="POST">
        <div class="form-group row">
            <label for="inputMail" class="col-sm-2 col-form-label">Adresse e-mail</label>
            <div class="col-sm-10">
            <input type="email" name="mail" class="form-control" id="inputMail" value="<?= (isset($_POST['mail'])) ? $_POST['mail'] : '' ?>" />
            </div>
        </div>
        <?php if(isset($formSucces['succes'])){ ?>
            <small class="form-text text-danger"><?= $formSucces['succes'] ?></small>
      <?php }else if(isset( $formError['mailValide'])){ ?>
                 <small class="form-text text-danger"><?= $formError['mailValide']?></small>
            <?php } ?>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
            <input type="password" name="pass" class="form-control" id="inputPassword" />
            </div>
        </div>
        <?php if(isset( $formError['passIncorrect'])){ ?>
                <small class="form-text text-danger"><?= $formError['passIncorrect']?></small>
        <?php }
            if(isset( $formError['passValide'])){ ?>
                <small class="form-text text-danger"><?= $formError['passValide']?></small>
        <?php }
        if(isset($formError['inputVide'])){ ?>
            <small class="form-text text-danger"><?= $formError['inputVide'] ?></small>
       <?php }elseif(isset($formError['profilExiste'])){ ?>
            <small class="form-text text-success"><?= $formError['profilExiste'] ?></small>
      <?php } ?>
        <button name="valider" type="submit" class="btn btn-primary mb-2 float-right">Se Connnecter</button>
    </form>
</div>