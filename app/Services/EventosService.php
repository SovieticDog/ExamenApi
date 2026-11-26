<?php

namespace App\Services;

use App\Interfases\EventoInterface;


class EventosService
{
    protected EventosInterface $eventosRepository;

    public function __construct(EventosInterface $eventosRepository)
    {
        $this->eventosRepository = $eventosRepository;
    }

    public function getAll(){
        return $this->eventosRepository->getAll();  
    }

    public function getById(int $id){
        return $this->eventosRepository->getById($id);  
    }

    public function create(array $data)
    {
        return $this->eventosRepository->create($data); 
    }

    public function update(int $id, array $data)
     {
        return $this->eventosRepository->update($id, $data);
     }
    
    public function delete(int $id)
    {
        return $this->eventosRepository->delete($id);
    }

    public function findByTitulo(varchar $titulo)
    {
        return $this->eventosRepository->findByTitulo($titulo);
    }

    public function findByDescripcion(text $descripcion)
    {
        return $this->eventosRepository->findByDescripcion($descripcion);
    }
    public function findByFecha(carbon $fecha_inicio, carbon $fecha_fin)
    {
        if($fecha_inicio<$fecha_fin)
        {
            return false;
        }
        return $this->eventosRepository->findByFecha($fecha_inicio, $fecha_fin);
    }

    public function findByLugar(varchar $lugar)
    {
        return $this->eventosRepository->findByLugar($lugar);
    }
    public function findByCupo(varchar $cupo)
    {
        return $this->eventosRepository->findByCupo($cupo);
    }
    public function findByEstado(varchar $estado)
    {
        return $this->eventosRepository->findByEstado($estado);
    }
}