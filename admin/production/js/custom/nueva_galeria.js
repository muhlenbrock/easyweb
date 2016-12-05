var array_galeria = [];
$(document).ready(function(){
	iniciarDropzone('../../img/galeria/home/');
});
$("select.image-select").on('change',function(){
	var dir = '../../img/galeria/home/';
	var option_value = $(this).val();
	if (option_value != 0) {
		$('img.portada-noticia').attr('src',dir+option_value);
	}else{
		$('img.portada-noticia').attr('src','images/user.png');
	}
});
$('form').on('submit',function(e){
	e.preventDefault();

	$.each($('#galeria').children(),function(i,val){
		if (val.className.indexOf('success') != -1) {
			array_galeria.push({'path':recuperaPath(val.children[0].children[0].children[0].src)});
		}
	});

	options = options = $(this).serialize()+'&' + $.param({'galeria':array_galeria});
	console.log(options);

	$.post('../routes/crear_galeria.php',options,function(data){
		console.log(data);
	},'json').done(function(data){
		$(".buttonFinish").attr('disabled','disabled');
		
		new PNotify({
			title: data,
			type: 'success',
			styling: 'bootstrap3'
		})
		window.location="galerias.php";

	}).error(function(){
		new PNotify({
			title: '¡Error al comunicarse con Base de Datos!',
			text: 'Verifique su conexión a internet',
			type: 'error',
			styling: 'bootstrap3'
		});
	});

});

//recupera nombre de archivo ---------------------------------------------------------------------------------
function recuperaPath(url) {
	var result = url.match(/[-_\w]+[.][\w]+$/i)[0];
	return result;
}