<?php $title = "Nouvel Article | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

<div class="edit-post-container">
  <h2> Nouvel article </h2>
    <hr>
  <?php
    if (isset($savePost) && $savePost == false){
      echo " <p> Votre article n'a pas pu être enregistré. Merci de rééssayer plus tard.</p>";
    }
  ?>
    <form action="index.php?action=savePost" method="post">
      <i class="fas fa-book-open"></i> <input type="text" name="title" value="" placeholder="Titre de l'article" required>
      <input type="checkbox" name="published" value="" >
      <label for="published"> PUBLIER </label>
      <input type="submit" name="submit" value="ENREGISTRER">
      <?php if(isset($_SESSION['name'])) : ?>
        <a href="index.php?action=admin"> RETOUR </a>
      <?php else : ?>
        <a href="index.php?action=listPosts"> RETOUR </a>
      <?php endif; ?>
      <textarea id="content" name="content" required>  </textarea>
    </form>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
