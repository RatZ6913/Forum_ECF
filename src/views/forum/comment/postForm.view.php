<?php
require_once('./src/models/autoload.php');

?>

<form id="postForm-topic" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST">
  <p class="errors"><?= $errors['alias'] ?? ''; ?></p>
  <textarea name="message" placeholder="Entrez votre sujet... (45 caratères max)"></textarea>
  <input type="submit" name="submit" value="Publier">
  <p class="errors"><?= $errors['error'] ?? ''; ?></p>
</form>
