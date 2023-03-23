<section id="postForm">
  <form id="postForm-comment" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST">
    <p class="errors"><?= $errors['alias'] ?? ''; ?></p>
    <textarea name="comment" placeholder="Entrez votre sujet... (200 caratères max)"></textarea>
    <input id="submit" type="submit" name="submit" value="Commenter">
    <p class="errors"><?= $errors['error'] ?? ''; ?></p>
  </form>
</section>