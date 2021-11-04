<?php
    header('content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Articulos.php");
    $articulos = new Articulos();

    $body = json_decode(file_get_contents("php://input"), true);

    switch ($_GET["op"]){
        case "GetArticulos":
            $datos=$articulos->get_articulos();
            echo json_encode($datos);
        break;
        
        case "GetUno":
            $datos=$articulos->get_articulo($body["id"]);
            echo json_encode($datos);
        break;

        case "InsertArticulos":
            $datos=$articulos->insert_articulos($body["descripcion"],$body["unidad"],$body["costo"],
            $body["precio"],$body["aplica_isv"],$body["porcentaje_isv"],$body["id_socio"]);
            echo json_encode("Articulo Agregado");
        break;

        case "DeleteArticulos":
            $datos=$articulos->delete_articulos($body["id"]);
            echo json_encode("Articulo Eliminado");        
        break;

        case "UpdateArticulos":
            $datos=$articulos->update_articulos($body["id"],$body["descripcion"],$body["unidad"],$body["costo"],
            $body["precio"],$body["aplica_isv"],$body["porcentaje_isv"],$body["estado"],$body["id_socio"]);
            echo json_encode("Articulo Actualizado");
        break;
        
    }

?>
