<?php

class Conexion
{
    public static function connect()
    {
        $server = "localhost";
        $data_base = "ctrfoodDB";
        $user = "root";
        $password = "root";

        $cad_con = new mysqli($server, $user, $password);
        $cad_con->select_db($data_base);

        return $cad_con;
    }

    public static function disconnect($cad_con)
    {
        mysqli_close($cad_con);
    }
}