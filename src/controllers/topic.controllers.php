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
  $discussion = new Discussion();
  $topic = new Topic();
  $message = new Message();
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [
      'error' => '',
      'alias' => ''
    ];

    // Vérifications des champs postForm
    if (!empty($_POST['submit'])) {
      $messagePost = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8') ?? '';
      $aliasPost = htmlspecialchars($_POST['alias'], ENT_QUOTES, 'UTF-8') ?? '';

      if (empty($messagePost) || $messagePost === "") {
        $errors['alias'] = EMPTY_INPUT;
      }

      if (empty($messagePost)) {
        $errors['error'] = ERROR_INPUT;
      } else if (strlen($messagePost) > 45) {
        $errors['error'] = ERROR_INPUT;
      }

      // Si toutes les vérifications de postForm sont bons alors :
      if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $idTopic = $topic->getTopicId($_POST['alias'] ?? '');

        if ($idTopic) {
          $idTopic = (int)$idTopic['id_t'] ?? '';
          $idUser = (int)$_SESSION['id_user'] ?? '';
          $subject = [
            'title' => $_POST['message'] ?? '',
            'id_users' => $idUser,
            'id_topics' => $idTopic
          ];
          $message->addNewSubject($subject);
          header('location: ./?action=forum');
        }
      }
    }

    // Ici les instructions du boutton Supprimer deleteForm 
    if ($_POST['delete'] ?? '') {
      if ($_POST['id_message']) {
        $idMsg = (int)$_POST['id_message'] ?? '';
        $message->deleteSubject($idMsg);
      }
    }
  }
  require_once('./src/views/forum/topic/topic.view.php');
  require_once('./src/views/templates/main.template.php');
}
