<?php

namespace Hospital\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CambioContrasenaRequest extends FormRequest
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
            'old_password' => 'required',
            'password' => 'required',
            'password' => 'min:8',
            'password_confirmation' => 'required',
            'password_confirmation' => 'same:password'
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => '<b>Acción inválida:</b> La contraseña actual es requerida',
            'password.required' => '<b>Acción inválida:</b> no se ha ingresado ningún cambio de contraseña',
            'password_confirmation.required' => 'Debe confirmar la contraseña',
            'password.min' => 'La contraseña debe tener un minimo de 8 caracteres',
            'password_confirmation.same' => 'No coincide la confirmación'
        ];
    }
}
