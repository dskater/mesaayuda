<?php

    class Requerimientos
    {
        var $idReq;
        var $fkArea;

        function __construct($idReq, $fkArea)
        {
            $this->idReq=$;
            $this->fkArea;
        }

        function setIdReq($idReq)
        {
            $this->idReq=$idReq;
        }

        function getIdReq()
        {
            return $this->idReq;
        }

        function setFkArea($fkArea)
        {
            $this->fkArea=$fkArea;
        }

        function getfkArea()
        {
            return $this->fkArea;
        }


    }


?>