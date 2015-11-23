@extends('templates.index')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Faça login para iniciar a sua sessão.</h3>
					</div>
					<div class="panel-body">

						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Oops!</strong> Houve alguns problemas com a sua entrada.<br><br>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
								@endforeach
							</div>
						@endif
						<form role="form" method="POST" action="{{ url('/login') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="E-mail" name="email" type="text" autofocus>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Senha" name="senha" type="password" value="">
								</div>
								<div class="checkbox">
									<label>
										<input name="remember" type="checkbox" value="Lembrar-me">Lembrar-me
									</label>
								</div>
								<!-- Change this to a button or input when using this as a form -->
								<button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
							</fieldset>
						</form>
						<a class="btn btn-link" href="{{ url('/password/email') }}">Esqueceu sua senha?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection