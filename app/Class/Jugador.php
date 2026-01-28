<?php

namespace App\Class;
use JSONSerializable;

class Jugador implements JSONSerializable
{
    private int $id;
    private string $nombre;
    private string $email;
    private string $nickname;
    private int $nivel;
    private array $equiposFav = [];


    public function __construct(int $id, string $nombre, string $email, string $nickname, int $nivel)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->nickname = $nickname;
        $this->nivel = $nivel;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Jugador
    {
        $this->id = $id;
        return $this;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): Jugador
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getEmail(): int
    {
        return $this->email;
    }

    public function setEmail(int $email): Jugador
    {
        $this->email = $email;
        return $this;
    }

    public function getEquiposFav(): array
    {
        return $this->equiposFav;
    }

    public function addEquipoFavorito(Equipo $equipoFav): void{
        $this->equiposFav[] = $equipoFav;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): Jugador
    {
        $this->nickname = $nickname;
        return $this;
    }

    public function getNivel(): int
    {
        return $this->nivel;
    }

    public function setNivel(int $nivel): Jugador
    {
        $this->nivel = $nivel;
        return $this;
    }

    public static function DeleteJugador(int $id):void{

    }


    public function jsonSerialize() :mixed
    {
        return[
            'id' => $this->id,
            'nombre' => $this->nombre,
            'email' => $this->email,
            'nickname' => $this->nickname,
            'nivel' => $this->nivel,
            'equiposFav' => $this->equiposFav
        ];
    }

    public static function createFromArray(array $datos):Jugador{
        /*if(!isset($datos['id'])){
            $indice = 5;
            $datos['id'] = $indice;
        }*/
        $jugador = new Jugador((int)$datos['id'], $datos['nombre'], $datos['email'], $datos['nickname'], (int)$datos['nivel']);
        return $jugador;
    }
}