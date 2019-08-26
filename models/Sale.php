<?php


class Sale extends Model
{
    use Query;

    public static $table = "sale";

    public static $columns = [
        'date_sale',
        'concept',
        'nit',
        'customer_name',
        'user_id'
    ];
}