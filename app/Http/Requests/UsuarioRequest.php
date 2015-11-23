<?php

namespace SBAnalysis\Http\Requests;

use SBAnalysis\Http\Requests\Request;

class UsuarioRequest extends Request
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
            'nomecompleto' => 'required|max:40',
            'email' => 'required|unique:usuario|confirmed',
            'usuarioredmineusuario' => 'required',
            'senharedmineusuario' => 'required|confirmed',
            'chaveacessoapiredmineusuario' => 'required'
        ];
    }
}
