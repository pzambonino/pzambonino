<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {
    die();
}
require_once('../models/aistente_conferencias.models.php');
//error_reporting(0);

$asistente_conferencia = new Asistente_conferencias;

switch($_GET["op"]){
   
    case 'listar_asistentes_conferencia':
        $idConferencias = $_POST["idConferencias"];
        $datos = array();
        $datos = $asistente_conferencia->listar_asistentes_conferencia($idConferencias);
       while ($row = mysqli_fetch_assoc( $datos)){
        $todos[] = $row;
       }
       echo json_encode( $todos);
    break;
    
    case 'insertar_asistente_conferencia':
        $idAsistentes = $_POST["idAsistentes"];
        $idConferencias = $_POST["idConferencias"];
        //$email = $_POST["email"];
        //$telefono = $_POST["telefono"];
        //$Correo = $_POST["Correo"];

        $datos = array();
        $datos = $asistente_conferencia->insertar_asistente_conferencia($idAsistentes, $idConferencias);
        echo json_encode($datos);

    break;

    
    case 'eliminar_asistente_conferencia':
        $idAsistentes = $_POST["idAsistentes"];
        $idConferencias = $_POST["idConferencias"];
        //$email = $_POST["email"];
        //$telefono = $_POST["telefono"];
        //$Correo = $_POST["Correo"];

        $datos = array();
        $datos = $asistente_conferencia->eliminar_asistente_conferencia($idAsistentes, $idConferencias);
        echo json_encode($datos);
    break;
}
