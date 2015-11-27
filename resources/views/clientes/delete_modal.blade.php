{!! Form::open(['route' => ['clientes.destroy', 'codigocliente' => $cliente->codigocliente], 'method' => 'delete', 'id' => 'form-modal', 'autocomplete' => 'off']) !!}
{!! Form::hidden('codigocliente', $cliente->codigocliente) !!}
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">{{ $titulo }}</h4>
</div>
<div class="modal-body">
	<p>Você tem certeza que quer excluir o cliente <b>{{ $cliente->razaosocial }}</b>?</p>
</div>
<div class="modal-footer">
 	<input type="submit" class="btn btn-primary" id="submit" value="Confirmar" />
    <button type="button" class="btn btn-default" id="reset" data-dismiss="modal">Fechar</button>
</div>
{!! Form::close() !!}	
<script type="text/javascript">
$(document).ready(function(){
	$("#modal-body").empty();
	$('#skyWebModal').on('hidden.bs.modal', function() {
	    $(this).removeData('bs.modal');
	});
	$('#reset').click(function(){
		$('#form-modal').trigger('reset'); // reset form
		$("#modal-body").empty();
		$('#submit').prop("disabled", true);
	});
});
</script>