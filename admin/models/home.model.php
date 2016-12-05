<?php 

require_once("conection/conection.php");
require_once("crud.php");

class SliderModel
{    
    public function Listar()
    {	
    	$result = array();
        try
        {
            $model = new Crud();
			$model->select="*";
    		$model->from = "`slide_portada.v`";
            $model->condition = '`CONTENIDO_ID`=1 ORDER BY PATH_ID';
    		$model->Read();
            $fila = $model->rows; 
	 		
            $total = count($fila);
            if($total > 0)
            {
                foreach($fila as $filas)
                {
                    $slider = new SliderHome();
                    $slider->setSliderHome('ID', $filas[2]);
                    $slider->setSliderHome('ESTADOS_ID', $filas[3]);
                    $slider->setSliderHome('PATH', $filas[4]);
                    $slider->setSliderHome('TITULO', $filas[5]);
                    $slider->setSliderHome('DESCRIPCION', $filas[6]);
                    $result[] = $slider;
                }

            }


            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
    public function ListarActivas()
    {   
        $result = array();
        try
        {
            $model = new Crud();
            $model->select="*";
            $model->from = "`slide_portada.v`";
            $model->condition = '`ESTADO_PATH`=1 and `CONTENIDO_ID`=1 ORDER BY PATH_ID';
            $model->Read();
            $fila = $model->rows; 
            
            //$total = count($filas);
            foreach($fila as $filas)
            {
                $slider = new SliderHome();
                $slider->setSliderHome('ID', $filas[2]);
                $slider->setSliderHome('ESTADOS_ID', $filas[3]);
                $slider->setSliderHome('PATH', $filas[4]);
                $slider->setSliderHome('TITULO', $filas[5]);
                $slider->setSliderHome('DESCRIPCION', $filas[6]);
                $result[] = $slider;
            }


            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try 
        {
            
            $model = new Crud();
			$model->deletefrom = 'path_imagenes';
			$model->condition  = '`ID`='.$id;
			$model->Delete();
            echo $model->mensaje;
            return $model->mensaje;

        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(SliderHome $data)
    {
        try 
        {   
            $model = new Crud();
            $model->update = 'path_imagenes';
            $model->set    = 'ESTADOS_ID ='.$data->getSliderHome('ESTADOS_ID').',
                              PATH ='.$data->getSliderHome('PATH').',
                              TITULO ='.$data->getSliderHome('TITULO').',
                              DESCRIPCION ='.$data->getSliderHome('DESCRIPCION');
            $model->condition = 'ID ='.$data->getSliderHome('ID');
            $model->Update();
            echo $model->mensaje;

            
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(SliderHome $data)
    {
        try 
        {
            $model = new Crud();
            $model->insertInto    = 'path_imagenes';
            $model->insertColumns = 'ESTADOS_ID, PATH, TITULO, DESCRIPCION';
            $model->insertValues  = $data->getSliderHome('ESTADOS_ID').','.
                                    $data->getSliderHome('PATH').','.
                                    $data->getSliderHome('TITULO').','.
                                    $data->getSliderHome('DESCRIPCION');
            $model->Create();
            $idfk_path = $model->id;
            return $idfk_path;
            
            

        
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function insertar_contenido_path($CON_ID,$PATH_ID)
    {
        try 
        {   
            $model = new Crud();
            $model->insertInto    = 'contenido_path';
            $model->insertColumns = 'CON_ID, PAT_ID';
            $model->insertValues  = "$CON_ID,$PATH_ID";
            $model->Create();
            print_r($model->mensaje);
            

        
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }   
    public function eliminar_contenido_path($PATH_ID)
    {
        try 
        {   
            $model = new Crud();
            $model->deletefrom = 'contenido_path';
            $model->condition  = '`PAT_ID`='.$PATH_ID;
            $model->Delete();
            echo $model->mensaje;
            

        
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }   
}