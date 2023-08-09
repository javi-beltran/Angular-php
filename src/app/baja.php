	<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require("conexion.php");
    $con = retornarConexion();

    mysqli_query($con, "delete from articulos where codigo=$_GET[codigo]");


    // class Result
    // {
    // }

    $response = new Result();
    $response->resultado = 'OK';
    $response->mensaje = 'articulo borrado';

    header('Content-Type: application/json');
    echo json_encode($response);
    ?>
	El archivo 'modificacion.php':
	<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    $json = file_get_contents('php://input');

    $params = json_decode($json);

    require("conexion.php");
    $con = retornarConexion();


    mysqli_query($con, "update articulos set descripcion='$params->descripcion',
	                                          precio=$params->precio
	                                          where codigo=$params->codigo");


    class Result
    {
    }

    $response = new Result();
    $response->resultado = 'OK';
    $response->mensaje = 'datos modificados';

    header('Content-Type: application/json');
    echo json_encode($response);
    ?>