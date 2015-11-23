@extends('templates.index')
@section('content')
@include('templates.menus')
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Novo Usuário</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-edit"></span> Dados do Usuário
					</div>
					<div class="panel-body">
						@if($errors->any())
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<ul class="alert-danger">
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						{!! Form::open(['route' => 'usuarios.store', 'id' => 'create-usuario', 'autocomplete' => 'off']) !!}
						<div class="form-group">
							{!! Form::label('nomecompleto', 'Nome Completo:') !!}
							{!! Form::text('nomecompleto', '', ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('email', 'E-mail:') !!}
							{!! Form::text('email', '', ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('email_confirmation', 'Confirmar E-mail:') !!}
							{!! Form::text('email_confirmation', '', ['class' => 'form-control', 'onpaste' => 'return false', 'ondrop' =>'return false']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('usuarioredmineusuario', 'Usuário Redmine:') !!}

							{!! Form::text('usuarioredmineusuario', '', ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('senharedmineusuario', 'Senha Redmine:') !!}
							{!! Form::password('senharedmineusuario', ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('senharedmineusuario_confrmed', 'Confirmar Senha Redmine:') !!}
							{!! Form::password('senharedmineusuario_confirmation', ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('chaveacessoapiredmineusuario', 'Chave Acesso API Redmine Usuário:') !!}
							{!! Form::text('chaveacessoapiredmineusuario', '', ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="panel-footer">
						<div class="form-group text-center">
							{!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
							{!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
						</div>

						{!! Form::close() !!}
					</div>
				</div>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /#page-wrapper -->

@endsection
