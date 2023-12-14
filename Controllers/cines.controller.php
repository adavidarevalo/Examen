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
    case 'ciudades':
        $datos = array();
        $datos = $cines->getCiudades();
        while ($fila = mysqli_fetch_assoc($datos)) { 
            $todos[] = $fila;
        }
        echo json_encode($todos); 
        break;
     case 'crearCiudades':
                $nombre_ciudad = $_POST["nombre_ciudad"];

           $datosCine = $cines->crearCiudades($nombre_ciudad); 

        echo json_encode($datosCine); 
        break;
}
