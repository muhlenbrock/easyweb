function iniciarDropzone(url, seccion){
    Dropzone.options.dropzone = {
        accept: function(file, done) {
            var thumbnail = $('.dropzone .dz-preview.dz-file-preview .dz-image:last');

            switch (file.type) {
                case 'application/pdf':
                thumbnail.css('background', 'url(../../img/icon-pdf.png');
                thumbnail.css('background-size', 'cover');
                break;
            }

            done();
        },
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
                     $('.dz-image').css('background', 'url(../../img/icon-pdf.png');
                    $('.dz-image').css('background-size', 'cover');
                });
            });
        },
        url: "../controllers/upload-images.php?dir="+url,
        maxFilesize: 2, //in MB
        maxFiles: 5,
        parallelUploads: 5,
        addRemoveLinks: true,
        dictMaxFilesExceeded: "Sólo puedes subir 5 Documentos a la vez",
        dictRemoveFile: "X",
        dictCancelUploadConfirmation: "¿Estás seguro de cancelar la carga?",
        dictResponseError: "Ha ocurrido un error al intentar cargar el acrchivo",
        acceptedFiles: '.pdf',

        success : function(file, response){
            isValid = true;
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
                        $.post('../routes/eliminar_documento.php',{id: seccion, filename: name},function(data){
                            console.log(data)
                        }).error(function(e){
                            console.log('error: '+e)
                        });
                    }
                }
            });
        }
    });
}

function cargarGaleria(url, data){
    $('#galeria').empty();
    $.each(data,function(index,value){
        var img_galeria = "";
        img_galeria += '<div class="col-md-55">';
        img_galeria += '<div class="thumbnail form-control">';
        img_galeria += '<div class="image view view-first">';
        img_galeria += '<img src="'+url+value.name+'" alt="image" class="img-responsive center-block" />';
        img_galeria += '<div class="mask">';
        img_galeria += '<p>&nbsp;</p>';
        // img_galeria += '<p>Your Text</p>';
        img_galeria += '<div class="tools tools-bottom">';
        img_galeria += '<a class="check_img"><i class="fa fa-check"></i></a>';
        img_galeria += '</div>';
        img_galeria += '</div>';
        img_galeria += '</div>';
        img_galeria += '</div>';
        img_galeria += '</div>';
        $('#galeria').append(img_galeria);
    });
}