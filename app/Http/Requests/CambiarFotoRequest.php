<?php

namespace Hospital\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CambiarFotoRequest extends FormRequest
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
            'file' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'No se ha colocado seleccionado ningun archivo para foto'
        ];
    }
}
