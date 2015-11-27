@extends('templates.index')
@section('content')
	@include('templates.menus')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Meus Dados</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-user"></span> Dados Básico
                        </div>
                        <div class="panel-body">
                            <p><b>Nome Completo:</b> {{ Auth::user()->nomecompleto }}</p>
                            <p><b>Usuário Redmine:</b> {{ Auth::user()->usuarioredmineusuario }}</p>
                            <p><b>Senha Redmine:</b> *******</p>
                            <p><b>Chave de Acesso Redmine:</b> {{ Auth::user()->chaveacessoapiredmineusuario }}</p>
                            <a href="{{ route('perfil.modificar-dados') }}" class="btn btn-primary">Modificar</a>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="fa fa-key"></span> Dados de Acesso
                        </div>
                        <div class="panel-body">
                            <p><b>E-mail:</b> {{ Auth::user()->email }}</p>
                            <p><b>Senha:</b> ******* <a href="{{ route('perfil.modificar-senha') }}" class="btn btn-link">Modificar</a></p>
                        </div>
                    </div>
                </div>
                <!-- /.table-responsive -->     
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection