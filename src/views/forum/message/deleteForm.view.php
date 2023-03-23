<form id="deleteForm-discussion" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST">
  <input class="btn-del" type="hidden" name="id_message" value="<?= $discussions['id_d']; ?>">
  <input class="btn-del" type="submit" class="btn mr-10" name="delete" value="Supprimer"></input>
</form>