<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

include "../config/Conexion.php";
include "../models/Model.php";
include "../models/Product.php";

class ProductController
{
    public function get()
    {
        return Product::all();
    }

    public function show($id)
    {
        return Product::find($id);
    }
}

$obj = new ProductController();
print_r($obj->get()->fetch_all());