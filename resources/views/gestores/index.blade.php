@extends('templates.index')
@section('content')
	@include('templates.menus')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestores
                        <button type="button" class="btn btn-primary pull-right" onclick="document.location='{{ route('gestores.create') }}'">
                            <span class="fa fa-plus"></span> Novo Gestor
                        </button>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped table-bordered table-hover display">
                        <thead>
                            <tr>
                                <th>Nome Completo</th>
                                <th>CPF/CNPJ</th>
                                <th>E-mail</th>
                                <th>Sistema</th>
                                <th>Usuário Redmine</th>
                                <th>Chave Acesso API Redmine</th>
                                <th class="text-center">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gestores as $row)
                        		<tr>
                                    <td>{{ $row->nomegestor }}</td>
                                    <td>{{ $row->cpfcnpjgestor }}</td>
                                    <td>{{ $row->emailgestor }}</td>
                                    <td>{{ $row->gestorsistema->sistema->nomesistema }}</td>
                                    <td>{{ $row->usuarioredminegestor }}</td>
                                    <td>{{ $row->chaveacessoapiredminegestor }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="...">
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-original-title="Editar" title="" onclick="document.location='{{ route('gestores.edit', ['codigogestor' => $row->codigogestor]) }}'"><span class="fa fa-edit"></span></button>
                                            <a href="{{ route('gestores.delete', ['codigogestor' => $row->codigogestor]) }}" data-toggle="modal" data-target="#SBAnalysisModal" class="btn btn-default"  data-tooltip="tooltip" data-placement="top" data-original-title="Excluir" title=""><span class="glyphicon glyphicon-remove"></span></a>
                                        </div>
                                    </td>
                                </tr>
                        	@endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->     
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection