@extends('templates.index')
@section('content')
	@include('templates.menus')
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Modificar Senha</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-edit"></span> Dados de Acesso
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
						{!! Form::open(['route' => ['perfil.update-senha'], 'method' => 'put']) !!}
						<div class="form-group">
							{!! Form::label('senhaatual', 'Senha Atual:') !!}
							{!! Form::password('senhaatual', ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('senha', 'Nova Senha:') !!}
							{!! Form::password('senha', ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('senha_confirmation', 'Confirmar Nova Senha:') !!}
							{!! Form::password('senha_confirmation', ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="panel-footer">
						<div class="form-group text-center">
							{!! Form::submit('Modificar', ['class' => 'btn btn-primary']) !!}
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
