function iniciarDropzone(url){
    Dropzone.options.dropzone = {
        autoProcessQueue: true,
    };
    Dropzone.autoDiscover = false;
    $("#dropzone").dropzone({
        init: function(){
            thisDropzone = this;
          
      
            $.get('../controllers/upload-images.php?dir='+url, function(data) {
                $.each(data, function(key,value){
                    var mockFile = { name: value.name, size: value.size };
                    thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                    thisDropzone.options.thumbnail.call(thisDropzone, mockFile, url+value.name);
                    $('.dz-image img').addClass("img-thumb-dropzone");
                });
                
            });

        },
        url: "../controllers/upload-images.php?dir="+url,
        maxFilesize: 10, //in MB
        maxFiles: 5,
        parallelUploads: 5,
        addRemoveLinks: true,
        dictMaxFilesExceeded: "Sólo puedes subir 5 imágenes a la vez",
        dictRemoveFile: "X",
        dictCancelUploadConfirmation: "¿Estás seguro de cancelar la carga?",
        dictResponseError: "Ha ocurrido un error al intentar cargar el acrchivo",
        acceptedFiles: '.jpeg,.jpg,.JPEG,.JPG,.png,.PNG,.svg,.SVG,.JPEG,.jpeg',
        success : function(file, response){
            $.post('../controllers/listar_archivos.php', {dir:url},function(data){
                    $('select.image-select').empty();
                    $('select.image-select').append('<option value="0"> Seleccionar Imagen </option>');
                    $.each(data,function(index,value){
                        $('select.image-select').append(value);
                        
                    });
                    var z =0;
                    while(document.getElementById('img_portada'+z))
                        {   
                            
                            var img_portada = document.getElementById('img_portada'+z).src;
                            console.log(img_portada);
                            var result = recuperaPath(img_portada);
                            console.log(result);
                            if (result == "default.png") 
                                    {
                                        SelectElement(0,z);
                                    }
                                    else
                                    {
                                        SelectElement(result, z);
                                    }
                            z++;
                           
                        } 
                },'json').error(function(e){
                    alert('Se ha producido un error al cargar, refresque la página para volver a intentarlo');
                });
        },
        error: function(file, serverFileName){
            var name = file.name;
            $.ajax({
                type: "POST",
                url: "../controllers/upload-images.php?delete=true&dir="+url,
                data: "filename="+name,
                success: function(data){
                    var json = JSON.parse(data);
                    if(json.res == true){
                        var element;
                        (element = file.previewElement) != null ? 
                        element.parentNode.removeChild(file.previewElement) : 
                        false;
                    }
                }
            });
        },
        removedfile: function(file, serverFileName){
            var name = file.name;
            $.ajax({
                type: "POST",
                url: "../controllers/upload-images.php?delete=true&dir="+url,
                data: "filename="+name,
                success: function(data){
                    
                    var json = JSON.parse(data);
                    if(json.res == true){
                        var element;
                        (element = file.previewElement) != null ? 
                        element.parentNode.removeChild(file.previewElement) : 
                        false;
                    }                  
                    $.post('../controllers/listar_archivos.php', {dir:url},function(data){
                        $('select.image-select').empty();
                        $('select.image-select').append('<option value="0"> Seleccionar Imagen </option>');
                        $.each(data,function(index,value){                            
                          console.log(value);
                            $('select.image-select').append(value);
                        });
                        var z = 0;
                        while(document.getElementById('img_portada'+z))
                        {   

                            console.log('img_portada'+z)
                            var img_portada = document.getElementById('img_portada'+z).src;
                            var result = recuperaPath(img_portada);
                                if (comparaCadena(img_portada,name)) 
                                {
                                    $('img.avatar-portada'+z).attr('src','../../img/default.png');
                                }
                                else
                                {   
                                    console.log(result);
                                    if (result == "default.png") 
                                    {
                                        SelectElement(0,z);
                                    }
                                    else
                                    {
                                        SelectElement(result, z);
                                    }
                                    
                                }
                            z++;
                           
                        }   
                    },'json').done(function(data){
                        var count = Object.keys(data).length;
                          //console.log(data);
                            if (count==0) 
                            {
                                setImg();
                                thisDropzone.removeAllFiles();
                            }
                            guardarCambios();
                    }).error(function(e){
                        alert('Se ha producido un error al cargar las imagenes, refresque la página para volver a intentarlo');
                    });
                }
            });
        }
    });
}