@extends('templates.index')
@section('content')
@include('templates.menus')
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Editar Gestor: {{ $gestor->gestornome }}</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-edit"></span> Dados do Gestor
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
							{!! Form::open(['route' => ['gestores.update', $gestor->codigogestor], 'method' => 'put']) !!}
							{!! Form::hidden('codigogestor', $gestor->codigogestor) !!}
						<div class="form-group">
							{!! Form::label('nomegestor', 'Nome Completo:') !!}
							{!! Form::text('nomegestor', $gestor->nomegestor, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('cpfcnpjgestor', 'CPF/CNPJ:') !!}
							{!! Form::text('cpfcnpjgestor', $gestor->cpfcnpjgestor, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('emailgestor', 'E-mail:') !!}
							{!! Form::text('emailgestor', $gestor->emailgestor, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('usuarioredminegestor', 'Usuário Redmine:') !!}

							{!! Form::text('usuarioredminegestor', $gestor->usuarioredminegestor, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('senharedminegestor', 'Senha Redmine:') !!}
							{!! Form::password('senharedminegestor', ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('senharedminegestor_confrmed', 'Confirmar Senha Redmine:') !!}
							{!! Form::password('senharedminegestor_confirmation', ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('chaveacessoapiredminegestor', 'Chave Acesso API Redmine Usuário:') !!}
							{!! Form::text('chaveacessoapiredminegestor', $gestor->chaveacessoapiredminegestor, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('codigosistema', 'Sistema:') !!}
							{!! Form::select('codigosistema', $sistemas, $gestor->gestorsistema->codigosistema, ['class' => 'form-control']) !!}
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
