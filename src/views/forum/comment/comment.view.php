<?php
ob_start();
$title = 'Commentaires';
require_once('./src/models/autoload.php');
$comment = new Comment();
$discussion = new Discussion();
?>

<link rel="stylesheet" href="./assets/css/comment.style.css" type="text/css">

<main>
  <?php require_once __DIR__ . './postForm.view.php'; ?>
  <article id="main-box">
    <h2 class="text-center">Commentaires de : <span>"<?= $discussion->getTitleDiscussion($_GET['id_d'])['title']; ?>"</span></h2>
    <?php foreach ($comment->getComments($_GET['id_d']) as $comments) : ?>
      <section class="box-content">
        <div class="link">
          <p><?= $comments['comment']; ?></p>
        </div>
        <div class="infos">
          <?php if ($_SESSION['id_user'] === $comments['id_users']) {
            // Appelle la Vue deleteForm.view 
            require __DIR__ . './deleteForm.view.php';
          } ?>
          <small class="user"><?= $comments['pseudo']; ?></small>
          <small class="date"><?= $comments['date']; ?></small>
        </div>
      </section>
    <?php endforeach; ?>
  </article>
</main>

<?php
$content = ob_get_clean();
