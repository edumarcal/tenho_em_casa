<?php
# Agradeço a Deus pelo dom do conhecimento
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'nome'          => 'required|unique:produto|max:255',
            'validade'      => 'required|date',
            'quantidade'    => 'required|min:1',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => 'O campo "nome" é obrigatório.',
            'validade.required'  => 'O campo "validade" é obrigatório.',
            'quantidade.required'  => 'O campo "quantidade" é obrigatório.',
        ];
    }
}
