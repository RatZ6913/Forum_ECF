<?php
ob_start();
$title = 'Commentaires';
?>

<link rel="stylesheet" href="./assets/css/comment.style.css" type="text/css">

<main>
  <article id="main-box">
    <section id="info-comment">
      <h2 class="text-center">Sujet de la discussion : <span>“<?= $infosDiscussion['title']; ?>”</span></h2>
      <img src="./assets/images/uploads/<?= $infosDiscussion['avatar'] ?? ''; ?>">
      <a id="like" href="./?action=comment&id_d=<?= $_GET['id_d']; ?>&liked=<?= $liked; ?>">
        <i class="far fa-thumbs-up" <?= $checkLikedBtn ? 'style="color:#1f48ba"' : '' ?>></i>
        <small><?= $countLikes ?></small>
      </a>
      <p>Auteur de la discussion : <span class="nameUser"><?= $infosDiscussion['pseudo']; ?></span></p>
      <small>Le : <?= $infosDiscussion['date']; ?></small>
    </section>

    <?php
    require_once __DIR__ . './postForm.view.php'; ?>

    <h3>Commentaires : </h3>
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
          <img src="./assets/images/uploads/<?= $comments['avatar'] ?? 'default.png'; ?>">
          <small class="date"><?= $comments['date']; ?></small>
        </div>
      </section>
    <?php endforeach; ?>
  </article>
</main>

<?php
$content = ob_get_clean();
