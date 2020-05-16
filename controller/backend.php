<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/LoginManager.php');

  function login() {

    $loginManager = new LoginManager();
    $user = $loginManager -> connectUser();

    if (password_verify($_POST['password'],$user[2]) && $_POST['name'] == $user[1] ){
        $correctInfos = true;
        $_SESSION['name'] = $user[1];
        $_SESSION['password'] = $user[2];

        header ('location: index.php?action=admin');

    } elseif ($_POST['name'] !== $user[1]){
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

  function savePost(){
    $postManager = new PostManager();
    $savePost = $postManager -> savePost();

    require('view/backend/createPostView.php');
  }

  function editPost($postId){
    $postManager = new PostManager();
    $editPost = $postManager -> getPost($postId);

    require('view/backend/updatePostView.php');
  }

  function updatePost(){
    $postManager = new PostManager();
    $updatePost = $postManager -> updatePost();
  }

  function deletePost(){
    $postManager = new PostManager();
    $deletePost = $postManager -> deletePost();
  }

  function deleteComment(){
    $commentManager = new CommentManager();
    $deleteComment = $commentManager -> deleteComment();

    header('location:index.php?action=displayFlags');
  }

  function displayFlags(){
    $commentManager = new CommentManager();
    $getComments = $commentManager -> getFlaggedComments();

    require('view/backend/flagsView.php');
  }

  function unsetFlag($commentId) {
      $commentManager = new CommentManager();
      $unFlag = $commentManager -> unsetFlag($commentId);

      header('location:index.php?action=displayFlags');
  }

 ?>
