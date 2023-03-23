<?php
require_once __DIR__ . './database.class.php';

class Comment extends Database
{
  public function __construct()
  {
    parent::__construct();
  }

  function getComments(string $idDiscussion): array | bool {
    $getDiscussions = $this->pdo->prepare("SELECT comments.* , users.id_u , users.pseudo, users.avatar FROM comments 
    INNER JOIN users WHERE comments.id_users = users.id_u AND id_discussions = :idDiscussion ORDER BY date DESC");
    $getDiscussions->bindParam('idDiscussion', $idDiscussion);
    $getDiscussions->execute();
    return $getAllDiscussions = $getDiscussions->fetchAll();
  }

  function addNewComment(array $comment): bool {
    $addNewComment = $this->pdo->prepare("INSERT INTO comments (id_users, id_discussions, comment) VALUES (:id_users, :id_discussions, :comment)");
    return $addNewComment->execute($comment);
  }

  function deleteComment(string $idComment){
    $deleteComment = $this->pdo->prepare("DELETE FROM comments WHERE id_c = :idComment");
    $deleteComment->bindParam('idComment', $idComment);
    return $deleteComment->execute();
  }
}
