<?php

ob_start();
$title = 'Inscription';

?>
<link rel="stylesheet" href="./assets/css/auth.style.css" />

<section id="container">
  <div id="formConnect">
    <h2>Inscription</h2>
    <p id="text">Saissisez vos informations pour vous connecter</p>
    <form id="formAuth" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST">
      <p>Identifiant :</p>
      <input class="input" type="text" name="pseudo" id="pseudo">
      <p class="errors"><?= $errors['pseudo'] ?? ''; ?> </p>
      <p>E-mail :</p>
      <input class="input" type="email" name="email">
      <p class="errors"><?= $errors['email'] ?? ''; ?> </p>
      <p>Mot de passe :</p>
      <input class="input" type="password" name="password">
      <p class="errors"> <?= $errors['password'] ?? ''; ?> </p>
      <p>Confirmer votre mot de passe</p>
      <input class="input" type="password" name="confirmPass">
      <p class="errors"> <?= $errors['confirmPass'] ?? ''; ?> </p>
      <input class="button" type="submit" value="Inscription">
    </form>
    <div>
</section>

<?php
$form = ob_get_clean();