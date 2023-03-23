<?php
if (!session_id()) {
  session_start();
}

// Si USER est connecté alors, je lui empêche : La Vue Connexion et Inscription
if (empty($_SESSION['pseudo'])) {
  header('location: ./');
}

require_once('./src/models/class/comment.class.php');

function getViewComment(){

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = new Comment();

    // Vérifications des champs postForm
    if (!empty($_POST['submit'])) {
      $errors = [
        'error' => '',
      ];
  
      $commentPost = htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8') ?? '';

      if (empty($commentPost)) {
        $errors['error'] = 'Champ invalide !';
      } else if (strlen($commentPost) > 200) {
        $errors['error'] = 'Champ invalide !';
      }

      // Si toutes les vérifications de postForm sont bons alors :
      if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $newComment = [
          'id_users' => $_SESSION['id_user'],
          'id_discussions' => $_GET['id_d'],
          'comment' => $_POST['comment']
        ];
        $comment->addNewComment($newComment);
        header("Location: ./?action=comment&id_d=" . $_GET['id_d']);
      }
    }

    // Ici les instructions du boutton Supprimer deleteForm 
    if ($_POST['delete'] ?? '') {
      if ($_POST['id_comment']) {
        $comment->deleteComment($_POST['id_comment']);
      }
    }
  }
  require_once('./src/views/forum/comment/comment.view.php');
  require_once('./src/views/templates/main.template.php');
}
