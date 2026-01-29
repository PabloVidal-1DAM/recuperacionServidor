<?php

namespace App\Controller;
use App\Interface\ControllerInterface;
use App\Model\EquipoModel;

class EquipoController implements ControllerInterface
{

    function index()
    {
        // TODO: Implement index() method.
    }

    function create()
    {
        // TODO: Implement create() method.
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
        header('Content-type: application/json');
        $equipo = EquipoModel::getEquipoById($id);
        if($equipo){
            echo json_encode([$equipo]);
        }else{
            echo json_encode(["mensaje" => "No se ha encontrado el equipo"]);
        }
    }

    function showAll()
    {
        // TODO: Implement showAll() method.
    }
}