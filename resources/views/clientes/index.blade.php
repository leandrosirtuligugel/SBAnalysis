@extends('templates.index')
@section('content')
	@include('templates.menus')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Clientes
                        <button type="button" class="btn btn-primary pull-right" onclick="document.location='{{ route('clientes.create') }}'">
                            <span class="fa fa-plus"></span> Novo Cliente
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
                                <th>Cód. Sky Update</th>
                                <th>Cód. CNS</th>
                                <th>Razão Social</th>
                                <th>Nome Ofícial</th>
                                <th>Cidade/UF</th>
                                <th>Telefone</th>
                                <th class="text-center">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $row)
                        		<tr>
                                    <td>{{ $row->codigoskyupdate }}</td>
                                    <td>{{ $row->codigocns }}</td>
                                    <td>{{ $row->razaosocial }}</td>
                                    <td>{{ $row->nomeoficial }}</td>
                                    <td>{{ $row->cidade }}/{{ $row->uf }}</td>
                                    <td>{{ $row->telefone }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="...">
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-original-title="Editar" title="" onclick="document.location='{{ route('clientes.edit', ['codigocliente' => $row->codigocliente]) }}'"><span class="fa fa-edit"></span></button>
                                            <a href="{{ route('clientes.delete', ['codigocliente' => $row->codigocliente]) }}" data-toggle="modal" data-target="#SBAnalysisModal" class="btn btn-default"  data-tooltip="tooltip" data-placement="top" data-original-title="Excluir" title=""><span class="glyphicon glyphicon-remove"></span></a>
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