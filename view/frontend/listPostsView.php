<?php $title = "Accueil | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

    <div class="navbar">
    <?php if(isset($_SESSION['name'])):?>
      <a href="index.php?action=newPost"><i class="fas fa-book-open"></i><p> NOUVEL ARTICLE</p></a>
      <a href="index.php?action=admin"><i class="fas fa-chalkboard-teacher"></i> <p> TABLEAU DE BORD</p> </a>
      <a href="index.php?action=logout"><i class="fas fa-sign-out-alt"></i><p> DECONNEXION</p> </a>

    <?php else : ?>
      <a href="index.php?action=listPosts"> <i class="fas fa-home"></i></a>
      <a href="index.php?action=loginForm"> <i class="fas fa-sign-in-alt"></i> <p>CONNEXION </p> </a>

    <?php endif;?>
    </div>

    <section class = "listposts-section">
      <?php if($publishedPosts[0] == 0) :?>
        <div class="no-posts">
          <p> Il n'y a pas encore d'article à afficher.<br/>
        <?php if (isset($_SESSION['name'])): ?>
          <a href="index.php?action=newPost"> Commencer à écrire ? </a></p>
        </div>
        <?php endif; ?>
      <?php else :?>
      <?php while( $data = $posts -> fetch()):?> <!-- récupérer les infos dans un array -->

      <?php if($data[4] == "yes") :?>
        <div class="listposts-container">
          <div class="listposts-head">
           <a href="index.php?action=post&amp;id=<?= $data[0] ?>">
            <p><?php echo htmlspecialchars($data[3]); ?></p>
            <h3><?php echo htmlspecialchars($data[1]); ?></h3>
           </a>
          </div>
          <hr>
          <div class="listposts-content">
           <a href="index.php?action=post&amp;id=<?= $data[0] ?>">
          	<?php echo substr($data[2], 0, 650).'... </span></p>';?>
           </a>
          </div>
          <div class="listposts-footer">
            <a href="index.php?action=post&amp;id=<?= $data[0] ?>"> Découvrir la suite... </a>
          </div>
      </div>
  <?php endif;?>
  <?php endwhile; ?>
  <?php $posts -> closeCursor(); ?>
  </section>
<?php endif; ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
