<?php

namespace App\Repositories;

use App\Models\Eventos;

class EventosRepository extends BaseRepository implements EventosInterface
{
    public function __contruct(Eventos $eventos)
    {
        perent::__construct($eventos);
    }

    public function findByTitulo(varchar $titulo)
    {
        return $this->model->where('titulo', "LIKE", "%" . $titulo . "%")->get();
    }

    public function findByDescripcion(text $descripcion)
    {
        return $this->model->where('descripcion', $descripcion)->get();
    }

    public function findByFecha(carbon $fecha_inicio, carbon $fecha_fin)
    {
        return $this->model->whereBetween('Fecha_inicio', $fecha_inicio, [$fecha_inicio, $fecha_fin])->get();
    }

    public function findByLugar(varchar $lugar)
    {
        return $this->model->where('Lugar', $lugar)->get();
    }

    public function findByCupo(integer $cupo)
    {
        return $this->model->where('cupo', $cupo)-get();
    }

    public function findByEstado(boolean $estado)
    {
        return $this->model->where('estado', $estado)-get();
    }
}