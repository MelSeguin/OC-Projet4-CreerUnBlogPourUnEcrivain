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
  }
  ?>
