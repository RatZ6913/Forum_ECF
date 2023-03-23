<?php
require_once __DIR__ . './database.class.php';

class Comment extends Database
{
  public function __construct()
  {
    parent::__construct();
  }

  function getComments(string $idDiscussion): array | bool {
    $getDiscussions = $this->pdo->prepare("SELECT comments.* , users.id_u , users.pseudo FROM comments 
    INNER JOIN users WHERE comments.id_users = users.id_u AND id_discussion = :idDiscussion ORDER BY date DESC");
    $getDiscussions->bindParam('idDiscussion', $idDiscussion);
    $getDiscussions->execute();
    return $getAllDiscussions = $getDiscussions->fetchAll();
  }

}
