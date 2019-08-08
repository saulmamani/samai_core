<?php

trait Model
{
    protected static function execute_query($sql)
    {
        $conexion = Conexion::connect();
        $result = $conexion->query($sql);
        Conexion::disconnect($conexion);

        return $result;
    }

    protected static function get_columns()
    {
        return implode(", ", self::$columns);
    }

    protected static function get_values($request)
    {
        $values = [];
        foreach (self::$columns as $key => $value) {
            $values[$value] = array_key_exists($value, $request) ? $request[$value] : 'null';
        }
        $str_values = "'" . implode("', '", $values) . "'";
        return str_replace("'null'", "null", $str_values);
    }

    public static function all()
    {
        $sql = sprintf("select * from %s", self::$table);
        $result = self::execute_query($sql);

        $data = array();
        while ($row = $result->fetch_object()) {
            $data[] = $row;
        }
        return $data;
    }

    public static function find($id)
    {
        $sql = sprintf("select * from %s where id = %d limit 1", self::$table, $id);
        return self::execute_query($sql)->fetch_object();
    }

    public static function create($request)
    {
        $sql = sprintf("insert into %s (%s) values (%s)", self::$table,
            self::get_columns(),
            self::get_values($request));
        return self::execute_query($sql);
    }

    public static function update($request, $id)
    {
        $sql = sprintf("update  set %s from %s where id = %d", self::$table, self::get_values($request), $id);
        return $sql;
    }

    public static function remove($id)
    {
        $sql = sprintf("delete from %s where id = %d", self::$table, $id);
        return self::execute_query($sql);
    }
}