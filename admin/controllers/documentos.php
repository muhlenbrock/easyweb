<?php 
require_once '../models/home.php';
require_once '../models/home.model.php';

// Logica
$SliderHome = new SliderHome();
$SliderModel = new SliderModel();
$i=0;
extract($_POST);
if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'listar':
            
             $sliders = $SliderModel->Listar();
            //print_r($arr[1]->ESTADOS_ID);
             $result = array();
             foreach ($sliders as $slider) {
                 # code...
                $result[] = array(
                "ID"=>$slider->ID,
                "ESTADOS_ID"=>$slider->ESTADOS_ID,
                "PATH"=>$slider->PATH,
                "TITULO"=>$slider->TITULO,
                "DESCRIPCION"=>$slider->DESCRIPCION
                           );
                
             } 
             echo json_encode($result);          
            break;
        case 'listaractivas':
            
             $sliders = $SliderModel->ListarActivas();
            //print_r($arr[1]->ESTADOS_ID);
             $result = array();
             foreach ($sliders as $slider) {
                 # code...
                $result[] = array(
                "ID"=>$slider->ID,
                "ESTADOS_ID"=>$slider->ESTADOS_ID,
                "PATH"=>$slider->PATH,
                "TITULO"=>$slider->TITULO,
                "DESCRIPCION"=>$slider->DESCRIPCION
                           );
                
             } 
             echo json_encode($result);          
            break;

        case 'actualizar':
            $SliderHome->setSliderHome('ID',              $_REQUEST['ID_PATH']);
            $SliderHome->setSliderHome('ESTADOS_ID',          $_REQUEST['ESTADOS_ID']);
            $SliderHome->setSliderHome('PATH',        $_REQUEST['PATH']);
            $SliderHome->setSliderHome('TITULO',            $_REQUEST['TITULO']);
            $SliderHome->setSliderHome('DESCRIPCION', $_REQUEST['DESCRIPCION']);
            $SliderModel->Actualizar($SliderHome);
            //header('Location: portada.php');
            break;

        case 'registrar':
            
            $SliderHome->setSliderHome('ESTADOS_ID',          $_REQUEST['ESTADOS_ID']);
            $SliderHome->setSliderHome('PATH',        $_REQUEST['PATH']);
            $SliderHome->setSliderHome('TITULO',            $_REQUEST['TITULO']);
            $SliderHome->setSliderHome('DESCRIPCION', $_REQUEST['DESCRIPCION']);

            $id = $SliderModel->Registrar($SliderHome);
            $SliderModel->insertar_contenido_path(1,$id);
           // header('Location: index.php');
            break;

        case 'eliminar':
        if(isset($id_path_imagenes))
        {
            if ( $SliderModel->Eliminar($id_path_imagenes) =="Registro eliminado con exito") 
            {
            # code...            
            
            return $SliderModel->eliminar_contenido_path($id_path_imagenes);

            }
        }
        break;
        case 'guardar':
        while (isset($_POST["id_path_imagenes".(string)$i])) 
        {
            if($_POST["id_path_imagenes".(string)$i]=="")
            {
                guardar($_REQUEST['id_contenido'], $i);
            }
            else
            {
                editar($i);
            }
            $i++;
        }
        break;

        
    }
}
function guardar($id_contenido, $i)
{   
    $SliderHome = new SliderHome();
    $SliderModel = new SliderModel();
    if ($_POST["path".(string)$i]=="") 
    {
        $path = "default.png"; # code...
    }
    else
    {
        $path = $_POST["path".(string)$i];
    }

    $SliderHome->setSliderHome('ESTADOS_ID', 1);
    $SliderHome->setSliderHome('PATH',        "'".$path."'");
    $SliderHome->setSliderHome('TITULO',      "'".$_POST["titulo".(string)$i]."'");
    $SliderHome->setSliderHome('DESCRIPCION', "'".$_POST["descripcion".(string)$i]."'");
    $id = $SliderModel->Registrar($SliderHome);
    $SliderModel->insertar_contenido_path($id_contenido, $id);
}

function editar($i)
{   
    if ($_POST["path".(string)$i]=="") 
    {
        $path = "default.png"; # code...
    }
    else
    {
        $path = $_POST["path".(string)$i];
    }
    $SliderHome = new SliderHome();
    $SliderModel = new SliderModel();
    $SliderHome->setSliderHome('ID',          $_POST["id_path_imagenes".(string)$i]);
    $SliderHome->setSliderHome('ESTADOS_ID',  1);
    $SliderHome->setSliderHome('PATH',        "'".$path."'");
    $SliderHome->setSliderHome('TITULO',      "'".$_POST["titulo".(string)$i]."'");
    $SliderHome->setSliderHome('DESCRIPCION', "'".$_POST["descripcion".(string)$i]."'");
    $SliderModel->Actualizar($SliderHome);
}
?>