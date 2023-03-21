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
          <div>
            <p><?= $subjects['title']; ?></p>
            <p><?= $subjects['pseudo']; ?></p>
            <p><?= $subjects['date']; ?></p>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endforeach; ?>

  </article>
</main>

<?php
$content = ob_get_clean();
