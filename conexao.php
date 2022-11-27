<?php

  $server = 'localhost';
  $user = 'root';
  $password = '12345678';  $database = 'db_empregosTIBB;';


  $connection = new PDO("mysql:host=$server;dbname=$database", $user, $password);

?>
