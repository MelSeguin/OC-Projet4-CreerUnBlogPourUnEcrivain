<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

//fonction pour obtenir la liste des articles
  function listPosts() {

    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
  }

//fonction pour obtenir un article en particulier
  function post() {
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
  }

// fonction pour ajouter un commentaire et revenir à la page de l'article en cours de lecture
  function addComment($postId, $author, $comment){

    $commentManager = new CommentManager();
    $affectedLines = $commentManager -> postComment($postId, $author, $comment);

    if ($affectedLines == false) {
        throw new Exception("Impossible d'ajouter votre commentaire. Merci de réessayer plus tard.");
     }
     else {
        header('location: index.php?action=post&id='.$postId);
      }

// fonction pour signaler un commentaire et revenir à l'article en cours de lecture
    function setFlag($commentId){
      $commentManager = new CommentManager();

      $setFlag = $commentManager -> setFlag($commentId);
      $getComments = $commentManager -> getComments($comments['post_ID']);
      $comments = $getComments-> fetch();

      if ($setFlag)  {
        header('location: index.php?action=post&id='.$comments['post_ID']);
      } else {
          throw new Exception("Ce commentaire n'a pas pu être signalé. Merci de réessayer plus tard");
          echo "<a href='index.php?action=listPosts'> Retour à la liste des articles </a>";
      }
  }
  ?>
