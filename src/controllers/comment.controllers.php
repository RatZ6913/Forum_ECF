<?php

function getViewComment()
{

  $comment = new Comment();
  $discussion = new Discussion();
  $like = new Like();
  $infosDiscussion = $discussion->getInfosOfDiscussion($_GET['id_d']);
  $totalLikes = $like->countLikeOfDiscussion($_GET['id_d']);
  $countLikes = $totalLikes[0]["count(*)"];
  $checkLikedBtn = $like->checkIfUserLiked($_GET['id_d'], $_SESSION['id_user']);
 
  if(!$checkLikedBtn) {
    $liked = 1;
  }

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

  if(isset($_GET['liked'])) {
    
    $updateLikes = [
      'idDiscussion' => $_GET['id_d'],
      'idUser' => $_SESSION['id_user'],
      'liked' => $liked ?? ''
    ];

    if(!$checkLikedBtn) {
      // $liked = 1;
      $like->addLike($updateLikes);
    } else if ($checkLikedBtn) {
      $liked = 0;
    }
  }

  require_once('./src/views/forum/comment/comment.view.php');
  require_once('./src/views/templates/main.template.php');
}
