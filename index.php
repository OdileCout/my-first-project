<?php
    session_start();
    include_once('models/config.php');
    include_once('models/Database.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Ma page <?php echo 'Projet POO Blog'; ?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <!-- <a class="navbar-brand" href="#"></a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php?home">Accueil <span class="sr-only">(current)</span></a>
        </li>
    <?php if(!empty($_SESSION['id'])){ ?>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?profil">Profil <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?deconnexion">Deconnexion<span class="sr-only">(current)</span></a>
        </li>
    <?php }else{ ?>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?connexion">Connexion<span class="sr-only">(current)</span></a>
        </li>
    <?php } ?>
      </ul>
    </div>
  </nav>
  <?php
        if(isset($_GET['home'])){
            include_once('views/accueil.php');
        }elseif(isset($_GET['inscription'])){
            include_once('models/Utilisateurs.php');
            include_once('controllers/inscriptionCtrl.php');
            include_once('views/inscription.php');
        }elseif(isset($_GET['connexion'])){
            include_once('models/Utilisateurs.php');
            include_once('controllers/connexionCtrl.php');
            include_once('views/connexion.php');
        }elseif(isset($_GET['deconnexion'])){
            include_once('controllers/deconnexionCtrl.php');
        }elseif(isset($_GET['profil'])){
            include_once('models/Utilisateurs.php');
            include_once('controllers/profilCtrl.php');
            include_once('views/profil.php');
        }else{
            include_once('views/accueil.php');
        }
    ?>
 
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
   <script type="text/javascript" src="">
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
</script>
</body>
</html>