<?php $title = "Mettre à jour un article | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

<h1 > Billet simple pour l'Alaska </h1>
<p class ="subtitle"> Mettre à jour un article </p>
<hr>


<form action="index.php?action=updatePost&amp;id=<?= $editPost[0] ?>" method="post">
  <label for="title">Titre : </label>

  <input type="text" name="title" value="<?php echo $editPost['post_title'] ?>" required>
  <textarea id="content" name="content" required> <?php echo $editPost['post_content'] ?>  </textarea>

  <label for="published"> PUBLIER ?</label>
  <input type="checkbox" name="published" value="yes" checked>
  <input type="submit" name="submit" value="ENREGISTRER">
  <a href="index.php?action=displayAdminView"> FERMER </a>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
