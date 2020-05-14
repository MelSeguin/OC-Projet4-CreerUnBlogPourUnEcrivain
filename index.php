<?php
require('controller/backend.php');
if ($_GET['action'] == 'loginForm') {
    require('view/backend/loginView.php');
} elseif ($_GET['action'] == 'login'){
    login();
} elseif ($_GET['action'] == 'logout') {
    logout();
} elseif ($_GET['action'] == 'displayAdminView'){
  if (isset($_SESSION['name'])){
    displayAdminView();
  } else {
    header('location : index.php?action=listPosts');
  }
} elseif ($_GET['action'] == 'newPost'){
    if (isset($_SESSION['name'])){
      createNewPost();
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
        editPost();
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
      deleteComment();
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
        unsetFlag();
      } else {
        throw new Exception('aucun identifiant de post envoyé');
      }
    } else {
      header('location : index.php?action=listPosts');
    }
}
} elseif (isset($_SESSION['name'])) {
displayAdminView();
} else {
listPosts();
}
} catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e -> getMessage();
}

?>
