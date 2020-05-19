<?php $title = "Accueil | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

    <div class="navbar">
    <?php if(isset($_SESSION['name'])):?>

      <a class="navlink" href="index.php?action=newPost"> NOUVEL ARTICLE </a>
      <a class="navlink" href="index.php?action=admin"> TABLEAU DE BORD </a>
      <a class="navlink" href="index.php?action=logout"> <i class="fas fa-sign-out-alt"></i> DECONNEXION </a>


    <?php else : ?>
      <a class="navlink" href="index.php?action=loginForm"> <i class="fas fa-home"></i> </a>
      <a class="navlink" href="index.php?action=loginForm"> <i class="fas fa-sign-in-alt"></i>  CONNEXION </a>
    <?php endif;?>
    </div>

    <section class = "listposts-section">

      <?php while( $data = $posts -> fetch()):?> <!-- récupérer les infos dans un array -->

    <!-- ATTENTION QQCH NE MARCHE PAS AVEC CETTE PORTION DE CODE -->

      <!--si l'array $data est vide -->
      <?php if ($data == false) : ?>
        <div class="no-post">
          <p> Il n'y a pas encore d'article à afficher </p>
        <?php if (isset($_SESSION['name'])): ?>
          <p> <a href="index.php?action=newPost"> Créer une nouvelle publication ? </a></p>
        </div>
        <?php endif; ?>


    <!-- FIN DE LA PORTION DE CODE QUI NE MARCHE PAS -->

      <!-- Sinon, s'il y a des données dans l'array $data -->
    <?php elseif($data[4] == "yes") :?>
      <div class="listposts-container">
      <a href="index.php?action=post&amp;id=<?= $data[0] ?>">
        <div class="listposts-head">
          <?php echo htmlspecialchars($data[3]); ?>
          <h3><?php echo htmlspecialchars($data[1]); ?></h3>
        </div>
        <hr>
        <div class="listposts-content">
          <?php echo substr($data[2], 0, 650).'...';?>
        </div>

        <div class="listposts-footer">
          <a href="index.php?action=post&amp;id=<?= $data[0] ?>"> Découvrir la suite... </a>
        </div>
      </a>
    </div><!--FIN de else if -->
  <?php endif;?> <!-- FIN DU IF-->
  <?php endwhile; ?> <!-- FIN de la boucle while -->
  <?php $posts -> closeCursor(); ?>
  </section>


<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
