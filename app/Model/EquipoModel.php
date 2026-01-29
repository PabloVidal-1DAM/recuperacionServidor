<?php

namespace App\Model;

use App\Class\Equipo;
use PDO;
use PDOException;

class EquipoModel
{
    public static function getEquipoById($id): ?Equipo{
        try{
            $conexion = new PDO("mysql:host=mariadb;dbname=examen", "alumno", "alumno");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM equipos WHERE id = :id";
            $sentenciaPreparada = $conexion->prepare($sql);

            $sentenciaPreparada->bindValue(":id", $id);
            $sentenciaPreparada->execute();

            $resultado = $sentenciaPreparada->fetch(PDO::FETCH_ASSOC);
            if($resultado){
                $equipo = Equipo::createFromArray($resultado);
                return $equipo;
            }else{
                echo json_encode(["mensaje" => "No se ha podido obtener el equipo"]);
                return null;
            }
        }catch(PDOException $e){
            echo json_encode(["mensaje" => $e->getMessage()]);
        }
    }
}