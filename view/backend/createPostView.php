<?php $title = "Créer un nouvel article | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

<h1 > Billet simple pour l'Alaska </h1>
<p class ="subtitle"> Créer un nouvel article <i class="far fa-keyboard"></i> </p>
<hr>
<?php
if (isset($savePost) && $savePost == false){
      echo " Votre article n'a pas pu être enregistré. Merci de rééssayer plus tard. <br/>";
  }
?>
<form action="index.php?action=savePost" method="post">
  <label for="title">Titre : </label>

  <input type="text" name="title" value="" placeholder=" Mon titre ici..." required>
  <textarea id="content" name="content" required>  </textarea>

  <label for="published"> PUBLIER ?</label>
  <input type="checkbox" name="published" value="yes" checked>
  <input type="submit" name="submit" value="ENREGISTRER">
  <a href="index.php?action=listPosts"> FERMER </a>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
