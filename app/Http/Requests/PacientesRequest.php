<?php

namespace Hospital\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacientesRequest extends FormRequest
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
            'nombre_paciente' => 'required',
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'genero_paciente' => 'required',
            'estados' => 'required',
            'municipios' => 'required',
            'colonia_paciente' => 'required',
            'calle_paciente' => 'required',
            'numero_casa_paciente' => 'required',
            'numero_casa_paciente' => 'numeric',
            'email' => 'email'
        ];
    }

    public function messages()
    {
        return [
            'nombre_paciente.required' => 'El campo Nombre está vacío',
            'ap_paterno.required' => 'El campo Primer Apellido está vacío',
            'ap_materno.required' => 'El campo Segundo Apellido está vacío',
            'genero_paciente.required' => 'No ha seleccionado ningún genero',
            'estados.required' => 'No ha seleccionado ningún Estado',
            'municipios.required' => 'No ha seleccionado ningún Municipio',
            'colonia_paciente.required' => 'El campo Colonia está vacío',
            'calle_paciente.required' => 'El campo Calle está vacío',
            'numero_casa_paciente.required' => 'El campo Numero o Apartamento está vacío',
            'numero_casa_paciente.numeric' => 'El atributo puesto en Numero o Apartamento debe ser numérico',
            'email.email' => 'La dirección Email no es una correo valido'
        ];
    }
}
