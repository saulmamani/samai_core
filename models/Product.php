<?php


class Product
{
    use Model;

    public static $table = 'product';

    public static $columns = [
        'category',
        'name',
        'price',
        'url_image',
    ];
}