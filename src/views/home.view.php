<?php
ob_start();
$title = 'Page d\'accueil';
?>

<link rel="stylesheet" href="./public/css/style.css" />

<section>
  <h1>Page d'accueil</h1>
</section>

<?php
$content = ob_get_clean();