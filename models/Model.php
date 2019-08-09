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

    protected static function get_values(array $request)
    {
        $values = [];
        foreach (self::$columns as $key => $value) {
            $values[$value] = array_key_exists($value, $request) ? $request[$value] : 'null';
        }
        $str_values = "'" . implode("', '", $values) . "'";
        return str_replace("'null'", "null", $str_values);
    }

    protected static function get_values_update(array $request)
    {
        $values = [];
        foreach (self::$columns as $key => $value) {
            if(array_key_exists($value, $request))
                $values[] = $value . " = '". $request[$value]. "'";
        }
        return implode(", ", $values);
    }

    /**
     * @param mysqli_result $result
     * @return array
     */
    private static function convert_to_object(mysqli_result $result)
    {
        $data = array();
        while ($row = $result->fetch_object()) {
            $data[] = $row;
        }
        return $data;
    }

    public static function all()
    {
        $sql = sprintf("SELECT * FROM %s", self::$table);
        $result = self::execute_query($sql);

        return self::convert_to_object($result);
    }

    public static function where($conditions)
    {
        $sql = sprintf("SELECT * FROM %s WHERE %s", self::$table, $conditions);
        $result = self::execute_query($sql);
        return self::convert_to_object($result);
    }

    public static function select(array $columns, $conditions = "")
    {
        if(empty($conditions))
            $sql = sprintf("SELECT %s FROM %s", implode(", ", $columns), self::$table);
        else
            $sql = sprintf("SELECT %s FROM %s WHERE %s", implode(", ", $columns), self::$table, $conditions);

        $result = self::execute_query($sql);

        return self::convert_to_object($result);
    }

    public static function find($id)
    {
        $sql = sprintf("SELECT * FROM %s where id = %d LIMIT 1", self::$table, $id);
        return self::execute_query($sql)->fetch_object();
    }

    public static function create(array $request)
    {
        $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)",
            self::$table,
            self::get_columns(),
            self::get_values($request));
        return self::execute_query($sql);
    }

    public static function update(array $request, $id)
    {
        $sql = sprintf("UPDATE %s SET %s WHERE id = %d",
            self::$table,
            self::get_values_update($request),
            $id);
        return self::execute_query($sql);
    }

    public static function remove($id)
    {
        $sql = sprintf("delete from %s where id = %d", self::$table, $id);
        return self::execute_query($sql);
    }

    public static function query($sql)
    {
        $sql = sprintf($sql);
        return self::execute_query($sql);
    }
}