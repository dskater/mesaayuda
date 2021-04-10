<?php
    include '../modelo/Estado.php';
    include '../control/ControlEstado.php';
    include '../control/ControlConexion.php';

    $idEstado =$_POST["txtIdEstado"];
    $nombre = $_POST["txtNombre"];
    $bot = $_POST["btn"];
switch ($bot) {
    case 'guardar':
        $objEstados = new Cargos($idEstado, $nombre);
        $objControlEstados = new ControlEstado($objEstados);
        $objControlEstados->guardar();
        break;

    case 'consultar':
        $objEstados = new Cargos($idEstado,"");
        $objControlEstados = new ControlEstado($objEstados);
        $objEstados = $objControlEstados->consultar();

        if($objEstados==null)
        {
            echo "No hay registros";
        }
        else
        {
            $nombre=$objEstados->getNombre();
        }

        break;

    case 'modificar':
        $objEstados = new Cargos($idEstado,"");
        $objControlEstados = new ControlEstado($objEstados);
        $objControlEstados->modificar();
        break;

    case 'borrar':
        $objEstados = new Cargos($idEstado,"");
        $objControlEstados = new ControlEstado($objEstados);
        $objControlEstados->borrar();
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
        <td>Identificacion del Estado</td>
        <td><input type="number" name="txtIdEstado" value="<?php echo "$idEstado" ?>"></td>
    </tr>
    <tr>
        <td>Nombre del Estado</td>
        <td><input type="text" name="txtNombre" value="<?php echo "$nombre" ?>"></td>
    </tr>
    <tr>

    </tr>
</table>
<table>

</body>
</html>
