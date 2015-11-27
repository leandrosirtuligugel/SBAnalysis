<?php

namespace SBAnalysis\Http\Controllers;

use Illuminate\Http\Request;
use SBAnalysis\Http\Requests;
use SBAnalysis\Models\GestorModel;
use SBAnalysis\Models\GestorSistemaModel;
use SBAnalysis\Models\SistemaModel;


class GestoresController extends Controller
{

    protected $gestorModel;
    protected $sistemaModel;
    protected $gestorSistemaModel;

    public function __construct(GestorModel $gestorModel, SistemaModel $sistemaModel, GestorSistemaModel $gestorSistemaModel){
        $this->gestorModel = $gestorModel;
        $this->sistemaModel = $sistemaModel;
        $this->gestorSistemaModel = $gestorSistemaModel;
    }

    public function index()
    {
        $gestores = $this->gestorModel->all();
        return view('gestores.index', compact('gestores'));
    }


    public function create()
    {
        $sistemas = $this->sistemaModel->lists('nomesistema', 'codigosistema');
        return view('gestores.create', compact('sistemas'));
    }


    public function store(Requests\GestorRequest $request)
    {
        $input = $request->all();
        $gestor = $this->gestorModel->fill($input);
        $gestor->save();

        $data = ['codigosistema' => $input['codigosistema'], 'codigogestor' => $gestor->codigogestor];
        $gestorSistema = $this->gestorSistemaModel->fill($data);
        $gestorSistema->save();

        return redirect()->route('gestores');

    }

    public function edit($codigogestor){

        $gestor = $this->gestorModel->find($codigogestor);
        $sistemas = $this->sistemaModel->lists('nomesistema', 'codigosistema');
        return view('gestores.edit', compact('gestor', 'sistemas'));
    }

    public function update(Requests\GestorRequest $request,  $codigogestor){

        $input = $request->all();

        $gestor = $this->gestorModel->find($codigogestor);
        $gestor->update($input);
        $codigogestorsistema = $gestor->gestorsistema->codigogestorsistema;
        $data = ['codigosistema' => $input['codigosistema'], 'codigogestor' => $gestor->codigogestor];
        $this->gestorSistemaModel->find($codigogestorsistema)->update($data);

        return redirect()->route('gestores');
    }

    public function delete($codigogestor){
        $gestor = $this->gestorModel->find($codigogestor);
        $titulo = "Excluir Gestor";
        if(!$gestor){
            $titulo = "Informação!";
            $msg = "Falha na obtenção dos dados! Tente novamente mais tarde.";
            return view('errors.error_modal', compact('titulo', 'msg'));
        }

        return view('gestores.delete_modal', compact('titulo', 'gestor'));
    }
    public function destroy(Request $request, $codigogestor){
        $codigogestor = $request->input('codigogestor');
        $gestor = $this->gestorModel->find($codigogestor);
        $codigogestorsistema = $gestor->gestorsistema->codigogestorsistema;

        $this->gestorSistemaModel->find($codigogestorsistema)->delete();
        $gestor->delete();

        return redirect()->route('gestores');
    }
}
