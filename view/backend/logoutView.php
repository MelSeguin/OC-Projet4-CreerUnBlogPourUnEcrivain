<?php $title = "Déconnexion | Billet simple pour l'Alaska" ?>

<?php ob_start(); ?>

  <div class="navbar">
    <a class="navlink" href="index.php?action=listPosts"> Retour à la page d'accueil</a>
    <a class="navlink"href="index.php?action=loginForm"> CONNEXION </a>
  </div>

  <h1> Billet simple pour l'Alaska </h1>

    <p> Vous êtes bien déconnecté ...<p>


<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
