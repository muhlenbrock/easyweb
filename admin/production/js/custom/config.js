$('form').on('submit',function(e){
	e.preventDefault();
	//console.log($(this).serialize());
	$.post('../controllers/guardar_pass.php',$(this).serialize(),function(data){
		//console.log(data);
	},'json').done(function(data){
		if (data == 'correcto') 
		{
			$(".buttonFinish").attr('disabled','disabled');
			new PNotify({
				title: "Password modificado correctamente",
				type: 'success',
				styling: 'bootstrap3'
			})
			location.reload();
		}
		else
		{
			new PNotify({
			title: data,
			type: 'error',
			styling: 'bootstrap3'
		});
		}

	}).error(function(){
		new PNotify({
			title: '¡Error al comunicarse con Base de Datos!',
			text: 'Verifique su conexión a internet',
			type: 'error',
			styling: 'bootstrap3'
		});
	});

});