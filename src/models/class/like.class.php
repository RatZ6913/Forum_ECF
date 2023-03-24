<?php
require_once __DIR__ . './database.class.php';

class Like extends Database
{
  public function __construct()
  {
    parent::__construct();
  }

  function countLikeOfDiscussion($idDiscussion): array {
    $countLikeOfDiscussion = $this->pdo->prepare("SELECT count(*) , discussion.id_d FROM likes 
    INNER JOIN discussion WHERE likes.id_discussions = discussion.id_d = :idDiscussion AND likes.like = 1");
    $countLikeOfDiscussion->bindParam('idDiscussion', $idDiscussion);
    $countLikeOfDiscussion->execute();
    return $totalCount = $countLikeOfDiscussion->fetchAll();
  }

  function checkIfUserLiked($idDiscussion, $idUsers) {
    $checkIfUserLiked = $this->pdo->prepare("SELECT * FROM likes WHERE id_discussions = :idDiscussion AND id_users = :idUsers");
    $checkIfUserLiked->bindParam('idDiscussion', $idDiscussion);
    $checkIfUserLiked->bindParam('idUsers', $idUsers);
    $checkIfUserLiked->execute();
    return $checkIfLiked = $checkIfUserLiked->fetch();
  }
}
