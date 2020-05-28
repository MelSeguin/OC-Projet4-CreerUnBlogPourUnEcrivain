<?php $title = "Editer | Billet simple pour l'Alaska"; ?>
<?php if(isset($_SESSION['name'])):?>
<?php ob_start(); ?>
<div class="navbar"></div>
<div class="edit-post-container">
  <h2> Edition de l'article </h2>
  <hr>
    <form action="index.php?action=updatePost&amp;id=<?= $editPost[0] ?>" method="post">
      <div class="head-container">
        <div class="title-container">
          <i class="fas fa-feather-alt"></i>
          <input type="text" name="title" value="<?php echo $editPost['post_title'] ?>" required>
        </div>
        <div class="box-container">
          <input type="checkbox" id="published" name="published" value="" >
          <label class="published" for="published"> PUBLIER </label>
        </div>
        <div class="buttons-container">
          <div class="summit-button">
            <label class="submit" for="submit"><i class="fas fa-save"></i></label>
            <input type="submit" id="submit" name="submit" value="ENREGISTRER">
          </div>
          <div class="back-button">
            <a class="back" href="index.php?action=admin"><i class="fas fa-arrow-circle-left"></i>RETOUR</a>
          </div>
        </div>
      </div>
      <textarea id="content" name="content" required> <?php echo $editPost['post_content'] ?>  </textarea>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php else :?>
<?php header('location: index.php?action=login') ?>
<?php endif; ?>
<?php require('view/template.php'); ?>
