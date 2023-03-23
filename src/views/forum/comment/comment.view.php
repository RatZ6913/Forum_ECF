<?php
ob_start();
// $title = 'Messages';
require_once('./src/models/autoload.php');
$comment = new Comment();
$discussion = new Discussion();
?>

<link rel="stylesheet" href="./assets/css/message.style.css" type="text/css">

<main>
  <?php require_once __DIR__ . './postForm.view.php'; ?>

  <article>
    <h3 class="text-center">Commentaires de :</h3>
    <?php foreach ($comment->getComments($_GET['id_d']) as $comments) :
    ?>
      <section class="d-flex border m-5">
        <div class="d-flex flex-fill m-5 p-0 items-center">
          <a href="./?action=comment"><?= $comments['comment']; ?></a>
        </div>
        <div class="p-0">
          <?php
          if ($_SESSION['id_user'] === $comments['id_users']) {
            // Appelle la Vue deleteForm.view 
            require __DIR__ . './deleteForm.view.php';
          }
          echo $comments['id_c'];
          ?>
          <small class="blue mr-5"><?= $comments['pseudo']; ?></small>
          <small class="italic"><?= $comments['date']; ?></small>
        </div>
      </section>

    <?php endforeach; ?>

  </article>
</main>

<?php
$content = ob_get_clean();
