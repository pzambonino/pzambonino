<?php
require_once('../config/config.php');

class Asistente_conferencias{

    public function listar_asistentes_conferencia($idConferencia): int|mysqli_result  //Select* from clientes
    {
        $con =new ClaseConectar();
        $con= $con->ProcedimientoParaConectar();
        $cadena = "SELECT a.idAsistentes, a.nombre, a.apellido, a.email, a.telefono 
        FROM asistentes AS a 
        JOIN asistente_conferencia AS ac ON a.idAsistentes = ac.Asistentes_idAsistentes 
        WHERE ac.Conferencia_idConferencias = $idConferencia";
        $datos = mysqli_query(mysql: $con,query: $cadena);
        $con->close();
        return $datos;       
    }
    
    public function insertar_asistente_conferencia($idAsistentes, $idConferencias): int|string
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `asistente_conferencia`(`Asistentes_idAsistentes`, `Conferencia_idConferencias`) VALUES ('$idAsistentes','$idConferencias')";
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
    public function eliminar_asistente_conferencia($idAsistentes, $idConferencias): int|string
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `asistente_conferencia` WHERE `Asistentes_idAsistentes`= $idAsistentes AND `Conferencia_idConferencias`= $idConferencias";
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


}