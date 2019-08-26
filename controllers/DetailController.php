<?php

include "../config/includes.php";

class DetailController
{
    public function toList()
    {
        return Detail::all();
    }

    public function getOne($id)
    {
        return Detail::find($id);
    }

    public function store($request)
    {
        return Detail::create($request);
    }

    public function update($request, $id)
    {
        return Detail::update($request, $id);
    }

    public function destroy($id)
    {
        return Detail::remove($id);
    }
}