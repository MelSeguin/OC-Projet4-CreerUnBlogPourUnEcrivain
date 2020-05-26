<?php $title = "Mon tableau de bord | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

  <div class="navbar">
    <a href="index.php?action=listPosts"> <i class="fas fa-book-open"></i> <p> VOIR MON BLOG </p></a>
    <a href="index.php?action=newPost"><i class="fas fa-feather-alt"></i> <p> NOUVEL ARTICLE </p> </a>
    <a class ="nav-flag" href="index.php?action=displayFlags"><i class="fas fa-flag"></i> <p><?php echo $getNumber[0];?> </p></a>
    <a href="index.php?action=logout"> <i class="fas fa-sign-out-alt"></i>  <p> DECONNEXION </p></a>
  </div>
  <div class="adminView-content">
    <p class="admin-subtitle"> Bonjour <?php echo $_SESSION['name']?>, bienvenu sur votre tableau de bord. <br/>
      Prêt pour rédiger un <a class='text-link' href='index.php?action=newPost'> nouveau chapitre</a> ?</p>
    <hr>
    <div class="admin-container">
    <?php if($nbPosts[0] == 0) : ?>
      <div>
        <p><em> Il n'y a pas encore d'article enregistré et/ou publié </em></p>
      </div>
    <?php else : ?>
      <table class="admin-listposts">
        <thead>
          <tr>
            <th class="all-posts"><p>TOUS LES ARTICLES</p></th>
            <th class="online"><p>EN LIGNE</p></th>
            <th class="update"><p>MODIFIER</p></th>
            <th class="delete"><p>SUPPRIMER</p></th>
          </tr>
        </thead>
        <tbody class="admin-listpost-body">
          <tr>
          <?php while($posts = $getPosts -> fetch()):?>
            <?php if ($posts): ?>
                <td class ="admin-listposts-link" ><a  href="index.php?action=post&amp;id=<?= $posts[0] ?>"><?php echo htmlspecialchars($posts[1]); ?></a></td><!--afficher le titre de l'article-->
                  <td class="admin-listpost-chips"><?php if ($posts[4] == 'yes') :?> <!--si l'article est publié-->
                      <p class="green-circle"><i class="far fa-check-circle"></i></p> <!--afficher une pastille verte-->
                      <?php else :?>
                      <p class="grey-circle"><i class="far fa-check-circle"></i></p><!--afficher une pastille grise-->
                      <?php endif;?>
                  </td>
                  <td class="admin-listpost-chips"><p><a href="index.php?action=editPost&amp;id=<?= $posts[0] ?>"><i class="fas fa-pencil-alt"></i></a></p></td> <!--modifier un article-->
                  <td class="admin-listpost-chips"><p><a href="index.php?action=deletePost&amp;id=<?= $posts[0] ?>"><i class="fas fa-trash"></i></a></p></td><!--supprimer un article-->
              </tr>
            <?php else : ?>
              <td> Il n'y a pas encore d'article enregistré / publié. </td>
              </tr>
            <?php endif; ?>
          <?php endwhile; ?>
        </tbody>
     </table>
    <?php endif; ?>
    </div>
  </div>


<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
