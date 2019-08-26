<?php


class Response
{
    public static function view($url, array $result = [])
    {
        $data = $result;
        include('views/' . $url);
    }
}