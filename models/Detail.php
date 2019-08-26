<?php


class Detail extends Model
{
    use Query;

    public static $table = "detail";

    public static $columns = [
        'price',
        'quantity',
        'sales_id',
        'product_id'
    ];
}