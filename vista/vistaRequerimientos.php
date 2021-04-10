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
        $id = $objControlRequerimientos->consultarUltimoId(); //obtiene el id que se guardó

        ////////////////////////////////////////////////////////////////////
 ///////////////////////////////DETALLLEEE
        $objDetalleReq = new DetalleReq($idDetalle, $fecha, $observacion, $id, $fkEstado, $fkEmple, $fkEmpleAsignado);
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
            $objDetalleReq = new DetalleReq("","","",$idRequerimiento,"","","");
            $objControlDetalleReq = new ControlDetalleReq($objDetalleReq);
            $objDetalleReq = $objControlDetalleReq->consultarporidreq();
            $fkArea=$objRequerimientos->getFkArea();
            if ($objDetalleReq==null){
                echo "No hay registros en el Detalle";
            }else
            {
                $fecha = $objDetalleReq->getFecha();
                $observacion = $objDetalleReq->getObservacion();
                $fkEstado = $objDetalleReq->getFkEstado();
                $fkEmple = $objDetalleReq->getFkEmple();
                $fkEmpleAsignado = $objDetalleReq->getFkEmpleAsignado();
            }

		}
		
		break;

		case 'modificar':
		$objRequerimientos = new Requerimientos($idRequerimiento, $fkArea);
		$objControlRequerimientos = new ControlRequerimientos($objRequerimientos);
		$objControlRequerimientos->modificar();

		$objDetalleReq = new DetalleReq($idDetalle, $fecha, $observacion, $idRequerimiento, $fkEstado, $fkEmple, $fkEmpleAsignado);
		$objControlDetalleReq = new ControlDetalleReq($objDetalleReq);
		$objControlDetalleReq->modificar();
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

<table border="1">
            <tr>
                <td>Identificacion del Requerimiento</td>
                <td><input type="text" name="txtIdRequerimiento" value="<?php echo "$idRequerimiento" ?>"></td>
            </tr>
            <tr>
                <td>Identificacion del Area</td>
                <td><input type="text" name="txtFkArea" value="<?php echo "$fkArea" ?>">
                </td>
            </tr>

        </table>
<table>
    <tr>
        <td>Id Detalle del Requerimiento</td>
        <td><input type="text" name="txtIdDetalle" value="<?php echo "$idDetalle" ?>"></td>
    </tr>
    <tr>
        <td>Fecha</td>
        <td><input type="text" name="txtFecha" value="<?php echo "$fecha" ?>"></td>
    </tr>
    <tr>
        <td>Observacion</td>
        <td><input type="text" name="txtObservacion" value="<?php echo "$observacion" ?>"></td>
    </tr>
    <tr>

        <td>Id del Requerimiento</td>
        <td><input type="text" name="txtFkReq" value="<?php echo "$fkReq" ?>"></td>
    </tr>
    <tr>
        <td>Id Estado</td>
        <td><input type="text" name="txtFkEstado" value="<?php echo "$fkEstado" ?>"></td>
    </tr>
    <tr>
        <td>Id del Empleado</td>
        <td><input type="email" name="txtFkEmple" value="<?php echo "$fkEmple" ?>"></td>
    </tr>
    <tr>
        <td>Id Empleado Asignado</td>
        <td><input type="text" name="txtFkEmpleAsignado" value="<?php echo "$fkEmpleAsignado" ?>">Accion Exitosa <br><a href="requerimientos.html">Volver a Requerimientos</a></td>
    </tr>

</table>

</body>
</html>