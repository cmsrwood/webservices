<?php
require_once '../config/conexion.php';
require_once '../models/Categoria.php';

$categoria = new Categoria();

$body = json_decode(file_get_contents('php://input'), true);

switch ($_GET["op"]){
    case "GetAll":
        $categoria = $categoria->get_All();
        echo json_encode(value: $categoria);
        break;
    case "GetId":
        $categoria = $categoria->get_Categoria_By_Id($body["cat_id"]);
        echo json_encode(value: $categoria);
        break;
    case "GetEst":
        $datos = $categoria->get_Categoria($body["est"]);
        echo json_encode(value: $datos);
        break;
    case "DeleteId":
        $categoria = $categoria->delete_Categoria($body["cat_id"]);
        echo json_encode(value: $categoria);
        break;
    default:
        echo "Incorrecto";
}
?>