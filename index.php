<?php

require_once __DIR__ . './src/models/autoload.php';

try {
  if(!empty($_GET) && isset($_GET)){
    $_GET['action'] = $_GET['action'] ?? '';




  } else {
    require_once __DIR__ . './src/controllers/main.controllers.php';
    getMainTemplate();
  }


} catch (Exception $e) {
  throw new Exception($e->getMessage());
}