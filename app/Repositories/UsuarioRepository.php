<?php

namespace App\Repositories;
use App\Models\Usuario;

class UsuarioRepository extends BaseRepository implements UsuarioInterface
{
    public function __constructor(Usuario $Usuario)
    {
        parent::__constructor($Usuario);
    }

    public function findByName(string $name)
    {
        return $this->model->where("name", $name)->get();
    }
    public function findByEmail(string $email){
    return $this->model->where("email", "LIKE", "%" . $email. "%")->get();
   }
   
}