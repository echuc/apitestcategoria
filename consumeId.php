<?php
    // para obtener los datos del json en un array asociativo

    $arr = array('id' => 10);
    $id = json_encode($arr);

    $url = "http://localhost/apirestphp/controller/categoria.php?opcion=get";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $id);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
    "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


    $resp = curl_exec($curl);
    curl_close($curl);
    
    // json to array
    $data = json_decode($resp, true);
    echo "<hr>";
    var_dump($data[0]);
    echo "<hr>";

    // Verificar si esta vacío
    if(empty($data)) {
        echo "No se devolvieron valores";
    } else {
        echo "Los datos recuperados son: ";
        // $data = $data[0];
        print_r($data);

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

    }
    




/*
    $data = json_decode(file_get_contents("http://localhost/apirestphp/controller/categoria.php?opcion=getAll"), true);
    print_r($data);
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
            <td>".$data[$i]["descripcion"]."</td>
            <td>".$data[$i]["estado"]."</td>
        </tr>
        ";
    }
    echo "</table>";

?> 

*/
?>