<?php
//Instanciation de la class Utilisateurs
$utilisateurs = new Utilisateurs();
if(isset($_POST['valider'])){
    $formError = [];
    $formSucces = [];
    if(!empty($_POST['mail']) && !empty($_POST['pass'])){
        if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
            $mail = htmlspecialchars($_POST['mail']);
        }else{
            $formError['mailValide'] = 'Il faut mettre une valeur en format e-mail dupont@yahoo.com' ; 
        }
        if(mb_strlen($_POST['pass']) >=8){
            $pass = htmlspecialchars($_POST['pass']);
        }else{
            $formError['passValide'] = 'Le mot de passe doit être plus de 8 caractères' ;
        }
    }else{
         $formError['inputVide'] = 'Tous les champs doivent être rempli' ;
    }
    if(empty($formError)){
        $utilisateurs->setMail($mail);
        $connexion = $utilisateurs->connexionUtilisateurs();
        // var_dump($connexion);
        if(is_object($connexion)){
            if(password_verify($pass, $connexion->MotDepasse) ){
                $_SESSION['id'] = $connexion->id;
                $_SESSION['role'] = $connexion->id_Roles;
                $_SESSION['mail'] = $connexion->email;
                $_SESSION['pseudo'] = $connexion->pseudo;
                header('Location: index.php?profil');
                exit();
                // $formError['profilExiste'] = 'Vous êtes connecté';
            }else{
                 $formError['passIncorrect'] = 'Le mot de passe est incorrect';
            } 
        }else{
            //J'inscrit l'utilisateur
            $formSucces['succes'] = 'L\'adresse e-mail n\'existe pas';
        }
    }
}