<?php

/*Actulizacion de datos*/

class ControlEmpleados
{
	var $objEmpleados;

	function __construct($objEmpleados)
	{
		$this->objEmpleados = $objEmpleados;
	}

	function guardar()
	{
		$idEmpleado=$this->objEmpleados->getIdEmpleado();
		$nombre=$this->objEmpleados->getNombre();
        $foto=$this->objEmpleados->getFoto();
        $hojaVida=$this->objEmpleados->getHojaVida();
		$telefono=$this->objEmpleados->getTelefono();
        $email=$this->objEmpleados->getEmail();
        $direccion=$this->objEmpleados->getDireccion();
        $x=$this->objEmpleados->getX();
        $y=$this->objEmpleados->getY();
        $fkEmple_Jefe=$this->objEmpleados->getFkEmple_Jefe();
        $fkArea=$this->objEmpleados->getFkArea();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "insert into empleado values('".$idEmpleado."','".$nombre."', '".$foto."', '".$hojaVida."', '".$telefono."', '".$email."', '".$direccion."', '".$x."', '".$y."', '".$fkEmple_Jefe."', '".$fkArea."')";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();

	}

	function consultar()
	{
		$idEmpleado=$this->objEmpleados->getIdEmpleado();
		$nombre=$this->objEmpleados->getNombre();
        $foto=$this->objEmpleados->getFoto();
        $hojaVida=$this->objEmpleados->getHojaVida();
		$telefono=$this->objEmpleados->getTelefono();
        $email=$this->objEmpleados->getEmail();
        $direccion=$this->objEmpleados->getDireccion();
        $x=$this->objEmpleados->getX();
        $y=$this->objEmpleados->getY();
        $fkEmple_Jefe=$this->objEmpleados->getFkEmple_Jefe();
        $fkArea=$this->objEmpleados->getFkArea();
		

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from empleado where IDEMPLEADO= '".$idEmpleado."'";
		$rs = $objControlConexion->ejecutarSelect($comandoSql);
		$registro = $rs->fetch_array(MYSQLI_BOTH);//Asigna los datos a la variable $registro
		
		if(is_null($registro))
		{
			return null;
		}
		
		else
		{
			$nombre = $registro["NOMBRE"];
			$foto = $registro["FOTO"];
			$hojaVida = $registro["HOJAVIDA"];
			$telefono = $registro["TELEFONO"];
			$email = $registro["EMAIL"];
			$direccion = $registro["DIRECCION"];
			$x = $registro["X"];
			$y = $registro["Y"];
			$fkEmple_Jefe = $registro["fkEMPLE_JEFE"];
            $fkArea = $registro["fkAREA"];

			$this->objEmpleados->setNombre($nombre);
			$this->objEmpleados->setFoto($foto);
			$this->objEmpleados->setHojaVida($hojaVida);
			$this->objEmpleados->setTelefono($telefono);
			$this->objEmpleados->setEmail($email);
			$this->objEmpleados->setDireccion($direccion);
			$this->objEmpleados->setX($x);
			$this->objEmpleados->setY($y);
			$this->objEmpleados->setFkEmple_Jefe($fkEmple_Jefe);
            $this->objEmpleados->setfkArea($fkArea);

			$objControlConexion->cerrarBd();
	
			return $this->objEmpleados;
		}
		
	}

	function modificar()
	{
		$idEmpleado=$this->objEmpleados->getIdEmpleado();
		$nombre=$this->objEmpleados->getNombre();
        $foto=$this->objEmpleados->getFoto();
        $hojaVida=$this->objEmpleados->getHojaVida();
		$telefono=$this->objEmpleados->getTelefono();
        $email=$this->objEmpleados->getEmail();
        $direccion=$this->objEmpleados->getDireccion();
        $x=$this->objEmpleados->getX();
        $y=$this->objEmpleados->getY();
        $fkEmple_Jefe=$this->objEmpleados->getFkEmple_Jefe();
        $fkArea=$this->objEmpleados->getFkArea();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "update empleado set NOMBRE = '".$nombre."', FOTO = '".$foto."', HOJAVIDA = '".$hojaVida."', TELEFONO = '".$telefono."', EMAIL = '".$email."', DIRECCION = '".$direccion."', X = '".$x."', Y = '".$y."', fkEMPLE_JEFE = '".$fkEmple_Jefe."', fkAREA = '".$fkArea."'  where IDEMPLEADO = '".$idEmpleado."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();

	}

	function borrar()
	{
		$idEmpleado=$this->objEmpleados->getIdEmpleado();
		$nombre=$this->objEmpleados->getNombre();
        $foto=$this->objEmpleados->getFoto();
        $hojaVida=$this->objEmpleados->getHojaVida();
		$telefono=$this->objEmpleados->getTelefono();
        $email=$this->objEmpleados->getEmail();
        $direccion=$this->objEmpleados->getDireccion();
        $x=$this->objEmpleados->getX();
        $y=$this->objEmpleados->getY();
        $fkEmple_Jefe=$this->objEmpleados->getFkEmple_Jefe();
        $fkArea=$this->objEmpleados->getFkArea();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from empleado where IDEMPLEADO = '".$idEmpleado."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();

	}
}
	
?>