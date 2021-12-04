<?php
  $uploadfile=$_FILES["file"]["tmp_name"];
  $folder="uploads/";
  $data = move_uploaded_file($_FILES["file"]["tmp_name"], $folder.''.time().'-'.$_FILES["file"]["name"]);
  if ( $data == 1){
      echo time().'-'.$_FILES["file"]["name"];
  }
  exit();
 ?>