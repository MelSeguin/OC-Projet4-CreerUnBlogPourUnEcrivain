<?php

require_once('model/Manager.php');

class LoginManager extends Manager {

  public function connectUser(){
    $db = $this-> dbConnect();

    $getUser = $db -> prepare('SELECT * FROM admin');
    $getUser -> execute(array($_POST['name']));
    $user = $getUser -> fetch();

    return $user ;
  }


  public function logout() {
    $db = $this-> dbConnect();
    session_destroy ();
  }
} 

?>
