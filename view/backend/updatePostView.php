<?php $title = "Editer | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>
<div class="edit-post-container">
  <h2> Edition de l'article </h2>
    <hr>
    <form action="index.php?action=updatePost&amp;id=<?= $editPost[0] ?>" method="post">
      <i class="fas fa-book-open"></i> <input type="text" name="title" value="<?php echo $editPost['post_title'] ?>" required>
      <input type="checkbox" name="published" value="" >
      <label for="published"> PUBLIER </label>
      <input type="submit" name="submit" value="ENREGISTRER">
      <a href="index.php?action=admin"> FERMER </a>
      <textarea id="content" name="content" required> <?php echo $editPost['post_content'] ?>  </textarea>
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
