<div class="container text-center mt-5">
    <h1>Inscription</h1>
    <form class="mt-5" method="POST">
        <div class="form-group row">
            <label for="inputPseudo" class="col-sm-2 col-form-label">Pseudo</label>
            <div class="col-sm-10">
            <input name="pseudo" type="text" class="form-control" id="inputPseudo" value="<?= (isset($_POST['pseudo'])) ? $_POST['pseudo'] : '' ?>" />
            </div>
        </div>
        <?php
                if(isset( $formError['pseudoExiste'])){ ?>
                    <small class="form-text text-danger"><?= $formError['pseudoExiste']?></small>
            <?php 
                }
            ?>
        <div class="form-group row">
            <label for="inputMail" class="col-sm-2 col-form-label">Adresse e-mail</label>
            <div class="col-sm-10">
            <input type="email" name="mail" class="form-control" id="inputMail" value="<?= (isset($_POST['mail'])) ? $_POST['mail'] : '' ?>" />
            </div>
        </div>
        <?php
                if(isset( $formError['mailExiste'])){ ?>
                    <small class="form-text text-danger"><?= $formError['mailExiste']?></small>
            <?php 
                }else if(isset( $formError['mailValide'])){ ?>
                 <small class="form-text text-danger"><?= $formError['mailValide']?></small>
            <?php    }
            ?>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
            <input type="password" name="pass" class="form-control" id="inputPassword" />
            </div>
        </div>
         <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
    <?php
        if(isset( $formError['passValide'])){ ?>
                <small class="form-text text-danger"><?= $formError['passValide']?></small>
    <?php }
        if(isset($formError['inputVide'])){ ?>
            <small class="form-text text-danger"><?= $formError['inputVide'] ?></small>
       <?php }elseif(isset($formSucces['succes'])){ ?>
            <small class="form-text text-success"><?= $formSucces['succes'] ?></small>
      <?php }elseif(isset($formError['profilExiste'])){ ?>
            <small class="form-text text-danger"><?= $formError['profilExiste'] ?></small>
      <?php } ?>
        <button name="valider" type="submit" class="btn btn-primary mb-2 float-right">Confirmer Inscription</button>
    </form>
</div>