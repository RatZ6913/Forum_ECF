<?php

require_once __DIR__ . './../includes/head.php';
?>

<link rel="stylesheet" href="./assets/css/style.css">

<body>
  <?php require_once __DIR__ . './../includes/header.php'; ?>
  <?= $form ?? ''; ?>
  <?= $content ?? ''; ?>
</body>

<?php
require_once __DIR__ . './../includes/footer.php';
