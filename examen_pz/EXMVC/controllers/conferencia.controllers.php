<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {
    die();
}
require_once('../models/conferencia.models.php');
//error_reporting(0);

$conferencia = new Conferencia;

switch($_GET["op"]){
   
    case 'todos':
        $datos = array();
        $datos = $conferencia->todos();
       while ($row = mysqli_fetch_assoc( $datos)){
        $todos[] = $row;
       }
       echo json_encode( $todos);
    break;
    case 'uno':
        $idConferencias = $_POST["idConferencias"];
        $datos = array();
        $datos = $conferencia->uno($idConferencias );
        $res = mysqli_fetch_assoc(result: $datos);
        echo json_encode(value: $res);
        break;

    case 'insertar':
        $nombre = $_POST["nombre"];
        $fecha = $_POST["fecha"];
        $ubicacion = $_POST["ubicacion"];
        $descripcion = $_POST["descripcion"];
        //$Correo = $_POST["Correo"];

        $datos = array();
        $datos = $conferencia->insertar($nombre, $fecha, $ubicacion, $descripcion);
        echo json_encode($datos);

    break;

    case 'actualizar':
        $idConferencias = $_POST["idConferencias"];
        $nombre = $_POST["nombre"];
        $fecha = $_POST["fecha"];
        $ubicacion = $_POST["ubicacion"];
        $descripcion = $_POST["descripcion"];
        //$Correo = $_POST["Correo"];
        $datos = array();
        $datos = $conferencia->actualizar($idConferencias, $nombre, $fecha, $ubicacion, $descripcion);
        echo json_encode($datos);

    break;

    case 'eliminar':
        $idConferencias = $_POST["idConferencias"];
        $datos = array();
        $datos = $conferencia->eliminar($idConferencias);
        echo json_encode($datos);

        
    break;

}