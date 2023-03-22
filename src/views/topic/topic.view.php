<?php

ob_start();
$title = 'Forum';
require_once __DIR__ . '../../../models/autoload.php';
$topic = new Topic();
$message = new Message();

?>

<link rel="stylesheet" href="./assets/css/topic.style.css" type="text/css">

<main>

  <article>
    <h3 class="text-center">Liste des topics</h3>

    <?php foreach ($topic->getTopicCategory() as $categories) : ?>
      <h4><?= $categories['category']; ?> <small>(<?= $categories['alias']; ?>)</small> </h4>

      <?php foreach ($message->getMessagesSubject() as $subjects) : ?>
        <?php if ($categories['id'] == $subjects['id_topics']) : ?>
          <section class="d-flex border m-5">
            <div class="d-flex flex-fill m-5 p-0 items-center">
              <a href="./?action=forum"><?= $subjects['title']; ?></a>
            </div>
            <div class="d-flex m-5 p-0 items-center">
              <?php if ($_SESSION['id_user'] === $subjects['id_users']) : ?>
                <button class="btn mr-10">X</button>
              <?php endif; ?>
              <small class="blue mr-5"><?= $subjects['pseudo']; ?></small>
              <small class="italic"><?= $subjects['date']; ?></small>
            </div>
          </section>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endforeach; ?>
  </article>
  <?php require_once('./src/views/topic/form.view.php'); ?>
</main>

<?php
$content = ob_get_clean();
var_dump($_SESSION['id_user']);
var_dump($subjects);
