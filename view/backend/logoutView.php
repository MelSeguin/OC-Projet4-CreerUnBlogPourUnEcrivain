<?php $title = "Déconnexion | Billet simple pour l'Alaska" ?>

<?php ob_start(); ?>

  <div class="navbar">
    <a class="navlink" href="index.php?action=listPosts"> <i class="fas fa-home"></i> </a>
    <a class="navlink" href="index.php?action=loginForm"> <i class="fas fa-sign-in-alt"></i>  CONNEXION </a>
  </div>

  <div class="logout">
    <h2> Déconnexion </h2>
    <hr>
    <p> Vous êtes bien déconnecté. <br/>
      À bientôt !</p>
  </div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
