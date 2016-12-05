var i = 0;

$(document).ready(function(){
	iniciarDropzone('../../img/slider-img/');
	/*$.getJSON("routes/cargar_imagenes.php", function(json) {
		cargaSelect();  
	});*/
	cargaSelect();
});

var getLocation = function(href) {
	var l = document.createElement("a");
	l.href = href;
	return l;
};

var getJSON = function(url, successHandler, errorHandler) {
	var xhr = typeof XMLHttpRequest != 'undefined'
		? new XMLHttpRequest()
		: new ActiveXObject('Microsoft.XMLHTTP');
	xhr.open('get', url, true);
	xhr.onreadystatechange = function() {
		var status;
		var data;
		// https://xhr.spec.whatwg.org/#dom-xmlhttprequest-readystate
		if (xhr.readyState == 4) { // `DONE`
			status = xhr.status;
			if (status == 200) {
				data = JSON.parse(xhr.responseText);
				successHandler && successHandler(data);
			} else {
				errorHandler && errorHandler(status);
			}
		}
	};
	xhr.send();
};



$("#agregar_portada").on('click',function(){	
	agregar_filas();
});

$("#guardar").on('click',function(){	
	guardarCambios();
});

//----------------------------------------------------------------------------------------------------------
function agregar_filas()
{
	if (i<=4) 
	{	
		var table_portada = '<tr id=fila'+i+'>'+
							'<td class="center">'+
							'<input type="hidden" id="id_path_imagenes'+i+'" name="id_path_imagenes'+i+'" value="">'+
              				'<input type="hidden" id="path'+i+'" name="path'+i+'" value="">'+
							'<img id="img_portada'+i+'" name="img_portada'+i+'" src="../../img/default.png" class="avatar avatar-portada'+i+' center-block" alt="Avatar"></td>'+
							'<td class="center">'+
							'<select id="'+i+'" name="select_img'+i+'" class="form-control image-select selector'+i+'" onchange="cambiaImg(this.id)">'+
							
							'</select>'+
							'</td>'+
							'<td class="center">'+
							'<input id="titulo'+i+'" name="titulo'+i+'" type="text" class="form-control table-input" size="20" placeholder="Ingresa un titulo">'+
							'</td>'+
							'<td class="center">'+
							'<input id="descripcion'+i+'" name="descripcion'+i+'" type="text" class="form-control table-input" size="30" placeholder="Descripcion de la Imagen o Portada">'+
							'</td>'+
							'<td class="center">'+
							'<select id="estados'+i+'" name="estados'+i+'" class="form-control table-input">'+
							'<option value="1"> Activa </option>'+
							'<option value="0"> Inactiva </option>'+
							'</select>'+
							'</td>'+
							'<td class="center">'+
							'<a href="javascript:void(0);" onclick="eliminar_filas('+i+')" >eliminar</a>'+
							'</td>'+
							'</tr>';
		$("#table_portada").append(table_portada);
		cargar_select_img(i);
		i++;
	}
}

//------------------------------------------------------------------------------------------------------
function eliminar_filas(id)
{  
	var id_path_imagenes = $('#id_path_imagenes'+id).val(); 
	
	$.post('../controllers/slider.php?action=eliminar', {id_path_imagenes:id_path_imagenes},function(res){
                  // Hacemos desaparecer el div "formulario" con un efecto fadeOut lento.
              // console.log(res);
               		elemento=document.getElementById("fila"+id);
					elemento.parentNode.removeChild(elemento);
					i = i-1;
					//console.log(i);
            
   });
	
	
}
//--------------------------------------------------------------------------------------------------------
function cargar_portada()
{
	$.getJSON("../controllers/slider.php?action=listar", function(json) {
		//console.log(json); // this will show the info it in firebug console

	$datosSlider = json;
	var length = $datosSlider.length;
	for (var i = 0; i < length; i++) 
	{	
		//console.log(i);
		agregar_filas();	
	}		
	});
}
//-------------------------------------------------------------------------------------------------------
function cargar_datos_portada()
{
	$.getJSON("../controllers/slider.php?action=listar", function(json) {
		//console.log(json); // this will show the info it in firebug console
		$.each(json, function(i,item){
			
			
			
		});
	});
}
//--------------------------------------------------------------------------------------------------------
function cargar_select_img(i)
{
	$.post('../controllers/listar_archivos.php', {dir:'../../img/slider-img/'},function(data){
		
					$('#'+i).empty();
					$('#'+i).append('<option value="0"> Seleccionar Imagen </option>');
					$.each(data,function(index,value){
					$('#'+i).append(value);
					});
				},'json').error(function(e){
					alert('Se ha producido un error al cargar, refresque la página para volver a intentarlo');
				});
}
//--------------------------------------------------------------------------------------------------------
function cambiaImg(id)
{
	//console.log(id);
	var URLdomain = window.location.host;
	//console.log(URLdomain);
	var dir = '../../img/slider-img/';
	var option_value = $('#'+id).val();
	//console.log("cambia");
	
	if (option_value != 0) {
		$('img.avatar-portada'+id).attr('src',dir+option_value);
		$('#path'+id).val(option_value);
	}else{
		$('img.avatar-portada'+id).attr('src','../../img/default.png');
		$('#path'+id).val("default.png");
	}
}
//--------------------------------------------------------------------------------------------------------
function setImg()
{
	
	var dir = '../../img/slider-img/';	
	$('img.avatar').attr('src','../../img/default.png');
	
}
//--------------------------------------------------------------------------------------------------------
function existeUrl(url) {
   var http = new XMLHttpRequest();
   http.open('HEAD', url, false);
   http.send();
   return http.status!=404;
}

//--------------------------------------------------------------------------------------------------------
function comparaCadena(cadena, palabra){
	if (cadena.indexOf(palabra)==-1)
	{
		//console.log("palabra NO encontrada");
		return false;
	}
	else
	{
		//console.log("palabra encontrada");
		return true;
	}
}
//--------------------------------------------------------------------------------------------------------
//selecciona un select por el value
function SelectElement(valueToSelect,id)
{    
	
	var element = document.getElementById(id);
	
	element.value = valueToSelect;
}
//--------------------------------------------------------------------------------------------------------
function SetSelect(id,value)
{	
	//console.log(id+" "+value)
	$('.selector'+id).val(value);
	//console.log($('.selector'+id));
}
//--------------------------------------------------------------------------------------------------------
//recupera nombre de archivo
function recuperaPath(url)
{
	var result = url.match(/[-_\w]+[.][\w]+$/i)[0];
	return result;
}

//--------------------------------------------------------------------------------------------------------
function cargaSelect()
{
	$.post('../controllers/listar_archivos.php', {dir:'../../img/slider-img/'},function(data){
					
					$('select.image-select').empty();
					$('select.image-select').append('<option value="0"> Seleccionar Imagen </option>');
					$datosSlider = data;
					var length = $datosSlider.length;
					for (i = 0; i < length; i++) 
					{
						
						 $('select.image-select').append(data[i]);
					}
					
				},'json').done(function(data){

					cargarDatos();

				}).error(function(e){
					alert('Se ha producido un error al cargar, refresque la página para volver a intentarlo');
				});
}
//--------------------------------------------------------------------------------------------------------
function cargarDatos()
{
	getJSON('../controllers/slider.php?action=listar', function(data) {
		$datosSlider = data;
		var length = $datosSlider.length;
		for (i = 0; i < length; i++)
		{
		 // console.log($datosSlider[i].PATH);
		  $('img.avatar-portada'+i).attr('src','../../img/slider-img/'+$datosSlider[i].PATH);
		  var nombre_img = recuperaPath($datosSlider[i].PATH);
		  $('#titulo'+i).val($datosSlider[i].TITULO);
		  $('#descripcion'+i).val($datosSlider[i].DESCRIPCION);
		  if (nombre_img == "default.png") 
		  {
		  	$('img.avatar-portada'+i).attr('src','../../img/'+$datosSlider[i].PATH);
		  	SelectElement(0,i);
		  }
		  else
		  {
		  	SelectElement(nombre_img,i); 
		  }
		   
		  SelectElement($datosSlider[i].ESTADOS_ID,'estados'+i);
		  
		}
	}, function(status) {
		alert('Error al cargar datos.');
	});
}
//--------------------------------------------------------------------------------------------------------
function guardarCambios()
{
//console.log($("#portada").serialize());
$.post("../controllers/slider.php?action=guardar",$("#portada").serialize(),function(res){ 	
	//console.log(res);	// Hacemos desaparecer el div "formulario" con un efecto fadeOut lento. 		console.log(res);            
  }).done(function(data){

  	location.reload(true);
                        
                    });
}