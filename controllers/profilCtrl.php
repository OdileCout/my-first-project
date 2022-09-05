<?php
//Instanciation de la class Utilisateurs
$utilisateurs = new Utilisateurs();
$utilisateurs->setMail($_SESSION['mail']);
$utilisateurs->setId($_SESSION['id']);
$utilisateur = $utilisateurs->connexionUtilisateurs();
$formError = [];
//Traitement du formulaire por la modification de mot de passe
if(isset($_POST['modifierPass'])){
    if(!empty($_POST['passNouv'])){
        if(mb_strlen($_POST['passNouv']) >=8){
            $nouveauMotPass =htmlspecialchars($_POST['passNouv']);
            if(!empty($_POST['passConfirm'])){
                $confirmMotPass =htmlspecialchars($_POST['passConfirm']);
                if($confirmMotPass === $nouveauMotPass){
                    if(!empty($_POST['ancienPass'])){
                        $ancienPass = $_POST['ancienPass'];
                        if(password_verify($ancienPass, $utilisateur->MotDepasse)){
                            $motdepasse = password_hash($confirmMotPass,PASSWORD_DEFAULT);
                            $utilisateurs->setPass($motdepasse);
                            $utilisateurs->modifierUtilisateur();
                            $formSucces['success'] = 'Votre mot de passe est changé';
                        }else{
                            $formError['passIncorrect'] = 'Le mot de passe est incorrect';
                        }
                    }else{
                        $formError['passConnVide'] = 'Veillez rentrer votre mot de passe';
                    }
                }else{
                $formError['passDifferent'] = 'Le deuxième mot de passe n\'est pas conforme au premier'; 
                }
            }else{
                $formError['passConfirmVide'] = 'Le champ confirmer mot de passe est vide';
            }
        }else{
            $formError['passNonValide'] = 'Le mot de passe doit contenir au moins 8 caractères';
        }
    }else{
        $formError['passVide'] = 'Le champ mot de passe est vide' ;
    }
}
//Le traitement du formulaire de modification de pseudo
if(isset($_POST['modifierPseudo'])){
    $tab = [];
    if(!empty($_POST['nouvPseudo'])){
        $nouveauPseudo =htmlspecialchars($_POST['nouvPseudo']);
        if(!empty($_POST['ancienPassVerif'])){
            $ancienPass = $_POST['ancienPassVerif'];
            if(password_verify($ancienPass, $utilisateur->MotDepasse)){
                $utilisateurs->setPseudo($nouveauPseudo);
                $verif = $utilisateurs->verif();
                $varId = 0;
                if(!empty($verif)){
                    foreach ($verif as $key => $value) {
                        if($value->pseudo === $utilisateurs->getPseudo()){
                            $varPseudo = $value->pseudo;
                            $varId = $value->id;
                        }
                        array_push($tab, $value->pseudo);
                    }
                }  
                if(in_array($utilisateurs->getPseudo(), $tab)){
                    if($varId ===  $utilisateurs->getId()){
                        $utilisateurs->modifierUtilisateurPseudo();
                        header('Location: index.php?profil');
                    }else{
                        $formError['pseudoExiste'] = 'Le pseudo existe déjàaaa'; 
                    }
                }else{
                    $utilisateurs->modifierUtilisateurPseudo();
                    header('Location: index.php?profil');
                }
            }else{
                $formError['passIncorrect'] = 'Le mot de passe est incorrect';
            }
        }else{
            $formError['passConnVide'] = 'Veillez rentrer votre mot de passe';
        }
    }else{
        $formError['nouvPseudo'] = 'Le champ nouveau Pseudo est vide';
    }
}
//À supprimer après
if(isset($_POST['modifier'])){
    $tab = [];
    // $tab2 = [];
    if(!empty($_POST['pseudo']) && !empty($_POST['ancienPass'])){
        $pass = htmlspecialchars($_POST['ancienPass']);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        if(!empty($_POST['pass'])) {
            if(password_verify($pass, $utilisateur->MotDepasse)){
                if(mb_strlen($_POST['pass']) >=8){
                    $nouveauPass = htmlspecialchars(password_hash($_POST['pass'],PASSWORD_DEFAULT));
                    $utilisateurs->setPseudo($pseudo);
                    $utilisateurs->setPass($nouveauPass);
                    $verif = $utilisateurs->verif();
                    $varId = 0;
                    if(!empty($verif)){
                        foreach ($verif as $key => $value) {
                            if($value->pseudo === $utilisateurs->getPseudo()){
                                // $varPseudo = $value->pseudo;
                                $varId = $value->id;
                            }
                            array_push($tab, $value->pseudo);
                        }
                    }  
                    if(in_array($utilisateurs->getPseudo(), $tab)){
                        if($varId ===  $utilisateurs->getId()){
                            $utilisateurs->modifierUtilisateur();
                            header('Location: index.php?profil');
                        }else{
                            $formError['pseudoExiste'] = 'Le pseudo existe déjàaaa'; 
                        }
                    }else{
                        $utilisateurs->modifierUtilisateur();
                        header('Location: index.php?profil');
                    }
                }else{
                    $formError['passValide'] = 'Le mot de passe doit être plus de 8 caractères' ;
                }
            }else{
                $formError['motDePasse'] = 'Le mot de passe est pas bon';
            }
        }else{
            if(password_verify($pass, $utilisateur->MotDepasse)){
                //Là on fait le traitement sur le changement de pseudo seul
                $utilisateurs->setPseudo($pseudo);
                $verif = $utilisateurs->verif();
                $varId = 0;
                if(!empty($verif)){
                    foreach ($verif as $key => $value) {
                        if($value->pseudo === $utilisateurs->getPseudo()){
                            $varPseudo = $value->pseudo;
                            $varId = $value->id;
                        }
                        array_push($tab, $value->pseudo);
                    }
                }  
                if(in_array($utilisateurs->getPseudo(), $tab)){
                    if($varId ===  $utilisateurs->getId()){
                        $utilisateurs->modifierUtilisateurPseudo();
                        header('Location: index.php?profil');
                    }else{
                        $formError['pseudoExiste'] = 'Le pseudo existe déjàaaa'; 
                    }
                }else{
                    $utilisateurs->modifierUtilisateurPseudo();
                    header('Location: index.php?profil');
                }  
            }else{
                $formError['motDePasse'] = 'Le mot de passe est pas bon';
            }
        }
    }else{
        $formError['champVide'] = 'Il faut remplir le champ pseudo et Ancien mot de passe';
    }
}
//Les codes pour la suppression
if(isset($_POST['supprimer'])){
    $utilisateurs->suprimerUtilisateur();
    session_destroy();
    header('Location: index.php?inscription');
}