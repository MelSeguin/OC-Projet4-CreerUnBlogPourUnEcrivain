<?php $title = "Accueil | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

  <header>
    <div class="navbar">
    <?php if(isset($_SESSION['name'])):?>
      <a class="navlink" href="index.php?action=newPost"> NOUVEL ARTICLE </a>
      <a class="navlink" href="index.php?action=displayAccount"> MON COMPTE </a>
      <a class="navlink" href="index.php?action=logout"> DECONNEXION </a>

    <?php else : ?>
      <a class="navlink" href="index.php?action=loginForm"> CONNEXION </a>
      <a class="navlink"href="#"> A PROPOS </a>
      <a class="navlink" href="index.php?action=contactForm"> CONTACT </a>
    <?php endif;?>
    </div>

    <div class="title">
      <h1> Billet simple pour l'Alaska</h1>
        <p class="subtitle"> HERE GOES SUBTITLE</p>
      <hr>
    </div>
  </header>

  <section class = "post-section">
  <?php while( $data = $posts -> fetch()):?> <!-- récupérer les infos dans un array -->
    <!-- s'il y a des données dans l'array $data -->
  <?php if($data) :?>
    <div class="post-container">
        <div class="post-date" >
          <?php echo htmlspecialchars($data[3]); ?>
        </div>
        <div class="post-title">
          <h3><?php echo htmlspecialchars($data[1]); ?></h3>
        </div>
      <hr class ="post-hr">
      <div class="post-content">
        <?php echo substr($data[2], 0, 1250).'...';?>
      </div>
      <div class="post-footer">
        <a class="post-footer-1" href="index.php?action=post&amp;id=<?= $data[0] ?>"> Découvrir la suite... </a>
        <?php if (isset($_SESSION['name'])) : ?>
        <a class="post-footer-2" href="#"> Modifier </a>
        <a class="post-footer-2" href="#"> Supprimer </a>
      <?php endif; ?>
      <hr> <br/><br/><br/>
      </div>
    </div><!--FIN de else if -->
  </section>
<?php endif;?> <!-- FIN DU IF-->
<?php endwhile; ?> <!-- FIN de la boucle while -->
<?php $posts -> closeCursor(); ?>

<section class = "about">
    <h4> A propos de l'auteur </h4>
      <p> Duis rhoncus vitae nisi non rhoncus. Aliquam vel sapien vel orci aliquet volutpat. Curabitur eu augue in massa viverra lobortis. Phasellus pretium leo id eleifend aliquet. Suspendisse gravida nisi a enim commodo auctor. Quisque a rutrum arcu. Nunc eu ex aliquam, efficitur ex sit amet, efficitur ligula. Pellentesque placerat tincidunt lectus ut egestas. Suspendisse eleifend commodo ligula, et mattis augue pharetra quis. Suspendisse sed nisi justo.</p>
</section>
<section class ="other-books">
  <h3 class="other-books-tle3"> AUTRES PUBLICATIONS DU MEME AUTEUR : </h3>
    <div class="books">
      <img src="" alt="picture of 1st book">
      <h5> Title goes here</h5>
      <p class="summary"> Summary goes there</p>
    </div>
    <div class="books">
      <img src="" alt="picture of 2nd book">
      <h5> Title goes here</h5>
      <p class="summary"> Summary goes there</p>
    </div>
    <div class="books">
      <img src="" alt="picture of 3rd book">
      <h5> Title goes here</h5>
      <p class="summary"> Summary goes there</p>
    </div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
