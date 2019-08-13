<?php


class Product extends Model
{
    use Query;

    public static $table = 'product';

    public static $columns = [
        'category',
        'name',
        'price',
        'url_image',
    ];
}