<?php
require_once __DIR__ . './database.class.php';

class Image extends Database
{
  public $targetDir;

  public function __construct()
  {
    parent::__construct();
    $this->targetDir = trim("./assets/images/uploads/ ");
  }

  public function uploadImage()
  {

    $fileExtension = pathinfo($_FILES['post']['name'], PATHINFO_EXTENSION);
    $hashedName = substr(md5($_FILES['post']['name']), 0, 8);
    $targetFile = $this->targetDir . $hashedName . '.' . $fileExtension;
    $uploadCheck = 1;
    $imageMimeType = strtolower($fileExtension);

    if (!empty($_FILES['post'])) {

      if ($_FILES["post"]["size"] > 5000000) {
        $uploadCheck = 0;
      }

      if (
        $imageMimeType !== "jpg" && $imageMimeType !== "png" &&
        $imageMimeType !== "jpeg" && $imageMimeType !== "gif"
      ) {
        $uploadCheck = 0;
      } else if ($imageMimeType == 'jpeg') {
        $imageMimeType = str_replace("e", "", $imageMimeType);
      }
    }

    if ($uploadCheck == 0) {
      throw new Exception();
    } else {
      if (move_uploaded_file($_FILES["post"]["tmp_name"], $targetFile)) {
        true;
      } else {
        throw new Exception();
      }
    }
    $_SESSION['avatar'] = basename($targetFile);
    return;
  }
}