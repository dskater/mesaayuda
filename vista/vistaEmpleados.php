<?php
	include '../modelo/Empleados.php';
    include '../modelo/Areas.php';
    include '../control/ControlEmpleados.php';
    include '../control/ControlConexion.php';

	$idEmpleado = $_POST["txtIdEmpleado"];
	$nombre = $_POST["txtNombre"];
	$telefono = $_POST["txtTelefono"];
    $fkIdArea = $_POST["txtFkIdArea"];


	$bot = $_POST["btn"];

	switch ($bot) {
		case 'guardar':
		$objEmpleados = new Empleados($idEmpleado, $nombre, $telefono, $fkIdArea);
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objControlEmpleados->guardar();
		break;

		case 'consultar':
		$objEmpleados = new Empleados($idEmpleado,"","",0);
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objEmpleados = $objControlEmpleados->consultar();


		if($objEmpleados==null)
		{
			echo "No hay registros";
		}

		else
		{
			$nombre=$objEmpleados->getNombre();
			$telefono=$objEmpleados->getTelefono();
			$fkIdArea=$objEmpleados->getFkIdArea();

		}

		break;



		case 'modificar':
		$objEmpleados = new Empleados($idEmpleado, $nombre, $telefono, $fkIdArea);
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objControlEmpleados->modificar();
		break;

		case 'borrar':
		$objEmpleados = new Empleados($idEmpleado,"","",0);
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objControlEmpleados->borrar();
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
                <td>Identificacion del Empleado</td>
                <td><input type="text" name="txtIdEmpleado" value="<?php echo "$idEmpleado" ?>"></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="txtNombre" value="<?php echo "$nombre" ?>"></td>
            </tr>
			<tr>
                <td>Telefono</td>
                <td><input type="text" name="txtTelefono" value="<?php echo "$telefono" ?>"></td>
            </tr>
			<tr>
                <td>FkIdArea</td>
                <td><input type="text" name="txtFkIdArea" value="<?php echo "$fkIdArea" ?>">Accion Exitosa <br><a href="empleados.html">Volver a Empleados</a></td>
            </tr>
        </table>
        <table>
</body>
</html>