<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

include "../config/Conexion.php";
include "../models/Model.php";
include "../models/User.php";

class UserContoller
{
    public function get()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function store($request)
    {
        return User::create($request);
    }

    public function update($request, $id)
    {
        return User::update($request, $id);
    }
}

$obj = new UserContoller();
//$obj->store(['role'=>'Admistrator', 'name' => 'Sarai Cabrera', 'email' => 'sarai@samai.com', 'password' => '123456', 'saul' => 'saul']);
$obj->update(['role'=>'Admistrator', 'otro' => 'otro'], 1);
$res = $obj->get();
print_r($res);