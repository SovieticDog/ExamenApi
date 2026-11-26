<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDelete;

class Eventos extends Model
{
    use HasFactory, softDeletes;
    
    protected $table= "Eventos";
    protected $fillable=[
        "user_id",
        "titulo",
        "descripcion",
        "fecha_inicio",
        "fecha_fin",
        "lugar",
        "cupo",
        "estado"
    ];

        public function eventos(){
        return $this->hasMany("Eventos::class");
    }
}


