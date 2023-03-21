<?php
require_once __DIR__ . './database.class.php';

class Message extends Database
{
  public function __construct()
  {
    parent::__construct();
  }

  function getMessagesSubject(){
    $getSubjects = $this->pdo->prepare('SELECT * FROM messages');
    $getSubjects->execute();
    return $getAllSubjetcs = $getSubjects->fetchAll();
  }

}
