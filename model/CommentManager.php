<?php
 require_once('model/Manager.php');
//classe pour gérer les fonctions liées aux commentaires
 class CommentManager extends Manager {

//fonction pour récupérer les commentaires
  public function getComments($postId) {

    $db = $this -> dbConnect();

    $comments = $db -> prepare('SELECT * FROM comments ORDER BY comment_date');
    $comments -> execute(array($postId));

    return $comments;
  }

// fonction pour poster un commentaire
  public function postComment($postId, $author, $comment) {

    $db = $this->dbConnect();
    $comments = $db->prepare('INSERT INTO comments (id, post_id, comment_author,comment_date, comment_content, comment_flag) VALUES(NULL,?, ?, NOW(), ?, false)');
    $affectedLines = $comments ->execute(array($postId, $author, $comment));

    return $affectedLines;
  }
 }
?>
