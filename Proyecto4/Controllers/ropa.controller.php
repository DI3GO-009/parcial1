<?php
require_once('../Models/cls_ropa.model.php');
$ropas = new Clase_Ropa;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $ropas->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $RopaId = $_POST["RopaId"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $ropas->uno($RopaId); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $Codigo = $_POST["Codigo"];
        $Cantidad = $_POST["Cantidad"];
        $Tipo = $_POST["Tipo"];
        $Modelo = $_POST["Modelo"];
        $Precio = $_POST["Precio"];
        $Talla = $_POST["Talla"];
        $Color = $_POST["Color"];
        $Marca = $_POST["Marca"];
        $datos = array(); //defino un arreglo
        $datos = $ropas->insertar($Codigo, $Cantidad, $Tipo, $Modelo, $Precio, $Talla, $Color, $Marca); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $RopaId = $_POST["RopaId"];
        $Codigo = $_POST["Codigo"];
        $Cantidad = $_POST["Cantidad"];
        $Tipo = $_POST["Tipo"];
        $Modelo = $_POST["Modelo"];
        $Precio = $_POST["Precio"];
        $Talla = $_POST["Talla"];
        $Color = $_POST["Color"];
        $Marca = $_POST["Marca"];
        $datos = array(); //defino un arreglo
        $datos = $ropas->actualizar($RopaId, $Codigo, $Cantidad, $Tipo, $Modelo, $Precio, $Talla, $Color, $Marca); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $RopaId = $_POST["RopaId"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $ropas->eliminar($RopaId); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
}
