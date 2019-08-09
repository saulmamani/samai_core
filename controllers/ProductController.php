<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
error_reporting(E_ALL);

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

    public function store($input)
    {
        return Product::create($input);
    }
}

$obj = new ProductController();
$obj->store(['name' => 'Pollo a la braza', 'category' => 'Comida', 'price' => '10.4']);
print_r($obj->get());