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
}
?>
