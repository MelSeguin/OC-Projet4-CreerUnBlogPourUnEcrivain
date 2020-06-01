<?php

require_once('model/Manager.php');

class LoginManager extends Manager {

  public function login($password,$name){
    $db = $this-> dbConnect();

    $getUser = $db -> prepare('SELECT * FROM admin');
    $getUser -> execute(array($name));
    $user = $getUser -> fetch();

    if (password_verify($password,$user[2]) && $name == $user[1] ){
      $correctInfos = true;
      $_SESSION['name'] = $user[1];
      $_SESSION['password'] = $user[2];

      header ('location: index.php?action=admin');

    } elseif ($name !== $user[1] || !password_verify($password,$user[2])){
      $correctInfos = false;
      $errorMessage = "Pseudo et/ou Mot de passe incorrect(s).";
    }

    return $user ;
  }
}

?>
