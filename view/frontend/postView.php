<?php $title = htmlspecialchars($post[1])." | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

  <div class="navbar">
    <?php if (isset($_SESSION['name'])): ?>
      <a href="index.php?action=admin"><i class="fas fa-chalkboard-teacher"></i><p> TABLEAU DE BORD</p></a>
    <?php else: ?>
      <a href="index.php?action=listPosts"><i class="fas fa-home"></i><p> RETOUR A L'ACCUEIL</p></a>
    <?php endif; ?>
  </div>

<div class="postView-main-container">
  <section class="post-container">
    <?php if ($post == false) : ?>
      <p class ="no-post"> Ce chapitre n'est pas disponible.</p>
    <?php  elseif ($post !== false) : ?>
      <div class="post">
        <h2 class = "title2"> <?php echo htmlspecialchars($post[1]); ?> </h2>
          <hr>
            <p> <?php echo nl2br($post[2]); ?> </p>
      </div>
  </section>
  <hr>
  <section class ="comments-section" >
    <div class="comment-section-tle3">
      <h3>Commentaires</h3>
    </div>
    <div class="comments-container">
      <!-- si l'article n'a pas encore de commentaires ou si les commentaires ne sont pas associés à l'id du post-->
      <?php if($nbCommentsByPost[0] == 0) : ?>
        <div class="no-comments">
            <p> Cet article n'a pas encore de commentaire...</p>
        </div>
      <?php else : ?>
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
          <?php if(!isset($_SESSION['name'])) :?>
          <div class="signal-container">
            <?php if($comment[5] == true):?> <!-- si le commentaire est déjà signalé afficher la confirmation -->
            <p class="signaled-comment"><em> Commentaire signalé</em></p>
            <?php else :?> <!-- sinon afficher le lien permettant de signaler le commentaire -->
              <a class="signal-comment" href="index.php?action=setFlag&amp;id=<?= $comment[0]?>"> <i class="fas fa-flag"></i> signaler</a>
            <?php endif;?>
          </div>
          <!-- si l'utilisateur est connecté, afficher l'icône pour supprimer le commentaire -->
          <?php elseif (isset($_SESSION['name'])) : ?>
            <div class="delete-comment">
              <a href ="index.php?action=deleteComment&amp;id=<?= $post[0] ?>"> <i class="fas fa-trash"></i> supprimer</a>
            </div>
          <?php endif; ?>
        <?php endif;?>
      <?php endwhile; ?>
    <?php endif;?>
    </section>
    <section class="comment-form-container">
      <?php if(!isset($_SESSION['name'])) : ?>
      <!-- afficher le formulaire pour ajouter un commentaire -->
      <div class="form">
          <h5> <i class="fas fa-comment-alt"></i>  COMMENTER </h5>
            <form class="comments-form" action="index.php?action=addComment&amp;id=<?= $post[0] ?>" method="post">
              <i class="fas fa-user"></i> <input type="text" name="author"  placeholder="Pseudo" required><br/>
              <textarea name="comment" required> </textarea> <br/>
              <input type="submit" name="submit" value="Envoyer">
            </form>
      </div>
      <?php endif; ?>
    </section>
  </div>
  <?php endif; ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
