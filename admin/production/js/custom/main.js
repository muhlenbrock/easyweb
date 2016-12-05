//Obtiene get desde url ---------------------------------------------------------------------------------
function getParameterByName(name) {
	name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
	results = regex.exec(location.search);
	return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

//Convierte texto a html ---------------------------------------------------------------------------------
function convert(convert){
    return $("<span />", { html: convert }).text();
};

//recupera nombre de archivo ---------------------------------------------------------------------------------
function recuperaPath(url) {
	var result = url.match(/[-_\w]+[.][\w]+$/i)[0];
	return result;
}
//--------------------------------------------------------------------------------------------------------------
function SelectElement(valueToSelect,id)
{    
	
	var element = document.getElementById(id);
	console.log(valueToSelect);

	
	element.value = valueToSelect;
	console.log(element.value);
}