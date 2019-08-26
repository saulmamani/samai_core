<?php

include "../config/includes.php";

class SaleController
{
    public function toList()
    {
        return Sale::all();
    }

    public function getOne($id)
    {
        return Sale::find($id);
    }

    public function store($request)
    {
        return Sale::create($request);
    }

    public function update($request, $id)
    {
        return Sale::update($request, $id);
    }

    public function destroy($id)
    {
        return Sale::remove($id);
    }
}