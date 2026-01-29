<?php

namespace App\Controller;
use App\Class\Torneo;
use App\Interface\ControllerInterface;
use App\Model\TorneoModel;

class TorneoController implements ControllerInterface
{

    function index()
    {
        // TODO: Implement index() method.
    }

    function create()
    {
        header('Content-Type: application/json');
        // Crear un torneo
        if(isset($_POST['nombre'], $_POST['fecha'], $_POST['premio_total'])){
            $torneo = Torneo::createFromArray($_POST);
            if (TorneoModel::saveTorneo($torneo)){
                echo json_encode(["mensaje" => "Torneo creado correctamente"]);
            }else{
                echo json_encode(["mensaje" => "Error al crear torneo"]);
            }
        }else{
            echo json_encode(["mensaje" => "Torneo debe llevar nombre, fecha y premio total"]);
        }
    }

    function update()
    {
        // TODO: Implement update() method.
    }

    function delete()
    {
        // TODO: Implement delete() method.
    }

    function show($id)
    {
        // TODO: Implement show() method.
    }

    function showAll()
    {
        // TODO: Implement showAll() method.
    }
}