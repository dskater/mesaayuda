<?php

class ControlRequerimientos
{
	var $objRequerimientos;

	function __construct($objRequerimientos)
	{
		$this->objRequerimientos = $objRequerimientos;
	}

	function guardar()
	{
		$idReq=$this->objRequerimientos->getIdReq();
		$fkArea=$this->objRequerimientos->getFkArea();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "insert into requerimiento values('".$idReq."','".$fkArea."')";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();

	}

	function consultar()
	{
		$idReq=$this->objRequerimientos->getIdReq();
		$fkArea=$this->objRequerimientos->getFkArea();
		

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from requerimiento where IDREQ= '".$idReq."'";
		$rs = $objControlConexion->ejecutarSelect($comandoSql);
		$registro = $rs->fetch_array(MYSQLI_BOTH);//Asigna los datos a la variable $registro
		
		if(is_null($registro))
		{
			return null;
		}
		
		else
		{
			$nombre = $registro["FKAREA"];

			$this->objAreas->setNombre($fkArea);

			$objControlConexion->cerrarBd();
	
			return $this->objAreas;
		}


	}

	function modificar()
	{
		$idReq=$this->objRequerimientos->getIdReq();
		$fkArea=$this->objRequerimientos->getFkArea();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "update requerimiento set FKAREA = '".$fkArea."'  where IDREQ = '".$idReq."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();

	}

	function borrar()
	{
		$idReq=$this->objRequerimientos->getIdReq();
		$fkArea=$this->objRequerimientos->getFkArea();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from requerimiento where IDREQ = '".$idReq."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();

	}
}
	
?>