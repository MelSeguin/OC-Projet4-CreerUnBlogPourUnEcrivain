<?php $title = htmlspecialchars($post[1])." | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

  <div class="navbar">
    <a class ="navlink" href="index.php"> Retour à la liste des chapitres</a>
    <a class ="navlink"href="#"> A PROPOS </a>
    <a class ="navlink" href="#"> CONTACT </a>
  </div>

      <h1>Billet simple pour l'Alaska</h1>

        <?php if ($post == false) : ?>
          <p> Il y a eu une erreur </p>
          <a href="index.php"> Retourner à la liste des articles </a>

        <?php  elseif ($post !== false) : ?>
          <div class="post-container">
            <h2 class = "post-title"> <?php echo htmlspecialchars($post[1]); ?> </h2>
              <p class="post-content"> <?php echo nl2br($post[2]); ?> </p>
          </div>
        <?php endif; ?>

        <h2>Commentaires</h2>

        <?php while ($comment = $comments->fetch()): ?>
          <?php if ($comment == false) : ?>
            <p> Pas de commentaires. </p>
          <!-- Sinon -->
        <?php elseif($comment[1] == $post[0]) :?>
            <div class="comment-container">
              <!-- afficher la date du commentaire-->
              <div class="comment-infos">
                <p><strong><?php echo $comment[2]; ?></strong>, le <em><?php echo $comment[3]; ?></em></p>
                </br>
              </div>
              <!-- afficher le commentaire -->
              <div class="comment-content">
                <p><?php echo $comment[4];?></p>
              </br>
            </div>
          </div>
          <?php endif;?>
          <?php endwhile; ?>

        <?php if(!isset($_SESSION['name'])):?>
        <!-- formulaire pour ajouter un commentaire -->
        <div class="form">
            <h5> Ajouter un nouveau commentaire : </h5>
              <form class="comments-form" action="index.php?action=addComment&amp;id=<?= $post[0] ?>" method="post">
                <label for="author"> Pseudo </label> <br/>
                <input type="text" name="author" value="" placeholder="pseudo" required><br/>
                <label for="comment"> Commentaire </label> <br/>
                <textarea name="comment" required> </textarea> <br/>
                <input type="submit" name="submit" value="Soumettre">
              </form>
        </div>
      <?php endif;?>
        </div> <!-- fin de la div conteneur  -->

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
