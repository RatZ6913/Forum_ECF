<?php
ob_start();
$title = 'Déconnexion';
?>

<script>
    setTimeout(function(){
        window.location.href = "./";
    }, 5000);
</script>

<section id="disconnect">
  <div id="img-exit">
    <p>Meeoooooow !</p>
  </div>
  <div id="text-exit">
    <div>
      <p>Vous avez bien été déconnecté</p>
      <p>Merci de votre visite</p>
      <p>À bientôt !</p>
    </div>
  </div>
</section>

<?php
$content = ob_get_clean();
session_destroy();
