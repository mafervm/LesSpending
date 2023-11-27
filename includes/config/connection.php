<?php
/*
    Conexión a la base de datos.
    En caso de tener error, imprimira un mensaje de error.
*/
  $host_name = 'db5014824102.hosting-data.io';
  $database = 'dbs12316740';
  $user_name = 'dbu990533';
  $password = 'D*6qmAA+a9wQaPP';

  $link = new mysqli($host_name, $user_name, $password, $database);

  if ($link->connect_error) {
    die('<p>Error al conectar con servidor MySQL: '. $link->connect_error .'</p>');
  } else {
    echo '<p>Se ha establecido la conexión al servidor MySQL con éxito.</p>';
  }
?>