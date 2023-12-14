<?php
require_once('../Models/cls_tratamientos.model.php');
$tratamientos = new Clase_Tratamientos;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $tratamientos->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $ID_tratamiento  = $_POST["ID_tratamiento"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $tratamientos->uno($ID_tratamiento); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
       // $ID_tratamiento  = $_POST["ID_tratamiento"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST= $_POST["PaisId"];
        $ID_paciente  = $_POST["ID_paciente"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST= $_POST["PaisId"];
        $Tipo_tratamiento   = $_POST["Tipo_tratamiento"];
        $Costo = $_POST["Costo"];
        $Fecha_inicio = $_POST["Fecha_inicio"];
        $datos = array(); //defino un arreglo
        $datos = $tratamientos->insertar($ID_paciente,$Tipo_tratamiento,$Costo,$Fecha_inicio); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $ID_tratamiento  = $_POST["ID_tratamiento"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST= $_POST["PaisId"];
        $Tipo_tratamiento   = $_POST["Tipo_tratamiento"];
        $Costo = $_POST["Costo"];
        $Fecha_inicio = $_POST["Fecha_inicio"];
        $datos = array(); //defino un arreglo
        $datos = $tratamientos->actualizar($ID_tratamiento,$Tipo_tratamiento,$Costo,$Fecha_inicio); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
   /*  case 'eliminar':
        $ID_tratamiento  = $_POST["ID_tratamiento"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST= $_POST["PaisId"];= $_POST["ProvinciasId"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $tratamientos->eliminar($ID_tratamiento); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break; */
        case 'eliminar':
            // Verifica si 'ID_tratamiento' está presente en la solicitud POST
            if (isset($_POST["ID_tratamiento"])) {
                // Obtén y sanitiza el valor de 'ID_tratamiento'
                $ID_tratamiento = filter_var($_POST["ID_tratamiento"], FILTER_SANITIZE_NUMBER_INT);
        
                // Si el valor no está vacío, procede con la eliminación
                if ($ID_tratamiento !== false && $ID_tratamiento !== '') {
                    $datos = array(); // Define un arreglo
                    // Llama al método para eliminar el tratamiento usando el ID obtenido
                    $datos = $tratamientos->eliminar($ID_tratamiento);
                    // Devuelve la respuesta en formato JSON
                    echo json_encode($datos);
                } else {
                    echo json_encode("ID de tratamiento no válido"); // Si 'ID_tratamiento' está vacío o no es un número, devuelve un mensaje de error
                }
            } else {
                echo json_encode("No se proporcionó ID de tratamiento"); // Si 'ID_tratamiento' no está presente en la solicitud POST, devuelve un mensaje de error
            }
            break;
        


}
