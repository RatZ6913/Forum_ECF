<?php
require_once __DIR__ . './database.class.php';

class Topic extends Database
{
  public function __construct()
  {
    parent::__construct();
  }

  function getTopicCategory(): array | bool {
    $getCagetory = $this->pdo->prepare("SELECT * FROM topics");
    $getCagetory->execute();
    return $getAllCategory = $getCagetory->fetchAll();
  }

  function getTopicId($alias): array | bool {
    $getTopicId = $this->pdo->prepare("SELECT id FROM topics WHERE alias = :alias");
    $getTopicId->bindParam('alias', $alias);
    $getTopicId->execute();
    return $getId = $getTopicId->fetch();
  }
}
