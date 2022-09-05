<div class="text-center mt-5">
    <h1>Bienvenue sur notre site de Blog troteur</h1>
    <p>Vous pouvez créer et commenter des articles</p>
    <p>Pour le faire, vous devez créer votre pofil</p>
    <?php if(!empty($_SESSION['id'])){ ?>
        <p class="text-success">Vous êtes connecté</p>
   <?php }else{ ?>
         <a href="index.php?inscription"><button class="btn btn-primary">Créer profil</button> 
  <?php } ?>
</div>