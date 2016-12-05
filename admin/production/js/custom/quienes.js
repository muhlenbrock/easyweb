$(document).ready(function() {
	var markupStr = 'hola mundo';

	$('.summernote').summernote(
	{
		toolbar: [
			['font', ['bold', 'italic', 'underline', 'clear']],
			['insert', ['link']],
		],
		code: function(){
			return markupStr
		},
		height: 300,
		minHeight: 150,
		maxHeight: 300,
		lang: 'es-ES'
	});

	$.getJSON('../routes/quienes_somos.php',function(data){
		$('#id_mision').val(data[0][0].id);
		$('#text_area_mision').summernote('code',data[0][0].descripcion);
		$('#id_vision').val(data[1][0].id);
		$('#text_area_vision').summernote('code',data[1][0].descripcion);
	});
});

$('form').on('submit', function (e) {

	e.preventDefault();

	var form_id = $(this).attr('id');
	var text_area_id = $('#'+form_id+' div div.summernote').attr('id');
	var inputid_id = $('#'+form_id+' div input[type="hidden"]').attr('id');
	var section_id = $('#'+form_id+' div input[type="hidden"].seccion').val();
	var text_area = $('#'+text_area_id).summernote('code');
	var inputid = $('#'+inputid_id).val();

	$.post($(this).attr('action'),{id: inputid, data: text_area, section_id: section_id},function(data){
		new PNotify({
			title: data.mensaje,
			type: 'success',
			styling: 'bootstrap3'
		});
	},'json').error(function(){
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
};