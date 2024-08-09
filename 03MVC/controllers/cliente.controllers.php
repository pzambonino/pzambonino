<?php
require_once('../models/cliente.model.php');
//error_reporting(0);

$cliente = new Cliente;

switch($_GET["op"]){
    case 'todos':
        $datos = array();
        $datos = $cliente->todos();
       while ($row = mysqli_fetch_assoc($datos)){
        $todos[] = $row;
       }
       echo json_encode($todos);
    break;
    case 'uno':
        $id_Cliente = $_POST["id_cliente"];
        $datos = array();
        $datos = $cliente->uno($idCliente);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        $Nombres = $_POST["Nombres"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $Cedula = $_POST["Cedula"];
        $Correo = $_POST["Correo"];

        $datos = array();
        $datos = $cliente->insertar($Nombres, $Direccion, $Telefono, $Cedula, $Correo);
        echo json_encode($datos);

    break;

    case 'actualizar':
        $idCliente = $_POST["idCliente"];
        $Nombres = $_POST["Nombres"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $Cedula = $_POST["Cedula"];
        $Correo = $_POST["Correo"];
        $datos = array();
        $datos = $cliente->actualizar($idCliente, $Nombres, $Direccion, $Telefono, $Cedula, $Correo);
        echo json_encode($datos);

    break;

    case 'eliminar':
        $idCliente = $_POST["idCliente"];
        $datos = array();
        $datos = $cliente->eliminar($idCliente);
        echo json_encode($datos);

        
    break;

}