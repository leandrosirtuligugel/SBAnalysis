<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link rel="icon" href="">
    <title>SkyBug Analysis | Admin</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/docs.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container-fluid" style="padding: 10px">
    <h3>Olá, {{ $usuario->nomecompleto }}!!</h3>
    <p>Seja bem-vindo ao SkyBug Analysis.</p>

    <p>Para a confirmação do seu cadastro, acesse o link <a href="{{ route('confirmacao.conta', ['token' => $usuario->tokenativacao]) }}">{{ route('confirmacao.conta', ['token' => $usuario->tokenativacao]) }}</a> para ativar a sua conta e definir a sua senha de acesso.<br><br>

        Ah, se tiver qualquer dúvida, entre em contato com a gente. ;-)<br><br>

        Atenciosamente,
        <br><br>
        Equipe SkyBug Analysis</p>
    <br>
</div>
</body>
</html>
<script type="text/javascript" src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
<style type="text/css">
    *{
        font-size: 14px;
    }
</style>