<?php $title = "Commentaires signalés | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

  <div class="navbar">
    <a href="index.php?action=listPosts"><i class="fas fa-feather-alt"></i><p> VOIR MON BLOG</p> </a>
    <a href="index.php?action=admin"><i class="fas fa-chalkboard-teacher"></i><p> TABLEAU DE BORD</p> </a>
    <a href="index.php?action=logout"><i class="fas fa-sign-out-alt"></i><p> DECONNEXION</p> </a>
  </div>

  <div class="flagsView-content">
    <div class="flags-head">
      <h2> Commentaires signalés</h2>
      <hr>
    </div>
    <div class="flags-list">
    <?php if($nbComment[0] == 0) :?>
      <p> Vous n'avez pas de commentaire à modérer. <a href="index.php?action=admin"><br/>
      Retour à la liste des articles </a>?</p>
    <?php else :?>
      <table>
        <thead>
          <tr>
            <th class="flags"><p>COMMENTAIRES SIGNALES</p></th>
            <th class="post"><p>TITRE DE L'ARTICLE</p></th>
            <th class="ok"><p>VALIDER</p></th>
            <th class ="delete"><p>SUPPRIMER</p></th>
          </tr>
        </thead>
        <tbody>
          <?php while($comments = $getComments -> fetch()):?>
          <?php if ($comments['comment_flag'] == 1) :?>
            <tr>
              <td class="flags-list-comments"><?php echo $comments['comment_content'] ?></td>
              <td class="flags-list-post"> <a href="index.php?action=post&amp;id=<?= $comments['post_id'] ?>"> <?php echo $comments['post_title']; ?> </a></td>
              <td><a class="double-check" href="index.php?action=unsetFlag&amp;id=<?= $comments[0]?>"><i class="fas fa-check-double"></i></a></td>
              <td><a class="trash" href ="index.php?action=deleteComment&amp;id=<?= $comments[0]?>"> <i class="fas fa-trash"></i></a></td>
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
