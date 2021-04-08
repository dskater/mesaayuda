<?php

class ControlCargos
{
	var $objCargos;

	function __construct($objCargos)
	{
		$this->objCargos = $objCargos;
	}

	function guardar()
	{
		$idCargo=$this->objCargos->getIdCargo();
		$nombre=$this->objCargos->getNombre();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "insert into cargo values('".$idCargo."','".$nombre."')";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();

	}

	function consultar()
	{
		$idCargo=$this->objCargos->getIdCargo();
		$nombre=$this->objCargos->getNombre();
        $objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from cargo where IDCARGO= '".$idCargo."'";
		$rs = $objControlConexion->ejecutarSelect($comandoSql);
		$registro = $rs->fetch_array(MYSQLI_BOTH);//Asigna los datos a la variable $registro
		
		if(is_null($registro))
		{
			return null;
		}
		
		else
		{
			$nombre = $registro["nombre"];
			$this->objCargos->setNombre($nombre);

			$objControlConexion->cerrarBd();
	
			return $this->objCargos;
		}


	}

	function modificar()
	{
		$idCargo=$this->objCargos->getidCargo();
		$nombre=$this->objCargos->getNombre();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "update cargo set NOMBRE = '".$nombre."' where IDCARGO = '".$idCargo."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();

	}

	function borrar()
	{
		$idCargo=$this->objCargos->getidCargo();
		$nombre=$this->objCargos->getNombre();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from cargo where IDCARGO = '".$idCargo."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();

	}
}
	
?>