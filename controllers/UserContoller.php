<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

include "../config/Conexion.php";
include "../core/HasAttribute.php";
include "../core/Query.php";
include "../core/Model.php";
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

    public function get_administrator()
    {
        return User::where("role = 'Administrator' and name = 'saul'");
    }

    public function consulta($query)
    {
        return User::Query($query);
    }

    public function solo_columnas()
    {
        return User::select(['name', 'role'], "role = 'Seller'");
    }
}

$obj = new UserContoller();
//$obj->store(['role'=>'Admistrator', 'name' => 'Sarai Cabrera', 'email' => 'sarai@samai.com', 'password' => '123456', 'saul' => 'saul']);
//$obj->update(['role'=>'Admistrator', 'otro' => 'otro'], 1);
//$res = $obj->get_administrator();
//$res = $obj->consulta("select name from user")->fetch_all();
$res = $obj->solo_columnas();
print_r($res);
