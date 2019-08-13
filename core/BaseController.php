<?php

class BaseController
{
    protected function json($data)
    {
        return json_encode($data);
    }
}