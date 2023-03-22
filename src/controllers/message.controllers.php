<?php
// var_dump($_GET);

$idTopic = $_GET['id'];

var_dump($idTopic);

function getViewMessage(){
  require_once('./src/views/forum/message/message.view.php');
  require_once('./src/views/templates/main.template.php');
}
