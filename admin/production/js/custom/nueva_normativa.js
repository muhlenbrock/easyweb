// var array_galeria = [];
// var borrador = 0;

var etapa = 1;
var url = '../../docs/normativas/';
var seccion = 6;
$(document).ready(function(){

	$('#wizard').smartWizard({
	  // Properties
	    selected: 0,  // Selected Step, 0 = first step   
	    keyNavigation: true, // Enable/Disable key navigation(left and right keys are used if enabled)
	    enableAllSteps: false,  // Enable/Disable all steps on first load
	    transitionEffect: 'fade', // Effect on navigation, none/fade/slide/slideleft
	    contentURL:null, // specifying content url enables ajax content loading
	    contentURLData:null, // override ajax query parameters
	    contentCache:true, // cache step contents, if false content is fetched always from ajax url
	    cycleSteps: false, // cycle step navigation
	    enableFinishButton: false, // makes finish button enabled always
	    hideButtonsOnDisabled: false, // when the previous/next/finish buttons are disabled, hide them instead
	    errorSteps:[],    // array of step numbers to highlighting as error steps
	    labelNext:'Siguiente', // label for Next button
	    labelPrevious:'Atras', // label for Previous button
	    labelFinish:'Guardar Cambios',  // label for Finish button        
	    noForwardJumping:true,
	    ajaxType: 'POST',
	  	// Events
	    onLeaveStep: leaveAStepCallback,// triggers when leaving a step    
	    onShowStep: null,  // triggers when showing a step 
	    onFinish: onFinishCallback, // triggers when Finish button is clicked
	    includeFinishButton : true,   // Add the finish button
	    reverseButtonsOrder: true //shows buttons ordered as: prev, next and finish    
	}); 


	iniciarDropzone(url, seccion);
    $('#wizard').smartWizard();

    $('#wizard_verticle').smartWizard({
      transitionEffect: 'slide'
    });

    $('.buttonNext').addClass('btn btn-success');
    $('.buttonPrevious').addClass('btn btn-primary');
    $('.buttonFinish').addClass('btn btn-default');

    $('.buttonNext').on('click',function(){
		etapa++;
		cargarContenido(etapa);
	});

	$('.buttonPrevious').on('click',function(){
		etapa--;
		cargarContenido(etapa);
	});

});

function leaveAStepCallback(obj){
	var step_num= obj.attr('rel');
	return validateSteps(step_num);
}

function onFinishCallback(){
	if(validateAllSteps()){
		$('form').submit();
	}
}

$('form').on('submit', function (e) {

	e.preventDefault();
	$form = $(this).serialize();
	$.post('../controllers/documentos.php?action=guardar&id_contenido=5', $form ,function(data){
		$(".buttonFinish").addClass('buttonDisabled');
		new PNotify({
			title: 'registro actualizado',
			type: 'success',
			styling: 'bootstrap3'
		});
	}).done(function(){
        cargarContenido(2);
        $(".buttonFinish").removeClass('buttonDisabled');
    }).error(function(){
		new PNotify({
			title: '¡Error al comunicarse con Base de Datos!',
			text: 'Verifique su conexión a internet',
			type: 'error',
			styling: 'bootstrap3'
		});
	});

});


function cargarContenido(n_etapa){
	var i=0;
	if(n_etapa==2){
		$.getJSON('../controllers/upload-images.php?dir='+url,function(data){
			$('#documentos').empty();
			var form = "";
			$.each(data,function(index,value){
				form += "<div class='row'>";
				form += "<div class='col-sm-2'>";
				form += "<img src='../../img/icon-pdf.png' class='img-responsive center-block'>";
				form += "</div>";
				form += "<div class='col-sm-10'>";
				form += "<label>Nombre</label>";
				form += "<input name='titulo"+i+"' class='form-control' type='text'>";
				form += "<input id='id_path_imagenes"+i+"' name='id_path_imagenes"+i+"' type='hidden'>";
				form += "<input name='path"+i+"' type='hidden' value='"+value.name+"' class='dropzone_img'>";
				form += "<label>Descripción</label>";
				form += "<textarea name='descripcion"+i+"' class='form-control'></textarea><br />";
				form += "<button type='button' class='btn btn-danger full-right'><i class='fa fa-trash fa-2x'></i></button>";
				form += "</div>";
				form += "</div>";
				form += "<hr/>";
				i++;
			});
			$('#documentos').append(form);
		}).done(function(){
			$.getJSON('../routes/normativas.php', function(data){
				$.each(data.imagenes, function(index, value){
					$.each($('.dropzone_img'),function(i,val){
						if ($(val).val() == value.PATH) {
							$(val).parent().children()[1].value = value.TITULO;
							$(val).parent().children('input')[1].value = value.ID;
							$(val).parent().children('textarea')[0].value = value.DESCRIPCION;
							$(val).parent().children('button')[0].id = value.ID;
						}
					});
				});

				$('button.btn-danger').on('click',function(){
					$.post('../controllers/slider.php?action=eliminar', {id_path_imagenes:$(this).attr('id')} ,function(data){
						new PNotify({
							title: 'registro eliminado',
							type: 'success',
							styling: 'bootstrap3'
						});
                        location.reload();
					}).error(function(){
						new PNotify({
							title: '¡Error al comunicarse con Base de Datos!',
							text: 'Verifique su conexión a internet',
							type: 'error',
							styling: 'bootstrap3'
						});
					});
				});

			},'json').done(function(data){
				
			}).error(function(e){
				new PNotify({
					title: '¡Se ha producido un error al cargar los datos',
					text: 'refresque la página para volver a intentarlo',
					type: 'error',
					styling: 'bootstrap3'
				});
			});
		});
	}
}


//------------------------------------------------------------------------------------------
function validateAllSteps(){
       var isStepValid = true;
       
       if(validateStep1() == false){
         isStepValid = false;
         $('#wizard').smartWizard('setError',{stepnum:1,iserror:true});         
       }else{
         $('#wizard').smartWizard('setError',{stepnum:1,iserror:false});
       }
       
       if(validateStep2() == false){
         isStepValid = false;
         $('#wizard').smartWizard('setError',{stepnum:2,iserror:true});         
       }else{
         $('#wizard').smartWizard('setError',{stepnum:2,iserror:false});
       }
       
       if(!isStepValid){
          $('#wizard').smartWizard('showMessage','Please correct the errors in the steps and continue');
       }
              
       return isStepValid;
    }
//----------------------------------------------------------------------------------------------        
function validateSteps(step){
    var isStepValid = true;
    // validate step 1
    if(step == 1){
        if(validateStep1() == false ){
            isStepValid = false; 
            $('#wizard').smartWizard('showMessage','Por favor carga documentos error paso '+step);
            $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});         
        }else{
            $('#wizard').smartWizard('hideMessage');
            $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
        }
    }

    // validate step2
    if(step == 2){    	
//        if(validateStep2() == false ){
//            isStepValid = false; 
//            //$('#wizard').smartWizard('showMessage','Por favor ingresa los datos solicitados, error paso '+step);
//            //$('#wizard').smartWizard('setError',{stepnum:step,iserror:true});         
//        }else{
//            $('#wizard').smartWizard('hideMessage');
//            $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
//        }
    }

    return isStepValid;
}
//---- funcion para validar paso 1    
var isValid = true;
function validateStep1(){
    validarGaleria().done(function(data){
		if (data.length > 0) 
		{
			isValid = true;
		}           
		else
		{
			isValid = false;
		}
    });
return isValid;    
}

//---- funcion para validar paso 2
    
function validateStep2(){

	isValid = true;

	$.each($('#documentos'),function(i,val){
		$.each($(val).children().children().children('input'),function(index,value){
			if ($(value).attr('type')=='text') {
				if ($(value).val()!='') {
					$(value).parent().removeClass('has-success');
	        		$(value).parent().removeClass('has-error');
	        		$(value).parent().addClass('has-success');	        		
				}else{
					$(value).parent().removeClass('has-success');
					$(value).parent().removeClass('has-error');
					$(value).parent().addClass('has-error');
				}
			}
		});
	});

	$.each($('#documentos'),function(i,val){
		$.each($(val).children().children(),function(index,value){
			if ($(value).hasClass('has-error')) {
				isValid = false;
				new PNotify({
					title: "Por favor ingresa los datos solicitados, error paso 2",
					type: 'warning',
					styling: 'bootstrap3'
				});
			}
		});
	});

	return isValid;
}


//------validar galeria sincronico
function validarGaleria(){
    return $.ajax({
        url: '../controllers/listar_archivos.php',
        type: 'POST',
        async: false,
        dataType: 'json',
        data: {dir_galeria: url},
        success: function(data){
            //console.log(data); // this is currently returning FALSE
        }
    });
}