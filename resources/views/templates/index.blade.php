<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="SBAnalysis" />
    <meta content="SBAnalysis" name="description"/>
    <meta content="SBAnalysis" name="author"/>
    <link rel="icon" href="{{ asset('public/assets/img/icon.png') }}">
    <title>SkyBug Analysis | Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('public/assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('public/assets/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ asset('public/assets/dist/css/timeline.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('public/assets/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('public/assets/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="{{ asset('public/assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('public/assets/bower_components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('public/assets/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div id="wrapper">
    @yield('content')
</div>
<!-- /#wrapper -->
<script src="{{ asset('public/assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('public/assets/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

<!-- Morris Charts JavaScript -->
<script src="{{ asset('public/assets/bower_components/raphael/raphael-min.js') }}"></script>
<script src="{{ asset('public/assets/bower_components/morrisjs/morris.min.js') }}"></script>
<!--<script src="{{ asset('public/assets/js/morris-data.js') }}"></script>-->

<!-- DataTables JavaScript -->
<script src="{{ asset('public/assets/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/jquery.maskedinput.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('public/assets/js/sb-admin-2.js') }}"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script type="text/javascript">
    $(document).ready(function() {
        $('table.display').DataTable({
            responsive: true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ resultados na página",
                "zeroRecords": "Nenhum resultado encontrado",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ resultados",
                "infoEmpty": "Não há registros disponíveis",
                "infoFiltered": "(filtro a partir de _MAX_ registros totais)",
                "search":         "Pesquisar:",
                "loadingRecords": "Carregando...",
                "processing":     "Processando...",
                "decimal":        "",
                "infoPostFix":    "",
                "thousands":      ",",
                "paginate": {
                    "first":      "Primeiro",
                    "last":       "Último",
                    "next":       "Próximo",
                    "previous":   "Anterior"
                },
            },
            "lengthMenu": [[5, 10, 15, 25, 50, -1], [5, 10, 15, 25, 50, "Todos"]],
            "pageLength": 10
        });
        $('#cep').mask('99999-999');
        $('#cnpj').mask('99.999.999/9999-99');
        $('#titularcpf').mask('999.999.999-99');

    });
</script>
<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"></div>
    </div>
</div>
<!-- /.modal -->
</body>
</html>
