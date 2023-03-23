<?php
if (!session_id()) {
  session_start();
}

// Si USER est connecté alors, je lui empêche : La Vue Connexion et Inscription
if (empty($_SESSION['pseudo'])) {
  header('location: ./');
}

require_once('./src/models/class/discussion.class.php');

const EMPTY_INPUT = 'Veuillez sélectionner ce champ !';
const ERROR_INPUT = 'Ce champ est invalide !';

function getViewMessage()
{

  $message = new Message();
  $discussion = new Discussion();
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [
      'error' => '',
    ];

    // Vérifications des champs postForm
    if (!empty($_POST['submit'])) {

      $discussionPost = htmlspecialchars($_POST['discussion'], ENT_QUOTES, 'UTF-8') ?? '';

      if (empty($discussionPost)) {
        $errors['error'] = ERROR_INPUT;
      } else if (strlen($discussionPost) > 45) {
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
        header("Location: ./?action=message&id=" . $_GET['id']);
      }
    }

    // Ici les instructions du boutton Supprimer deleteForm 
    if ($_POST['delete'] ?? '') {
      if ($_POST['id_message']) {
        $idMsg = (int)$_POST['id_message'] ?? '';
        $discussion->deleteDiscussion($idMsg);
      }
    }
  }

  require_once('./src/views/forum/message/message.view.php');
  require_once('./src/views/templates/main.template.php');
}
