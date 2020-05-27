<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

  function listPosts() {

    $postManager = new PostManager();

    $posts = $postManager -> getPosts();
    $publishedPosts = $postManager -> publishedPostCount();

    require('view/frontend/listPostsView.php');
  }

  function post($postId) {
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager -> getPost($postId);
    $comments = $commentManager-> getComments($postId);
    $nbCommentsByPost = $commentManager -> countCommentsByPost($postId);

    require('view/frontend/postView.php');
  }

  function addComment($postId, $author, $comment){

    $commentManager = new CommentManager();
    $affectedLines = $commentManager -> postComment($postId, $author, $comment);

    if ($affectedLines == false) {
        throw new Exception("Impossible d'ajouter votre commentaire. Merci de réessayer plus tard.");
     }
     else {
        header('location: index.php?action=post&id='.$postId);
      }
  }

  function setFlag($commentId){
    $commentManager = new CommentManager();

    $setFlag = $commentManager -> setFlag($commentId);
    $getComments = $commentManager -> getComments($comments['post_id']);
    $comments = $getComments-> fetch();

    if ($setFlag)  {
      header('location: index.php?action=post&id='.$comments['post_id']);
    } else {
        throw new Exception("Ce commentaire n'a pas pu être signalé. Merci de réessayer plus tard");
        echo "<a href='index.php?action=listPosts'> Retour à la liste des articles </a>";
    }

  }

?>
