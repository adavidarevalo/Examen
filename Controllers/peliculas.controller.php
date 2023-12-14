<?php
require_once('../Models/cls_peliculas.model.php');
$peliculas = new Clase_Peliculas;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $peliculas->todos();
        while ($fila = mysqli_fetch_assoc($datos)) { 
            $todos[] = $fila;
        }
        echo json_encode($todos); 
        break;
    case "uno":
        $ID_pelicula = $_POST["ID_pelicula"]; 
        $datos = array(); 
        $datos = $peliculas->uno($ID_pelicula); 
        while ($fila = mysqli_fetch_assoc($datos)) { 
            $todos[] = $fila;
        }
        echo json_encode($todos); 
        break;
    case 'insertar':
          $Título = $_POST["Título"];
    $Género = $_POST["Género"];
    $Duración = intval($_POST["Duración"]);
    $ID_cine = intval($_POST["ID_cine"]);

    $datosCine = $peliculas->insertar($Título, $Género, $Duración, $ID_cine); 
    echo json_encode($datosCine); 
        break;
    case 'nuevoGenero':
          $nombre_genero = $_POST["nombre_genero"];

    $datosCine = $peliculas->insertarNuevoGenero($nombre_genero); 
    echo json_encode($datosCine); 
        break;
    case 'actualizar':
        $ID_pelicula = $_POST["ID"];
        $Título = $_POST["Título"];
    $Género = $_POST["Género"];
    $Duración = $_POST["Duración"];
        $datos = array(); 
        $datos = $peliculas->actualizar($ID_pelicula, $Título, $Género, $Duración); 
        echo json_encode($datos); 
        break;
    case 'eliminar':
        $ID_pelicula = $_POST["ID_pelicula"]; 
        $datos = array(); 
        $datos = $peliculas->eliminar($ID_pelicula); 
        echo json_encode($datos); 
        break;
    case 'generos':
        $datos = array(); 
        $datos = $peliculas->generos(); 
          while ($fila = mysqli_fetch_assoc($datos)) { 
            $todos[] = $fila;
        }
        echo json_encode($todos); 
        break;
    case 'cines':
        $datos = array(); 
        $datos = $peliculas->cines(); 
          while ($fila = mysqli_fetch_assoc($datos)) { 
            $todos[] = $fila;
        }
        echo json_encode($todos); 
        break;
        case 'asociar':
          $ID_cine = $_POST["ID_cine"];
            $ID_pelicula = $_POST["ID_pelicula"];

    $datosCine = $peliculas->asociar($ID_cine, $ID_pelicula); 
    echo json_encode($datosCine); 
        break;
    case 'eliminarAsociacion':
        $ID = $_POST["ID"]; 
        $datos = array(); 
        $datos = $peliculas->eliminarAsociacion($ID); 
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
