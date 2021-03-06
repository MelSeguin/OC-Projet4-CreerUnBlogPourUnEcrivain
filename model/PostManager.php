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

//fonction pour compter le nombre d'articles publiés
  public function publishedPostCount(){
    $db = $this -> dbConnect();

    $req = $db -> prepare('SELECT COUNT(*) FROM posts WHERE post_published = "yes"');
    $req -> execute(array());
    $number = $req -> fetch();

    return $number;
  }

//fonction pour compter le nombre d'articles enregistrés
public function allPostsCount(){
  $db = $this -> dbConnect();

  $req = $db -> prepare('SELECT COUNT(*) FROM posts');
  $req -> execute(array());
  $number = $req -> fetch();

  return $number;
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
  public function savePost($postTitle,$postContent,$postPublished){
    $db = $this->dbConnect();

    if (isset($postPublished)) {
      $postPublished = "yes" ;
    } else {
      $postPublished = "no";
    }

    $savePost = $db ->  prepare ('INSERT INTO `posts` (`id`, `post_title`, `post_content`, `post_date`,`post_published`) VALUES (NULL,:postTitle,:postContent, NOW(),:postPublished)');
    $savedPost = $savePost -> execute(array(':postTitle' => $postTitle, ':postContent' => $postContent, ':postPublished' => $postPublished));

    return $savedPost;
  }

//modifier un article dans la base de données
  public function updatePost($postId,$postTitle,$postContent,$postPublished){
    $db = $this->dbConnect();
    $getPost = $this -> getPost($postId);

    if (isset($postPublished)) {
      $postPublished = "yes" ;
    } else {
      $postPublished = "no";
    }

    $updatePost = $db -> prepare ('UPDATE posts SET post_title = :postTitle , post_content = :postContent, post_date = NOW(), post_published = :postPublished WHERE id = :postId ');
    $updatedPost = $updatePost -> execute( array(':postTitle' => $postTitle, ':postContent' => $postContent, ':postPublished' => $postPublished, ':postId' => $postId ));

    return $updatedPost;
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
