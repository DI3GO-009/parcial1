<?php
require_once('../Models/cls_pacientes.models.php');
$pacientes = new Clase_Pacientes;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $pacientes->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $ID_paciente = $_POST["ID_paciente"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $pacientes->uno($ID_paciente); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $Nombre = $_POST['Nombre'];
        $Edad = $_POST['Edad'];
        $Enfermedad = $_POST['Enfermedad'];
        $Fecha_ingreso = $_POST['Fecha_ingreso'];
        $datos = array(); //defino un arreglo
        $datos = $pacientes->insertar($Nombre,$Edad,$Enfermedad,$Fecha_ingreso); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $ID_paciente = $_POST["ID_paciente"];
        $Nombre = $_POST['Nombre'];
        $Edad = $_POST['Edad'];
        $Enfermedad = $_POST['Enfermedad'];
        $Fecha_ingreso = $_POST['Fecha_ingreso'];
        $datos = array(); //defino un arreglo
        $datos = $pacientes->actualizar($ID_paciente, $Nombre,$Edad,$Enfermedad,$Fecha_ingreso); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $ID_paciente = $_POST["ID_paciente"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $pacientes->eliminar($ID_paciente); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
        case 'verificar_paciente':
            $Nombre = $_POST["Nombre"];
            $datos = $pacientes->verificar_paciente($Nombre);
            $resultado = mysqli_fetch_assoc($datos);
            $respuesta = array("paciente_repetido" => $resultado['nombre_repetido']);
            echo json_encode($respuesta);
            break;
        
}
