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

  //fonction pour récupérer le nombre de commentaires enregistrés
    public function commentsCount(){
      $db = $this -> dbConnect();

      $req = $db -> prepare('SELECT COUNT(*) FROM comments WHERE comment_flag = "1"');
      $req -> execute(array());
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

//fonction pour supprimer un commentaire
    public function deleteComment() {
      $db = $this -> dbConnect();

      $commentId = $_GET['id'];

      $deleteComment = $db -> prepare('DELETE FROM comments WHERE id = :commentId');
      $commentIsDeleted = $deleteComment -> execute(array(':commentId' => $commentId ));

      return $commentIsDeleted;
    }

//fonction pour signaler un commentaire
    function setFlag($commentId){
      $db = $this -> dbConnect();

      $setFlag = $db -> prepare ('UPDATE comments SET comment_flag = TRUE WHERE id = :commentId ');
      $flagIsSet = $setFlag -> execute(array(':commentId' => $commentId));

      return $flagIsSet;
    }
   
 //fonction pour valider un commentaire signalé
    function unsetFlag($commentId){
      $db = $this -> dbConnect();

      $commentId = $_GET['id'];

      $setFlag = $db -> prepare ('UPDATE comments SET comment_flag = FALSE WHERE id = :commentId ');
      $flagIsSet = $setFlag -> execute(array(':commentId' => $commentId));

      return $flagIsUnset;
    }
   
//fonction pour compter le nombre de commentaires postés
    function getFlaggedComments(){
      $db = $this -> dbConnect();

      $getFlaggedComments = $db -> prepare ('SELECT * FROM comments, posts WHERE comments.post_ID = posts.id');
      $getFlaggedComments -> execute(array());

      return $getFlaggedComments;
    }

}