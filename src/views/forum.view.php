<?php
// Si USER est pas connecté alors, je lui empêche : La Vue Forum
if (empty($_SESSION['pseudo'])) {
  header('location: ./');
}

ob_start();
$title = 'Forum';
require_once __DIR__ . '../../models/autoload.php';
$topic = new Topic();
$message = new Message();

?>

<link rel="stylesheet" href="./assets/css/topic.style.css" type="text/css">

<main>
  <section>
    <h2>Les topics</h2>
    <button>Ajouter un sujet</button>
  </section>

  <article>
    <h3>Liste des topics</h3>

    <?php foreach ($topic->getTopicCategory() as $categories) : ?>
      <h4><?= $categories['category']; ?></h4>

      <?php foreach ($message->getMessagesSubject() as $subjects) : ?>
        <?php if ($categories['id'] == $subjects['id_topics']) : ?>
          <section class="d-flex border m-5">
            <div class="d-flex flex-fill m-5 p-0">
              <p><?= $subjects['title']; ?></p>
            </div>
            <div class="d-flex m-5 p-0">
              <p><?= $subjects['pseudo']; ?></p>
              <p><?= $subjects['date']; ?></p>
            </div>
          </section>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endforeach; ?>

  </article>
</main>

<?php
$content = ob_get_clean();
