<?php

    class DetalleReq
    {
        var $idDetalle;
        var $fecha;
        var $observacion;
        var $fkReq;
        var $fkEstado;
        var $fkEmple;
        var $fkEmpleAsignado;

        function __construct($idDetalle, $fecha, $observacion, $fkReq, $fkEstado, $fkEmple, $fkEmpleAsignado)
        {
            $this->idDetalle=$idDetalle;
            $this->fecha=$fecha;
            $this->observacion=$observacion;
            $this->fkReq=$fkReq;
            $this->fkEstado=$fkEstado;
            $this->fkEmple=$fkEmple;
            $this->fkEmpleAsignado=$fkEmpleAsignado;
        }

        function setIdDetalle($idDetalle)
        {
            $this->idDetalle=$idDetalle;
        }

        function getIdDetalle()
        {
            return $this->idDetalle;
        }

        function setFecha($fecha)
        {
            $this->fecha=$fecha;
        }

        function getFecha()
        {
            return $this->fecha;
        }

        function setObservacion($observacion)
        {
            $this->observacion=$observacion;
        }

        function getObservacion()
        {
            return $this->observacion;
        }

        function setFkReq($fkReq)
        {
            $this->fkReq=$fkReq;
        }

        function getFkReq()
        {
            return $this->fkReq;
        }

        function setFkEstado($fkEstado)
        {
            $this->fkEstado=$fkEstado;
        }

        function getFkEstado()
        {
            return $this->fkEstado;
        }
        
        function setFkEmple($fkEmple)
        {
            $this->fkEmple=$fkEmple;
        }

        function getFkEmple()
        {
            return $this->fkEmple;
        }

        function setFkEmpleAsignado($fkEmpleAsignado)
        {
            $this->fkEmpleAsignado=$fkEmpleAsignado;
        }

        function getFkEmpleAsignado()
        {
            return $this->fkEmpleAsignado;
        }


    }


?>