<?php
require_once '../config/conexion.php';
require_once '../models/Categoria.php';

$categoria = new Categoria();

$body = json_decode(file_get_contents('php://input'), true);


switch ($_GET["op"]){
    case "Create":
        $categoria = $categoria->create_Categoria($body);
        echo json_encode($categoria);
        break;
    case "GetAll":
        $categoria = $categoria->get_All();
        echo json_encode(value: $categoria);
        break;
    case "GetAllByOrder":
        $categoria = $categoria->get_All_By_Order();
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
    case "Count":
        $datos = $categoria->count();
        echo json_encode(value: $datos);
        break;
    case "Update":
        $categoria = $categoria->update_Categoria($body);
        echo json_encode($categoria);
        break;
    case "DeleteId":
        $categoria = $categoria->delete_Categoria($body["cat_id"]);
        echo json_encode(value: $categoria);
        break;
    default:
        echo "URL incorrecta";
}
?>