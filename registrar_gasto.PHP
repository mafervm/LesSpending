<?php 
    // Importar controlador de autenticación
    require_once 'controllers/authController.php';

    // Verificar si existe una sesión iniciada
    if (!isset($_SESSION['id'])) {
        header('Location: index.php');
        exit();
    }
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="This is a web page for LesSpending">
    <link rel="icon" href="images/LesSpending_logo_circ.png">
    <!--ADDING BOOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--jQuery first, then Popper.js, then Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300;400;500&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        data-tag="font">
    <!--ICONS API-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <!--CSS STYLE-->
    <link rel="stylesheet" href="css/registrar_gastos.css">

    <title>LesSpending Gastos</title>
</head>

<body>
    <div class="registrar-gasto">
        <div class="div">
            <div class="overlap">
                <img class="line" src="images/linea_grande.png" />
                <img class="img" src="images/linea_grande.png" />
                
                <div class="rectangle"></div>         
      
                <div class="group">
                  <div class="overlap-group"><p class="text-wrapper">Selecciona el tipo de gasto</p></div>
                </div>

                <button class="rectangle-5 categoria-button" data-id-categoria="Restaurante / Comida">
                  <div class="text-wrapper-2">Restaurante / Comida</div>
                  <img class="element" src="images/restaurante.png" />
              </button>
      
                <button class="rectangle-6 categoria-button" data-id-categoria="Gasolina / Coche">
                  <div class="text-wrapper-3">Gasolina / Coche</div>
                  <img class="element-2" src="images/coche.png" />
                </button>
      
                <button class="rectangle-7 categoria-button" data-id-categoria="Cuidado personal">
                  <div class="text-wrapper-4">Cuidado personal</div>
                  <img class="element-3" src="images/cuidado_personal.png" />
                </button>
      
                <button class="rectangle-2 categoria-button" data-id-categoria="Entretenimiento">
                  <div class="text-wrapper-5">Entretenimiento</div>
                  <img class="element-4" src="images/entretenimiento.png" />
                </button> 
               
                <button class="rectangle-4 categoria-button" data-id-categoria="Transporte">
                  <div class="text-wrapper-6">Transporte</div>
                  <img class="element-5" src="images/transporte.png" />
                </button> 
              
                <button class="rectangle-3 categoria-button" data-id-categoria="Bebidas / Fiestas">
                  <div class="text-wrapper-7">Bebidas / Fiestas</div>
                  <img class="element-6" src="images/bebidas.png" />
                </button>
                
                <button class="rectangle-11 categoria-button" data-id-categoria="Compras">
                  <div class="text-wrapper-8">Compras</div>
                  <img class="element-7" src="images/compras.png" />
                </button>
      
                <button class="rectangle-12 categoria-button" data-id-categoria="Teléfono">
                  <div class="text-wrapper-10">Teléfono</div>
                  <img class="element-10" src="images/telefono.png" />
                </button>
      
                <button class="rectangle-13 categoria-button" data-id-categoria="Cuidado de la salud">
                  <div class="text-wrapper-9">Cuidado de la salud</div>
                  <img class="element-8" src="images/cuidado_salud.png" />
                </button>
      
                <button class="rectangle-8 categoria-button" data-id-categoria="Mascotas">
                  <div class="text-wrapper-11">Mascotas</div>
                  <img class="element-9" src="images/mascotas.png" />
                </button>
      
                <button class="rectangle-10 categoria-button" data-id-categoria="Videojuegos">
                  <div class="text-wrapper-12">Videojuegos</div>
                  <img class="element-11" src="images/videojuegos.png" />
                </button>
      
                <button class="rectangle-9 categoria-button" data-id-categoria="Hogar">
                  <div class="text-wrapper-13">Hogar</div>
                  <img class="element-12" src="images/hogar.png" />
                </button>
              </div>

              <div class="overlap-2">
                <img class="line-2" src="images/linea_grande.png" />
                <img class="line-3" src="images/linea_grande.png" />
                <div class="rectangle-14"></div>
                <div class="overlap-wrapper">
                  <div class="overlap-group"><p class="p">Selecciona el tipo de pago</p></div>
                </div>
      
                <button class="rectangle-26 categoria-button tipo-pago-button">
                  <div class="text-wrapper-14">Efectivo</div>
                  <img class="element-13" src="images/efectivo.png" />
                </button>
      
                <button class="rectangle-27 categoria-button tipo-pago-button">
                  <div class="text-wrapper-15">Tarjeta de Crédito</div>
                  <img class="element-14" src="images/tarjeta.png" />
                </button>
      
                <button class="rectangle-28 categoria-button tipo-pago-button">
                  <div class="text-wrapper-16">Tarjeta de Débito</div>
                  <img class="element-15" src="images/tarjeta.png" />
                </button>
      
                <button class="rectangle-25 categoria-button tipo-pago-button">
                  <div class="text-wrapper-17">Transferencia</div>
                  <img class="image" src="images/transferencia.png" />
                </button>
      
                <div class="rectangle-19"></div>
                <div class="overlap-group-wrapper">
                  <div class="overlap-group"><div class="text-wrapper-18">Ingresa el monto:</div></div>
                </div>
              
                <input type="text" class="rectangle-20" />
                
                <button class="rectangle-21" id="btnAceptar">
                  <div class="text-wrapper-22">Aceptar</div>
                </button>
                

                <p class="text-wrapper-23">*Verifica que el monto sea el correcto</p>
              </div>

            <div class="registrar-gasto">
                <div class="div-2">
                    <div class="overlaps-2">
                        <img class="lines-2" src="images/linea_grande.png" />
                        <img class="imgs-2" src="images/linea_grande.png" />
                      
                        <div class="rectangle-2-2"></div>         
              
                        <div class="group-2">
                          <div class="overlap-group"><p class="text-wrapper">Selecciona el tipo de ingreso</p></div>
                        </div>
              
                        <button class="rectangle-5 tipo-ingreso-button" data-id-tipo-ingreso="Salario">
                          <div class="text-wrapper-2">Salario</div>
                          <img class="elements" src="images/salario.png" />
                        </button>  
              
                        <button class="rectangle-6 tipo-ingreso-button" data-id-tipo-ingreso="Ventas">
                          <div class="text-wrapper-3">Ventas</div>
                          <img class="elements-2" src="images/ventas.png" />
                        </button>
              
                        <button class="rectangle-7 tipo-ingreso-button" data-id-tipo-ingreso="Alquiler">
                          <div class="text-wrapper-4">Alquiler</div>
                          <img class="elements-3" src="images/alquiler.png" />
                        </button>
              
                        <button class="rectangle-11 tipo-ingreso-button" data-id-tipo-ingreso="Préstamo">
                          <div class="text-wrapper-8">Préstamo</div>
                          <img class="elements-4" src="images/prestamo.png" />
                        </button>
              
                        <button class="rectangle-12 tipo-ingreso-button" data-id-tipo-ingreso="Inversión">
                          <div class="text-wrapper-10">Inversión</div>
                          <img class="elements-5" src="images/inversiones.png" />
                        </button>
              
                        <button class="rectangle-13 tipo-ingreso-button" data-id-tipo-ingreso="Pensión">
                          <div class="text-wrapper-9">Pensión</div>
                          <img class="elements-6" src="images/pension.png" />
                        </button>
                      </div>

                      <div class="overlaps-3">
                        <img class="line-2" src="images/linea_grande.png" />
                        <img class="line-3" src="images/linea_grande.png" />
                        <div class="rectangle-14"></div>
                        <div class="overlap-wrapper">
                          <div class="overlap-group"><p class="p">Selecciona el tipo de pago</p></div>
                        </div>
              
                        <button class="rectangle-16 categoria-button tipo-pago-button-2">
                          <div class="text-wrapper-14">Efectivo</div>
                          <img class="element-13" src="images/efectivo.png" />
                        </button>
              
                        <button class="rectangle-17 categoria-button tipo-pago-button-2">
                          <div class="text-wrapper-15">Tarjeta de Crédito</div>
                          <img class="element-14" src="images/tarjeta.png" />
                        </button>
              
                        <button class="rectangle-18 categoria-button tipo-pago-button-2">
                          <div class="text-wrapper-16">Tarjeta de Débito</div>
                          <img class="element-15" src="images/tarjeta.png" />
                        </button>
              
                        <button class="rectangle-15 categoria-button tipo-pago-button-2">
                          <div class="text-wrapper-17">Transferencia</div>
                          <img class="image" src="images/transferencia.png" />
                        </button>
              
                        <div class="rectangle-19"></div>
                        <div class="overlap-group-wrapper">
                          <div class="overlap-group"><div class="text-wrapper-18">Ingresa el monto:</div></div>
                        </div>
              
                        <input type="text" class="ingreso" />
                    
                        <button class="rectangle-21" id="btnAceptarIngresos">
                          <div class="text-wrapper-22">Aceptar</div>
                        </button>
                        <p class="text-wrapper-23">*Verifica que el monto sea el correcto</p>
                      </div>
                </div>
            </div>

            <div class="overlap-3">
              <img class="element-18" src="images/logo.png" onclick="scrollToTop()" />
              <script>
              function scrollToTop() {
                
                 window.scrollTo({
                  top: 0,
                  behavior: 'smooth'
                });
                }
              </script>
                <div class="text-wrapper-24">Contacto</div>
                <a href="mailto:lesspending@gmail.com" target="_blank" rel="noopener noreferrer"
                  ><div class="text-wrapper-25">lesspending@gmail.com</div></a
                >
                <p class="text-wrapper-26">©2023 LesSpending. All rights reserved.</p>
              </div>

              <div class="overlap-4">
                <div class="rectangle-22"></div>
                <button class="text-wrapper-27" onclick="window.location.href='index.html'">Salir</button>
                <img class="line-5" src="images/linea_vertical.png" />
                <img class="line-6" src="images/linea_vertical.png" />
                <img class="element-19" src="images/logo.png" onclick="reloadPage()" />
                
                <script>
                function reloadPage() {
                  // Recarga la página actual
                  location.reload();
                  }</script>

              </div>

              <div class="overlap-5">
                <input type="text" class="text-wrapper-28">
                <img class="lesspending" src="images/usuario.png" />
              </div>

            <img class="rectangle-23" src="images/Fam_gastos.png" />
            <div class="text-wrapper-29">Monto Disponible:</div>
            <input class="rectangle-24">
        </div>
    </div>
    <script>
        // ---------------- GASTOS-----------------
      document.addEventListener('DOMContentLoaded', function () {
        // Definir un array para almacenar las categorías seleccionadas
        var categoriasSeleccionadas = [];
        var tipoPagoSeleccionado = ''; // Variable para almacenar el tipo de pago seleccionado
    
        // Función para manejar el evento de clic en un botón de categoría
        function toggleCategoria(idCategoria, button) {
          // Verificar si la categoría ya está seleccionada
          var index = categoriasSeleccionadas.indexOf(idCategoria);
    
          // Si la categoría no está seleccionada, agrégala al array
          if (index === -1) {
            categoriasSeleccionadas.push(idCategoria);
          } else {
            // Si la categoría ya está seleccionada, retírala del array
            categoriasSeleccionadas.splice(index, 1);
          }
    
          // Actualizar la visualización de las categorías seleccionadas
          updateCategoriasSelection(button);
        }
    
        // Función para actualizar la visualización de las categorías seleccionadas
        function updateCategoriasSelection(button) {
          // Obtener el estado actual de la selección del botón
          var isSelected = categoriasSeleccionadas.includes(button.dataset.idCategoria);
    
          // Cambiar el fondo del botón según el estado
          if (isSelected) {
            button.style.backgroundColor = 'lightblue'; 
          } else {
            button.style.backgroundColor = ''; 
          }
        }
    
        // Función para manejar el evento de clic en un botón de tipo de pago
        function selectTipoPago(tipoPago, button) {
          tipoPagoSeleccionado = tipoPago;
          updateTipoPagoSelection(button);
        }
    
        // Función para actualizar la visualización del tipo de pago seleccionado
        function updateTipoPagoSelection(button) {
          // Puedes realizar alguna acción aquí para indicar visualmente el tipo de pago seleccionado si es necesario
        }
    
        // Función para manejar el evento de clic en el botón de aceptar
        function aceptarGastos() {
          // Obtén el valor ingresado en rectangle-20
          var montoIngresado = document.querySelector('.rectangle-20').value;
    
          // Verifica si el monto ingresado es un número válido
          if (!isNaN(parseFloat(montoIngresado))) {
            // Convierte el monto ingresado a un número
            var monto = parseFloat(montoIngresado);
    
            // Realiza la resta en rectangle-24
            var rectangle24 = document.querySelector('.rectangle-24');
            var valorActual = parseFloat(rectangle24.value) || 0; // Valor actual o 0 si no hay valor
    
            // Resta el monto ingresado al valor actual
            var nuevoValor = valorActual - monto;
    
            // Actualiza el valor en rectangle-24
            rectangle24.value = nuevoValor;
    
            // También puedes imprimir el nuevo valor en la consola
            console.log('Nuevo valor en rectangle-24:', nuevoValor);
          } else {
            // Muestra un mensaje de error si el monto ingresado no es válido
            console.error('Error: Ingresa un monto válido.');
          }
    
          // Limpia el tipo de pago seleccionado después de procesar
          tipoPagoSeleccionado = '';
          updateTipoPagoSelection();
        }
    
        // Ejemplo de cómo puedes configurar el evento clic en los botones de categoría
          var categoriaButtons = document.querySelectorAll('.categoria-button');

          categoriaButtons.forEach(function (button) {          
            button.addEventListener('click', function () {
          toggleCategoria(button.dataset.idCategoria, button);
          });
        });

          // Ejemplo de cómo puedes configurar el evento clic en los botones de tipo de pago
          var tipoPagoButtons = document.querySelectorAll('.tipo-pago-button');

          tipoPagoButtons.forEach(function (button) {
              button.addEventListener('click', function () {
                  selectTipoPago(button.dataset.tipoPago, button);
              });
          });

          // Busca el botón por su ID
          var btnAceptar = document.getElementById('btnAceptar');

          // Agrega el evento clic al botón usando la función aceptarGastos
          btnAceptar.addEventListener('click', aceptarGastos);
        });
        
    </script>

<script>
  // ---------------- INGRESOS -----------------
  document.addEventListener('DOMContentLoaded', function () {
    var categoriasSeleccionadas = [];
    var tipoPagoSeleccionado = '';

    function toggleCategoria(idCategoria, button) {
      var index = categoriasSeleccionadas.indexOf(idCategoria);

      if (index === -1) {
        categoriasSeleccionadas.push(idCategoria);
      } else {
        categoriasSeleccionadas.splice(index, 1);
      }

      updateCategoriasSelection(button);
    }

    function updateCategoriasSelection(button) {
      var isSelected = categoriasSeleccionadas.includes(button.dataset.idCategoria);

      if (isSelected) {
        button.style.backgroundColor = 'lightgreen';
      } else {
        button.style.backgroundColor = '';
      }
    }

    function selectTipoPago(tipoPago, button) {
      tipoPagoSeleccionado = tipoPago;
      updateTipoPagoSelection(button);
    }

    function updateTipoPagoSelection(button) {
  // Recupera todos los botones de tipo de pago
  var tipoPagoButtons = document.querySelectorAll('.tipo-pago-button-2');

  // Itera sobre todos los botones y restablece el color de fondo
  tipoPagoButtons.forEach(function (btn) {
    btn.style.backgroundColor = '';
  });

  // Si hay un botón proporcionado, establece un nuevo color de fondo
  if (button) {
    button.style.backgroundColor = 'lightgreen';
  }
}


function aceptarIngresos() {
  var montoIngresado = document.querySelector('.ingreso').value;

  if (!isNaN(parseFloat(montoIngresado))) {
    var monto = parseFloat(montoIngresado);
    var rectangle24 = document.querySelector('.rectangle-24');
    var valorActual = parseFloat(rectangle24.value) || 0;

    var nuevoValor = valorActual + monto;
    rectangle24.value = nuevoValor;

    // Asegúrate de que rectangle-24 sea visible después de la actualización
    rectangle24.style.display = 'block';

    console.log('Nuevo valor en rectangle-24:', nuevoValor);
  } else {
    console.error('Error: Ingresa un monto válido.');
  }

  tipoPagoSeleccionado = '';
  updateTipoPagoSelection();
}


    var categoriaButtons = document.querySelectorAll('.tipo-ingreso-button');

    categoriaButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        toggleCategoria(button.dataset.idCategoria, button);
      });
    });

    var tipoPagoButtons = document.querySelectorAll('.tipo-pago-button-2');

    tipoPagoButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        selectTipoPago(button.dataset.tipoPago, button);
      });
    });

    var btnAceptarIngresos = document.getElementById('btnAceptarIngresos');
    btnAceptarIngresos.addEventListener('click', aceptarIngresos);
  });

</script>

  </script>
    
</body>
</html>