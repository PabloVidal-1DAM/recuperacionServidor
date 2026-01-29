<?php

namespace App\Model;

use App\Class\Torneo;
use PDO;
use PDOException;

class TorneoModel
{
    public static function saveTorneo(Torneo $torneo):bool{
        try{
            $conexion = new PDO("mysql:host=mariadb;dbname=examen", "alumno", "alumno");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO torneos (nombre, fecha, premio_total) VALUES(:nombre, STR_TO_DATE(:fecha, '%Y-%c-%d'), :premio_total)";
            $sentenciaPreparada = $conexion->prepare($sql);

            $sentenciaPreparada->bindValue(":nombre", $torneo->getNombre());
            $sentenciaPreparada->bindValue(":fecha", $torneo->getFecha()->format('Y-m-d'));
            $sentenciaPreparada->bindValue(":premio_total", $torneo->getPremioTotal());

            $sentenciaPreparada->execute();

            if($sentenciaPreparada->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }catch (PDOException $error){
            echo json_encode(["mensaje" => $error->getMessage()]);
            return false;
        }
    }
}