<?php
require_once __DIR__ . './database.class.php';

class Message extends Database
{
  public function __construct()
  {
    parent::__construct();
  }

  function getMessagesSubject(): array | bool {
    $getSubjects = $this->pdo->prepare('SELECT messages.* , users.id_u , users.pseudo FROM messages INNER JOIN users WHERE messages.id_users = users.id_u ORDER BY date DESC');
    $getSubjects->execute();
    return $getAllSubjetcs = $getSubjects->fetchAll();
  }

  function addNewSubject(array $subject): bool {
    $addSubject = $this->pdo->prepare('INSERT INTO messages (id_users, id_topics, title) VALUES (:id_users, :id_topics, :title)');
    return $addSubject->execute($subject);
  }

  function deleteSubject(int $idMsg): array | bool {
    $deleteSubject = $this->pdo->prepare('DELETE FROM messages WHERE id_m = :idMsg');
    $deleteSubject->bindParam('idMsg', $idMsg);
    return $deleteSubject->execute();
  }

  function getTitle($idMsg){
    $getTitle = $this->pdo->prepare("SELECT title FROM messages WHERE id_m = :idMsg");
    $getTitle->bindParam('idMsg', $idMsg);
    $getTitle->execute();
    return $getTitleOne = $getTitle->fetch();
  }
}
