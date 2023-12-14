<?php
require_once('../Models/cls_cines.model.php');
$cines = new Clase_Cines;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $cines->todos();
        while ($fila = mysqli_fetch_assoc($datos)) { 
            $todos[] = $fila;
        }
        echo json_encode($todos); 
        break;
    case "uno":
        $ID_cine = $_POST["ID_cine"]; 
        $datos = array(); 
        $datos = $cines->uno($ID_cine); 
        $uno = mysqli_fetch_assoc($datos); 
        echo json_encode($uno); 
        break;
    case 'insertar':
          $Nombre = $_POST["Nombre"];
    $Ciudad = $_POST["Ciudad"];
    $Número_salas = $_POST["Número_salas"];
    $Direccion = $_POST["Direccion"];
    $Telefono = $_POST["Teléfono"];

    $datosCine = $cines->insertar($Nombre, $Ciudad, $Número_salas, $Direccion, $Telefono); 
    echo json_encode($datosCine); 
        break;
    case 'actualizar':
        $ID_cine = $_POST["CineId"];
        $Nombre = $_POST["Nombre"];
    $Ciudad = $_POST["Ciudad"];
    $Número_salas = $_POST["Número_salas"];
    $Direccion = $_POST["Direccion"];
    $Telefono = $_POST["Teléfono"];
        $datos = array(); 
        $datos = $cines->actualizar($ID_cine, $Nombre, $Ciudad, $Número_salas, $Direccion, $Telefono); 
        echo json_encode($datos); 
        break;
    case 'eliminar':
        $UsuarioId = $_POST["ID_cine"]; 
        $datos = array(); 
        $datos = $cines->eliminar($UsuarioId); 
        echo json_encode($datos); 
        break;
    // case 'actualizar_contrasenia':
    //     $UsuarioId = $_POST["UsuarioId"];
    //     $Contrasenia = md5($_POST["Contrasenia"]);
    //     $datos = array(); 
    //     $datos = $usuarios->actualizar_contrasenia($UsuarioId, $Contrasenia); 
    //     echo json_encode($datos);
    //     break;
    // case 'login':
    //     $correo = $_POST["correo"];
    //     $contrasenia = md5($_POST["contrasenia"]);
    //     if (empty($correo) || empty($contrasenia)) {
    //         header("Location:../login.php?op=1"); 
    //         exit();
    //     }
    //     try {
    //         $datos = array(); 
    //         $datos = $usuarios->login($correo, $contrasenia); 
    //         $respuesta = mysqli_fetch_assoc($datos); 
    //         if (is_array($respuesta) and count($respuesta) > 0) {  
                
                
    //             session_start();
    //             if ($contrasenia == $respuesta["Contrasenia"]) {  
    //                 $_SESSION['Nombres']  = $respuesta["Nombres"];
    //                 $_SESSION['Apellidos'] = $respuesta["Apellidos"];
    //                 $_SESSION['Correo']    = $respuesta["Correo"];
    //                 $_SESSION['Rol']       = $respuesta["Rol"];
    //                 $_SESSION['UsuarioId'] = $respuesta["UsuarioId"];
    //                 header("Location:../views/index.php");
    //             } else {
    //                 header("Location:../login.php?op=2"); 
    //                 exit();
    //             }
    //         } else {
    //             header("Location:../login.php?op=2"); 
    //             exit();
    //         }
    //     } catch (\Throwable $th) {
    //         echo json_encode($th->getMessage());
    //         header("Location:../login.php?op=3"); 
    //     }
    //     break;
}
