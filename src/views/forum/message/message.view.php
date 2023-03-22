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

  <article>
    <h3 class="text-center">Sujets de : "<?= $message->getTitle($_GET['id'])['title']; ?>"</h3>

    <?php foreach ($discussion->getDiscussions($_GET['id']) as $discussions) :
    ?>
      <section class="d-flex border m-5">
        <div class="d-flex flex-fill m-5 p-0 items-center">
          <a href="./?action=comment&id=<?= $discussions['id_d']; ?>"><?= $discussions['title']; ?></a>
        </div>
        <div class="p-0">
          <?php
          if ($_SESSION['id_user'] === $discussions['id_users']) {
            // Appelle la Vue deleteForm.view 
            require __DIR__ . './deleteForm.view.php';
          }
          echo $discussions['id_d'];
          ?>
          <small class="blue mr-5"><?= $discussions['pseudo']; ?></small>
          <small class="italic"><?= $discussions['date']; ?></small>
        </div>
      </section>
    <?php endforeach; ?>

  </article>
</main>

<?php
$content = ob_get_clean();
