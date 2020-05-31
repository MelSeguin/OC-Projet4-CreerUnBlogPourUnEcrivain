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
          post($_GET['id']);
        } else {
          throw new Exception('aucun identifiant de post envoyé.');
        }
    } elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
          if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            addComment($_GET['id'], htmlspecialchars($_POST['author']), htmlspecialchars($_POST['comment']));
          } else {
            throw new Exception('merci de remplir tous les champs.');
          }
        } else {
          throw new Exception('aucun identifiant de post envoyé.');
        }
    } elseif ($_GET['action'] == 'loginForm') {
        require('view/backend/loginView.php');
    } elseif ($_GET['action'] == 'login'){
        login($_POST['password'],$_POST['name']);
    } elseif ($_GET['action'] == 'logout') {
        session_destroy();
        require('view/backend/logoutView.php');
    } elseif ($_GET['action'] == 'admin'){
        adminTools();
    } elseif ($_GET['action'] == 'newPost'){
        require('view/backend/createPostView.php');
    } elseif ($_GET['action'] == 'savePost'){
        savePost(htmlspecialchars($_POST['title']),$_POST['content'],$_POST['published']);
    } elseif ($_GET['action'] == 'editPost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
          editPost($_GET['id']);
        } else {
            throw new Exception('aucun identifiant de post envoyé');
        }
    } elseif ($_GET['action'] == 'updatePost'){
          updatePost($_GET['id'],htmlspecialchars($_POST['title']),$_POST['content'],$_POST['published']);
    } elseif ($_GET['action'] == 'deletePost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
          deletePost($_GET['id']);
        } else {
          throw new Exception('aucun identifiant de post envoyé');
        }
    } elseif ($_GET['action'] == 'deleteComment'){
          deleteComment($_GET['id']);
    } elseif ($_GET['action'] == 'setFlag'){
        if (isset($_GET['id']) && $_GET['id'] > 0) {
          setFlag($_GET['id']);
        } else {
            throw new Exception('aucun identifiant de commentaire envoyé');
        }
    } elseif ($_GET['action'] == 'displayFlags'){
        displayFlags();
    } elseif ($_GET['action'] == 'unsetFlag'){
        if (isset($_GET['id']) && $_GET['id'] > 0) {
          unsetFlag($_GET['id']);
        } else {
            throw new Exception('aucun identifiant de post envoyé');
        }
    }
  } elseif (isset($_SESSION['name'])) {
      adminTools();
  } else {
      listPosts();
  }
} catch(Exception $e) { // S'il y a eu une erreur, alors...
     echo 'Erreur : ' . $e -> getMessage();
}
?>
