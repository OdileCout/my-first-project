
    <div class="card container mt-3 text-center" style="width: 30rem;">
        <div class="card-body" style="width: 30rem;">
            <img src="views/assets/img/imgUser.jpg" style="width: 15rem;" class="card-img-top" alt="...">
        </div>
        <div class="card-body" style="width: 30rem;">
            <h5 class="card-title">Votre nom : <?php echo $utilisateur->pseudo; ?></h5>
            <p class="card-text">Votre rôle sur le site : <?= $utilisateur->nom ?></p>
            <p class="card-text text-success">Vous êtes bien connecté</p>
        </div>
    </div>
    <div class="container mt-5 text-center" id="modifierPseudoBox">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Supprimer mon profil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Voulez vous vraiment supprimer votre compte ?</p>
                        <p class="text-danger"><b>Attention :</b> Toute fermeture de compte est définitive ! Une fois votre compte supprimé, il ne sera plus possible de le restaurer</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <form method="POST">
                            <button type="submit" name="supprimer" class="btn btn-danger">Confirmer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 text-center">
        <h1 class="text-center">Voulez vous modifier des informations sur votre profil?</h1>
        <button type="button" id="" class="btn btn-primary">Modifier Pseudo</button>
        <button type="button" id="" class="btn btn-secondary">Modifier mot de passe</button>
        <button data-toggle="modal" data-target="#exampleModal" type="button" name="supprimer" class="btn btn-danger">Supprimer mon profil ?</button>
    </div>
    <div class="container mt-5 col-6 mx-auto" id="modifierPassBox">
        <form method="POST">
            <div class="mb-5">
                <div class="form-group">
                    <label for="exampleInputPseudo">Pseudo actuel</label>
                    <input type="text" disabled="disabled" class="form-control" name="pseudo" id="exampleInputPseudo" aria-describedby="pseudoHelp" value="<?= (!empty($utilisateur->pseudo)) ? $utilisateur->pseudo : '' ?>" />
                </div>
                <div class="form-group">
                    <label for="exampleInputNouvPseudo">Nouveau pseudo</label>
                    <input type="text" class="form-control" name="nouvPseudo" id="exampleInputNouvPseudo" aria-describedby="pseudoHelp" />
                    <small id="pseudoHelp" class="form-text text-muted">Vous pouvez changer votre pseudo.</small>
                </div>
                <?php if (isset($formError['nouvPseudo'])){ ?>
                    <p class="text-danger"><?= $formError['nouvPseudo'] ?></p>
                <?php } else if(isset($formError['pseudoExiste'])){ ?>
                    <p class="text-danger"><?= $formError['pseudoExiste'] ?></p>
                <?php } ?>
                <div class="form-group">
                    <label for="exampleInputPassword1">Rentrez votre mot de passe</label>
                    <input type="password" class="form-control" name="ancienPassVerif" id="exampleInputPassword1" />
                </div>
                <?php if (isset($formError['passConnVide'])){ ?>
                    <p class="text-danger"><?= $formError['passConnVide'] ?></p>
                <?php } else if(isset($formError['passIncorrect'])){ ?>
                    <p class="text-danger"><?= $formError['passIncorrect'] ?></p>
                <?php } ?>
                <button type="submit" name="modifierPseudo" class="btn btn-primary float-right">Modifier Pseudo</button>
            </div>
            <h4>Changer le mot de passe</h4>
            <?php if(isset($formSucces['success'])){ ?>
                <p class="text-success text-center"><?= $formSucces['success'] ?></p>
            <?php } ?>
            <div class="form-group">
                <label for="exampleInputPassword2">Nouveau mot de passe</label>
                <input type="password" class="form-control" name="passNouv" id="exampleInputPassword2" />
            </div>
            <?php if(isset($formError['passVide'])){ ?>
                 <p class="text-danger"><?= $formError['passVide'] ?></p>
            <?php } else if(isset($formError['passNonValide'])){ ?>
                <p class="text-danger"><?= $formError['passNonValide'] ?></p>
            <?php } ?>
            <div class="form-group">
                <label for="exampleInputPassword2">Confirmer le mot de passe</label>
                <input type="password" class="form-control" name="passConfirm" id="exampleInputPassword2" />
            </div>
            <?php if (isset($formError['passDifferent'])){ ?>
                <p class="text-danger"><?= $formError['passDifferent'] ?></p>
            <?php } else if(isset($formError['passConfirmVide'])){ ?>
                <p class="text-danger"><?= $formError['passConfirmVide'] ?></p>
             <?php } ?>
            <div class="form-group">
                <label for="exampleInputPassword1">Entrez votre mot de passe actuel</label>
                <input type="password" class="form-control" name="ancienPass" id="exampleInputPassword1" />
            </div>
            <?php if (isset($formError['passConnVide'])){ ?>
                <p class="text-danger"><?= $formError['passConnVide'] ?></p>
            <?php } else if (isset($formError['passIncorrect'])){ ?>
                <p class="text-danger"><?= $formError['passIncorrect'] ?></p>
            <?php } ?>
            <button type="submit" name="modifierPass" class="mb-5 btn btn-primary float-right">Modifier Mot de passe</button>
        </form>
    </div>