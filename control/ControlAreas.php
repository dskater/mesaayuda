<?php

class ControlAreas
{
	var $objAreas;

	function __construct($objAreas)
	{
		$this->objAreas = $objAreas;
	}

	function guardar()
	{
		$idArea=$this->objAreas->getIdArea();
		$nombre=$this->objAreas->getNombre();
        $fkEmple=$this->objAreas->getFkEmple();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "insert into area values('".$idArea."','".$nombre."', ".$fkEmple.")";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();

	}

	function consultar()
	{
		$idArea=$this->objAreas->getIdArea();
		$nombre=$this->objAreas->getNombre();
        $fkEmple=$this->objAreas->getFkEmple();
		

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from area where IDAREA= '".$idArea."'";
		$rs = $objControlConexion->ejecutarSelect($comandoSql);
		$registro = $rs->fetch_array(MYSQLI_BOTH);//Asigna los datos a la variable $registro
		
		if(is_null($registro))
		{
			return null;
		}
		
		else
		{
			$nombre = $registro["NOMBRE"];
            $fkEmple = $registro["FKEMPLE"];
			$this->objAreas->setNombre($nombre);
            $this->objAreas->setFkEmple($fkEmple);

			$objControlConexion->cerrarBd();
	
			return $this->objAreas;
		}


	}

	function modificar()
	{
		$idArea=$this->objAreas->getIdArea();
		$nombre=$this->objAreas->getNombre();
        $fkEmple=$this->objAreas->getFkEmple();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "update area set NOMBRE = '".$nombre."', FKEMPLE = '".$fkEmple."'  where idArea = '".$idArea."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();

	}

	function borrar()
	{
		$idArea=$this->objAreas->getIdArea();
		$nombre=$this->objAreas->getNombre();
        $fkEmple=$this->objAreas->getFkEmple();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from area where idArea = '".$idArea."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();

	}
}
	
?>