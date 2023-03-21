<?php
ob_start();
$title = 'Connexion';
?>

<link rel="stylesheet" href="./public/css/form.style.css" />

<section class="container">
  <div id="formConnect">
    <h1>Connexion</h1>
    <p class="para">Saisissez vos identifiants pour vous connecter</p>
    <form id="form" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
      <p>Identifiant :</p>
      <input class="input" type="text" name="pseudo" placeholder="pseudo">
      <p>Mot de passe :</p>
      <input class="input" type="password" name="password" placeholder="mot">
      <p class="errors"><?= $errors['error'] ?? ''; ?></p>
      <input class="button" type="submit" value="Connexion">
    </form>
    <div>
</section>

<?php
$form = ob_get_clean();