<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }



    public function rules(): array
    {

        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $usuarioId = $this->route('usuario') ?? $this->route('id');

        return [
            
          'name' => [
            $isUpdate ? 'sometimes' : 'required',
            'string',
            'max:255',
            'min:0'
         ],

           'email' => [

            $isUpdate ? 'sometimes' : 'required',
            'email',
            'max:255',
            'min:0',
            Rule::unique('usuarios', 'email')->ignore($usuarioId, 'id')

            ],

            'password' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'min:8'
            ],
        ];
    }

    public function messages(): array
    {
        return [

         'name.required   ' => 'El nombre es obligatorio.',
         'name.string' => 'El nombre debe ser texto.',
         'name.max' => 'El nombre no puede exceder los 255 caracteres.',
         'name.min' => 'El nombre tiene un minimo de 0 caracteres',


         'email.required' => 'El correo electrónico es obligatorio.',
         'email.email' => 'Debe proporcionar un correo electrónico válido.',
         'email.max' => 'El correo electrónico no puede exceder los 255 caracteres.',
         'email.unique' => 'Este correo electrónico ya está registrado.',


        ];
    }
}