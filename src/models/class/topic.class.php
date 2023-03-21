<?php
require_once __DIR__ . './database.class.php';

class Topic extends Database
{
  public function __construct()
  {
    parent::__construct();
  }

  function getTopicCategory() {
    $getCagetory = $this->pdo->prepare("SELECT * FROM topics");
    $getCagetory->execute();
    return $getAllCategory = $getCagetory->fetchAll();
  }
}

