<?php
require_once('../config/config.php');

class Cliente{

    public function todos()  //Select* from clientes
    {
        $con =new ClaseConectar();
        $con= $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `cliente`";
        $datos = mysqli_query($con,$cadena);
        $con->close();
        return $datos;       
    }
    public function uno($idCliente) 
    {
        $con =new ClaseConectar();
        $con= $con->ProcedimientoParaConectar();
        $cadena = "SELECT *  FROM `cliente` WHERE `idCliente`=$idCliente";
        $datos = mysqli_query($con,$cadena);
        $con->close();
        return $datos;

    }
    public function insertar($Nombres, $Direccion, $Telefono, $Cedula, $Correo)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `cliente`(`Nombres`, `Direccion`, `Telefono`, `Cedula`, `Correo`) VALUES ('$Nombres','$Direccion','$Telefono','$Cedula','$Correo')";
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
    public function actualizar($idCliente,$Nombres, $Direccion, $Telefono, $Cedula, $Correo) //update cliente set nombre = $nombre, direccion = $direccion, telefono = $telefono where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `cliente` SET `Nombres`='$Nombres',`Direccion`='$Direccion',`Telefono`='$Telefono',`Cedula`='$Cedula',`Correo`='$Correo' WHERE `idCliente`=$idCliente";
            if (mysqli_query($con, $cadena)) {
                return $idCliente;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idCliente) //delete from clientes where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `cliente` WHERE `idCliente`= $idCliente";
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