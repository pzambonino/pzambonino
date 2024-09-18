<?php
require_once('../config/config.php');

class Asistentes{

    public function todos(): bool|mysqli_result  //Select* from clientes
    {
        $con =new ClaseConectar();
        $con= $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `asistentes`";
        $datos = mysqli_query(mysql: $con,query: $cadena);
        $con->close();
        return $datos;       
    }
    public function uno($idAsistentes): bool|mysqli_result 
    {
        $con =new ClaseConectar();
        $con= $con->ProcedimientoParaConectar();
        $cadena = "SELECT *  FROM `asistentes` WHERE `idAsistentes`=$idAsistentes";
        $datos = mysqli_query(mysql: $con,query: $cadena);
        $con->close();
        return $datos;

    }
    public function insertar($nombre, $apellido, $email, $telefono): int|string
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `asistentes`(`nombre`, `apellido`, `email`, `telefono`) VALUES ('$nombre','$apellido','$email','$telefono')";
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
    public function actualizar($idAsistentes,$nombre, $apellido, $email, $telefono): string //update cliente set nombre = $nombre, direccion = $direccion, telefono = $telefono where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `asistentes` SET `nombre`='$nombre',`apellido`='$apellido',`email`='$email',`telefono`='$telefono' WHERE `idAsistentes` = $idAsistentes";
             if (mysqli_query($con, $cadena)) {
                return $idAsistentes;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idAsistentes): string //delete from clientes where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `asistentes` WHERE `idAsistentes`= $idAsistentes";
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