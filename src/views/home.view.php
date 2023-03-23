<?php
ob_start();
$title = 'Page d\'accueil';
?>

<link rel="stylesheet" href="./public/css/style.css" />
<main>
  <section id="home">
    <h1>Bienvenue ! <span class="blue"> <?= $_SESSION['pseudo'] ?? ''; ?> </span></h1>
    <p>Ici, regroupe la communauté des chats !</p>
  </section>
</main>
<?php
$content = ob_get_clean();
