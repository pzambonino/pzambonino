<?php
require_once('../config/config.php');

class Participa{

    public function todos()  //Select* from participantes
    {
        $con =new ClaseConectar();
        $con= $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `participante`";
        $datos = mysqli_query($con,$cadena);
        $con->close();
        return $datos;       
    }
    public function uno($idParticipante) 
    {
        $con =new ClaseConectar();
        $con= $con->ProcedimientoParaConectar();
        $cadena = "SELECT *  FROM `participante` WHERE `idParticipante`=$idParticipante";
        $datos = mysqli_query($con,$cadena);
        $con->close();
        return $datos;

    }
    public function insertar($idParticipante,$Nombre, $Apellido, $Email, $Telefono)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `participante`(`idParticipante`,`Nombre`, `Apellido`, `Email`,`Telefono`) VALUES ('$idParticipante','$Nombre','$Apellido','$Email','$Telefono')";
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
    public function actualizar($idParticipante, $Nombre, $Apellido, $Email, $Telefono) //update participantes 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `Participante` SET `idParticipante`='$idParticipante',`Nombre`='$Nombre',`Apellido`='$Apellido',`Email`='$Email',`Telefono`='$Telefono' WHERE `idParticipante`=$idParticipante";
            if (mysqli_query($con, $cadena)) {
                return $idParticipante;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idParticipante) //delete from participantes
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `participante` WHERE `idParticipante`= $idParticipante";
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