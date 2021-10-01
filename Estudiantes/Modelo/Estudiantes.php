<?php
require_once('../../Conexion.php');

class Estudiantes extends Conexion{


public function __construct(){
		$this->db=parent::__construct();
	}	
	
	public function add($Nombre, $Apellido,$Documento, $Correo, $Materia, $Docente, $Promedio, $Fecha){
			$statement = $this->db->prepare("INSERT INTO estudiantes (NOMBRE, APELLIDO, DOCUMENTO, CORREO,  MATERIA, DOCENTE, PROMEDIO, FECHA_REGISTRO) VALUE (:Nombre, :Apellido, :Documento, :Correo, :Materia, :Docente, :Promedio, :Fecha)");
			
			$statement->bindParam(':Nombre', $Nombre);
			$statement->bindParam(':Apellido', $Apellido);
			$statement->bindParam(':Documento', $Documento);
			$statement->bindParam(':Correo', $Correo);
			$statement->bindParam(':Materia', $Materia);
			$statement->bindParam(':Docente', $Docente);
			$statement->bindParam(':Promedio', $Promedio);
			$statement->bindParam(':Fecha', $Fecha);

			if ($statement->execute()) {
				header('Location: ../Pages/index.php');
			}else{
				header('Location: ../Pages/add.php');
			}


	}
	public function get(){
		$rows =null; //array para almacenar registros
		$statement = $this->db->prepare("SELECT * FROM estudiantes");
		$statement->execute();
		while($result=$statement->fetch()){// se almacena un regitro por cada ciclo 
				$rows[]=$result;
		}
		return $rows;

	}
	public function getById($Id){

		$rows =null; //array para almacenar registros
		$statement = $this->db->prepare("SELECT ID_ESTUDIANTE, NOMBRE, APELLIDO, DOCUMENTO, CORREO, MATERIA,DOCENTE,PROMEDIO, FECHA_REGISTRO FROM estudiantes WHERE ID_ESTUDIANTE = :Id");
		$statement->bindParam(':Id', $Id);//pasamos el parametro de esta funcion $Id
		$statement->execute();
		while($result=$statement->fetch()){// se almacena un regitro por cada ciclo 
				$rows[]=$result;
		}
		return $rows;

	}
	public function update($Id,$Nombre, $Apellido,$Documento, $Correo, $Materia, $Docente, $Promedio, $Fecha){

		$statement = $this ->db-> prepare("UPDATE estudiantes SET NOMBRE= :Nombre, APELLIDO= :Apellido, DOCUMENTO=:Documento, CORREO= :Correo, MATERIA= :Materia, DOCENTE= :Docente, PROMEDIO= :Promedio, FECHA_REGISTRO= :Fecha WHERE ID_ESTUDIANTE= :Id");
		$statement->bindParam(':Id', $Id);
		$statement->bindParam(':Nombre', $Nombre);
		$statement->bindParam(':Apellido', $Apellido);
		$statement->bindParam(':Documento', $Documento);
		$statement->bindParam(':Correo', $Correo);
		$statement->bindParam(':Materia', $Materia);
		$statement->bindParam(':Docente', $Docente);
		$statement->bindParam(':Promedio', $Promedio);
		$statement->bindParam(':Fecha', $Fecha);

	if ($statement->execute()) {
				header('Location: ../Pages/index.php');
			}else{
				header('Location: ../Pages/edit.php');
			}

	}


	public function delete($Id){

		$statement = $this ->db-> prepare("DELETE FROM estudiantes WHERE ID_ESTUDIANTE= :Id");
		$statement->bindParam(':Id', $Id);

		if ($statement->execute()) {
				header('Location: ../Pages/index.php');
			}else{
				header('Location: ../Pages/delete.php');
			}

	}	

	public function search($Search){
		$rows=null;
		$statement = $this ->db-> prepare("SELECT ID_ESTUDIANTES, NOMBRE, APELLIDO, DOCUMENTO, CORREO, MATERIA, DOCENTE, PROMEDIO, FECHA_REGISTRO, FROM estudiantes WHERE NOMBRE LIKE concat('%', :Search, '%') OR  APELLIDO LIKE concat('%', :Search, '%') OR  DOCUMENTO LIKE concat('%', :Search, '%') OR  CORREO LIKE concat('%', :Search, '%')  OR  MATERIA LIKE concat('%', :Search, '%')  OR  DOCENTE LIKE concat('%', :Search, '%') ");
		$statement->bindParam(':Search', $Search);
		
		$statement->execute();
		while($result=$statement->fetch()){// se almacena un regitro por cada ciclo 
				$rows[]=$result;
		}
		return $rows;
	}

	
}

?>