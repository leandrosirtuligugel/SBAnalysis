<?php

namespace SBAnalysis\Http\Controllers;

use Illuminate\Http\Request;
use SBAnalysis\Http\Requests;
use Auth;

class PerfilController extends Controller
{

    public function index()
    {
        return view('perfil.index');
    }

    public function modificarDados(){
        return view('perfil.modificar-dados');
    }

    public function updateDados(Requests\ModificarDadosRequest $request){
        $input = $request->all();

        $user = Auth::user();
        $user->nomecompleto = $input['nomecompleto'];
        $user->usuarioredmineusuario = $input['usuarioredmineusuario'];
        $user->senharedmineusuario = $input['senharedmineusuario'];
        $user->chaveacessoapiredmineusuario = $input['chaveacessoapiredmineusuario'];
        $user->save();

        return redirect()->route('perfil');
    }

    public function modificarSenha(){
        return view('perfil.modificar-senha');
    }

    public function updateSenha(Requests\ModificarSenhaRequest $request){

        $input = $request->all();

        if (!Auth::attempt(['email' => Auth::user()->email, 'senha' => $input['senhaatual']]))
        {
            return redirect()->intended('logout');
        }

        $user = Auth::user();
        $user->senha = bcrypt($input['senha']);
        $user->save();

        return redirect()->route('perfil');
    }
}
