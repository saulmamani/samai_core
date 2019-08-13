<?php

trait HasAttribute
{
    public static function get_columns()
    {
        return implode(", ", self::$columns);
    }

    public static function get_values(array $request)
    {
        $values = [];
        foreach (self::$columns as $key => $value) {
            $values[$value] = array_key_exists($value, $request) ? $request[$value] : 'null';
        }
        $str_values = "'" . implode("', '", $values) . "'";
        return str_replace("'null'", "null", $str_values);
    }

    public static function get_values_update(array $request)
    {
        $values = [];
        foreach (self::$columns as $key => $value) {
            if (array_key_exists($value, $request))
                $values[] = $value . " = '" . $request[$value] . "'";
        }
        return implode(", ", $values);
    }

}