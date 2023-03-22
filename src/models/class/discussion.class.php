<?php
require_once __DIR__ . './database.class.php';

class Discussion extends Database
{
  public function __construct()
  {
    parent::__construct();
  }

  function getMessages(string $idMsg){
    $getMessagesSubjects = $this->pdo->prepare("SELECT * FROM discussion WHERE id_messages = :idMsg");
    $getMessagesSubjects->bindParam('idMsg', $idMsg);
    $getMessagesSubjects->execute();
    return $getAllMessages = $getMessagesSubjects->fetchAll();
  }

  function getDiscussions(): array | bool {
    $getDiscussions = $this->pdo->prepare("SELECT discussion.* , users.id_u , users.pseudo FROM discussion 
    INNER JOIN users WHERE discussion.id_users = users.id_u AND id_messages = 45 ORDER BY date DESC");
    $getDiscussions->bindParam();
    $getDiscussions->execute();
    return $getAllDiscussions = $getDiscussions->fetchAll();
  }

}
