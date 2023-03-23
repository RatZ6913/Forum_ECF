<form id="deleteForm-discussion" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST">
  <input type="hidden" name="id_message" value="<?= $comments['id_c']; ?>">
  <input type="submit" class="btn mr-10" name="delete" value="Supprimer"></input>
</form>