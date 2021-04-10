<?php
	include '../modelo/Requerimientos.php';
    include '../modelo/DetalleReq.php';
    include '../control/ControlRequerimientos.php';
    include '../control/ControlConexion.php';
    include '../control/ControlDetalleReq.php';


	$idRequerimiento = $_POST["txtIdRequerimiento"];
	$fkArea = $_POST["txtFkArea"];
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///DETALLLLEEEEEEEE


    $idDetalle = $_POST["txtIdDetalle"];
    $fecha = $_POST["txtFecha"];
    $observacion = $_POST["txtObservacion"];
    $fkReq = $_POST["txtFkReq"];
    $fkEstado = $_POST["txtFkEstado"];
    $fkEmple = $_POST["txtFkEmple"];
    $fkEmpleAsignado = $_POST["txtFkEmpleAsignado"];

	$bot = $_POST["btn"];

	switch ($bot) {
		case 'guardar':
		$objRequerimientos = new Requerimientos($idRequerimiento, $fkArea);
		$objControlRequerimientos = new ControlRequerimientos($objRequerimientos);
        $objControlRequerimientos->guardar();
        ////////////////////////////////////////////////////////////////////
 ///////////////////////////////DETALLLEEE

        $objDetalleReq = new DetalleReq($idDetalle, $fecha, $observacion, $fkReq, $fkEstado, $fkEmple, $fkEmpleAsignado);
        $objControlDetalleReq = new ControlDetalleReq($objDetalleReq);
        $objControlDetalleReq->guardar();
		
		break;

		case 'consultar':
		$objRequerimientos = new Requerimientos($idRequerimiento,"");
		$objControlRequerimientos = new ControlRequerimientos($objRequerimientos);
		$objRequerimientos = $objControlRequerimientos->consultar();
		
		if($objRequerimientos==null)
		{
			echo "No hay registros";
		}
		else
		{
			$fkArea=$objRequerimientos->getFkArea();
		}
		
		break;

		case 'modificar':
		$objRequerimientos = new Requerimientos($idRequerimiento, $fkArea);
		$objControlRequerimientos = new ControlRequerimientos($objRequerimientos);
		$objControlRequerimientos->modificar();
		break;

		case 'borrar':
		$objRequerimientos = new Requerimientos($idRequerimiento,"");
		$objControlRequerimientos = new ControlRequerimientos($objRequerimientos);
		$objControlRequerimientos->borrar();
		break;
		
		default:
			# code...
			break;
	}

    
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<h1 align="center">REQUERIMIENTOS</h1>
<table>
            <tr>
                <td>Identificacion del Requerimiento</td>
                <td><input type="text" name="txtIdRequerimiento" value="<?php echo "$idRequerimiento" ?>"></td>
            </tr>
            <tr>
                <td>Identificacion del Area</td>
                <td><input type="text" name="txtFkArea" value="<?php echo "$fkArea" ?>">Accion Exitosa <br><a href="requerimientos.html">Volver a Requerimientos</a></td>
            </tr>
            <td>
                <a href="detalleReq.html">Ir al Detalle del Requerimiento</a>
            </td>
        </table>
        <table>
</body>
</html>