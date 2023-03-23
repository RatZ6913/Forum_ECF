<section id="postForm">
  <p>Quelque chose à rajouter ?</p>
  <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST">
    <select name="alias" id="alias">
      <option value="">-- Choisissez --</option>
      <option value="observation">Observation</option>
      <option value="blabla">Blabla</option>
      <option value="sport">Sport</option>
      <option value="nourriture">Nourriture</option>
    </select>
    <p class="errors"><?= $errors['alias'] ?? ''; ?></p>
    <textarea name="message" placeholder="Entrez votre sujet... (45 caratères max)"></textarea>
    <input id="submit" type="submit" name="submit" value="Publier">
    <p class="errors"><?= $errors['error'] ?? ''; ?></p>
  </form>
</section>