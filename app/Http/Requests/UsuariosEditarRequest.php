<?php

namespace Hospital\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosEditarRequest extends FormRequest
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
            'name' => 'required',
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'email' => 'required',
            'tipo_usuario' => 'required',
            'estatus_usuario' => 'required',
            'username' => 'required',
            'password_confirmation' => 'same:password'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El Campo Nombre está vacío',
            'ap_paterno.required' => 'El Campo Primer Apellido está vacío',
            'ap_materno.required' => 'El Campo Segundo Apellido está vacío',
            'email.required' => 'El Campo Correo electrónico está vacío',
            'tipo_usuario.required' => 'Debe seleccionar un Tipo de Usuario',
            'estatus_usuario.required' => 'Debe seleccionar un Estatus de Usuario',
            'username.required' => 'El Campo Nombre de Usuario está vacío',
            'password_confirmation.same' => 'No coincide con la confirmación'
        ];
    }
}
