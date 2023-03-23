<form id="deleteForm-comment" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST">
  <input class="btn-del" type="hidden" name="id_comment" value="<?= $comments['id_c']; ?>">
  <input class="btn-del" type="submit" class="btn mr-10" name="delete" value="Supprimer"></input>
</form>