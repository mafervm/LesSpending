<?php 
    //Importar controlador de autenticación
    require_once 'admin/controllers/authController.php';

    //Verificar si existe una sesión iniciada
    if(!$_SESSION['admin']){
        header('Location: index.php');
        exit();
    }

    require_once 'controllers/panelController.php';
    
    //Fecha actual
    $today = getdate();
    $now = date('H:i',time() - 21600);
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" href="images/LesSpending_logo_circ.png">
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="css/suscripciones.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300;400;500&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"  data-tag="font">
    <title>Suscripciones</title>
  </head>
  <body>
    <div class="suscripciones">
      <div class="overlap-wrapper">
        <div class="overlap">
          <div class="overlap-group">
            <div class="rectangle"></div>
            <div class="div"></div>
            <div class="rectangle-2"></div>
            <div class="rectangle-3"></div>

            <div class="usuario-button">
              <div class="text-wrapper">Usuarios</div>
            </div>

            <button class="custom-button">
              <div class="rectangle-3"></div>
              <div class="text-wrapper-2">Suscripción</div>
              <img class="line" src="images/green_line.png" />
          </button>

            <div class="text-wrapper-3">ID</div>
            <div class="text-wrapper-4">Suscripción</div>
            <div class="text-wrapper-5">Estado</div>
            <div class="rectangle-4"></div>
            <div class="text-wrapper-7">Administrador</div>
            
            <div class="overlap-5">
              <input type="text" class="text-wrapper-8">
              <img class="lesspending" src="images/usuario.png" />
            </div>
            
            <input type="text" class="rectangle-5" />
            <input type="text" class="rectangle-6" />
            <input type="text" class="rectangle-7" />

            <img class="img" src="images/linea_grande.png" />
            <img class="line-2" src="images/linea_vertical.png" />
            <img class="line-3" src="images/linea_vertical.png" />
            <img class="element" src="images/logo.png" />
      
          </div>
          <button class="text-wrapper-15">Salir</button>
        </div>
      </div>
    </div>
  </body>
</html>
