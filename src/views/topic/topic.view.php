<?php
ob_start();
$title = 'Forum';
require_once __DIR__ . '../../../models/autoload.php';
$topic = new Topic();
$message = new Message();

?>

<link rel="stylesheet" href="./assets/css/topic.style.css" type="text/css">

<main>
  <!-- // Appelle la Vue postForm.view  -->
  <?php require_once('./src/views/topic/postForm.view.php'); ?>

  <article>
    <h3 class="text-center">Liste des topics</h3>

    <!-- Première Boucle qui va afficher les différents Topics -->
    <?php foreach ($topic->getTopicCategory() as $categories) : ?>
      <h4><?= $categories['category']; ?> <small>(<?= $categories['alias']; ?>)</small> </h4>

      <!-- Deuxième Boucle qui va afficher les Sujets/Messages des différents topics -->
      <?php foreach ($message->getMessagesSubject() as $subjects) : ?>
        <!-- Condition si : ID table MESSAGES correspond à ID de table TOPICS, Alors affiche les posts  -->
        <?php if ($categories['id'] == $subjects['id_topics']) : ?>
          <section class="d-flex border m-5">
            <div class="d-flex flex-fill m-5 p-0 items-center">
              <a href="./?action=forum"><?= $subjects['title']; ?></a>
            </div>

            <div class="d-flex m-5 p-0 items-center">
              <!-- Si les Sujets/Messages correspondent à l'utilisateur alors affiche les boutons supprimer  -->
              <?php
              if ($_SESSION['id_user'] === $subjects['id_users']) {
                // Appelle la Vue deleteForm.view 
                require('./src/views/topic/deleteForm.view.php');
              }
              ?>
              <small class="blue mr-5"><?= $subjects['pseudo']; ?></small>
              <small class="italic"><?= $subjects['date']; ?></small>
            </div>
          </section>

        <?php endif; ?>
      <?php endforeach; ?>
    <?php endforeach; ?>
  </article>
</main>

<?php
$content = ob_get_clean();
