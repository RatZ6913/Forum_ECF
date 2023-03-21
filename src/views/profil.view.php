<?php

ob_start();
$title = 'Profil';

?>
<!-- <link rel="stylesheet" href="./public/css/form.style.css" /> -->

<section class="container">
  <div id="formProfil">
    <h1>Votre profil</h1>
    <p class="para">Modifier votre profil</p>
    <img src="./assets/images/uploads/<?= $_SESSION['avatar'] ?? 'default.png'; ?>" alt="">

    <form id="form" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST" enctype='multipart/form-data'>
      <div>
        <label for="avatar">Avatar :</label>
        <input type="file" name="post" id="avatar" value="<?= $_SESSION['avatar'] ?? 'default_avatar.png'; ?>">
        <span id="uploadImage">* < 5MO, Gif,JPEG,JPG,GIF</span>
            <p class="errors"><?= $status['status'] ?? ''; ?></p>
      </div>
      <div>
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo" id="pseudo" value="<?= $_SESSION['pseudo'] ?? ''; ?>">
        <p class="errors"><?= $errors['pseudo'] ?? '' ?></p>
      </div>
      <div>
        <label for="mail">Mail :</label>
        <input type="mail" name="mail" id="mail" value="<?= $_SESSION['mail'] ?? ''; ?>">
        <p class="errors"><?= $errors['mail'] ?? '' ?></p>
      </div>
      <div>
        <label for="password">Mot de passe :</label>
        <input type="text" name="password" id="password" value="">
        <p class="errors"><?= $errors['password'] ?? '' ?></p>
      </div>
      <div>
        <input type="submit" value="Modifier">
      </div>
      <p class="success"><?= $_SESSION['status']  ?? ''; ?></p>
    </form>
  </div>
</section>
<?php
$content = ob_get_clean();