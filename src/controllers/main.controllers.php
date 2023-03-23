<?php

function getViewHomePage(): void {
  // Si URL = http://localhost:3000 OU /index.php. Appelle la View Accueil
  if ($_SERVER['PHP_SELF'] == '/index.php' && empty($_GET)) {
    require_once('./src/views/home.view.php');
    require_once('./src/views/templates/main.template.php');
  } else {
    // Si User essaye d'accéder à des pages via URL alors affiche View Error 
    getViewError();
  }
}

function getViewDisconnect(): void {
  // Si aucune session USER alors je lui empêche : La Vue Déconnexion
  if (empty($_SESSION['pseudo'])) {
    header('location: ./');
  }
  require_once('./src/views/disconnect.view.php');
  require_once('./src/views/templates/main.template.php');
}

function getViewError(): void {
  require_once('./src/views/error.view.php');
  require_once('./src/views/templates/main.template.php');
}
