
$(document).ready(function(){
	$.getJSON('../routes/guardar_correo.php',function(data){
		$('#correo').val(data[0].descripcion);
	});
});

$('form').on('submit',function(e){
	e.preventDefault();

	$.post('../routes/guardar_correo.php',$(this).serialize(),function(data){
		console.log(data);
	},'json').done(function(data){
		$(".buttonFinish").attr('disabled','disabled');
		new PNotify({
			title: data.mensaje,
			type: 'success',
			styling: 'bootstrap3'
		})
	}).error(function(){
		new PNotify({
			title: '¡Error al comunicarse con Base de Datos!',
			text: 'Verifique su conexión a internet',
			type: 'error',
			styling: 'bootstrap3'
		});
	});

});