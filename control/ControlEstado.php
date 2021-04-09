<?php

class ControlEstado
{
	var $objEstados;

	function __construct($objEstados)
	{
		$this->objEstados = $objEstados;
	}

	function guardar()
	{
        $idEstado=$this->objEstados->getIdEstado();
		$nombre=$this->objEstados->getNombre();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "insert into cargo values('".$idEstado."','".$nombre."')";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();

	}

	function consultar()
	{
        $idEstado=$this->objEstados->getIdEstado();
		$nombre=$this->objEstados->getNombre();
        $objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from cargo where IDCARGO= '".$idEstado."'";
		$rs = $objControlConexion->ejecutarSelect($comandoSql);
		$registro = $rs->fetch_array(MYSQLI_BOTH);//Asigna los datos a la variable $registro
		
		if(is_null($registro))
		{
			return null;
		}
		
		else
		{
			$nombre = $registro["nombre"];
			$this->objEstados->setNombre($nombre);

			$objControlConexion->cerrarBd();
	
			return $this->objEstados;
		}

	}

	function modificar()
	{
        $idEstado=$this->objEstados->getIdEstado();
		$nombre=$this->objEstados->getNombre();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "update cargo set NOMBRE = '".$nombre."' where IDCARGO = '".$idEstado."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();

	}

	function borrar()
	{
        $idEstado=$this->objEstados->getIdEstado();
		$nombre=$this->objEstados->getNombre();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from cargo where IDESTADO = '".$idEstado."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();

	}
}
	
?>