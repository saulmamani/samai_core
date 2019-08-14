<?php

abstract class Model
{
    protected static function connect()
    {
        $server = Conexion::Server;
        $data_base = Conexion::DataBase;
        $user = Conexion::User;
        $password = Conexion::Password;
        $port = Conexion::Port;

        $cad_con = new mysqli($server, $user, $password, $data_base, $port)
                    or die ("Error de conexion a la base de datos, revise sus credenciales");

        return $cad_con;
    }

    protected static function disconnect($cad_con)
    {
        mysqli_close($cad_con);
    }

    protected static function execute_query($sql)
    {
        $conexion = self::connect();
        $result = $conexion->query($sql);
        self::disconnect($conexion);

        return $result;
    }

    /**
     * @param mysqli_result $result
     * @return array
     */
    protected static function convert_to_object(mysqli_result $result)
    {
        $data = array();
        while ($row = $result->fetch_object()) {
            $data[] = $row;
        }
        return $data;
    }
}