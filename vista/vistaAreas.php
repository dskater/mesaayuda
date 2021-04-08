<?php
	include '../modelo/Areas.php';
    include '../control/ControlAreas.php';
    include '../control/ControlConexion.php';

	$idArea = $_POST["txtIdArea"];
	$nombreArea = $_POST["txtNombreArea"];

	$bot = $_POST["btn"];

	switch ($bot) {
		case 'guardar':
		$objAreas = new Areas($idArea, $nombreArea);
		$objControlAreas = new ControlAreas($objAreas);
		$objControlAreas->guardar();
		break;

		case 'consultar':
		$objAreas = new Areas($idArea,"");
		$objControlAreas = new ControlAreas($objAreas);
		$objAreas = $objControlAreas->consultar();
		
		if($objAreas==null)
		{
			echo "No hay registros";
		}
		else
		{
			$nombreArea=$objAreas->getNombreArea();
		}
		
		break;

		case 'modificar':
		$objAreas = new Areas($idArea, $nombreArea);
		$objControlAreas = new ControlAreas($objAreas);
		$objControlAreas->modificar();
		break;

		case 'borrar':
		$objAreas = new Areas($idArea,"");
		$objControlAreas = new ControlAreas($objAreas);
		$objControlAreas->borrar();
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
<table>
            <tr>
                <td>Identificacion del Area</td>
                <td><input type="text" name="txtIdArea" value="<?php echo "$idArea" ?>"></td>
            </tr>
            <tr>
                <td>Nombre del area</td>
                <td><input type="text" name="txtNombreArea" value="<?php echo "$nombreArea" ?>">Accion Exitosa <br><a href="areas.html">Volver a Areas</a></td>
            </tr>
        </table>
        <table>
</body>
</html>