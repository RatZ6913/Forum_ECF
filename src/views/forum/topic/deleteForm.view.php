<section id="deleteForm">
  <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST">
    <input class="btn-del" type="hidden" name="id_message" value="<?= $subjects['id_m']; ?>">
    <input class="btn-del" type="submit" class="btn mr-10" name="delete" value="Supprimer">
  </form>
</section>