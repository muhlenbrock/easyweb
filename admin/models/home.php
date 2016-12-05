<?php
/**
* 
*/
class SliderHome
{	PUBLIC $ID;
	PUBLIC $ESTADOS_ID;
	PUBLIC $PATH;
	PUBLIC $TITULO;
	PUBLIC $DESCRIPCION;

	
	public function getSliderHome($k)
	{ 
		return $this->$k; 
	}

	public function setSliderHome($k, $v)
	{ 
		return $this->$k = $v; 
	}
}

?>