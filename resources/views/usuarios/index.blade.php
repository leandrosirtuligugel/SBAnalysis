@extends('templates.index')
@section('content')
	@include('templates.menus')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Usuários
                        <button type="button" class="btn btn-primary pull-right" onclick="document.location='{{ route('usuarios.create') }}'">
                            <span class="fa fa-plus"></span> Novo Usuário
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
                                <th>E-mail</th>
                                <th>Usuário Redmine</th>
                                <th>Chave Acesso API Redmine</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                        		<tr>
                                    <td>{{ $usuario->nomecompleto }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->usuarioredmineusuario }}</td>
                                    <td>{{ $usuario->chaveacessoapiredmineusuario }}</td>
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