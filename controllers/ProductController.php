<?php

class ProductController
{
    public function toList()
    {
        return Product::all();
    }

    public function getOne($id)
    {
        return Product::find($id);
    }

    public function store($request)
    {
        return Product::create($request);
    }

    public function update($request, $id)
    {
        return Product::update($request, $id);
    }

    public function destroy($id)
    {
        return Product::remove($id);
    }
}

//$obj = new ProductController();
//$obj->store(['name' => 'Pollo a la braza', 'category' => 'Comida', 'price' => '10.4']);
//print_r($obj->toList());