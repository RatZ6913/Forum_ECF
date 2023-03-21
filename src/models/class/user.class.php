<?php
require_once __DIR__ . './database.class.php';

class User extends Database
{

  public function __construct()
  {
    parent::__construct();
  }

  public function checkIfUserExist(string $pseudo, string $email): bool | array
  {
    $checkIfUserExist = $this->pdo->prepare("SELECT * FROM users WHERE pseudo = :pseudo OR email = :email");
    $checkIfUserExist->bindParam('pseudo', $pseudo);
    $checkIfUserExist->bindParam('email', $email);
    $checkIfUserExist->execute();
    return $checkIfExist = $checkIfUserExist->fetch();
  }

  public function userRegistered(array $user): bool
  {
    $userRegistered = $this->pdo->prepare("INSERT INTO users (pseudo, email, password) VALUES (:pseudo, :email, :password)");
    return $userRegistered->execute($user);
  }

  public function checkIfMatchUser(string $pseudo): bool | array
  {
    $checkIfMatchUser = $this->pdo->prepare("SELECT password FROM users WHERE pseudo = :pseudo");
    $checkIfMatchUser->BindParam(':pseudo', $pseudo);
    $checkIfMatchUser->execute();
    return $checkIfMatch = $checkIfMatchUser->fetch();
  }

  function getInfoUser(string $pseudo): array | bool
  {
    $getInfoUser = $this->pdo->prepare("SELECT * FROM users WHERE pseudo=:pseudo");
    $getInfoUser->BindParam(":pseudo", $pseudo);
    $getInfoUser->execute();
    return $getInfoUser = $getInfoUser->fetch();
  }

//   function editUserProfil(array $updateProfil): array
//   {
//     $editUserProfil = $this->pdo->prepare("UPDATE users SET pseudo = :pseudo, email = :email, password = :password, avatar = :avatar WHERE id = :id");
//     $editUserProfil->execute($updateProfil);
//     return $updateUserProfil = $editUserProfil->fetch();
//   }
// }
}