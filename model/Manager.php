<?php

//classe pour se connecter à la base de donnée
  class Manager {
    protected function dbConnect() {
      
     $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    
     return $db;
   }
  }
?>
