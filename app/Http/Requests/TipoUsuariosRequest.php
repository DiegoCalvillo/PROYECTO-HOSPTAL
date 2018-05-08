<?php

namespace Hospital\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoUsuariosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipo_usuario' => 'required',
            'estatus_id' => 'required',
            'clave' => 'required|unique:tipo_usuarios'
        ];
    }

    public function messages()
    {
        return [
            'tipo_usuario.required' => 'Tipo de Usuario está vacio',
            'estatus_id.required' => 'Debe elegir un Estatus',
            'clave.required' => 'El campo Clave no puede estar vacio',
            'clave.unique' => 'Ya existe un registro con esa Clave' 
        ];
    }
}
