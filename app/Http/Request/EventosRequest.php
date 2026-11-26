<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class EventosRequest extends FormRequest

{
    public function authorize():bool
    {
        return true;
    }

    public function rules(): array
    {

        return [
            'user_id'=>'required|exists:Usuario|user_id',
            'titulo'=>'required'|'varchar'|'max:150',
            'descripcion'=>'required'|'text',
            'fecha'=>'required'|'carbon',
            'lugar'=>'required'|'varchar'|'max:150',
            'cupo'=>'required'|'integer'|'max:50',
            'estado'=>'required'|'boolean',
        ];
    }

    public function messages(): array
    {
        return[
            'user_id.required'=>'El id del usuario es obligatorio',
            'user_id.exists'=>'El id del usuario debe ser un numero entero',
            'user_id.user_id'=>'Ese usuario no existe en el sistema',

            'titulo'=>
             'El titulo es obligatorio',
            'titulo'=> 'Caracteres invalidos',
            'titulo'=> 'Alcanzaste el numero maximo de caracteres',
            'titulo'=> 'El campo no puede estar vacio',

            'descripcion'=> 'La descripcion del evento es obligatoria',
            'descripcion'=> 'Caracteres invalidos',
            'descripcion'=> 'El campo no puede estar vacio',

            'fecha'=> 'la fecha del evento es obligatoria',

            'lugar'=> 'El lugar del evento es obligatorio',
            'lugar'=> 'Caracteres invalidos',
            'lugar'=> 'Alcanzaste el numero maximo de caracteres',
            'lugar'=> 'El campo no puede estar vacio',


        ];
    }


}