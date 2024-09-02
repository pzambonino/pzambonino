<?php
// TODO: Clase de Factura Tienda Cel@g
require_once('../config/config.php');

class Factura
{
    public function todos() // select * from factura
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT factura.idFactura, cliente.Nombres, (factura.Sub_total + factura.Sub_total_iva) as total FROM `factura` INNER JOIN cliente on factura.Cliente_idCliente = cliente.idCliente";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idFactura) // select * from factura where id = $idFactura
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `factura` INNER JOIN cliente on factura.Cliente_idCliente = cliente.idCliente WHERE `idFactura` = $idFactura";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($Fecha, $Sub_total, $Sub_total_iva, $Valor_IVA, $Cliente_idCliente) // insert into factura (Fecha, Sub_total, Sub_total_iva, Valor_IVA, Clientes_idClientes) values (...)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `factura`(`Fecha`, `Sub_total`, `Sub_total_iva`, `Valor_IVA`, `Cliente_idCliente`) 
                       VALUES ('$Fecha', '$Sub_total', '$Sub_total_iva', '$Valor_IVA', '$Cliente_idCliente')";
            //echo $cadena;
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id; // Return the inserted ID
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function actualizar($idFactura, $Fecha, $Sub_total, $Sub_total_iva, $Valor_IVA, $Cliente_idCliente) // update factura set ... where id = $idFactura
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `factura` SET 
                       `Fecha`='$Fecha',
                       `Sub_total`='$Sub_total',
                       `Sub_total_iva`='$Sub_total_iva',
                       `Valor_IVA`='$Valor_IVA',
                       `Cliente_idCliente`='$Cliente_idCliente'
                       WHERE `idFactura` = $idFactura";
            if (mysqli_query($con, $cadena)) {
                return $idFactura; // Return the updated ID
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($idFactura) // delete from factura where id = $idFactura
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `factura` WHERE `idFactura`= $idFactura";
            if (mysqli_query($con, $cadena)) {
                return 1; // Success
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