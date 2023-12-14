<?php
require_once('cls_conexion.model.php');
class Clase_Pacientes
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `pacientes`";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($ID_paciente)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `pacientes` WHERE ID_paciente=$ID_paciente";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
   /*  public function insertar($Nombre,$Edad,$Enfermedad,$Fecha_ingreso)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();  
            $cadena = "INSERT INTO pacientes (Nombre, Edad, Enfermedad, Fecha_ingreso) VALUES ('$Nombre','$Edad','$Enfermedad','$Fecha_ingreso')";          
            //$cadena = "INSERT INTO 'pacientes'('Nombre', 'Edad', 'Enfermedad', 'Fecha_ingreso') VALUES ('$Nombre','$Edad','$Enfermedad','$Fecha_ingreso')";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    } */

    public function insertar($Nombre, $Edad, $Enfermedad, $Fecha_ingreso)
{
    try {
        $con = new Clase_Conectar_Base_Datos();
        $con = $con->ProcedimientoConectar();

        
        $consulta_repetido = "SELECT COUNT(*) as total FROM pacientes WHERE Nombre = '$Nombre'";
        $resultado_repetido = mysqli_query($con, $consulta_repetido);
        $total = mysqli_fetch_assoc($resultado_repetido)["total"];

        if ($total > 0) {
            return "Error: El nombre '$Nombre' ya existe en la base de datos.";
        }

        
        $cadena = "INSERT INTO pacientes(Nombre, Edad, Enfermedad, Fecha_ingreso) VALUES ('$Nombre', '$Edad', '$Enfermedad', '$Fecha_ingreso')";
        $result = mysqli_query($con, $cadena);

        return 'ok';
    } catch (Throwable $th) {
        return $th->getMessage();
    } finally {
        $con->close();
    }
}



    public function actualizar($ID_paciente, $Nombre,$Edad,$Enfermedad,$Fecha_ingreso)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            
            $cadena = "UPDATE `pacientes` SET `Nombre`='$Nombre',`Edad`='$Edad',`Enfermedad`='$Enfermedad',`Fecha_ingreso`='$Fecha_ingreso'WHERE `ID_paciente`='$ID_paciente'";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($ID_paciente)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "delete from pacientes where ID_paciente=$ID_paciente";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function verificar_paciente($Nombre)
{
    try {
        $con = new Clase_Conectar_Base_Datos();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT count(*) as nombre_repetido FROM `pacientes` WHERE `Nombre`= '$Nombre'";
        $result = mysqli_query($con, $cadena);
        return $result; // Aquí deberías devolver solo el resultado
    } catch (Throwable $th) {
        return array("error" => $th->getMessage()); // Devuelve un array con un mensaje de error si algo falla
    } finally {
        $con->close();
    }
}



}
