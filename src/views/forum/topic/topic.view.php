<?php
ob_start();
$title = 'Forum';
?>

<link rel="stylesheet" href="./assets/css/topic.style.css" type="text/css">

<main>
  <!-- // Appelle la Vue postForm.view  -->
  <?php require_once __DIR__ . './postForm.view.php'; ?>
  <article id="main-box">
    <h2>Liste des topics</h2>

    <!-- Première Boucle qui va afficher les différents Topics -->
    <?php foreach ($topic->getTopicCategory() as $categories) : ?>
      <section id="box-content">
        <h3><?= $categories['category']; ?> <small>(<?= $categories['alias']; ?>)</small></h3>

        <!-- Deuxième Boucle qui va afficher les Sujets/Messages des différents topics -->
        <?php foreach ($message->getMessagesSubject() as $subjects) : ?>
          <!-- Condition si : ID table MESSAGES correspond à ID de table TOPICS, Alors affiche les posts  -->
          <?php if ($categories['id_t'] == $subjects['id_topics']) : ?>
            <section id="box-topic">
              <div class="box-subject">
                <a href="./?action=message&id=<?= $subjects['id_m']; ?>"><?= $subjects['title']; ?></a>
              </div>

              <div class="d-flex m-5 p-0 items-center">
                <!-- Si les Sujets/Messages correspondent à l'utilisateur alors affiche les boutons supprimer  -->
                <?php if ($_SESSION['id_user'] === $subjects['id_users']) {
                  // Appelle la Vue deleteForm.view 
                  require __DIR__ . './deleteForm.view.php';
                } ?>
                <small class="user"><?= $subjects['pseudo']; ?></small>
                <img class="imgUser" src="./assets/images/uploads/<?= $subjects['avatar'] ?? 'default.png'; ?>"></img>
                <small class="date"><?= $subjects['date']; ?></small>
              </div>
            </section>
          <?php endif; ?>
        <?php endforeach; ?>
      </section>
    <?php endforeach; ?>
  </article>
</main>

<?php
$content = ob_get_clean();
