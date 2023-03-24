<?php

function getViewComment()
{

  $comment = new Comment();
  $discussion = new Discussion();
  $infosDiscussion = $discussion->getInfosOfDiscussion($_GET['id_d']);
  $checkIfLiked = $discussion->checkedIfLiked($_GET['id_d']);

  // var_dump((int)$checkIfLiked['liked']);

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
      } else if (strlen($commentPost) > 500) {
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

  // Isset car la valeur de $_GET['liked'] = string '0' // Donc !empty sera false
  if (isset($_GET['liked'])) {
    $like = (int)$checkIfLiked['liked'];

    if ($like == 0) {
      $liked = 1;
    } else if ($like == 1) {
      $liked = 0;
    }
    $discussion->addLikeComment($liked, $_GET['id_d']);
    header("Location: ./?action=comment&id_d=" . $_GET['id_d']);
  }

  require_once('./src/views/forum/comment/comment.view.php');
  require_once('./src/views/templates/main.template.php');
}
