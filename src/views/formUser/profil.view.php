<?php
ob_start();
$title = 'Profil';

?>
<link rel="stylesheet" href="./assets/css/profil.style.css" />

<section id="container">
  <div id="content-form">
    <h2>Votre profil</h2>
    <img src="./assets/images/uploads/<?= $_SESSION['avatar'] ?? 'default.png'; ?>">

    <form id="formProfil" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST" enctype='multipart/form-data'>
      <div>
        <label for="avatar">Avatar :</label>
        <input type="file" name="post" id="avatar" value="<?= $_SESSION['avatar'] ?? 'default.png'; ?>">
        <small>* < 5MO, PNG,JPEG,JPG,GIF</span>
            <p class="errors"><?= $errors['post'] ?? '' ?></p>
      </div>
      <div>
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo" id="pseudo" value="<?= $_SESSION['pseudo'] ?? ''; ?>">
        <p class="errors"><?= $errors['pseudo'] ?? '' ?></p>
      </div>
      <div>
        <label for="email">email :</label>
        <input type="email" name="email" id="email" value="<?= $_SESSION['email'] ?? ''; ?>">
        <p class="errors"><?= $errors['email'] ?? '' ?></p>
      </div>
      <div>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" value="">
        <p class="errors"><?= $errors['password'] ?? '' ?></p>
      </div>
      <div>
        <input type="submit" value="Modifier">
        <p class="success"><?= $_SESSION['status']  ?? ''; ?></p>
      </div>
    </form>
  </div>
</section>
<?php
$content = ob_get_clean();
