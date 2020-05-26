<?php $title = "Nouvel Article | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>
<div class="navbar"></div>
<div class="edit-post-container">
  <h2> Nouvel article </h2>
    <hr>
  <?php
    if (isset($savePost) && $savePost == false){
      echo " <p> Votre article n'a pas pu être enregistré. Merci de rééssayer plus tard.</p>";
    }
  ?>
    <form action="index.php?action=savePost" method="post">
      <i class="fas fa-feather-alt"></i> <input type="text" name="title" value="" placeholder="Titre de l'article" required>
      <input type="checkbox" name="published" value="" >
      <label class="published" for="published"> PUBLIER </label>
      <label class="submit" for="submit"><i class="fas fa-save"></i></label>
      <input type="submit" name="submit" value="ENREGISTRER">
      <?php if(isset($_SESSION['name'])) : ?>
        <a class="back" href="index.php?action=admin">
          <i class="fas fa-arrow-circle-left"></i>
          <p>RETOUR</p>
        </a>
      <?php else : ?>
        <a class="back" href="index.php?action=listPosts">
          <i class="fas fa-arrow-circle-left"></i>
          <p> RETOUR </p>
        </a>
      <?php endif; ?>
      <textarea id="content" name="content" required>  </textarea>
    </form>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
