<?php

session_start();

require('controller/frontend.php');
require('controller/backend.php');

try {
  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
      listPosts();
    } elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
          post();
        } else {
          throw new Exception('aucun identifiant de post envoyé.');
        }
    } elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
          if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            addComment($_GET['id'], $_POST['author'], $_POST['comment']);
          } else {
            throw new Exception('merci de remplir tous les champs.');
          }
        } else {
          throw new Exception('aucun identifiant de post envoyé.');
        }
    } elseif ($_GET['action'] == 'loginForm') {
        require('view/backend/loginView.php');
    } elseif ($_GET['action'] == 'login'){
        login();
    } elseif ($_GET['action'] == 'logout') {
        logout();
    } elseif ($_GET['action'] == 'admin'){
      if (isset($_SESSION['name'])){
        adminTools();
      } else {
        header('location : index.php?action=listPosts');
      }
    } elseif ($_GET['action'] == 'newPost'){
        if (isset($_SESSION['name'])){
          require('view/backend/createPostView.php');
        } else {
          header('location : index.php?action=listPosts');
        }
    } elseif ($_GET['action'] == 'savePost'){
        if (isset($_SESSION['name'])){
          savePost();
        } else {
          header('location : index.php?action=listPosts');
        }
    } elseif ($_GET['action'] == 'editPost') {
        if (isset($_SESSION['name'])){
          if (isset($_GET['id']) && $_GET['id'] > 0) {
            editPost($_GET['id']);
          } else {
            throw new Exception('aucun identifiant de post envoyé');
          }
        } else {
          header('location : index.php?action=listPosts');
        }
    } elseif ($_GET['action'] == 'updatePost'){
        if (isset($_SESSION['name'])){
          updatePost();
        } else {
          header('location : index.php?action=listPosts');
        }
    } elseif ($_GET['action'] == 'deletePost') {
        if (isset($_SESSION['name'])){
          if (isset($_GET['id']) && $_GET['id'] > 0) {
            deletePost();
          } else {
            throw new Exception('aucun identifiant de post envoyé');
          }
        } else {
          header('location : index.php?action=listPosts');
        }
    } elseif ($_GET['action'] == 'deleteComment'){
        if (isset($_SESSION['name'])){
          deleteComment($_GET['id']);
        } else {
          header('location : index.php?action=listPosts');
        }
    } elseif ($_GET['action'] == 'setFlag'){
        if (isset($_GET['id']) && $_GET['id'] > 0) {
          setFlag($_GET['id']);
        } else {
            throw new Exception('aucun identifiant de commentaire envoyé');
        }
    } elseif ($_GET['action'] == 'displayFlags'){
        if (isset($_SESSION['name'])){
          displayFlags();
        } else {
          header('location : index.php?action=listPosts');
        }
    } elseif ($_GET['action'] == 'unsetFlag'){
        if (isset($_SESSION['name'])){
          if (isset($_GET['id']) && $_GET['id'] > 0) {
            unsetFlag($_GET['id']);
          } else {
            throw new Exception('aucun identifiant de post envoyé');
          }
        } else {
          header('location : index.php?action=listPosts');
        }
    }
  } elseif (isset($_SESSION['name'])) {
      require('view/backend/adminView.php');
  } else {
      listPosts();
  }
} catch(Exception $e) { // S'il y a eu une erreur, alors...
     echo 'Erreur : ' . $e -> getMessage();
}
?>
