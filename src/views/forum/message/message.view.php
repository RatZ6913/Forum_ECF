<?php
ob_start();
$title = 'Messages';
require_once('./src/models/autoload.php');
$topic = new Topic();
$message = new Message();

?>

<link rel="stylesheet" href="./assets/css/topic.style.css" type="text/css">

<main>
  <!-- // Appelle la Vue postForm.view  -->
  <h1>TITRE pour message</h1>
</main>

<?php
$content = ob_get_clean();

var_dump($_GET);