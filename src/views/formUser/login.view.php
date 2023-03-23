<?php
ob_start();
$title = 'Connexion';
?>
<link rel="stylesheet" href="./assets/css/auth.style.css" />

<section id="container">
  <div id="formConnect">
    <h2>Connexion</h2>
    <p id="text">Saisissez vos identifiants pour vous connecter</p>
    <form id="formAuth" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
      <p>Identifiant :</p>
      <input class="input" type="text" name="pseudo" placeholder="pseudo">
      <p>Mot de passe :</p>
      <input class="input" type="password" name="password" placeholder="mot de passe">
      <p class="errors"><?= $errors['error'] ?? ''; ?></p>
      <input type="submit" value="Connexion">
    </form>
    <div>
</section>

<?php
$form = ob_get_clean();