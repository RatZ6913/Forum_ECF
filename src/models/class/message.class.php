<?php
require_once __DIR__ . './database.class.php';

class Message extends Database
{
  public function __construct()
  {
    parent::__construct();
  }

  function getMessagesSubject(): array | bool {
    $getSubjects = $this->pdo->prepare('SELECT messages.* , users.id , users.pseudo FROM messages INNER JOIN users WHERE messages.id_users = users.id');
    $getSubjects->execute();
    return $getAllSubjetcs = $getSubjects->fetchAll();
  }

  function addNewSubject(array $subject): array | bool {
    $addSubject = $this->pdo->prepare('INSERT INTO messages (id_users, id_topics, title) VALUES (:id_users, :id_topics, :title)');
    $addSubject->execute($subject);
    return $addNewSubject = $addSubject->fetch();
  }

  function deleteSubject(int $idMsg): array | bool {
    $deleteSubject = $this->pdo->prepare('DELETE FROM messages WHERE id_m = :idMsg');
    $deleteSubject->bindParam('idMsg', $idMsg);
    return $deleteSubject->execute();
  }
}
