<?php

ob_start();
$title = 'Déconnexion';
?>

<section id="disconnect">
  <div id="img-exit">
    <p>Meeoooooow !</p>
  </div>
  <div id="text-exit">
    <p>Vous avez bien été déconnecté</p>
    <p>Merci de votre visite</p>
    <p>À bientôt !</p>
  </div>
</section>

<?php
$content = ob_get_clean();
session_destroy();
