<?php
namespace SBAnalysis\Http\Controllers\Auth;

use Illuminate\Http\Request;
use SBAnalysis\Http\Requests;
use Validator;
use SBAnalysis\User;
use SBAnalysis\Http\Controllers\Controller;

class RegisterController extends AuthController
{

    /**
     * Método responsável pelas validações de request de registro
     *
     * @return View
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nomeusuario' => 'required|max:255',
            'email' => 'required|email|max:255|unique:usuario',
            'senha' => 'required|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data            
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'nomeusuario' => $data['nomeUsuario'],
            'email' => $data['email'],
            'senha' => bcrypt($data['senha'])
        ]);
    }

    /**
     * Método responsável pelas requisições get de registro.
     *
     * @return View
     */
    public function getRegister()
    {
        return view('auth.register');
    }
}
