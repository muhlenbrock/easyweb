var array_galeria = [];
var borrador = 0;

$(document).ready(function(){
	iniciarDropzone('../../img/galeria/tmp/');
});

$("select.image-select").on('change',function(){
	var dir = '../../img/galeria/tmp/';
	var option_value = $(this).val();
	if (option_value != 0) {
		$('img.portada-noticia').attr('src',dir+option_value);
	}else{
		$('img.portada-noticia').attr('src','images/user.png');
	}
});

$('.submit').on('click',function(){
	if ($(this).attr('id')=='btnBorrador') {
		borrador = 0;
	}
	if ($(this).attr('id')=='btnSave') {
		borrador = 1;
	}
});

$('form').on('submit',function(e){
	e.preventDefault();
	$("#descr").val($("#editor").html().replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;'));

	$.each($('#galeria').children(),function(i,val){
		if (val.className.indexOf('success') != -1) {
			array_galeria.push({'path':recuperaPath(val.children[0].children[0].children[0].src)});
		}
	});

	options = $(this).serialize()+ '&' + $.param({'estado':borrador}) + '&' + $.param({'galeria':array_galeria});
	console.log(options);

	$.post('../routes/cuerpo_docente.php',options,function(data){
		new PNotify({
			title: data,
			type: 'success',
			styling: 'bootstrap3'
		});
	},'json').done(function(data){
		window.location="cuerpo.php";
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
