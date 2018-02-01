<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * verifica se O usuário está autorizado a fazer esse pedido.
     * ACL
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    //== Regra de validação do formulário ==//
    public function rules()
    {
        return [
            'name'        => 'required|min:3|max:150',
            'number'      => 'required|numeric',
            'category'    => 'required',
            'description' => 'required|min:3|max:1000',
        ];
    }

    //== msg de retorno de erros ==//
    public function messages()
    {
        return [
            'name.required'       => 'Campo nome é de preenchimento obrigatório',
            'name.min'            => '3 caracteres',
        ];
    }
}
