<section id="postForm">
  <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST">
    <textarea name="discussion" placeholder="Entrez votre sujet... (45 caratères max)"></textarea>
    <input id="submit" type="submit" name="submit" value="Publier">
    <p class="errors"><?= $errors['error'] ?? ''; ?></p>
  </form>
</section>