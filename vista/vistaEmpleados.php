<?php
	include '../modelo/Empleados.php';
    include '../modelo/Areas.php';
    include '../control/ControlEmpleados.php';
    include '../control/ControlConexion.php';


	$idEmpleado = $_POST["txtIdEmpleado"];
	$nombre = $_POST["txtNombre"];
	$telefono = $_POST["txtTelefono"];
	$fkArea = $_POST["txtFkIdArea"];
    $foto = $_POST["txtFoto"];
    $hojaVida = $_POST["txtHojaVida"];
    $email= $_POST["txtEmail"];
    $direccion= $_POST["txtDireccion"];
    $x= $_POST["txtX"];
    $y= $_POST["txtY"];
    $fkEmple_Jefe= $_POST["txtFkEmple_Jefe"];



	$bot = $_POST["btn"];

	switch ($bot) {
		case 'guardar':
		$objEmpleados = new Empleados($idEmpleado, $nombre, $foto, $hojaVida,$telefono,$email,$direccion,$x,$y,
            $fkEmple_Jefe, $fkArea);
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objControlEmpleados->guardar();
		break;
		case 'consultar':
		$objEmpleados = new Empleados($idEmpleado, $nombre, $foto, $hojaVida,$telefono,$email,$direccion,$x,$y,
            $fkEmple_Jefe, $fkArea);
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objEmpleados = $objControlEmpleados->consultar();
		if($objEmpleados==null)
		{
			echo "No hay registros";
		}
		else
		{
			$nombre=$objEmpleados->getNombre();
			$foto=$objEmpleados->getFoto();
			$hojaVida=$objEmpleados->getHojaVida();
            $telefono=$objEmpleados->getTelefono();
            $email=$objEmpleados->getEmail();
            $direccion=$objEmpleados->getDireccion();
            $x=$objEmpleados->getX();
            $y=$objEmpleados->getY();
            $fkEmple_Jefe=$objEmpleados->getFkEmple_Jefe();
            $fkArea=$objEmpleados->getFkArea();


		}
		break;
		case 'modificar':
		$objEmpleados =  new Empleados($idEmpleado, $nombre, $foto, $hojaVida,$telefono,$email,$direccion,$x,$y,
            $fkEmple_Jefe, $fkArea);
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objControlEmpleados->modificar();
		break;
		case 'borrar':
		$objEmpleados = new Empleados($idEmpleado,"","","","","","","",
            "","","");
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
        <td>Id Empleado</td>
        <td><input type="text" name="txtIdEmpleado" value="<?php echo "$idEmpleado"?>"></td>
    </tr>
    <tr>
        <td>Nombre</td>
        <td><input type="text" name="txtNombre" value="<?php echo "$nombre" ?>"></td>
    </tr>
    <tr>
        <td>Foto</td>
        <td><input type="text" name="txtFoto" value="<?php echo "$foto" ?>"></td>
    </tr>
    <tr>

        <td>Teléfono</td>
        <td><input type="text" name="txtTelefono" value="<?php echo "$telefono" ?>"></td>
    </tr>
    <tr>
        <td>Hoja de vida</td>
        <td><input type="text" name="txtHojaVida" value="<?php echo "$hojaVida" ?>"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="email" name="txtEmail" value="<?php echo "$email" ?>"></td>
    </tr>
    <tr>
        <td>Direccion</td>
        <td><input type="text" name="txtDireccion" value="<?php echo "$direccion" ?>"></td>
    </tr>
    <tr>
        <td>Longitud</td>
        <td><input type="text" name="txtX" value="<?php echo "$x" ?>"></td>
    </tr>
    <tr>
        <td>Latitud</td>
        <td><input type="text" name="txtY" value="<?php echo "$y" ?>"></td>
    </tr>

    <tr>
        <td>id Empleado Jefe</td>
        <td><input type="number" name="txtFkEmple_Jefe" value="<?php echo "$fkEmple_Jefe" ?>"></td>
    </tr>
    <tr>

        <td>id Area</td>
        <td><input type="number" name="txtFkIdArea" value="<?php echo "$fkArea" ?>">Accion Exitosa <br><a href="empleados.html">Volver a Empleados</a></td>
    </tr>

</table>
</body>
</html>