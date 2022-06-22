<?php
    header('Content-Type: application/json');

    require_once "../config/conexion.php";
    require_once "../models/Categoria.php";
    
    $categoria = new Categoria();

    $body =json_decode(file_get_contents("php://input"),true);

    // Crear un servicio que devuelva todas las categorías, es decir todo 
    // lo que devuelve el select de models/Categoria.php
    switch($_GET["opcion"]) {
        // llamar a la función get_categoría y almacenar en datos
        case "getAll":
            $datos = $categoria->get_categoria();
            // colocar los datos en json encode
            echo json_encode($datos);            
            break;
        
        case "get":
            $datos = $categoria->get_categoria_id($body["id"]);
            echo json_encode($datos);
            break;

        case "insert" :
            $datos = $categoria->insert_categoria($body["nombre"], $body["observacion"]);
            echo json_encode("Categoría insertada");
            break;

        case "update" :
            $datos = $categoria->update_categoria($body["id"], $body["nombre"], $body["observacion"]);
            echo json_encode("Categoría actualizada");
            break;

        case "delete" :
            $datos = $categoria->delete_categoria($body["id"]);
            echo json_encode("Categoría eliminada");
            break;

    }
?>