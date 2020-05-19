<?php $title = "Mon tableau de bord | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

  <div class="navbar">
    <a class="navlink" href="index.php?action=listPosts"> <i class="fas fa-feather-alt"></i>  VOIR MON BLOG </a>
    <a class="navlink" href="index.php?action=newPost"><i class="fas fa-book-open"></i> NOUVEL ARTICLE </a>
    <a class="navlink" href="index.php?action=displayFlags"><i class="fas fa-flag"></i>  <?php echo $getNumber[0];?></a>
    <a class="navlink" href="index.php?action=logout"> <i class="fas fa-sign-out-alt"></i>  DECONNEXION </a>
  </div>

  <p class="admin-subtitle"> Bonjour <?php echo $_SESSION['name']?>, bienvenu sur votre tableau de bord. <br/>
    Prêt pour rédiger un <a class='text-link' href='index.php?action=newPost'> nouveau chapitre</a> ?</p>
  <hr>

 <table class="admin-listposts">
    <tr>
        <th>TOUS LES ARTICLES</th>
        <th>EN LIGNE</th>
        <th>MODIFIER</th>
        <th>SUPPRIMER</th>
    </tr>

    <tr>
      <?php while($posts = $getPosts -> fetch()):?>
        <?php if ($posts): ?>
          <td><a class ="admin-listposts-links" href="index.php?action=post&amp;id=<?= $posts[0] ?>"><?php echo htmlspecialchars($posts[1]); ?></a></td><!--afficher le titre de l'article-->
          <td><?php if ($posts[4] == 'yes') :?> <!--si l'article est publié-->
              <p class="green-circle"><i class="far fa-check-circle"></i></p> <!--afficher une pastille verte-->
              <?php else :?>
              <p class="grey-circle"><i class="far fa-check-circle"></i></p><!--afficher une pastille grise-->
              <?php endif;?>
          </td>
          <td><a href="index.php?action=editPost&amp;id=<?= $posts[0] ?>"><i class="fas fa-pencil-alt"></i></a></td> <!--modifier un article-->
          <td><a href="index.php?action=deletePost&amp;id=<?= $posts[0] ?>"><i class="fas fa-trash"></i></a></td><!--supprimer un article-->
          </tr>
        <?php else : ?>
          <td> Il n'y a pas encore d'article enregistré / publié. </td>
          </tr>
        <?php endif; ?>
      <?php endwhile; ?>
 </table>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
