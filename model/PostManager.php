<?php
 require_once('model/Manager.php');

 class PostManager extends Manager {

//récupérer tous les articles
   public function getPosts() {

    $db = $this -> dbConnect();
    $posts = $db -> prepare('SELECT * FROM posts ORDER BY id DESC');
    $posts -> execute();

    return $posts;
  }

//récupérer un article en particulier
  public function getPost($postId){
    $db = $this -> dbConnect();

    $req = $db -> prepare('SELECT * FROM posts WHERE id = ?');
    $req -> execute(array($postId));
    $post = $req -> fetch();

    return $post;
  }

// enregistrer un article
  public function savePost($postId){
    $db = $this->dbConnect();

    //assigner les saisies à une variable
    $title = htmlspecialchars($_POST['title']);
    $content = $_POST['content'];

    if (isset($_POST['published'])) {
      $published = $_POST ['published'];
    } else {
      $published = "no";
    }

    // préparer la requete d'insertion (SQL)
    $savePost = $db ->  prepare ('INSERT INTO `posts` (`ID`, `post_title`, `post_content`, `post_date`,`post_published`) VALUES (NULL,:title,:content, NOW(),:published)');

    //lier chaque marqueur à une valeur
    $savePost -> bindValue(':title', $title, PDO::PARAM_STR);
    $savePost -> bindValue(':content', $content, PDO::PARAM_STR);
    $savePost -> bindValue(':published', $published, PDO::PARAM_STR);
    //executer la requête préparée
    $savePost -> execute();

    if ($savePost){
      header("location:index.php?action=admin");
    } else {
      throw new Exception("Cet article n'a pas pu être enregistré. Merci de réessayer plus tard. ");
    }
  }

//modifier un article dans la base de données
  public function updatePost($postId){
    $db = $this->dbConnect();
    $getPost = $this -> getPost($postId);

    $postTitle = htmlspecialchars($_POST['title']);
    $postContent = $_POST['content'];

    if (isset($_POST['published'])) {
      $postPublished = $_POST ['published'];
    } else {
      $postPublished = "no";
    }

    $updatePost = $db -> prepare ('UPDATE posts SET post_title = :postTitle , post_content = :postContent, post_date = NOW(), post_published = :postPublished WHERE ID = :postId ');

    $updatePost -> execute( array(':postTitle' => $postTitle, ':postContent' => $postContent, ':postPublished' => $postPublished, ':postId' => $postId ));

    if ($updatePost){
      header("location:index.php?action=admin");
    } else {
      throw new Exception("Cet article n'a pas pu être mis à jour. Merci de réessayer plus tard. ") ;
    }
  }

//supprimer un article
  public function deletePost($postId) {
    $db = $this -> dbConnect();
    $getPost = $this -> getPost($postId);

    $deletePost = $db -> prepare('DELETE FROM posts WHERE id = ?');
    $deletePost -> execute(array($postId));

    if ($deletePost){
      header("location:index.php?action=admin");
    } else {
        throw new Exception("Cet article n'a pas pu être supprimé. Merci de réessayer plus tard. ");
    }
  }
}
?>
