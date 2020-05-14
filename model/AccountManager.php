<?php
require_once('model/Manager.php');

class AccountManager extends Manager {

  public function displayAdminView() {
    if (isset($_SESSION)){
      $welcomeMessage;
    } else {
      $errorMessage;
    }
  }
}
