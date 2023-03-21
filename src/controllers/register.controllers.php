<?php
require_once __DIR__ . './../models/class/user.class.php';

// Si USER est connecté alors, je lui empêche : La Vue Connexion et Inscription
if (!empty($_SESSION['pseudo'])) {
  header('location: ./');
}

const ERROR_INPUT = "Ce champ est incorrect";
const ERROR_CHECK_PASSWORD = "Vos mots de passes ne correspondent pas";
const ERROR_INVALID_email = "email non valide";

function getViewRegister()
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $patternLetterNumbers = '/^[a-zA-Z0-9]+$/'; // Pattern : qui accepte seulement lettres et chiffres
    $patternPassword = '/^(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';  // Pattern : 1 Majuscule , 8 caractères minimum, et un chiffre minimum

    $errors = [
      'pseudo' => '',
      'email' => '',
      'password' => '',
      'confirmPass' => ''
    ];

    $input = filter_input_array(INPUT_POST, [
      'pseudo' => FILTER_SANITIZE_SPECIAL_CHARS,
      'email' => FILTER_SANITIZE_EMAIL,
      'password' => FILTER_SANITIZE_SPECIAL_CHARS,
      'confirmPass' => FILTER_SANITIZE_SPECIAL_CHARS
    ]);

    $pseudo = $input['pseudo'] ?? '';
    $email = $input['email'] ?? '';
    $password = $input['password'] ?? '';
    $confirmPass = $input['confirmPass'] ?? '';

    if (empty($pseudo)) {
      $errors['pseudo'] = ERROR_INPUT;
    } else if (!preg_match($patternLetterNumbers, $pseudo)) {
      $errors['pseudo'] = "Caractères invalide";
    }

    if (empty($email)) {
      $errors['email'] = ERROR_INPUT;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = ERROR_INVALID_email;
    }

    if (empty($password)) {
      $errors['password'] = ERROR_INPUT;
    } else if (!preg_match($patternPassword, $password)) {
      $errors['password'] = "Une Majuscule, un chiffre, 8 caractères";
    }

    if (empty($confirmPass)) {
      $errors['confirmPass'] = ERROR_INPUT;
    } else if (!preg_match($patternPassword, $confirmPass)) {
      $errors['confirmPass'] = "Une Majuscule, un chiffre, 8 caractères";
    } else if ($confirmPass !== $password) {
      $errors['confirmPass'] = ERROR_CHECK_PASSWORD;
    }

    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
      $password = password_hash($password, PASSWORD_BCRYPT);
      $adduser = [
        "pseudo" => $pseudo,
        "email" => $email,
        "password" => $password,
      ];
      $user = new User();
      if ($user->checkIfUserExist($pseudo, $email) !== true) {
        $user->userRegistered($adduser);
        header('location: ./?action=login');
      }
    }
  }
  require_once('./src/views/register.view.php');
  require_once('./src/views/templates/main.template.php');
}
