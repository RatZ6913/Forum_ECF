<?php
require_once __DIR__ . './database.class.php';

class Discussion extends Database
{
  public function __construct()
  {
    parent::__construct();
  }

  function getDiscussions(string $idMsg): array | bool {
    $getDiscussions = $this->pdo->prepare("SELECT discussion.* , users.id_u , users.pseudo, users.avatar FROM discussion 
    INNER JOIN users WHERE discussion.id_users = users.id_u AND id_messages = :idMsg ORDER BY date DESC");
    $getDiscussions->bindParam('idMsg', $idMsg);
    $getDiscussions->execute();
    return $getAllDiscussions = $getDiscussions->fetchAll();
  }

  function addNewDiscussion(array $discussion): bool {
    $addNewDiscussion = $this->pdo->prepare("INSERT INTO discussion (id_users, id_messages, title) VALUES (:id_users, :id_messages, :title)");
    return $addNewDiscussion->execute($discussion);
  }

  function deleteDiscussion($idMsg): array | bool {
    $deleteSubject = $this->pdo->prepare('DELETE FROM discussion WHERE id_d = :idMsg');
    $deleteSubject->bindParam('idMsg', $idMsg);
    return $deleteSubject->execute();
  }

  function getTitleDiscussion($idMsg): bool | array {
    $getTitle = $this->pdo->prepare("SELECT title FROM discussion WHERE id_d = :idMsg");
    $getTitle->bindParam('idMsg', $idMsg);
    $getTitle->execute();
    return $getTitleOne = $getTitle->fetch();
  }

  function getInfosOfDiscussion(string $idDiscussion): bool | array {
    $getInfosOfDiscussion = $this->pdo->prepare("SELECT discussion.* , users.* FROM discussion 
    INNER JOIN users WHERE discussion.id_users = users.id_u AND id_d = :idDiscussion");
    $getInfosOfDiscussion->bindParam('idDiscussion', $idDiscussion);
    $getInfosOfDiscussion->execute();
    return $getInfos = $getInfosOfDiscussion->fetch();
  }

  function getCountDiscussions(int $idMsg): string {
    $getCountDiscussions = $this->pdo->prepare("SELECT COUNT(*) FROM discussion WHERE id_messages = :idMsg");
    $getCountDiscussions->bindParam('idMsg', $idMsg);
    $getCountDiscussions->execute();
    return $totalDiscussions = $getCountDiscussions->fetchColumn();
  }

  function addLikeComment($liked, string $idDiscussion): bool {
    $addLikeComment = $this->pdo->prepare("UPDATE discussion SET liked = :liked WHERE id_d = :idDiscussion");
    $addLikeComment->bindParam('liked', $liked);
    $addLikeComment->bindParam('idDiscussion', $idDiscussion);
    return $addLikeComment->execute();
  }
  
  function checkedIfLiked(string $idDiscussion): string | array {
    $checkedIfLiked = $this->pdo->prepare("SELECT liked FROM discussion WHERE id_d = :idDiscussion");
    $checkedIfLiked->bindParam('idDiscussion',$idDiscussion);
    $checkedIfLiked->execute();
    return $checkLiked = $checkedIfLiked->fetch();
  }
}
