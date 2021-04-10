<?php

/*Actulizacion de datos*/

class ControlDetalleReq
{
	var $objDetalleReq;

	function __construct($objDetalleReq)
	{
		$this->objDetalleReq = $objDetalleReq;
	}

	function guardar()
	{
		$idDetalle=$this->objDetalleReq->getIdDetalle();
		$fecha=$this->objDetalleReq->getFecha();
        $observacion=$this->objDetalleReq->getObservacion();
        $fkReq=$this->objDetalleReq->getFkReq();
		$fkEstado=$this->objDetalleReq->getFkEstado();
        $fkEmple=$this->objDetalleReq->getFkEmple();
        $fkEmpleAsignado=$this->objDetalleReq->getFkEmpleAsignado();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "insert into detallereq values('".$idDetalle."','".$fecha."', '".$observacion."', '".$fkReq."', '".$fkEstado."', '".$fkEmple."', '".$fkEmpleAsignado."')";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();

	}

	function consultar()
	{
		$idDetalle=$this->objDetalleReq->getIdDetalle();
		$fecha=$this->objDetalleReq->getFecha();
        $observacion=$this->objDetalleReq->getObservacion();
        $fkReq=$this->objDetalleReq->getFkReq();
		$fkEstado=$this->objDetalleReq->getFkEstado();
        $fkEmple=$this->objDetalleReq->getFkEmple();
        $fkEmpleAsignado=$this->objDetalleReq->getFkEmpleAsignado();
		

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from detallereq where IDDETALLE= '".$idDetalle."'";
		$rs = $objControlConexion->ejecutarSelect($comandoSql);
		$registro = $rs->fetch_array(MYSQLI_BOTH);//Asigna los datos a la variable $registro
		
		if(is_null($registro))
		{
			return null;
		}
		
		else
		{
			$fecha = $registro["FECHA"];
			$observacion = $registro["OBSERVACION"];
			$fkReq = $registro["FKREQ"];
			$fkEstado = $registro["FKESTADO"];
			$fkEmple = $registro["FKEMPLE"];
			$fkEmpleAsignado = $registro["FKEMPLEASIGNADO"];

			$this->objDetalleReq->setFecha($fecha);
			$this->objDetalleReq->setObservacion($observacion);
			$this->objDetalleReq->setFkReq($fkReq);
			$this->objDetalleReq->setFkEstado($fkEstado);
			$this->objDetalleReq->setFkEmple($fkEmple);
			$this->objDetalleReq->setFkEmpleAsignado($fkEmpleAsignado);


			$objControlConexion->cerrarBd();
	
			return $this->objDetalleReq;
		}
		
	}

	function modificar()
	{
		$idDetalle=$this->objDetalleReq->getIdDetalle();
		$fecha=$this->objDetalleReq->getFecha();
        $observacion=$this->objDetalleReq->getObservacion();
        $fkReq=$this->objDetalleReq->getFkReq();
		$fkEstado=$this->objDetalleReq->getFkEstado();
        $fkEmple=$this->objDetalleReq->getFkEmple();
        $fkEmpleAsignado=$this->objDetalleReq->getFkEmpleAsignado();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "update detallereq set FECHA = '".$fecha."', OBSERVACION = '".$observacion."', FKREQ  = '".$fkReq."', FKESTADO  = '".$fkEstado."', FKEMPLE  = '".$fkEmple."', FKEMPLEASIGNADO  = '".$fkEmpleAsignado."'  where IDDETALLE  = '".$idDetalle."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();

	}

	function borrar()
	{
		$idDetalle=$this->objDetalleReq->getIdDetalle();
		$fecha=$this->objDetalleReq->getFecha();
        $observacion=$this->objDetalleReq->getObservacion();
        $fkReq=$this->objDetalleReq->getFkReq();
		$fkEstado=$this->objDetalleReq->getFkEstado();
        $fkEmple=$this->objDetalleReq->getFkEmple();
        $fkEmpleAsignado=$this->objDetalleReq->getFkEmpleAsignado();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from detallereq where IDDETALLE = '".$idDetalle."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();

	}
}
	
?>