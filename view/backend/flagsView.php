<?php $title = "Commentaires signalés | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

  <div class="navbar">
    <a class="navlink" href="index.php?action=listPosts"> <i class="fas fa-feather-alt"></i> VOIR MON BLOG </a>
    <a class="navlink" href="index.php?action=admin"><i class="fas fa-chalkboard-teacher"></i> TABLEAU DE BORD </a>
    <a class="navlink" href="index.php?action=logout"> <i class="fas fa-sign-out-alt"></i> DECONNEXION </a>
  </div>

  <div class="flags-head">
    <h2> Commentaires signalés</h2>
    <hr>
  </div>
  <div class="flags-list">
    <table>
      <tr>
          <th>COMMENTAIRES SIGNALES</th>
          <th>TITRE DE L'ARTICLE</th>
          <th>VALIDER</th>
          <th>SUPPRIMER</th>
      </tr>
      <?php while( $comments = $getComments -> fetch()):?>
      <?php if ($comments['comment_flag'] == 1) :?>
      <tr>
        <td><?php echo $comments['comment_content'] ?></td>
        <td> <a href="index.php?action=post&amp;id=<?= $comments['post_ID'] ?>"> <?php echo $comments['post_title']; ?> </a></td>
        <td><a class="double-check" href="index.php?action=unsetFlag&amp;id=<?= $comments[0]?>"><i class="fas fa-check-double"></i></a></td>
        <td><a class="trash" href ="index.php?action=deleteComment&amp;id=<?= $comments[0]?>"> <i class="fas fa-trash"></i></a></td>
      </tr>
      <?php endif; ?>
      <?php endwhile; ?>

      <?php if(empty($comments)) :?>
        <p> Vous n'avez pas de commentaire à modérer. <a href="index.php?action=admin"><br/>
          Retour à la liste des articles </a>?</p>
      <?php endif; ?>

    </table>
  </div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
