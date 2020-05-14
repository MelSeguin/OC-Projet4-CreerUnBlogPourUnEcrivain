<?php $title = "Mon tableau de bord | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

<div class="navbar">
  <a class="navlink" href="index.php?action=listPosts"> VOIR MON BLOG </a>
  <a class="navlink" href="index.php?action=newPost"> NOUVEL ARTICLE </a>
  <a class="navlink" href="index.php?action=displayFlags">
    <?php if($getNumber > 0) : ?>
      <i class="fas fa-flag red"></i>
    <?php else :?>
      <i class="fas fa-flag grey"></i>
    <?php endif; ?>
    <?php echo $getNumber[0];?></a>
  <a class="navlink" href="index.php?action=logout"> DECONNEXION </a>
</div>


 <h1> Billet simple pour l'Alaska</h1>

 <p class="subtitle">
  <?php
    if (isset($_SESSION['name'])) {
      echo $welcomeMessage;
    } else {
      echo $errorMessage;
    }
   ?>
   <br/>
 </p>

 <table>
    <tr>
        <th>TOUS LES ARTICLES</th>
        <th>EN LIGNE</th>
        <th>MODIFIER</th>
        <th>SUPPRIMER</th>
    </tr>

    <tr>
      <?php while($posts = $getPosts -> fetch()):?>
        <?php if ($posts): ?>
          <td><a href="index.php?action=post&amp;id=<?= $posts[0] ?>"><?php echo htmlspecialchars($posts[1]); ?></a></td><!--afficher le titre de l'article-->
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
