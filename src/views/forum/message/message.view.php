<?php
ob_start();
$title = 'Messages';
require_once('./src/models/autoload.php');
$message = new Message();
$discussion = new Discussion();
?>

<link rel="stylesheet" href="./assets/css/message.style.css" type="text/css">

<main>
  <?php require_once __DIR__ . './postForm.view.php'; ?>
  <article id="main-box">
    <h2 class="text-center">Les messages de : <span>"<?= $message->getTitle($_GET['id'])['title']; ?>"</span></h2>

    <?php foreach ($discussion->getDiscussions($_GET['id']) as $discussions) : ?>
      <section class="box-content">
        <div class="link">
          <a class="text" href="./?action=comment&id_d=<?= $discussions['id_d']; ?>"><?= $discussions['title']; ?></a>
        </div>
        <div class="infos">
          <?php if ($_SESSION['id_user'] === $discussions['id_users']) {
            // Appelle la Vue deleteForm.view 
            require __DIR__ . './deleteForm.view.php';
          } ?>
          <small class="user"><?= $discussions['pseudo']; ?></small>
          <img src="./assets/images/uploads/<?= $discussions['avatar'] ?? 'default.png'; ?>"></img>
          <small class="date"><?= $discussions['date']; ?></small>
        </div>
      </section>
    <?php endforeach; ?>

  </article>
</main>

<?php
$content = ob_get_clean();
