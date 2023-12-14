<?php
require_once('cls_conexion.model.php');
class Clase_Tratamientos
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT Pacientes.Nombre AS Nombre_paciente, 
            Tratamientos.Tipo_tratamiento, 
            Tratamientos.Costo, 
            Tratamientos.Fecha_inicio
            FROM Pacientes
            INNER JOIN Tratamientos ON Pacientes.ID_paciente = Tratamientos.ID_paciente";
     
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($ID_tratamiento)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM tratamientos WHERE ID_tratamiento=$ID_tratamiento";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($ID_paciente,$Tipo_tratamiento,$Costo,$Fecha_inicio)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `tratamientos`(`ID_paciente`,`Tipo_tratamiento`,`Costo`,`Fecha_inicio`) VALUES ($ID_paciente,'$Tipo_tratamiento',$Costo,'$Fecha_inicio')";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }    

}
    public function actualizar($ID_tratamiento,$Tipo_tratamiento,$Costo,$Fecha_inicio)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena ="UPDATE `tratamientos` SET `Tipo_tratamiento`='$Tipo_tratamiento',`Costo`='$Costo',`Fecha_inicio`='$Fecha_inicio' WHERE ID_tratamiento='$ID_tratamiento'";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($ID_tratamiento)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();            
            $cadena = "DELETE FROM `tratamientos` WHERE `ID_tratamiento`='$ID_tratamiento'";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }



}
