<?php
require_once('cls_conexion.model.php');
class Clase_Ropa
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `ropa`";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($RopaId)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `ropa` WHERE RopaId=$RopaId";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($Codigo, $Cantidad, $Tipo, $Modelo, $Precio, $Talla, $Color, $Marca)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `ropa`(`Codigo`, `Cantidad`, `Tipo`, `Modelo`, `Precio`, `Talla`, `Color`, `Marca`) VALUES ('$Codigo', '$Cantidad', '$Tipo', '$Modelo', '$Precio', '$Talla', '$Color', '$Marca')";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($RopaId, $Codigo, $Cantidad, $Tipo, $Modelo, $Precio, $Talla, $Color, $Marca)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `ropa` SET `Codigo`='$Codigo',`Cantidad`='$Cantidad',`Tipo`='$Tipo',`Modelo`='$Modelo',`Precio`='$Precio',`Talla`='$Talla',`Color`='$Color',`Marca`='$Marca' WHERE `RopaId`='$RopaId'";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($RopaId)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "DELETE FROM `ropa` WHERE RopaId=$RopaId";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

}
