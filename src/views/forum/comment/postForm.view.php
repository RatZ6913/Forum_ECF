<?php
require_once('./src/models/autoload.php');
?>

<form id="postForm-comment" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST">
  <p class="errors"><?= $errors['alias'] ?? ''; ?></p>
  <textarea name="comment" placeholder="Entrez votre sujet... (200 caratères max)"></textarea>
  <input type="submit" name="submit" value="Commenter">
  <p class="errors"><?= $errors['error'] ?? ''; ?></p>
</form>
