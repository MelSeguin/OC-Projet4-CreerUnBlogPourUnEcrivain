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

// fonction pour compter le nombre de commentaires par articles
  function countCommentsByPost($postId){
    $db = $this -> dbConnect();

    $req = $db -> prepare('SELECT COUNT(*) FROM comments WHERE post_id=?');
    $req -> execute(array($postId));
    $number = $req -> fetch();

    return $number;
  }

// fonction pour poster un commentaire
    public function postComment($postId, $author, $comment) {

      $db = $this->dbConnect();
      $comments = $db->prepare('INSERT INTO comments (id, post_id, comment_author,comment_date, comment_content, comment_flag) VALUES(NULL,?, ?, NOW(), ?, false)');
      $affectedLines = $comments ->execute(array($postId, $author, $comment));

      return $affectedLines;
    }

    public function deleteComment($commentId) {
      $db = $this -> dbConnect();

      $deleteComment = $db -> prepare('DELETE FROM comments WHERE id = :commentId');
      $commentIsDeleted = $deleteComment -> execute(array(':commentId' => $commentId ));

      return $commentIsDeleted;
    }

    function setFlag($commentId){
      $db = $this -> dbConnect();

      $setFlag = $db -> prepare ('UPDATE comments SET comment_flag = TRUE WHERE id = :commentId ');
      $flagIsSet = $setFlag -> execute(array(':commentId' => $commentId));

      return $flagIsSet;
    }

//fonction pour récupérer le nombre de commentaires signalés enregistrés
    public function commentsCount(){
      $db = $this -> dbConnect();

      $req = $db -> prepare('SELECT COUNT(*) FROM comments WHERE comment_flag = "1"');
      $req -> execute(array());
      $number = $req -> fetch();

      return $number;
    }

//fonction pour récupérer les commentaires par identifiants de post
    function getCommentsByPost(){
      $db = $this -> dbConnect();

      $getCommentsByPost = $db -> prepare('SELECT * FROM comments, posts WHERE comments.post_id = posts.id');
      $getCommentsByPost -> execute(array());

      return $getCommentsByPost;
    }

//fonction pour valider un commentaire
    function unsetFlag($commentId){
      $db = $this -> dbConnect();

      $setFlag = $db -> prepare ('UPDATE comments SET comment_flag = FALSE WHERE id = :commentId ');
      $flagIsSet = $setFlag -> execute(array(':commentId' => $commentId));

      return $flagIsUnset;
    }
}
?>
