var i = 0; 
$(function(){
		    var current = location.pathname;
				path = current;
		    $('#nav li a').each(function(){
		        var $this = $(this);
		        //console.log(current);
		        current = recuperaPath(current);
		       // console.log("esto es"+current);
		        // if the current path is like this link, make it active
		        if (current == " ") 
		        {
		        		if(/noticias/.test(path) && i == 0){
			            	$( ".noticias" ).parent().addClass(' active');
			            	i++;
		            	}else if(/galeria/.test(path) && i == 0){
			            	$( ".galer" ).parent().addClass(' active');
			            	i++;
		            	}else if(/contacto/.test(path) && i == 0){
			            	$( ".contac" ).parent().addClass(' active');
			            	i++;
		            	}else if(/perfil/.test(path) && i == 0){
			            	$( ".carrera" ).parent().addClass(' active');
			            	i++;
			            	
		            	}else if(path.indexOf('/') !== -1 && i == 0){
			            	$this.parent().addClass(' active');
			            	i++;
		            	}   	

		        }
		        else if( (current == "bienvenidos.php") || (current == "equipo.php") && i == 0)
		        {
		        	if($this.attr('href').indexOf(current) !== -1 && i == 0)
		        	{
		            	$( "ul.escuela" ).parent().addClass(' active');
		            	i++;
		            	//console.log($this);
		        	}
		        }
		        else if(/perfil/.test(path) && i == 0){
			            	$( ".carrera" ).parent().addClass(' active');
			            	i++;
			            	
		        }else if((/bienvenidos/.test(path)) || (/equipo/.test(path)) || (/escuela/.test(path)) && i == 0){
			            	$( "ul.escuela" ).parent().addClass(' active');
			            	i++;
			            	
		        } 
		        else
		        {   
		        	//console.log(i);
		        	if($this.attr('href').indexOf(current) !== -1 && i == 0)
		        	{
		            	$this.parent().addClass('active');
		            	i++;
		            	
		        	}
		        }
		        
		    })
})
//recupera nombre de archivo
function recuperaPath(url)
{
	try {
		var result = url.match(/[-_\w]+[.][\w]+$/i)[0];
	}
	catch(err) {
		//console.log(err);
		var result = " ";
	}
	return result;
}