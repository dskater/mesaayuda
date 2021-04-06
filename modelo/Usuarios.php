<?php

    class Usuarios
    {
        var $id;
        var $username;
        var $password;

        function __construct($username, $password)
        {
            $this->username=$username;
            $this->password=$password;
        }

        function setUsername($username)
        {
            $this->username=$username;
        }

        function getUsername()
        {
            return $this->username;
        }

        function setPassword($password)
        {
            $this->password=$password;
        }

        function getPassword()
        {
            return $this->password;
        }

        
    }


?>