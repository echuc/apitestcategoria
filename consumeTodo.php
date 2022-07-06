<?php
    // para obtener los datos del json en un array asociativo
    $data = json_decode(file_get_contents("https://apirestcategoria.herokuapp.com/controller/categoria.php?opcion=getAll"), true);
    print_r($data);
    echo "<hr>";
    var_dump($data);
    echo "<hr>";
    echo "
    <table>
        <tr>
            <td>No</td>
            <td>id</td>
            <td>Nombre</td>
            <td>Observación</td>
            <td>Estado</td>
        </tr>
    ";
    for($i=0; $i < count($data); $i++) {
        echo "
        <tr>
            <td>$i</td>
            <td>".$data[$i]["id"]."</td>
            <td>".$data[$i]["nombre"]."</td>
            <td>".$data[$i]["observacion"]."</td>
            <td>".$data[$i]["estado"]."</td>
        </tr>
        ";
    }
    echo "</table>";

?> 
