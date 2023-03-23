<?php

function getViewHomePage(){
  require_once('./src/views/home.view.php');
  require_once('./src/views/templates/main.template.php');
}

function getViewDisconnect()
{
  // Si aucune session USER alors je lui empêche : La Vue Déconnexion
  if (empty($_SESSION['pseudo'])) {
    header('location: ./');
  }
  require_once('./src/views/disconnect.view.php');
  require_once('./src/views/templates/main.template.php');
}

function getViewError(){
  require_once('./src/views/error.view.php');
  require_once('./src/views/templates/main.template.php');
}
