<?php $title = "Editer | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>
<div class="navbar"></div>
<div class="edit-post-container">
  <h2> Edition de l'article </h2>
    <hr>
    <form action="index.php?action=updatePost&amp;id=<?= $editPost[0] ?>" method="post">
      <i class="fas fa-feather-alt"></i> <input type="text" name="title" value="<?php echo $editPost['post_title'] ?>" required>
      <input type="checkbox" name="published" value="" >
      <label class="published" for="published"> PUBLIER </label>
      <label class="submit" for="submit"><i class="fas fa-save"></i></label>
      <input type="submit" name="submit" value="ENREGISTRER">
      <a class="back" href="index.php?action=admin">
        <i class="fas fa-arrow-circle-left"></i>
        <p>RETOUR</p>
      </a>
      <textarea id="content" name="content" required> <?php echo $editPost['post_content'] ?>  </textarea>
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
