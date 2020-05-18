<?php

require_once('model/Manager.php');

class LoginManager extends Manager {

  public function login($password,$name){
    $db = $this-> dbConnect();

    $getUser = $db -> prepare('SELECT * FROM admin');
    $getUser -> execute(array($name));
    $user = $getUser -> fetch();

    return $user ;
  }
}

?>
