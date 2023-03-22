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

function getViewForum()
{
  $errors = [
    'error' => '',
    'alias' => ''
  ];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $topic = new Topic();
    $message = new Message();

    // Vérifications des champs postForm
    if (empty($_POST['alias']) || $_POST['alias'] === "") {
      $errors['alias'] = EMPTY_INPUT;
    }

    if (empty($_POST['message'])) {
      $errors['error'] = ERROR_INPUT;
    } else if (strlen($_POST['message']) > 35) {
      $errors['error'] = ERROR_INPUT;
    }

    // Si toutes les vérifications de postForm sont bons alors :
    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
      $idTopic = $topic->getTopicId($_POST['alias'] ?? '');

      if ($idTopic) {
        $idTopic = (int)$idTopic['id'] ?? '';
        $subject = [
          'title' => $_POST['message'] ?? '',
          'id_users' => $_SESSION['id_user'] ?? '',
          'id_topics' => $idTopic
        ];
        $message->addNewSubject($subject);
        header('location: ./?action=forum');
      }
    }

    // Ici les instructions du boutton Supprimer deleteForm 
    if ($_POST['delete'] ?? '') {
      $idMsg = (int)$_POST['id_message'] ?? '';

      if($idMsg){
        $message->deleteSubject($idMsg);
      }
    }
  }
  require_once('./src/views/topic/topic.view.php');
  require_once('./src/views/templates/main.template.php');
}
