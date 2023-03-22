<?php
if (!session_id()) {
  session_start();
}

// Si USER est connecté alors, je lui empêche : La Vue Connexion et Inscription
if (empty($_SESSION['pseudo'])) {
  header('location: ./');
}

require_once('./src/models/autoload.php');

const EMPTY_INPUT = 'Veuillez sélectionner ce champ !';
const ERROR_INPUT = 'Ce champ est invalide !';

function getViewComment(){

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $discussion = new Discussion();

    $errors = [
      'error' => '',
    ];

    // Vérifications des champs postForm
    if (!empty($_POST['submit'])) {

      if (empty($_POST['discussion'])) {
        $errors['error'] = ERROR_INPUT;
      } else if (strlen($_POST['discussion']) > 45) {
        $errors['error'] = ERROR_INPUT;
      }

      // Si toutes les vérifications de postForm sont bons alors :
      if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $newDiscussion = [
          'id_users' => $_SESSION['id_user'],
          'id_messages' => $_GET['id'],
          'title' => $_POST['discussion']
        ];
        $discussion->addNewDiscussion($newDiscussion);
      }
    }

    // Ici les instructions du boutton Supprimer deleteForm 
    // if ($_POST['delete'] ?? '') {
    //   if ($_POST['id_message']) {
    //     $idMsg = (int)$_POST['id_message'] ?? '';
    //     $message->deleteSubject($idMsg);
    //   }
    // }
  }
  require_once('./src/views/forum/comment/comment.view.php');
  require_once('./src/views/templates/main.template.php');
}
