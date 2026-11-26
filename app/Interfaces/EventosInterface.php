<?php

namespace App\Interfaces;
use Illuminate\Support\Carbon;
interface EventosInterface extends BaseInterface

{
    public function findById(int $id);
    public function findByUsuario(int $user_id);
    public function findByTitulo(varchar $titulo);
    public function findByDescripcion(text $descripcion);
    public function findByFecha(carbon $fecha_inicio, carbon $fechafin);
    public function findByLugar(varchar $lugar);
    public function findByCupo(integer $cupo);
    public function findByEstado(boolean $estado);
}
