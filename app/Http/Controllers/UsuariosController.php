<?php

namespace SBAnalysis\Http\Controllers;

use Illuminate\Http\Request;

use SBAnalysis\Events\EnviaEmailNovoUsuarioEvent;
use SBAnalysis\Http\Requests;
use SBAnalysis\Http\Requests\UsuarioRequest;
use SBAnalysis\Http\Requests\UsuarioActiveRequest;
use SBAnalysis\Http\Controllers\Controller;
use SBAnalysis\User;

class UsuariosController extends Controller
{

    protected $UserModel;

    public function __construct(User $userModel){
        $this->UserModel = $userModel;
    }

    public function index()
    {
        $usuarios = $this->UserModel->all();
        return view('usuarios.index', compact('usuarios'));
    }


    public function create()
    {
        return view('usuarios.create');
    }


    public function store(UsuarioRequest $request)
    {
        $input = $request->all();
        $input['senha'] = bcrypt(rand(8,999999));
        $input['tokenativacao'] = sha1($input['email'].date('d-m-Y H:i:s'));
        $usuario = $this->UserModel->fill($input);
        $usuario->save();

        \Event::fire(new EnviaEmailNovoUsuarioEvent($usuario));

        return redirect()->route('usuarios');

    }

    public function confirmacaoConta($token){
        $usuario = $this->UserModel->where('tokenativacao',$token)->first();

        if($usuario)
            return view('auth.confirmacao', compact('token'));

        return redirect()->route('/');
    }

    public function active(UsuarioActiveRequest $request){
        $input = $request->all();
        $usuario = $this->UserModel->where('email', $input['email'])->where('tokenativacao',$input['token'])->first();
        $input['senha'] = bcrypt($input['senha']);
        if($usuario){
            $usuario->update($input);
            return redirect()->intended('login');
        }else{
            $request->session()->flash('error', 'Dados Incorretos! Por Favor, tente novamente.');
            return view('auth.confirmacao', ['token' => $input['tokenativacao']]);
        }
    }
}
