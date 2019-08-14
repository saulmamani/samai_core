<?php

include "../config/App.php";

class ProductController extends BaseController
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