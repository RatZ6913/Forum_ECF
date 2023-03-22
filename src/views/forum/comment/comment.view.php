<?php
ob_start();
// $title = 'Messages';
require_once('./src/models/autoload.php');
$message = new Message();
$discussion = new Discussion();
?>

<link rel="stylesheet" href="./assets/css/message.style.css" type="text/css">

<!-- <main>

  <article>
    <h3 class="text-center">Sujets de :</h3>
  </article>
</main> -->

<?php
$content = ob_get_clean();