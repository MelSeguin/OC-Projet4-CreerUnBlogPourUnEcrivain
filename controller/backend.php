<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/LoginManager.php');
require_once('model/AccountManager.php');

  function login() {

    $loginManager = new LoginManager();
    $user = $loginManager -> connectUser();

    if (password_verify($_POST['password'],$user[2]) && $_POST['name'] == $user[1] ){
        $correctInfos = true;
        $_SESSION['name'] = $user[1];
        $_SESSION['password'] = $user[2];

        header ('location: index.php?action=displayAdminView');

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

  function displayAdminView(){
    $accountManager = new AccountManager();
    $displayAdminView = $accountManager -> displayAdminView();

    $commentManager = new CommentManager();
    $getNumber = $commentManager -> commentsCount();

    $postManager = new PostManager();
    $getPosts = $postManager -> getPosts();

    $welcomeMessage = "Bonjour ".$_SESSION['name'].". Comment allez vous aujourd'hui ?
    Prêt pour rédiger un <a class='text-link' href='index.php?action=newPost'> nouvel article </a> ?";
    $errorMessage = "Vous ne devriez pas être sur cette page mon petit, merci de vous connecter pour accéder aux fonctions administrateur:)";

    require('view/backend/adminView.php');
  }

  function savePost(){
    $postManager = new PostManager();
    $savePost = $postManager -> savePost();

    require('view/backend/createPostView.php');
  }

  function editPost(){
    $postManager = new PostManager();
    $editPost = $postManager -> getPost($_GET['id']);

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
