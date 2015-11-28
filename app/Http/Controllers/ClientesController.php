<?php

namespace SBAnalysis\Http\Controllers;

use Illuminate\Http\Request;
use SBAnalysis\Http\Requests;
use SBAnalysis\Models\ClienteModel;
use SBAnalysis\Models\ClienteSistemaModel;
use SBAnalysis\Models\SistemaModel;


class ClientesController extends Controller
{

    protected $clienteModel;
    protected $sistemaModel;
    protected $clienteSistemaModel;

    public function __construct(ClienteModel $clienteModel, SistemaModel $sistemaModel, ClienteSistemaModel $clienteSistemaModel){
        $this->clienteModel = $clienteModel;
        $this->sistemaModel = $sistemaModel;
        $this->clienteSistemaModel = $clienteSistemaModel;
    }

    public function index()
    {
        $clientes = $this->clienteModel->all();
        return view('clientes.index', compact('clientes'));
    }


    public function create()
    {
        $sistemas = $this->sistemaModel->all();
        return view('clientes.create', compact('sistemas'));
    }


    public function store(Requests\ClienteRequest $request)
    {
        $input = $request->all();
        //dd($input);
        $cliente = $this->clienteModel->fill($input);
        $cliente->save();
        $codigocliente = $cliente->codigocliente;

        $clienteSistema = $this->clienteSistemaModel;
        for($i=0; $i < count($input['codigosistema']);$i++){

            $codigosistema = $input['codigosistema'][$i];
            $contratoemvigor = $input['contratoemvigor'][$codigosistema];
            $clienteSistema->firstOrCreate(['codigosistema' => $codigosistema, 'contratoemvigor' => $contratoemvigor, 'codigocliente' =>  $codigocliente]);

        }

        return redirect()->route('clientes');

    }

    public function edit($codigocliente){

        $cliente = $this->clienteModel->find($codigocliente);
        //dd($cliente->clientesistema);
        $sistemas = $this->sistemaModel->all();
        return view('clientes.edit', compact('cliente', 'sistemas'));
    }

    public function update(Requests\ClienteRequest $request,  $codigocliente){

        $input = $request->all();

        $cliente = $this->clienteModel->find($codigocliente);
        $cliente->update($input);
        $codigocliente = $cliente->codigocliente;
        $this->clienteSistemaModel->where('codigocliente', $codigocliente)->delete();
        $clienteSistema = $this->clienteSistemaModel;
        for($i=0; $i < count($input['codigosistema']);$i++){

            $codigosistema = $input['codigosistema'][$i];
            $contratoemvigor = $input['contratoemvigor'][$codigosistema];
            $clienteSistema->firstOrCreate(['codigosistema' => $codigosistema, 'contratoemvigor' => $contratoemvigor, 'codigocliente' =>  $codigocliente]);

        }

        return redirect()->route('clientes');
    }

    public function delete($codigocliente){
        $cliente = $this->clienteModel->find($codigocliente);
        $titulo = "Excluir Cliente";
        if(!$cliente){
            $titulo = "Informação!";
            $msg = "Falha na obtenção dos dados! Tente novamente mais tarde.";
            return view('errors.error_modal', compact('titulo', 'msg'));
        }

        return view('clientes.delete_modal', compact('titulo', 'cliente'));
    }
    public function destroy(Request $request, $codigocliente){
        $codigocliente = $request->input('codigocliente');
        $cliente = $this->clienteModel->find($codigocliente);
        $codigoclientesistema = $cliente->clientesistema->codigoclientesistema;

        $this->clienteSistemaModel->find($codigoclientesistema)->delete();
        $cliente->delete();

        return redirect()->route('clientes');
    }
}
