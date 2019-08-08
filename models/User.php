<?php

class User
{
    use Model;

    public static $table = "user";

    public static $columns = [
        'email',
        'password',
        'name',
        'role'
    ];
}