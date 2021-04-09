<?php
    include '../modelo/Cargos.php';
    include '../control/ControlCargos.php';
    include '../control/ControlConexion.php';

    $idCargo =$_POST["txtIdCargo"];
    $nombre = $_POST["txtNombre"];
    $bot = $_POST["btn"];
switch ($bot) {
    case 'guardar':
        $objCargos = new Estado($idCargo, $nombre);
        $objControlCargos = new ControlCargos($objCargos);
        $objControlCargos->guardar();
        break;

    case 'consultar':
        $objCargos = new Estado($idCargo,"");
        $objControlCargos = new ControlCargos($objCargos);
        $objCargos = $objControlCargos->consultar();

        if($objCargos==null)
        {
            echo "No hay registros";
        }
        else
        {
            $nombre=$objCargos->getNombre();
        }

        break;

    case 'modificar':
        $objCargos = new Estado($idCargo,"");
        $objControlCargos = new ControlCargos($objCargos);
        $objControlCargos->modificar();
        break;

    case 'borrar':
        $objCargos = new Estado($idCargo,"");
        $objControlCargos = new ControlCargos($objCargos);
        $objControlCargos->borrar();
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
    <title>Cargos</title>
</head>
<body>
<table>
    <tr>
        <td>Identificacion del Cargo</td>
        <td><input type="text" name="txtIdCargo" value="<?php echo "$idCargo" ?>"></td>
    </tr>
    <tr>
        <td>Nombre del Cargo</td>
        <td><input type="text" name="txtNombre" value="<?php echo "$nombre" ?>"></td>
    </tr>
    <tr>

    </tr>
</table>
<table>

</body>
</html>

