<?php
ob_start();
?>
<link rel="stylesheet" href="./assets/css/style.css" />

<section id="errorView">
  <a href="./">Retourner à l'accueil</a>
  <div id="errorPage">
    <p>Désolé, une erreur est survenue pendant votre action !</p>
  </div>
</section>

<?php
$content = ob_get_clean();
