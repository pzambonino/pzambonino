<?php
require_once('../config/config.php');

class Productos{

    public function todos()  //Select* from productos
    {
        $con =new ClaseConectar();
        $con= $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `productos`";
        $datos = mysqli_query($con,$cadena);
        $con->close();
        return $datos;       
    }
    public function uno($idProductos) 
    {
        $con =new ClaseConectar();
        $con= $con->ProcedimientoParaConectar();
        $cadena = "SELECT *   FROM `productos` WHERE `idProductos`=$idProductos"; 
        $datos = mysqli_query($con,$cadena);
        $con->close();
        return $datos;

    }
    public function insertar($idProductos,$Cod_Barras, $Nombre_Producto, $Graba_IVA)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `productos`(`idProductos`, `Cod_Barras`, `Nombre_Producto`, `Graba_IVA`) VALUES ('$idProductos','$Cod_Barras','$Nombre_Producto','$Graba_IVA')";
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
    public function actualizar($idProductos,$Cod_Barras,$Nombre_Producto, $Graba_IVA) //update provedores set nombre = $nombre, direccion = $direccion, telefono = $telefono where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `productos` SET `idProductos`='$idProductos',`Cod_Barras`='$Cod_Barras',`Nombre_Producto`='$Nombre_Producto',`Graba_IVA`='$Graba_IVA' WHERE `idProductos`= $idProductos";
            if (mysqli_query($con, $cadena)) {
                return $idProductos;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idProductos) //delete from productos where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `productos` WHERE `idProductos`=$idProductos";
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