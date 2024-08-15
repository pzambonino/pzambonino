<?php
require_once('../config/config.php');

class Taller{

    public function todos()  //Select* from clientes
    {
        $con =new ClaseConectar();
        $con= $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `talleres`";
        $datos = mysqli_query($con,$cadena);
        $con->close();
        return $datos;       
    }
    public function uno($Talleres_id) 
    {
        $con =new ClaseConectar();
        $con= $con->ProcedimientoParaConectar();
        $cadena = "SELECT *  FROM `talleres` WHERE `Talleres_id`=$Talleres_id";
        $datos = mysqli_query($con,$cadena);
        $con->close();
        return $datos;

    }
    public function insertar($Nombre, $Descripcion, $Fecha, $Ubicacion)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `talleres`(`Nombre`, `Descripcion`, `Fecha`, `Ubicacion`) VALUES ('$Nombre','$Descripcion','$Fecha','$Ubicacion')";
            if (mysqli_query($con, $cadena)) {
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
    public function actualizar($Talleres_id, $Nombre, $Descripcion, $Fecha, $Ubicacion) //update cliente set nombre = $nombre, direccion = $direccion, telefono = $telefono where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `talleres` SET `Talleres_id`='$Talleres_id',`Nombre`='$Nombre',`Descripcion`='$Descripcion',`Fecha`='$Fecha',`Ubicacion`='$Ubicacion' WHERE `Talleres_id`=$Talleres_id";
            if (mysqli_query($con, $cadena)) {
                return $Talleres_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($Talleres_id) //delete from clientes where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `Talleres` WHERE `Talleres_id`= $Talleres_id";
            if (mysqli_query($con, $cadena)) {
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
