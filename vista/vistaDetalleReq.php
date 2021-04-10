<?php

include '../modelo/Requerimientos.php';
include '../modelo/DetalleReq.php';
include '../control/ControlRequerimientos.php';
include '../control/ControlConexion.php';
include '../control/ControlDetalleReq.php';


$idDetalle = $_POST["txtIdDetalle"];
	$fecha = $_POST["txtFecha"];
    $observacion = $_POST["txtObservacion"];
    $fkReq = $_POST["txtFkReq"];
    $fkEstado = $_POST["txtFkEstado"];
    $fkEmple = $_POST["txtFkEmple"];
    $fkEmpleAsignado = $_POST["txtFkEmpleAsignado"];
	

    $bot2 = $_POST["btn"];

	switch ($bot2) {
		case 'guardar':
		$objDetalleReq = new DetalleReq($idDetalle, $fecha, $observacion, $fkReq, $fkEstado, $fkEmple, $fkEmpleAsignado);
		$objControlDetalleReq = new ControlDetalleReq($objDetalleReq);
		$objControlDetalleReq->guardar();
		break;

		case 'consultar':
		$objDetalleReq = new DetalleReq($idDetalle, $fecha, $observacion, $fkReq, $fkEstado, $fkEmple, $fkEmpleAsignado);
		$objControlDetalleReq = new ControlDetalleReq($objDetalleReq);
		$objDetalleReq = $objControlDetalleReq->consultar();
		
		if($objDetalleReq==null)
		{
			echo "No hay registros";
		}
		else
		{
            $fecha=$objDetalleReq->getFecha();
			$observacion=$objDetalleReq->getObservacion();
			$fkReq=$objDetalleReq->getFkReq();
            $fkEstado=$objDetalleReq->getFkEstado();
			$fkEmple=$objDetalleReq->getFkEmple();
			$fkEmpleAsignado=$objDetalleReq->getFkEmpleAsignado();
		}
		
		break;

		case 'modificar':
		$objDetalleReq = new DetalleReq($idDetalle, $fecha, $observacion, $fkReq, $fkEstado, $fkEmple, $fkEmpleAsignado);
		$objControlDetalleReq = new ControlDetalleReq($objDetalleReq);
		$objControlDetalleReq->modificar();
		break;

		case 'borrar':
		$objDetalleReq = new DetalleReq($idDetalle,"","","","","","");
		$objControlDetalleReq = new ControlDetalleReq($objDetalleReq);
		$objControlDetalleReq->borrar();
		break;
		
		default:
			# code...
			break;
	}

    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
            <tr>
                <td>Id Detalle del Requerimiento</td>
                <td><input type="text" name="txtIdDetalle" value=""></td>
            </tr>
            <tr>
                <td>Fecha</td>
                <td><input type="text" name="txtFecha" value=""></td>
            </tr>
            <tr>
                <td>Observacion</td>
                <td><input type="text" name="txtObservacion" value=""></td>
            </tr>
            <tr>

                <td>Id del Requerimiento</td>
                <td><input type="text" name="txtFkReq" value=""></td>
            </tr>
            <tr>
                <td>Id Estado</td>
                <td><input type="text" name="txtFkEstado" value=""></td>
            </tr>
            <tr>
                <td>Id del Empleado</td>
                <td><input type="email" name="txtFkEmple" value=""></td>
            </tr>
            <tr>
                <td>Id Empleado Asignado</td>
                <td><input type="text" name="txtFkEmpleAsignado" value="">Accion Exitosa <br><a href="requerimientos.html">Volver a Requerimientos</a></td>
            </tr>
            
        </table>
    
</body>
</html>




