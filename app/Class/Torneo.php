<?php

namespace App\Class;

use DateTime;
use JsonSerializable;
use App\Class\Equipo;

class Torneo implements JsonSerializable
{
    private string $nombre;
    private DateTime $fecha;
    private float $premio_total;
    private array $equipos = array();

    public function __construct(string $nombre, DateTime $fecha, float $premio_total)
    {
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->premio_total = $premio_total;
    }


    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): Torneo
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getFecha(): DateTime
    {
        return $this->fecha;
    }

    public function setFecha(DateTime $fecha): Torneo
    {
        $this->fecha = $fecha;
        return $this;
    }

    public function getPremioTotal(): float
    {
        return $this->premio_total;
    }

    public function setPremioTotal(float $premio_total): Torneo
    {
        $this->premio_total = $premio_total;
        return $this;
    }

    public function getEquipos(): array
    {
        return $this->equipos;
    }

    public function inscribirEquipo(Equipo $equipo)
    {
        $this->equipos[] = $equipo;
    }

    public function saveTorneo(){

    }

    public function calcularDificultadMedia(): Float{
        $sumaTotal = 0;
        forEach($this->equipos as $equipo){
            $sumaTotal += $equipo->getWinRate();
        }
        return $sumaTotal / count($this->equipos);
    }


    public function jsonSerialize() :mixed
    {
        return [
            'nombre' => $this->nombre,
            'fecha' => $this->fecha->format("Y-m-d"),
            'premio_total' => $this->premio_total,
            'equipos' => $this->equipos
        ];
    }

    public static function createFromArray(array $datos):Torneo{
        $torneo = new Torneo(
            $datos['nombre'],
            DateTime::createFromFormat("Y-m-d", $datos['fecha']),
            (float)$datos['premio_total'],
        );
        return $torneo;
    }
}