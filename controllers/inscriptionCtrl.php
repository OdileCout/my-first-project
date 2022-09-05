<?php
//Instanciation de la class Utilisateurs
$utilisateurs = new Utilisateurs();
if(isset($_POST['valider'])){
    $formError = [];
    $formSucces = [];
    if(!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['pass'])){
        if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
            $mail = htmlspecialchars($_POST['mail']);
        }else{
            $formError['mailValide'] = 'Il faut mettre une valeur en format e-mail dupont@yahoo.com' ; 
        }
        if(mb_strlen($_POST['pass']) >=8){
            $pass = htmlspecialchars(password_hash($_POST['pass'],PASSWORD_DEFAULT));
        }else{
            $formError['passValide'] = 'Le mot de passe doit être plus de 8 caractères' ;
        }
        $nom = htmlspecialchars($_POST['pseudo']);
    }else{
         $formError['inputVide'] = 'Tous les champs doivent être rempli' ;
    }
    if(empty($formError)){
        $utilisateurs->setPseudo($nom);
        $utilisateurs->setMail($mail);
        $utilisateurs->setPass($pass);
        $verifcateur = $utilisateurs->verifUtilisateur();
        // var_dump($verifcateur);
        if(is_object($verifcateur)){
            if($verifcateur->email == $utilisateurs->getMail() && $verifcateur->pseudo == $utilisateurs->getPseudo()){
                $formError['profilExiste'] = 'Vous avez déjà un compte';
            } else if($verifcateur->email=== $utilisateurs->getMail()){
                $formError['mailExiste'] = 'Le mail existe déjà';
            } else if(strcmp($verifcateur->pseudo, $utilisateurs->getPseudo()) || $verifcateur->pseudo === $utilisateurs->getPseudo()){
                $formError['pseudoExiste'] = 'Le pseudo existe déjà';
            } 
        }else{
            //J'inscrit l'utilisateur
            $utilisateurs->inscrireUtilisateur();
            $formSucces['succes'] = 'Le profil est enregistré';
        }
    }
}