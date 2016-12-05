var array_galeria = [];
var $id, dir;
$(document).ready(function(){
	$id = getParameterByName('id');
	dir = '../../img/galeria/cuerpo/'+$id+'/';
	iniciarDropzone(dir);
	$.get('../routes/listar_funcionario_back.php', {id: $id}, function(data){
		$('#titulo').val(data[0].titulo);
		$('#subtitulo').val(data[0].subtitulo);
		$('#editor').val('');
		//$('#editor').append(convert(data[0].descripcion));
		$("select.image-select").val(data[0].portada_contenido);
		$('img.portada-noticia').attr('src',dir+data[0].portada_contenido);
	},'json').done(function(data){
		$.each(data[0].imagenes,function(i,val){
			$.each($("#galeria > div > div > div > img.img-responsive.center-block"),function(index,value){
				if (val.PATH == recuperaPath(value.src)) {
					value.id = val.ID;
					$('#'+val.ID).parent().parent().parent().addClass('has-success');
					$(value).parent().children().children().children().children().attr('class','fa fa-times');
				}
			});		
		});
	});
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
	$("#descr").val('');
	$("#descr").val($("#editor").html().replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;'));
	console.log($("#descr").val());
	$.each($('#galeria').children(),function(i,val){
		array_galeria.push({'id':val.children[0].children[0].children[0].id ,'estado': $(val).hasClass('has-success'),'path':recuperaPath(val.children[0].children[0].children[0].src)});
	});
	options = $(this).serialize() + '&' + $.param({'galeria':array_galeria}) + '& id =' + $id;
	console.log(options);
	$.post('../routes/editar_funcionario.php',options,function(data){

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
