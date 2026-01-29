<?php

namespace App\Class;
use App\Model\EquipoModel;
use JsonSerializable;

class Equipo implements JsonSerializable
{
    private int $id;
    private string $nombre;
    private string $region;
    private float $win_rate;

    public function __construct(int $id, string $nombre, string $region, float $win_rate)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->region = $region;
        $this->win_rate = $win_rate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Equipo
    {
        $this->id = $id;
        return $this;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): Equipo
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function setRegion(string $region): Equipo
    {
        $this->region = $region;
        return $this;
    }

    public function getWinRate(): float
    {
        return $this->win_rate;
    }

    public function setWinRate(float $win_rate): Equipo
    {
        $this->win_rate = $win_rate;
        return $this;
    }

    public static function getEquipoById($id):?Equipo{ // Puede encontrarlo o no (null)
        $equipo = EquipoModel::getEquipoById($id);
        if($equipo){
            return $equipo;
        }else{
            return null;
        }
    }


    public function jsonSerialize():mixed
    {
       return[
           "id" => $this->id,
           "nombre" => $this->nombre,
           "region" => $this->region,
           "win_rate" => $this->win_rate
       ];
    }

    public static function createFromArray(array $datos):Equipo{
        $equipo = new Equipo((int)$datos['id'], $datos['nombre'], $datos['region'], (float)$datos['win_rate']);
        return $equipo;
    }
}