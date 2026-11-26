<?php

namespace App\Interfaces;
use Illuminate\Support\Carbon;
interface UsuarioInterface extends BaseInterface


{
    public function findByName(string $name);
    public function findByEmail(string $email);
}
