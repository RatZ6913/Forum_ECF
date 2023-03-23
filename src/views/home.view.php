<?php
ob_start();
$title = 'Page d\'accueil';
?>

<link rel="stylesheet" href="./public/css/style.css" />
<main>
  <section id="home">
    <h1>Bienvenue ! <span class="blue"> <?= $_SESSION['pseudo'] ?? ''; ?> </span></h1>
    <?php if (empty($_SESSION['pseudo']) && !isset($_SESSION['pseudo'])) : ?>
      <p class="text-center">Ici, regroupe la communauté des chats ! <br>
        Pour accéder à notre forum, veuillez vous connecter</p>
    <?php endif; ?>

    <?php if (!empty($_SESSION['pseudo']) && isset($_SESSION['pseudo'])) : ?>
      <p class="text-center">Vous faîtes partie de notre communauté ! Meow <br>
        Vous avez accès aux forum !</p>
    <?php endif; ?>

  </section>
</main>
<?php
$content = ob_get_clean();
