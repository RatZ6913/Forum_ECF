<?php
ob_start();
$title = 'Messages';
require_once('./src/models/autoload.php');
$message = new Message();
$discussion = new Discussion();

?>

<link rel="stylesheet" href="./assets/css/topic.style.css" type="text/css">

<main>

  <article>
    <h3 class="text-center">Liste des messages</h3>

    <?php foreach ($discussion->getMessages($_GET['id']) as $discussions) : ?>
      <section class="d-flex border m-5">
        <div class="d-flex flex-fill m-5 p-0 items-center">
          <a href=""><?= $discussions['title']; ?></a>
        </div>
        <div>
          <small class="italic"><?= $discussions['date']; ?></small>
        </div>
      </section>
    <?php endforeach; ?>

  </article>
</main>

<?php
$content = ob_get_clean();
