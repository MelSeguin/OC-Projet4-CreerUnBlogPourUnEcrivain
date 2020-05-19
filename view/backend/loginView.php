<?php $title = "Connexion | Billet simple pour l'Alaska" ?>

<?php ob_start(); ?>

  <div class="login-fieldset">
    <h2> Connexion </h2>
    <?php
      if (!empty($_POST && $correctInfos == false)) {
        echo "<p> Pseudo et/ou mot de passe incorrect(s)</p>";
      }
    ?>
    <form class="login-form" action="index.php?action=login" method="post">
      <i class="fas fa-user"></i><input type="text" name="name" placeholder="Nom d'utilisateur" value="" required> <br/>
      <i class="fas fa-lock"></i><input type="password" name="password" placeholder="Mot de passe" value="" required><br/>
      <input type="submit" name="submit" value="Me connecter">
    </form>
    <br/>
  </div>


<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
