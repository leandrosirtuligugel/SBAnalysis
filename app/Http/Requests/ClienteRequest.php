<?php

namespace SBAnalysis\Http\Requests;

use SBAnalysis\Http\Requests\Request;

class ClienteRequest extends Request
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
            'codigoskyupdate' => 'required',
            'codigocns' => 'required',
            'razaosocial' => 'required|max:100',
            'nomeoficial' => 'required|max:50',
            'cpfcnpjoficial' => 'required|max:14',
            'endereco' => 'required|max:120',
            'cidade' => 'required|max:50',
            'uf' => 'required|max:2',
            'cep' => 'required|max:9',
            'telefone' => 'required|max:15',
        ];
    }
}
