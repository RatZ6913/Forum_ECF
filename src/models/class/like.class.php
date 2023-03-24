<?php
require_once __DIR__ . './database.class.php';

class Like extends Database
{
  public function __construct()
  {
    parent::__construct();
  }

  function countLikeOfDiscussion($idDiscussion) {
    $countLikeOfDiscussion = $this->pdo->prepare("SELECT count(*) , discussion.id_d FROM likes 
    INNER JOIN discussion WHERE likes.id_discussions = discussion.id_d = :idDiscussion AND likes.like = 1");
    $countLikeOfDiscussion->bindParam('idDiscussion', $idDiscussion);
    $countLikeOfDiscussion->execute();
    return $totalCount = $countLikeOfDiscussion->fetchAll();
  }

}
