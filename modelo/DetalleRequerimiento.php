<?php


Class DetalleRequerimiento{
    var $iddetalle;
    var $fecha;
    var $observacion;
    var $fkreq;
    var $fkestado;
    var $fkemple;
    var $fkempleAsignado;

    /**
     * DetalleRequerimiento constructor.
     * @param $iddetalle
     * @param $fecha
     * @param $observacion
     * @param $fkreq
     * @param $fkestado
     * @param $fkemple
     * @param $fkempleAsignado
     */
     function __construct($iddetalle, $fecha, $observacion, $fkreq, $fkestado, $fkemple, $fkempleAsignado)
    {
        $this->iddetalle = $iddetalle;
        $this->fecha = $fecha;
        $this->observacion = $observacion;
        $this->fkreq = $fkreq;
        $this->fkestado = $fkestado;
        $this->fkemple = $fkemple;
        $this->fkempleAsignado = $fkempleAsignado;
    }

    /**
     * @return mixed
     */
     function getIddetalle()
    {
        return $this->iddetalle;
    }

    /**
     * @param mixed $iddetalle
     */
     function setIddetalle($iddetalle)
    {
        $this->iddetalle = $iddetalle;
    }

    /**
     * @return mixed
     */
     function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
     function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
     function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * @param mixed $observacion
     */
     function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    }

    /**
     * @return mixed
     */
     function getFkreq()
    {
        return $this->fkreq;
    }

    /**
     * @param mixed $fkreq
     */
     function setFkreq($fkreq)
    {
        $this->fkreq = $fkreq;
    }

    /**
     * @return mixed
     */
     function getFkestado()
    {
        return $this->fkestado;
    }

    /**
     * @param mixed $fkestado
     */
     function setFkestado($fkestado)
    {
        $this->fkestado = $fkestado;
    }

    /**
     * @return mixed
     */
     function getFkemple()
    {
        return $this->fkemple;
    }

    /**
     * @param mixed $fkemple
     */
     function setFkemple($fkemple)
    {
        $this->fkemple = $fkemple;
    }

    /**
     * @return mixed
     */
     function getFkempleAsignado()
    {
        return $this->fkempleAsignado;
    }

    /**
     * @param mixed $fkempleAsignado
     */
     function setFkempleAsignado($fkempleAsignado)
    {
        $this->fkempleAsignado = $fkempleAsignado;
    }


}
