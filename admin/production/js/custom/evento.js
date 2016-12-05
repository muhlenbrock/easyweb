$(document).ready(function(){
	
});

$('form').on('submit',function(e){
	e.preventDefault();
	if ($('#fecha_inicio').val() != "" && $('#fecha_fin').val() != "") {
	console.log($(this).serialize());
	$.post('../controllers/controlador_calendario.php',$(this).serialize(),function(data){
		
	},'json').done(function(data){
		
		$(".btn-success").attr('disabled','disabled');
		new PNotify({
			title: data,
			type: 'success',
			styling: 'bootstrap3'
		})
	}).success(function(data){
		
		location.reload();
	})
	.error(function(){
		new PNotify({
			title: '¡Error al comunicarse con Base de Datos!',
			text: 'Verifique su conexión a internet',
			type: 'error',
			styling: 'bootstrap3'
		});
	});
}
else
{
	new PNotify({
			title: '¡No deje datos en blanco!',
			text: 'Ingrese los datos correctamente',
			type: 'error',
			styling: 'bootstrap3'
		});
}

});