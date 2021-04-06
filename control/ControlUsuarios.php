<?php

    class ControlUsuarios
    {
        var $objUsuarios;

        function __construct($objUsuarios)
        {
            $this->objUsuarios = $objUsuarios;
        }

        function guardar()
        {
            $username=$this->objUsuarios->getUsername();
            $password=$this->objUsuarios->getPassword();
    
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
            $comandoSql = "insert into usuario values('".$username."','".$password."')";
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function consultar()
        {
            $username=$this->objUsuarios->getUsername();
            $password=$this->objUsuarios->getPassword();
            

            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
            $comandoSql = "select * from usuario where username= '".$username."' and password = '".$password."'";
            $rs = $objControlConexion->ejecutarSelect($comandoSql);
            $registro = $rs->fetch_array(MYSQLI_BOTH);//Asigna los datos a la variable $registro
            
            $username = $registro["username"];
            $password = $registro["password"];

            $this->objUsuarios->setUsername($username);
            $this->objUsuarios->setPassword($password);

            objControlConexion->cerrarBd();

            return $this->objUsuarios;
        }


        function modificar()
        {
            $username=$this->objUsuarios->getUsername();
            $password=$this->objUsuarios->getPassword();
    
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
            $comandoSql = "update usuario set password = '".$password."' where username = '".$username."'";
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar()
        {
            $username=$this->objUsuarios->getUsername();
            $password=$this->objUsuarios->getPassword();
    
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
            $comandoSql = "delete from usuarios where username = '".$username."'";
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }


    }

?>