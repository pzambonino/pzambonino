<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {
    die();
}
require_once('../models/asistente.models.php');
//error_reporting(0);

$asistentes = new Asistentes;

switch($_GET["op"]){
   
    case 'todos':
        $datos = array();
        $datos = $asistentes->todos();
       while ($row = mysqli_fetch_assoc( $datos)){
        $todos[] = $row;
       }
       echo json_encode( $todos);
    break;
    case 'uno':
        $id_Asistentes = $_POST["idAsistentes"];
        $datos = array();
        $datos = $asistentes->uno($idAsistentes );
        $res = mysqli_fetch_assoc(result: $datos);
        echo json_encode(value: $res);
        break;

    case 'insertar':
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        //$Correo = $_POST["Correo"];

        $datos = array();
        $datos = $asistentes->insertar($nombre, $apellido, $email, $telefono);
        echo json_encode($datos);

    break;

    case 'actualizar':
        $idAsistentes = $_POST["idAsistentes"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        //$Correo = $_POST["Correo"];
        $datos = array();
        $datos = $asistentes->actualizar($idAsistentes, $nombre, $apellido, $email, $telefono);
        echo json_encode($datos);

    break;

    case 'eliminar':
        $idAsistentes = $_POST["idAsistentes"];
        $datos = array();
        $datos = $asistentes->eliminar($idAsistentes);
        echo json_encode($datos);

        
    break;

}