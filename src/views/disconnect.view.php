<?php

ob_start();
$title = 'Déconnexion';
?>

<link rel="stylesheet" href="./public/css/style.css">

  <div id="disconnect">
    <p class="text-dc">Vous avez bien été déconnecté</p>
    <p class="text-dc">Merci de votre visite</p>
    <p class="text-dc">À bientôt !</p>
    <a href="./" class="text-dc">Page d'accueil</a>
  </div>

<?php 
$content = ob_get_clean();
session_destroy();