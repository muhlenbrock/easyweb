<?php
	include ("../models/contenido.php");
	
	date_default_timezone_set("America/Santiago");

	class Controllers {

		public function getContent($id, $id_seccion, $limit_desde, $limit_hasta,$limit, $order_by, $desc, $img_bool, $link_bool, $social_bool, $estado) {

			if (is_numeric($id)) {
				$content_list = Contenido::getContent($id, $id_seccion, $limit_desde, $limit_hasta, $limit, $order_by, $desc, $img_bool, $link_bool, $social_bool, $estado);
				return $content_list;
			}else{
				header('Location: ../../index.php');
				exit;
			}
			
		}
		public function getContentNoticia($id, $id_seccion, $limit_desde, $limit_hasta,$limit, $order_by, $desc, $img_bool, $link_bool, $social_bool, $estado) {
				$content_list = Contenido::getContent($id, $id_seccion, $limit_desde, $limit_hasta, $limit, $order_by, $desc, $img_bool, $link_bool, $social_bool, $estado);
				return $content_list;
			
			
		}
		public function createContent($id, $secciones_id, $estados_id, $titulo, $bajada, $descripcion, $portada, $fecha_modificacion, $fecha_publicacion, $imagenes , $redes_sociales, $link, $url, $tmp){

			$fecha_actual = date('Y-m-d H:i:s');

			if ($id == '') {
				$mensaje = Contenido::createContent($secciones_id, $estados_id, $titulo, $bajada, $descripcion, $portada, $fecha_actual, $fecha_modificacion, $fecha_publicacion, $imagenes, $redes_sociales, $link);
				if ($mensaje['idfk'] > 0) {
					$id = $mensaje['idfk'];
					$this->createFolder($id,$portada,$imagenes, $url, $tmp);
					return $mensaje['mensaje'];
				}else{
					return $mensaje['idfk'];
				}
				

			}else{
				$mensaje = Contenido::updateContent($id, $secciones_id, $estados_id, $titulo, $bajada, $descripcion, $portada, $fecha_modificacion, $fecha_publicacion, $imagenes, $redes_sociales, $link);

				return $mensaje;
			}
		}

		public function updateContent($id, $secciones_id, $estados_id, $titulo, $bajada, $descripcion, $portada, $fecha_modificacion, $fecha_publicacion, $imagenes, $redes_sociales, $link) {

				for ($i=0; $i < count($imagenes); $i++) { 
					if ($imagenes[$i]['estado'] == "true") {
						$imagenes[$i]['estado'] = 1;
					}else{
						$imagenes[$i]['estado'] = 2;
					}
				}

			$mensaje = Contenido::updateContent($id, $secciones_id, $estados_id, $titulo, $bajada, $descripcion, $portada, $fecha_modificacion, $fecha_publicacion,  $imagenes, $redes_sociales, $link);
			return $mensaje;
		}

		public function delete($variable, $id, $table){
			$mensaje = Contenido::delete($variable, $id, $table);
		}

		public function deleteContent($id,$url) {
			$mensaje = Contenido::deleteContent($id);
			$dir = "../../img/galeria/".$url."/".$id."/";
			$this->deleteFolder($dir);
			return $mensaje;			
		}

		private function createFolder($id, $portada, $imagenes, $url, $tmp){

			if (!file_exists("../../img/galeria/".$url."/".$id)) {
				mkdir("../../img/galeria/".$url."/".$id, 0777);
			}

			if (file_exists("../../img/galeria/".$tmp."/".$portada)) {
				if (copy("../../img/galeria/".$tmp."/".$portada, "../../img/galeria/".$url."/".$id."/".$portada)) {
					unlink("../../img/galeria/".$tmp."/".$portada);
				}
			}
			if ($imagenes!="") {
				foreach ($imagenes as $imagen) {
					if (file_exists("../../img/galeria/".$tmp."/".$imagen['path'])) {
						if (copy("../../img/galeria/".$tmp."/".$imagen['path'], "../../img/galeria/".$url."/".$id."/".$imagen['path'])) {
							unlink("../../img/galeria/".$tmp."/".$imagen['path']);
						}
					}
				}
			}
		}

		private function deleteFolder($carpeta) {
	        foreach(glob($carpeta . "/*") as $archivos_carpeta)
		    {
		        if (is_dir($archivos_carpeta))
		        {
		            eliminarDir($archivos_carpeta);
		        }
		        else
		        {
		            unlink($archivos_carpeta);
		        }
		    }

    		rmdir($carpeta);
		}

	}
?>