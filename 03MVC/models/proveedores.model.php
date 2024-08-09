<?php
require_once('../config/config.php');

class Proveedores{

    public function todos()  //Select* from proveedores
    {
        $con =new ClaseConectar();
        $con= $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `proveedores`";
        $datos = mysqli_query($con,$cadena);
        $con->close();
        return $datos;       
    }
    public function uno($idProveedores) 
    {
        $con =new ClaseConectar();
        $con= $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `proveedores` WHERE `idProveedores`=$idProveedores";
        $datos = mysqli_query($con,$cadena);
        $con->close();
        return $datos;

    }
    public function insertar($Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Telefono_Contacto)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `proveedores` ( `Nombre_Empresa`, `Direccion`, `Telefono`, `Contacto_Empresa`, `Telefono_Contacto`) VALUES ('$Nombre_Empresa','$Direccion','$Telefono','$Contacto_Empresa','$Telefono_Contacto')";
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
    public function actualizar($idProveedores, $Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Telefono_Contacto) //update provedores set nombre = $nombre, direccion = $direccion, telefono = $telefono where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `proveedores` SET `Nombre_Empresa`='$Nombre_Empresa',`Direccion`='$Direccion',`Telefono`='$Telefono',`Contacto_Empresa`='$Contacto_Empresa',`Telefono_Contacto`='$Telefono_Contacto' WHERE `idProveedores` = $idProveedores";
            if (mysqli_query($con, $cadena)) {
                return $idProveedores;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idProveedores) //delete from provedores where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `proveedores` WHERE `idProveedores`= $idProveedores";
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

