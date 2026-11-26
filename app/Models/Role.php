<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    
    protected $table = 'roles'; 

    protected $fillable = [
        'name',
    ];

    
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'role_id');
    }

    public function permission(): array
    {
        return config('role'.$this->name, []);
        return config('role'.$this->description, []);
        return config('role'.$this->created_at, []);
        return config('role'.$this->updated_at, []);
    }
}   