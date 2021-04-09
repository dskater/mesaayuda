<?php
class Estado
{
    var $idEstado;
    var $nombre;

    function __construct($idCargo, $nombre)
    {
        $this->idEstado=$idCargo;
        $this->nombre=$nombre;
    }

    function setIdEstado($idEstado)
    {
        $this->idEstado=$idEstado;
    }

    function getIdEstado()
    {
        return $this->idEstado;
    }

    function setNombre($nombre)
    {
        $this->nombre=$nombre;
    }

    function getNombre()
    {
        return $this->nombre;
    }
}
