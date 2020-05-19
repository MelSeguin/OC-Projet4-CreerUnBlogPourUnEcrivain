<?php $title = htmlspecialchars($post[1])." | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

<div class="navbar">
    <?php if (isset($_SESSION['name'])): ?>
      <a class ="navlink" href="index.php?action=listPosts"> VOIR MON BLOG </a>
      <a class ="navlink"href="index.php?action=admin"> <i class="fas fa-home"></i> </a>

    <?php else: ?>
      <a class ="navlink" href="index.php?action=listPosts"> <i class="fas fa-home"></i> RETOUR A L'ACCUEIL DU BLOG</a>
    <?php endif; ?>
  </div>
<div class="postView-main-container">
  <section class="post-container">
    <?php if ($post == false) : ?>
      <p> Ce chapitre n'est pas disponible.

      <?php if (isset($_SESSION['name'])): ?>
        <a href="index.php?action=admin"> Retour à la liste des chapitres</a> ?
      <?php else: ?>
        <a href="index.php?action=listPosts"> Retour à la page d'accueil</a> ?
      <?php endif; ?>
      </p>
    <?php  elseif ($post !== false) : ?>
      <div class="post">
        <h2 class = "title2"> <?php echo htmlspecialchars($post[1]); ?> </h2>
          <hr>
            <p> <?php echo nl2br($post[2]); ?> </p>
          <hr>
      </div>
    <?php endif; ?>
  </section>
  <section class ="comments-section" >
    <h3>Commentaires</h3>
    <div class="comments-container">
      <?php while ($comment = $comments->fetch()):?>
        <?php if($comment[1] == $post[0]) :?>
          <div class="comment-container">
            <div class="comment-infos">
              <p class ="comment-date"> le <?php echo $comment[3]; ?><br/>
              <p class="comment-author"><strong> <?php echo $comment[2]; ?></strong></p>
              </br>
            </div>
            <div class="comment-content">
              <p><?php echo $comment[4];?></p>
            </br>
          </div>
          <div class="signal-container">
            <?php if($comment[5] == true):?> <!-- si le commentaire est déjà signalé afficher la confirmation -->
            <p class="signaled-comment"><em> Commentaire signalé</em></p>
            <?php else :?> <!-- sinon afficher le lien permettant de signaler le commentaire -->
              <a class="signal-comment" href="index.php?action=setFlag&amp;id=<?= $comment[0]?>"> <i class="fas fa-flag"></i> signaler</a>
            <?php endif;?>
          </div>
          <!-- si l'utilisateur est connecté, afficher l'icône pour supprimer le commentaire -->
          <?php if (isset($_SESSION['name'])) : ?>
            <div class="delete-comment">
              <a href ="index.php?action=deleteComment&amp;id=<?= $post[0] ?>"> <i class="fas fa-trash"></i></a>
            </div>
          <?php endif; ?>
          </div>
        <?php endif;?>
        <?php endwhile; ?>
      <!-- si l'article n'a pas encore de commentaires ou si les commentaires ne sont pas associés à l'id du post-->
      <?php if (empty($comments)||$comment[1] !== $post[0]) : ?>
        <p> Cet article n'a pas encore de commentaire</p>
      <?php endif; ?>
      <!-- si l'utilisateur n'est pas connecté -->
    </section>
    <section class="comment-form-container">
      <?php if(!isset($_SESSION['name'])) : ?>
      <!-- afficher le formulaire pour ajouter un commentaire -->
      <div class="form">
          <h5> <i class="fas fa-comment-alt"></i> COMMENTER </h5>
            <form class="comments-form" action="index.php?action=addComment&amp;id=<?= $post[0] ?>" method="post">
              <label for="author"> Pseudo </label> <br/>
              <input type="text" name="author" value="<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}?>" required><br/>
              <label for="comment"> Commentaire </label> <br/>
              <textarea name="comment" required> </textarea> <br/>
              <input type="submit" name="submit" value="Envoyer">
            </form>
      </div>
      <?php endif; ?>
    </section>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
