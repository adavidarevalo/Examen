<?php
require_once('cls_conexion.model.php');
class Clase_Peliculas
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
        $cadena = "SELECT *
FROM `Películas`
JOIN `Cines` ON `Películas`.`ID_cine` = `Cines`.`ID_cine`;";
        $result = mysqli_query($con, $cadena);
        return $result;
    } catch (Throwable $th) {
        return $th->getMessage();
    } finally {
        $con->close();
    }
}
public function uno($ID_pelicula)
{
    try {
        $con = new Clase_Conectar_Base_Datos();
        $con = $con->ProcedimientoConectar();
                $cadena = "SELECT Películas.ID_pelicula, Películas.Título, Películas.ID, Películas.Género, Películas.Duración, Cines.Nombre AS Nombre_Cine, Cines.Ciudad FROM Películas JOIN Cines ON Películas.ID_cine = Cines.ID_cine WHERE Películas.ID_pelicula = $ID_pelicula";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    
    }
    public function insertar($Título, $Género, $Duración, $ID_cine)
    {
        try {
            $num = random_int(1, 100000);

            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `Películas`(`ID_pelicula`, `ID_cine`, `Título`, `Género`, `Duración`) VALUES ($num, $ID_cine, '$Título', '$Género', $Duración)";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertarNuevoGenero($nombre_genero)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO Generos (nombre_genero) VALUES
    ('$nombre_genero')";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function asociar($ID_cine, $ID_pelicula)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `Películas` WHERE ID_pelicula = $ID_pelicula LIMIT 1;";
            $resultadoSeleccion = mysqli_query($con, $cadena);
            if ($resultadoSeleccion) {
            $filaPelicula = mysqli_fetch_assoc($resultadoSeleccion);

            $filaPelicula['ID_cine'] = $ID_cine;

            unset($filaPelicula['ID_pelicula']);

            $nuevaConsulta = "INSERT INTO `Películas` (`ID_pelicula`, `ID_cine`, `Título`, `Género`, `Duración`) 
                             VALUES ($ID_pelicula, $ID_cine, '{$filaPelicula['Título']}', '{$filaPelicula['Género']}', {$filaPelicula['Duración']});";
            $resultadoNuevoRegistro = mysqli_query($con, $nuevaConsulta);

            return "ok";
            
        } else {
            return "Error al seleccionar la película.";
        }
     } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($ID_pelicula, $Título, $Género, $Duración)
    {
        try {
                 $time = (int)$Duración;
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `Películas` SET `Título`='$Título',`Género`='$Género',`Duración`=$time WHERE `ID_pelicula`= $ID_pelicula";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($ID_pelicula)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "delete from Películas where ID_pelicula=$ID_pelicula";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminarAsociacion($ID)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "delete from Películas where ID=$ID";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar_contrasenia($UsuarioId, $contrasenia)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `Usuarios` SET `Contrasenia`='$contrasenia' WHERE `UsuarioId`=$UsuarioId";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function generos()
    {
    try {
        $con = new Clase_Conectar_Base_Datos();
        $con = $con->ProcedimientoConectar();
                $cadena = "SELECT * from Generos";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

     public function cines()
    {
    try {
        $con = new Clase_Conectar_Base_Datos();
        $con = $con->ProcedimientoConectar();
                $cadena = "SELECT ID_cine, Nombre, Ciudad from Cines";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function ciudades()
    {
    try {
        $con = new Clase_Conectar_Base_Datos();
        $con = $con->ProcedimientoConectar();
                $cadena = "SELECT * from Ciudades";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
