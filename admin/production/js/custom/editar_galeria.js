var array_galeria = [];
var $id, dir;
$(document).ready(function(){
	$id = getParameterByName('id');
	dir = '../../img/galeria/galeria/'+$id+'/';
	iniciarDropzone(dir);
	
});
$("select.image-select").on('change',function(){
	var option_value = $(this).val();
	if (option_value != 0) {
		$('img.portada-noticia').attr('src',dir+option_value);
	}else{
		$('img.portada-noticia').attr('src','images/user.png');
	}
});
$('form').on('submit',function(e){
	array_galeria = [];
	e.preventDefault();
	
	$.each($('#galeria').children(),function(i,val){
		array_galeria.push({'id':val.children[0].children[0].children[0].id ,'estado': $(val).hasClass('has-success'),'path':recuperaPath(val.children[0].children[0].children[0].src)});
	});
	options = $(this).serialize() + '&' + $.param({'galeria':array_galeria}) + '& id =' + $id;
	console.log(options);
	$.post('../routes/editar_galeria.php',options,function(data){

	},'json').done(function(data){
		new PNotify({
			title: data.mensaje,
			type: 'success',
			styling: 'bootstrap3'
		});
		options = "";

	}).error(function(){
		new PNotify({
			title: '!Error al comunicarse con Base de Datos!',
			text: 'Verifique su conexión a internet',
			type: 'error',
			styling: 'bootstrap3'
		});
	});
});
