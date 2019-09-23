<?php


class Response
{
    public static function view($url, array $result = [])
    {
        $data = (object)$result;
        include('views/' . $url);
    }

    public static function json(array $result = [])
    {
        print json_encode($result);
    }
}