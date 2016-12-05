<?php
    session_start();
    include('is_login.php');
?>
<?include('../controllers/listar_archivos.php');?>
<!DOCTYPE html>
<html lang="ES-CL">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nombre Empresa | Administración</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!- Style smart wizard ->
    <link rel="stylesheet" type="text/css" href="../vendors/jQuery-Smart-Wizard/styles/smart_wizard.css">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Dropzone Style -->
    <link href="../src/css/dropzone.css" type="text/css" rel="stylesheet" />
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <!-- Custom Style -->
    <link href="css/custom/style.css" type="text/css" rel="stylesheet" />
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php 
                include("aside.php");
                include("nav.php");
            ?>
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="clearfix"></div>
                <div class="row">
                    <form>
                        <div class="x_panel">
                            <!-- <div class="x_title">
                                <h2>Subir Imágenes</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div id="dropzone2" class="dropzone">
                                    <div class="dz-message">Carga aquí tus imágenes 
                                        <br /> 
                                        <i class="fa fa-cloud-upload fa-5x" aria-hidden="true" style="color: #a1d302;"></i>
                                    </div>
                                </div>
                            </div> -->
                            <div class="x_content">
                                <h2>Crear Galeria</h2>
                    <!-- Tabs -->
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="list-unstyled wizard_steps">
                        <li>
                          <a href="#step-11">
                            <span class="step_no">1</span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-22">
                            <span class="step_no">2</span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-33">
                            <span class="step_no">3</span>
                          </a>
                        </li>
                      </ul>

                      <div id="step-11">
                        <h2 class="StepTitle">Paso 1 carga tus imágenes </h2>
                                <div id="dropzone" class="dropzone">
                                    <div class="dz-message">Carga aquí tus imágenes Máx 100 por galería
                                        <br /> 
                                        <i class="fa fa-cloud-upload fa-5x" aria-hidden="true" style="color: #a1d302;"></i>
                                    </div>
                                </div>
                        
                      </div>
                      <div id="step-22">
                        <h2 class="StepTitle">Paso 2 Nombra la Galeria</h2>
                        <div class="row">
                                    <div class="col-sm-3 col-xs-12 vcenter ">
                                        <img src="../../img/default.png" class="img-responsive portada-noticia center-block" alt="portada" style="max-height:220px;min-height:220px">
                                        
                                    </div>
                                    <div class="col-sm-8 col-xs-12 vcenter">
                                        <div class="form-group">                                
                                            <label>Nombre Galeria</label>
                                            <input id="titulo" type="text" name="titulo" class="col-lg-12 form-control" placeholder="Galeria Aniversario 10">
                                        </div>    
                                        <div class="form-group">                               
                                            <label>Portada Galeria</label>
                                                <select id="portada" name="portada" class="form-control image-select text-center">
                                                    <option>Selecionar Imagen</option>
                                                </select>   
                                        </div> 
                                        <div class="form-group">                               
                                            <label>Estado</label>    
                                        </div>
                                        <div class="form-group">                               
                                                                     
                                            <label class="radio-inline text-success">
                                                    <input id="activo" type="radio" name="estado" value="1" checked="">Activo
                                            </label>
                                            <label class="radio-inline text-danger">
                                                    <input id="inactivo" type="radio" name="estado" value="0">Inactivo
                                            </label>             
                                        </div>                                
                                        
                                    </div>
                            </div>
                      </div>
                      <div id="step-33">
                        <h2 class="StepTitle">Paso 3 Selecciona y Finaliza</h2>
                        <div id="galeria" class="x_content"></div>
                      </div>
                      
                    </div>

                            </div>
                        </div>
                    <!-- <div class="x_panel cargar_galeria">
                        <div class="x_title">
                                <h2>Galería de Imágenes</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        <div class="row">
                                    <div class="col-sm-3 col-xs-12 ">
                                        <img src="../../img/default.png" class="img-responsive portada-noticia center-block" alt="portada" style="max-height:220px;min-height:220px">
                                        <div class="form-group">                               
                                            <label>Portada Galeria</label>
                                                <select id="portada" name="portada" class="form-control image-select text-center">
                                                    <option>Selecionar Imagen</option>
                                                </select>   
                                        </div>     
                                        <div class="form-group">                                
                                            <label>Nombre Galeria</label>
                                            <input id="titulo" type="text" name="titulo" class="col-lg-12 form-control" placeholder="Galeria Aniversario 10">
                                        </div>
                                    </div>
                                    <div class="col-sm-9 col-xs-12 ">
                                        <div id="galeria" class="x_content"></div>                                   
                                        
                                    </div>
                            </div> 
                            <hr>                            
                        </div> -->
                    </form>
                </div>
            </div>
            <!-- /page content -->
            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Powered by <a href="https://oxidocs.com">Oxido Creative Studio</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>
    <!-- jQuery -->
     <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <!-- Dropzone Scripts -->
    <script src="../src/js/dropzone.js"></script>
    <script src="../src/js/dropzone-galeria.js" type="text/javascript"></script>
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <!--Custom JS-->
    <script src="js/custom/nueva_galeria.js" type="text/javascript"></script>
    <script type="text/javascript">
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
    labelFinish:'Finalizar',  // label for Finish button        
    noForwardJumping:true,
    ajaxType: 'POST',
  // Events
    onLeaveStep:leaveAStepCallback,// triggers when leaving a step    
    onShowStep: null,  // triggers when showing a step 
    onFinish:onFinishCallback, // triggers when Finish button is clicked
    includeFinishButton : true,   // Add the finish button
    reverseButtonsOrder: true //shows buttons ordered as: prev, next and finish    
}); 
         $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonFinish').addClass('btn btn-default');
   function leaveAStepCallback(obj){
        var step_num= obj.attr('rel');
        //console.log(step_num);
        return validateSteps(step_num);
      }
      
      function onFinishCallback(){
       if(validateAllSteps()){
        $('form').submit();
       }
      }
});
        
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

       if(validateStep3() == false){
         isStepValid = false;
         $('#wizard').smartWizard('setError',{stepnum:3,iserror:true});         
       }else{
         $('#wizard').smartWizard('setError',{stepnum:3,iserror:false});
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
            $('#wizard').smartWizard('showMessage','Por favor carga imágenes en la galería error paso '+step);
            $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});         
        }else{
            $('#wizard').smartWizard('hideMessage');
            $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
        }
    }

    // validate step2
    if(step == 2){
        if(validateStep2() == false ){
            isStepValid = false; 
           // $('#wizard').smartWizard('showMessage','Por favor ingresa los datos solicitados, error paso '+step);
            $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});         
        }else{
            $('#wizard').smartWizard('hideMessage');
            $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
        }
    }
    // validate step3
    if(step == 3){
        if(validateStep3() == false ){
            isStepValid = false; 
            //$('#wizard').smartWizard('showMessage','Por favor ingresa los datos solicitados, error paso '+step);
            $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});         
        }else{
            $('#wizard').smartWizard('hideMessage');
            $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
        }
    }

    return isStepValid;
}
//---- funcion para validar paso 1    
var isValid = true;
function validateStep1(){
    validarGaleria().done(function(data){
             if (data.length > 0) 
             {
               // console.log("existe");
                isValid = true;
             }           
             else
             {
               // console.log("no existe");
                isValid = false;
             }
    });
return isValid;    
}
//---- funcion para validar paso 2
    
function validateStep2(){

    if ($('#titulo').val() != "") 
    {   $('#titulo').parent().removeClass('has-success');
        $('#titulo').parent().removeClass('has-error');
        $('#titulo').parent().addClass('has-success');
    }   
    else
    {
        $('#titulo').parent().removeClass('has-success');
        $('#titulo').parent().removeClass('has-error');
        $('#titulo').parent().addClass('has-error');
    }
    if($('#portada').val() != '0')
    {
        $('#portada').parent().removeClass('has-success');
        $('#portada').parent().removeClass('has-error');
        $('#portada').parent().addClass('has-success');
    }
    else
    {
        $('#portada').parent().removeClass('has-success');
        $('#portada').parent().removeClass('has-error');
        $('#portada').parent().addClass('has-error');
    }
    if ($('#titulo').val() != "" && $('#portada').val() != 0) 
    {
        isValid = true;
    }
    else
    {
        isValid = false;
        new PNotify({
            title: "Por favor ingresa los datos solicitados, error paso 2",
            type: 'warning',
            styling: 'bootstrap3'
        })
    }

return isValid;
}
//---- funcion para validar paso 3
    
function validateStep3(){
  var isValid = true;    
  //validate email  email
       
  return isValid;
}
//------validar galeria sincronico
function validarGaleria(){
    return $.ajax({
        url: '../controllers/listar_archivos.php',
        type: 'POST',
        async: false,
        dataType: 'json',
        data: {dir_galeria:'../../img/galeria/home'},
        success: function(data){
            //console.log(data); // this is currently returning FALSE
        }
    });
}
//---------------------------------------------------------------------------------------   
// Email Validation
function isValidEmailAddress(emailAddress) {
  var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
  return pattern.test(emailAddress);
} 
    

    </script>
  
</body>
</html>
