<?php
require_once('../config/config.php');

class Conferencia{

    public function todos(): bool|mysqli_result  //Select* from clientes
    {
        $con =new ClaseConectar();
        $con= $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `conferencia`";
        $datos = mysqli_query(mysql: $con,query: $cadena);
        $con->close();
        return $datos;       
    }
    public function uno($idConferencias): bool|mysqli_result 
    {
        $con =new ClaseConectar();
        $con= $con->ProcedimientoParaConectar();
        $cadena = "SELECT *  FROM `conferencia` WHERE `idConferencias`=$idConferencias";
        $datos = mysqli_query(mysql: $con,query: $cadena);
        $con->close();
        return $datos;

    }
    public function insertar($nombre, $fecha, $ubicacion, $descripcion): int|string
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `conferencia`(`nombre`, `fecha`, `ubicacion`, `descripcion`) VALUES ('$nombre','$fecha','$ubicacion','$descripcion')";
            if (mysqli_query(mysql: $con, query: $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }

    }
    public function actualizar($idConferencias,$nombre, $fecha, $ubicacion, $descripcion): string //update cliente set nombre = $nombre, direccion = $direccion, telefono = $telefono where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `conferencia` SET `nombre`='$nombre',`fecha`='$fecha',`ubicacion`='$ubicacion',`descripcion`='$descripcion' WHERE `idConferencias` = $idConferencias";
             if (mysqli_query($con, $cadena)) {
                return $idConferencias;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idConferencias): string //delete from clientes where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `conferencia` WHERE `idCoferencias`= $idConferencias";
            if (mysqli_query(mysql: $con, query: $cadena)) {
                return "ok";
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }

    }

}