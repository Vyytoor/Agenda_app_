<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendaUpdate extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome'=>['required', 'min:3', 'max:100'],
            'telefone'=>['required', 'min:9', 'max:16'],
            'email'=>['required', 'min:10', 'max:100', 'email'],
            'categoria'=>['required']

        ];
    }

    public function messages(){
        return [
            'nome.required' => 'O campo Nome é Obrigatorio!',
            'nome.min' => 'O campo deve conter no minimo :min caracteres!',
            'nome.max' => 'O campo deve conter no maximo :max caracteres!',
            
            'telefone.required' => 'O campo Telefone é Obrigatorio!',
            'telefone.min' => 'O campo deve conter no minimo :min caracteres!',
            'telefone.max' => 'O campo deve conter no maximo :max caracteres!',
          
            'email.required' => 'O campo Email é Obrigatorio!',
            'email.min' => 'O campo deve conter no minimo :min caracteres!',
            'email.max' => 'O campo deve conter no maximo :max caracteres!',
            'email.email' => 'O campo email ta incorreto!',

            'categoria.required' => 'O campo Categoria é Obrigatorio!'
        ];
    }
}
