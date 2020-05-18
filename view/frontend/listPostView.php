<?php $title = "Accueil | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

    <div class="navbar">
    <?php if(isset($_SESSION['name'])):?>
      <a class="navlink" href="#"> DERNIERS CHAPITRES</a>
      <a class="navlink" href="index.php?action=newPost"> NOUVEL ARTICLE </a>
      <a class="navlink" href="index.php?action=admin"> TABLEAU DE BORD </a>
      <a class="navlink" href="index.php?action=logout"> DECONNEXION </a>


    <?php else : ?>
      <a class="navlink" href="index.php?action=loginForm"> <i class="fas fa-home"></i> </a>
      <a class="navlink" href="#"> DERNIERS CHAPITRES</a>
      <a class="navlink"href="#"> A PROPOS </a>
      <a class="navlink" href="index.php?action=loginForm"> CONNEXION </a>
    <?php endif;?>
    </div>

    <section class ="summary-container">
      <div class="summary-content">
        <h3> Résumé</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam magna orci, feugiat eget semper ut, vulputate at nulla. Nam pulvinar tortor leo, ac aliquet lacus consectetur id. In at ultricies mi. Praesent dui justo, congue ultrices faucibus ac, lobortis at odio. Vestibulum sodales suscipit diam ac dignissim. Donec porta facilisis erat nec lacinia. Donec purus nisi, tristique non urna quis, semper consequat sapien. Pellentesque libero libero, pellentesque sed faucibus in, mollis vel orci. Nulla interdum nibh et lacus laoreet luctus sed vitae nulla. In finibus lacus eu quam mollis varius. Curabitur nec massa porta, ullamcorper elit et, fringilla ipsum. Nam a molestie est. Duis nec purus quis nisl ullamcorper blandit. Mauris pellentesque, nisi non ornare molestie, eros mauris interdum nunc, a ullamcorper sem lectus semper est. Suspendisse potenti. Aliquam erat volutpat.</p>
      </div>

    </section>


  <section class = "listposts-section">
    <h2>Liste des chapitres publiés</h2>
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
      <!-- <div class="content-head"> -->
        <div class="listposts-date">
          <?php echo htmlspecialchars($data[3]); ?>
        </div>
        <div class="listposts-title">
          <h3><?php echo htmlspecialchars($data[1]); ?></h3>
        </div>
      <!-- </div> -->
      <hr class ="listposts-hr">
      <div class="listposts-content">
        <?php echo substr($data[2], 0, 650).'...';?>

      </div>

      <div class="listposts-footer">
        <a class="listposts-footer-link" href="index.php?action=post&amp;id=<?= $data[0] ?>"> Découvrir la suite... </a>
      </div>
    </div><!--FIN de else if -->

<?php endif;?> <!-- FIN DU IF-->
<?php endwhile; ?> <!-- FIN de la boucle while -->
<?php $posts -> closeCursor(); ?>
  </section>
<section class = "about">
    <h4> A propos de l'auteur </h4>
      <p> Duis rhoncus vitae nisi non rhoncus. Aliquam vel sapien vel orci aliquet volutpat. Curabitur eu augue in massa viverra lobortis. Phasellus pretium leo id eleifend aliquet. Suspendisse gravida nisi a enim commodo auctor. Quisque a rutrum arcu. Nunc eu ex aliquam, efficitur ex sit amet, efficitur ligula. Pellentesque placerat tincidunt lectus ut egestas. Suspendisse eleifend commodo ligula, et mattis augue pharetra quis. Suspendisse sed nisi justo.</p>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
