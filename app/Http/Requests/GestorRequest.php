<?php

namespace SBAnalysis\Http\Requests;

use SBAnalysis\Http\Requests\Request;

class GestorRequest extends Request
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
            'nomegestor' => 'required|max:50',
            'cpfcnpjgestor' => 'required|max:14',
            'emailgestor' => 'required',
            'usuarioredminegestor' => 'required',
            'senharedminegestor' => 'required',
            'chaveacessoapiredminegestor' => 'required'
        ];
    }
}
