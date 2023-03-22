<?php
require_once('./src/models/autoload.php');

?>

<form id="postForm-message" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST">
  <textarea name="discussion" placeholder="Entrez votre sujet... (35 caratères max)"></textarea>
  <input type="submit" name="submit" value="Publier">
  <p class="errors"><?= $errors['error'] ?? ''; ?></p>
</form>
