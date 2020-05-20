<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/LoginManager.php');

  function login($password,$name) {

    $loginManager = new LoginManager();
    $user = $loginManager -> login($password,$name);

    if (password_verify($password,$user[2]) && $name == $user[1] ){
        $correctInfos = true;
        $_SESSION['name'] = $user[1];
        $_SESSION['password'] = $user[2];

        header ('location: index.php?action=admin');

    } elseif ($name !== $user[1] || !password_verify($password,$user[2])){
        $correctInfos = false;
        $errorMessage = "Pseudo et/ou Mot de passe incorrect(s).";

        require('view/backend/loginView.php');
      }
  }

  function logout() {
    $loginManager = new LoginManager();
    $loggedOut = $loginManager -> logout();

    require('view/backend/logoutView.php');
  }

  function adminTools(){

    $commentManager = new CommentManager();
    $getNumber = $commentManager -> commentsCount();

    $postManager = new PostManager();
    $getPosts = $postManager -> getPosts();

    require('view/backend/adminView.php');
  }

  function savePost($postTitle,$postContent,$postPublished){
    $postManager = new PostManager();
    $savePost = $postManager -> savePost($postTitle,$postContent,$postPublished);

    if ($savePost){
      header("location:index.php?action=admin");
    } else {
      throw new Exception("Cet article n'a pas pu être enregistré. Merci de réessayer plus tard.");
    }

    require('view/backend/createPostView.php');
  }

  function editPost($postId){
    $postManager = new PostManager();
    $editPost = $postManager -> getPost($postId);

    require('view/backend/updatePostView.php');
  }

  function updatePost($postId,$postTitle,$postContent,$postPublished){
    $postManager = new PostManager();
    $updatePost = $postManager -> updatePost($postId,$postTitle,$postContent,$postPublished);

    if ($updatePost){
      header("location:index.php?action=admin");
    } else {
      throw new Exception("Cet article n'a pas pu être mis à jour. Merci de réessayer plus tard. ");
    }
  }

  function deletePost($postId){
    $postManager = new PostManager();
    $deletePost = $postManager -> deletePost($postId);
  }

  function deleteComment($commentId){
    $commentManager = new CommentManager();
    $deleteComment = $commentManager -> deleteComment($commentId);

    header('location:index.php?action=displayFlags');
  }

  function displayFlags(){

    $commentManager = new CommentManager();
    $getComments = $commentManager -> getFlaggedComments();
    $nbComment = $commentManager -> commentsCount();

    require('view/backend/flagsView.php');
  }

  function unsetFlag($commentId) {
      $commentManager = new CommentManager();
      $unFlag = $commentManager -> unsetFlag($commentId);

      header('location:index.php?action=displayFlags');
  }

 ?>
