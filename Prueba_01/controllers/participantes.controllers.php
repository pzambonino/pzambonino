<?php
require_once('../models/participante.models.php');
error_reporting(0);

$participantes = new Participa;

switch($_GET["op"]){
    case 'todos':
        $datos = array();
        $datos = $participantes->todos();
       while ($row = mysqli_fetch_assoc($datos)){
        $todos[] = $row;
       }
       echo json_encode($todos);
    break;
    case 'uno':
        $idParticipantes = $_POST["idParticipante"];
        $datos = array();
        $datos = $participantes->uno($idParticipante);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        $idParticipante = $_POST["idParticipante"];
        $Nombre = $_POST["Nombre"];
        $Apellido = $_POST["Apellido"];
        $Email = $_POST["Email"];
        $Telefono = $_POST["Telefono"];
      

        $datos = array();
        $datos = $participantes->insertar($idParticipante,$Nombre, $Apellido, $Email, $Telefono);
        echo json_encode($datos);

    break;

    case 'actualizar':
        $idParticipante = $_POST["idParticipante"];
        $Nombre = $_POST["Nombre"];
        $Apellido = $_POST["Apellido"];
        $Email = $_POST["Email"];
        $Telefono = $_POST["Telefono"];
        
        $datos = array();
        $datos = $participantes->actualizar($idParticipante, $Nombre, $Apellido, $Email, $Telefono);
        echo json_encode($datos);

    break;

    case 'eliminar':
        $idParticipante = $_POST["idParticipante"];
        $datos = array();
        $datos = $participantes->eliminar($idParticipante);
        echo json_encode($datos);

        
    break;

}
