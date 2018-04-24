<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilePost extends FormRequest
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
      switch ($this->method()) {
        case 'GET':
        case 'DELETE':
          return [];
          break;
        case 'PATCH':
          return [
            'state' => Rule::in(['Ingresado','Trabajando','Para la firma','Finalizado']),
          ];
          break;
        case 'POST':
        case 'PUT':
          return [
            'code' =>'required|max:255',
            'description' =>'required|max:255',
            'comments' =>'nullable|max:255',
            'etx' =>'nullable|max:12',
            'time_limit' =>'nullable|date|after_or_equal:today',
          ];
          break;
        default:break;
      }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'code.required' => 'Se requiere un código',
            'code.max' => 'El código no debe contener mas de :max caracteres.',
            'description.required'  => 'Se requiere una descripción',
            'description.max'  => 'La descripción no debe contener mas de :max caracteres.',
            'comments.max'  => 'El comentario no debe contener mas de :max caracteres.',
            'etx.max'  => 'El N° de ETX no debe contener mas de :max caracteres.',
            "time_limit.after_or_equal" => "El plazo debe ser una fecha igual o posterior al día de hoy."
        ];
    }
}
