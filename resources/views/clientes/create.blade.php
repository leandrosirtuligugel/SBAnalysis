@extends('templates.index')
@section('content')
@include('templates.menus')
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Novo Cliente</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-edit"></span> Dados do Cliente
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
						{!! Form::open(['route' => 'clientes.store', 'id' => 'create-clientes', 'autocomplete' => 'off']) !!}
						<div class="form-group">
							{!! Form::label('codigoskyupdate', 'Código Sky Update:') !!}
							{!! Form::text('codigoskyupdate', '', ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('codigocns', 'Código CNS:') !!}
							{!! Form::text('codigocns', '', ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('razaosocial', 'Razão Social:') !!}
							{!! Form::text('razaosocial', '', ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('nomeoficial', 'Nome Ofícial:') !!}
							{!! Form::text('nomeoficial', '', ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('cpfcnpjoficial', 'CPF/CNPJ Ofícial:') !!}
							{!! Form::text('cpfcnpjoficial', '', ['class' => 'form-control', 'maxlength' => 14]) !!}
						</div>
						<div class="form-group">
							{!! Form::label('endereco', 'Endereço:') !!}
							{!! Form::text('endereco', '', ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('cidade', 'Cidade:') !!}
							{!! Form::text('cidade', '', ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('uf', 'UF:') !!}
							{!! Form::text('uf', '', ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('cep', 'CEP:') !!}
							{!! Form::text('cep', '', ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('telefone', 'Telefone:') !!}
							{!! Form::text('telefone', '', ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('codigosistema', 'Sistema:') !!}
							{!! Form::select('codigosistema', $sistemas, '', ['class' => 'form-control']) !!}
						</div>
							<div class="form-group">
								{!! Form::label('contratoemvigor', 'Contrato em Vigor:') !!}
								<div class="radio">
									<label>
										{!! Form::radio('contratoemvigor', 'T', true) !!}
										Ativo
									</label>
								</div>
								<div class="radio">
									<label>
										{!! Form::radio('contratoemvigor', 'F', false) !!}
										Inativo
									</label>
								</div>
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
