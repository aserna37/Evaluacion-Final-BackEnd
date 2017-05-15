<?php
  $data=file_get_contents('data-1.json');
  $casas=json_decode($data);

  foreach ($casas as $casa) {
    $id=$casa->Id;
    $descriCasa=$casa->Direccion;
    echo $id." ".$descriCasa."<br>";
  }

?>
