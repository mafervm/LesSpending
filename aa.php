index:
<?php 
    require_once 'controllers/authController.php';
?>

registrar_gastos:
<?php 
    // Importar controlador de autenticación
    require_once 'controllers/authController.php';

    // Verificar si existe una sesión iniciada
    if (!isset($_SESSION['id'])) {
        header('Location: index.php');
        exit();
    }
?>



<?php 
    //Crear sesiones
    session_start();

    //Database connection
    require 'includes/config/database.php';
    $db = conectardb();

    //Variables 
    $errors = array();
    $email = "";
    $name = "";
    $lastname = "";
    $idiest = "";
    $password = "";

    //Cuando el usuario oprima el botón registrarse
    if(isset($_POST['signup'])){
        $email = mysqli_real_escape_string( $db, $_POST['email'] );
        $name = mysqli_real_escape_string( $db, $_POST['name'] );
        $lastname = mysqli_real_escape_string( $db, $_POST['lastname'] );
        $idiest = mysqli_real_escape_string( $db, $_POST['ID_IEST'] );
        $password = mysqli_real_escape_string( $db, $_POST['password'] );

        //Validaciones
        if(!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email) || !(strpos($email, "@iest.edu.mx"))) {
            $errors['invalidEmail'] = "Email no válido";
        }
        if(empty($name)){
            $errors['invalidName'] = "Ingresa tu nombre";
        }
        if(empty($lastname)){
            $errors['invalidLastName'] = "Ingresa tu apellido";
        }
        if(empty($idiest) || !filter_var($idiest, FILTER_VALIDATE_INT, 
        array("options" => array("min_range" => 1, "max_range" => 99999)))){
            $errors['invalidIdIest'] = "ID IEST no válido";
        }
        if(empty($password)){
            $errors['password'] = "Crea una contraseña";
        }

        //Leer email y ID-IEST
        $emailQuery = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
        $emailResult = mysqli_query($db, $emailQuery);

        $idQuery = "SELECT * FROM usuarios WHERE id_iest = '$idiest' LIMIT 1";
        $idResult = mysqli_query($db, $idQuery);

        //Verificar si el correo ya existe
        if(($emailResult->num_rows) > 0){
            $errors['emailExists'] = "El email ingresado ya existe";
        }

        //Verificar si el ID-IEST ya existe
        if(($idResult->num_rows) > 0){
            $errors['idIestExists'] = "El ID IEST ingresado ya existe";
        }

        //Si no hay errores
        if(count($errors) === 0){
            //Encriptamos contraseña, #respetamos la privacidad del usuario
            $password = password_hash($password, PASSWORD_DEFAULT);
            $userType = 0;
            $status = 'Activo';

            //Insertamos el registro
            $sql = "INSERT into usuarios (id_iest, nombre, apellido, email, password, tipo, estado) 
            VALUES ('$idiest', '$name', '$lastname','$email', '$password', '$userType', '$status')";
            $insertUser = mysqli_query($db, $sql);
            
            if($insertUser){
                //Asignamos variables de sesión
                $_SESSION['id-iest'] = $idiest;
                $_SESSION['nombre'] = $name;
                $_SESSION['apellido'] = $lastname;
                $_SESSION['email'] = $email;
                $_SESSION['estado'] = $status;

                //Reedireccionamos a menu
                header('Location: menu.php');
                exit();
            }
        }
    }

    //Cuando el usuario oprima el botón iniciar sesión
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Validations
        if(!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email) || !(strpos($email, "@iest.edu.mx"))){
            $errors['invalidEmail'] = "Email no válido";
        }
        if(empty($password)){
            $errors['password'] = "Ingresa tu contraseña";
        }

        //Si no hay errores
        if(count($errors) === 0){

            //Leer email
            $emailQuery = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
            $emailResult = mysqli_query($db, $emailQuery);
            
            //Verificar si el email esta registrado
            if(($emailResult->num_rows) > 0){

                //Obtenemos fila del usuario
                $user = mysqli_fetch_assoc($emailResult);

                //Verificamos si la contraseña coincide
                if(password_verify($password, $user['password'])){
                    $_SESSION['id-iest'] = $user['id_iest'];
                    $_SESSION['nombre'] = $user['nombre'];
                    $_SESSION['apellido'] = $user['apellido'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['estado'] = $user['estado'];

                    //Reedireccionamos a menu
                    header('Location: menu.php');
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
        unset($_SESSION['id-iest']);
        unset($_SESSION['nombre']);
        unset($_SESSION['apellido']);
        unset($_SESSION['email']);
        header('Location: index.php');
        exit();
    }
?>