<?php

class User extends Model
{
    use Query;

    public static $table = "user";

    public static $columns = [
        'email',
        'password',
        'name',
        'role'
    ];
}