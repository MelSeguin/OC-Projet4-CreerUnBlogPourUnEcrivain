<?php $title = "Connexion | Billet simple pour l'Alaska" ?>

<?php ob_start(); ?>

  <h1> Billet simple pour l'Alaska </h1>
  <h3> Connexion </h3>


  <?php
    if (empty($_POST)) {
      echo $welcomeMessage;
    } elseif (!empty($_POST && $correctInfos == false)) {
      echo $errorMessage;
    }
  ?>
  <div class="login-fieldset">
    <form class="login-form" action="index.php?action=login" method="post">
      <label for="name"> Pseudo  : </label>
      <input type="text" name="name" value="" required> <br/>
      <label for="password"> Mot de passe : </label>
      <input type="password" name="password" value="" required><br/>
      <input type="submit" name="submit" value="Envoyer">
    </form>
    <br/>
    <a href="#"> Identifiant ou mot de passe oublié ?</a>
  </div>


<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
