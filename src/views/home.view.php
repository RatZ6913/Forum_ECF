<?php
ob_start();
$title = 'Page d\'accueil';
?>

<link rel="stylesheet" href="./public/css/style.css" />
<main>
  <?php if (empty($_SESSION['pseudo']) && !isset($_SESSION['pseudo'])) : ?>
    <section id="home">
      <p class="text-center">Ici, regroupe la communauté des chats ! <br>
        Pour accéder à notre forum, veuillez vous connecter</p>
    </section>
  <?php endif; ?>

  <?php if (!empty($_SESSION['pseudo']) && isset($_SESSION['pseudo'])) : ?>
    <section id="connected">
      <h1>Bienvenue ! <span class="blue"> <?= $_SESSION['pseudo'] ?? ''; ?> </span><br>
        Sur <span class="blue"> Chat Chat-tche !</span></h1>
      <p class="text-center">Vous faîtes partie de notre communauté ! Meow <br>
        Vous avez accès aux forum !</p>
    </section>
  <?php endif; ?>
</main>
<?php
$content = ob_get_clean();
