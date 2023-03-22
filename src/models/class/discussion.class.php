<?php
require_once __DIR__ . './database.class.php';

class Discussion extends Database
{
  public function __construct()
  {
    parent::__construct();
  }

  function getDiscussions(string $idMsg): array | bool {
    $getDiscussions = $this->pdo->prepare("SELECT discussion.* , users.id_u , users.pseudo FROM discussion 
    INNER JOIN users WHERE discussion.id_users = users.id_u AND id_messages = :idMsg ORDER BY date DESC");
    $getDiscussions->bindParam('idMsg', $idMsg);
    $getDiscussions->execute();
    return $getAllDiscussions = $getDiscussions->fetchAll();
  }

  function addNewDiscussion(array $discussion): bool {
    $addNewDiscussion = $this->pdo->prepare("INSERT INTO discussion (id_users, id_messages, title) VALUES (:id_users, :id_messages, :title)");
    return $addNewDiscussion->execute($discussion);
  }

}
