<?php

	class crud
	{	
		/**Crear**/

		public $insertInto;
		public $insertColumns;
		public $insertValues;
		public $mensaje;
		public $id;
		
		/**seleccionar**/
		
		public $select;
		public $from;
		public $condition;
		public $rows;
		
		/**update**/

		public $set;
		public $update;

		/** delete **/

		public $deletefrom;


		public function Create(){

			try{
				$model = new Conexion;
				$conexion = $model->conectar();
				$insertInto = $this->insertInto;
				$insertColumns = $this->insertColumns;
				$insertValues = $this->insertValues;
				$sql = "INSERT INTO $insertInto ($insertColumns) VALUES ($insertValues)";
				$consulta = $conexion->prepare($sql);
				if(!$consulta->execute()){
					//$this->mensaje = "Error al guardar";
					$this->mensaje = $consulta->errorInfo();
				}else{
					
					$this->id = $conexion->lastInsertId();
					$this->mensaje = "Guardado Exitosamente";
				}
			}catch (PDOException $e){
				$this->mensaje = "Error al guardar".$e->getMessage();
				die();
			}
		}
		

		public function Read(){

			$model = new Conexion();
			$conexion = $model->conectar();
			$select = $this->select;
			$from = $this->from;
			$condition = $this->condition;

			if ($condition !='') {
				$condition = " WHERE " . $condition;
			}

			$sql = "select ".$select." from ".$from." ".$condition;
			$consulta = $conexion->prepare ($sql);
			$consulta->execute();
		
			while ($filas = $consulta->fetch()) {
				$this->rows[] = $filas;
			}
		}
		
		public function Update(){

			$model = new Conexion();
			$conexion = $model->conectar();
			$update = $this->update;
			$set = $this->set;
			$condition = $this->condition;
			if ($condition !='') {				
				$condition = " WHERE " . $condition;
			}
			$sql = "UPDATE $update SET $set $condition";
			$consulta = $conexion->prepare($sql);

			if (!$consulta->execute()) {
				$this->mensaje = $consulta->errorInfo();
				//$this->mensaje = "ha ocurrido un error al actualizar";
			}else{
				$this->mensaje = "Registro Actualizado";
			}
		}


		public function Delete(){

			$model = new Conexion;
			$conexion = $model->conectar();
			$deletefrom = $this->deletefrom;
			$condition  =  $this->condition;
			if($condition !=''){
				$condition = "WHERE " . $condition;
				$sql = "DELETE FROM $deletefrom $condition";
				$consulta = $conexion->prepare($sql);
				if (!$consulta->execute()) {
					$this->mensaje = $consulta->errorInfo();
				}else{
					$consulta->execute();
					$this->mensaje = "Registro eliminado con éxito";
				}
			}
		}
	}
?>