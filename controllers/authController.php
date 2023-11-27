<?php
// Inicia la sesión
session_start();

// Crea la conexión a la base de datos
require 'includes/config/database.php';
$db = conectardb();

// Cuando el usuario oprima el botón registrarse
if(isset($_POST['signup'])){
    $nombre = mysqli_real_escape_string( $db, $_POST['nombre'] );
    $apellido = mysqli_real_escape_string( $db, $_POST['apellido'] );
    $correo = mysqli_real_escape_string( $db, $_POST['correo'] );
    $contraseña = mysqli_real_escape_string( $db, $_POST['contraseña'] );
    $telefono = mysqli_real_escape_string( $db, $_POST['telefono'] );
    $fecha_nacimiento = mysqli_real_escape_string( $db, $_POST['fecha_nacimiento'] );

        //Validaciones
        if(!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)) {
            $errors['invalidEmail'] = "Email no válido";
        }
        if(empty($name)){
            $errors['invalidName'] = "Ingresa tu nombre";
        }
        if(empty($lastname)){
            $errors['invalidLastName'] = "Ingresa tu apellido";
        }
        if(empty($password)){
            $errors['password'] = "Crea una contraseña";
        }

        //Leer email
        $emailQuery = "SELECT * FROM Usuario WHERE correo = '$correo' LIMIT 1";
        $emailResult = mysqli_query($db, $emailQuery);

        //Verificar si el correo ya existe
        if(($emailResult->num_rows) > 0){
            $errors['emailExists'] = "El email ingresado ya existe";
        }


        //Si no hay errores
        if(count($errors) === 0){
            //Encriptamos contraseña
            $password = password_hash($password, PASSWORD_DEFAULT);

            //Insertamos el registro
            $sql = "INSERT into Usuario (nombre, apellido, email, password, tipo, estado) 
            VALUES ('$nombre', '$apellido', '$correo', '$contraseña', '$telefono', '$fecha_nacimiento')";
            $insertUser = mysqli_query($db, $sql);
            
            if($insertUser){
                //Asignamos variables de sesión
                $_SESSION['nombre'] = $nombre;
                $_SESSION['apellido'] = $apellido;
                $_SESSION['email'] = $correo;

                //Reedireccionamos a menu
                header('Location: registrar_gasto.html');
                exit();
            }
        }
    }

    //Cuando el usuario oprima el botón iniciar sesión
    if(isset($_POST['login'])){
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];

        //Validations
        if(!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)){
            $errors['invalidEmail'] = "Email no válido";
        }
        if(empty($password)){
            $errors['password'] = "Ingresa tu contraseña";
        }

        //Si no hay errores
        if(count($errors) === 0){

            //Leer email
            $emailQuery = "SELECT * FROM Usuarios WHERE correo = '$correo' LIMIT 1";
            $emailResult = mysqli_query($db, $emailQuery);
            
            //Verificar si el email esta registrado
            if(($emailResult->num_rows) > 0){

                //Obtenemos fila del usuario
                $user = mysqli_fetch_assoc($emailResult);

                //Verificamos si la contraseña coincide
                if(password_verify($password, $user['password'])){
                    $_SESSION['nombre'] = $user['nombre'];
                    $_SESSION['apellido'] = $user['apellido'];
                    $_SESSION['email'] = $user['email'];

                    //Reedireccionamos a menu
                    header('Location: registrar_gasto.html');
                    exit();
                    
                }else{
                    $errors['password_fail'] = "Contraseña incorrecta";
                }
            }else{
                $errors['email_fail'] = "email incorrecto";
            }
        }
    }


    //Cerrar sesión de usuario
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['nombre']);
        unset($_SESSION['apellido']);
        unset($_SESSION['email']);
        header('Location: index.php');
        exit();
    }
?>