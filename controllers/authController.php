<?php
// Crear sesiones
session_start();

// Conexión a la base de datos
require 'includes/config/database.php';
$db = conectardb();

// Variables
$errors = array();
$email = "";
$name = "";
$lastname = "";
$idiest = "";
$password = "";

// Cuando el usuario oprime el botón registrarse
if (isset($_POST['signup'])) {
    // ... (tu código actual)

    // Lees email y ID-IEST
    $emailQuery = "SELECT * FROM Usuario WHERE Correo = '$email' LIMIT 1";
    $emailResult = mysqli_query($db, $emailQuery);

    $idQuery = "SELECT * FROM Usuario WHERE id = '$idiest' LIMIT 1";
    $idResult = mysqli_query($db, $idQuery);

    // Verificar si el correo ya existe
    if (mysqli_num_rows($emailResult) > 0) {
        $errors['emailExists'] = "El correo ingresado ya existe";
    }

    // Verificar si el ID-IEST ya existe
    if (mysqli_num_rows($idResult) > 0) {
        $errors['idIestExists'] = "El ID IEST ingresado ya existe";
    }

    // Si no hay errores
    if (count($errors) === 0) {
        // Encriptar contraseña
        $password = password_hash($password, PASSWORD_DEFAULT);
        $userType = 0;
        $status = 'Activo';

        // Insertar el registro
        $sql = "INSERT into Usuario (id, nombre, apellido, Correo, contraseña, tipo, estado) 
        VALUES ('$idiest', '$name', '$lastname','$email', '$password', '$userType', '$status')";
        $insertUser = mysqli_query($db, $sql);

        if ($insertUser) {
            // Asignar variables de sesión
            $_SESSION['id'] = $idiest;
            $_SESSION['nombre'] = $name;
            $_SESSION['apellido'] = $lastname;
            $_SESSION['email'] = $email;
            $_SESSION['estado'] = $status;

            // Redireccionar a menu
            header('Location: menu.php');
            exit();
        }
    }
}

// Cuando el usuario oprime el botón iniciar sesión
if (isset($_POST['login'])) {
    // ... (tu código actual)

    // Leer email
    $emailQuery = "SELECT * FROM Usuario WHERE Correo = '$email' LIMIT 1";
    $emailResult = mysqli_query($db, $emailQuery);

    // Verificar si el email está registrado
    if (mysqli_num_rows($emailResult) > 0) {
        // Obtener fila del usuario
        $user = mysqli_fetch_assoc($emailResult);

        // Verificar si la contraseña coincide
        if (password_verify($password, $user['contraseña'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['apellido'] = $user['apellido'];
            $_SESSION['email'] = $user['Correo'];
            $_SESSION['estado'] = $user['estado'];

            // Redireccionar a menu
            header('Location: menu.php');
            exit();
        } else {
            $errors['password_fail'] = "Contraseña incorrecta";
        }
    } else {
        $errors['email_fail'] = "Correo incorrecto";
    }
}

// Cerrar sesión de usuario
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['nombre']);
    unset($_SESSION['apellido']);
    unset($_SESSION['email']);
    header('Location: index.php');
    exit();
}
?>
