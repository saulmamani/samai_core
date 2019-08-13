<?php


class Product extends Model
{
    public static $table = 'product';

    public static $columns = [
        'category',
        'name',
        'price',
        'url_image',
    ];
}