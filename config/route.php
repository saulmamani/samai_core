<?php

$server = $_SERVER["HTTP_HOST"];
$document = $_SERVER["DOCUMENT_ROOT"];

$route = isset($_GET['route']) ? $_GET['route'] : 'error';

$params = [];
$url = explode("/", $route)[0];
$params = explode("/", $route);
$request_type = $_SERVER['REQUEST_METHOD'];


function get_values(array $request)
{
    $values = "";
    foreach ($request as $key => $value) {
        $values .= "'" . $key . "'=>'" . $value . "',";
    }
    return $values;
}

//function open($ruta, $action)
//{
//    $class = explode("@", $action)[0];
//    $method = explode("@", $action)[1];
//
//    $request = get_values($_REQUEST);
//
//    $str = sprintf("(new %s())->%s([%s]);", $class, $method, $request);
//    eval($str);
//}

$rutas = [];

function get($ruta, $action)
{
    $class = explode("@", $action)[0];
    $method = explode("@", $action)[1];

    $request = get_values($_REQUEST);

    array_push($GLOBALS['rutas'], [$ruta, 'GET']);

    //$str = sprintf("(new %s())->%s([%s]);", $class, $method, $request);
    //eval($str);
}
function post($ruta, $action)
{
    $class = explode("@", $action)[0];
    $method = explode("@", $action)[1];

    $request = get_values($_REQUEST);

    array_push($GLOBALS['rutas'], [$ruta, 'POST']);


    //$str = sprintf("(new %s())->%s([%s]);", $class, $method, $request);
    //eval($str);
}
function put($ruta, $action)
{
    $class = explode("@", $action)[0];
    $method = explode("@", $action)[1];

    $request = get_values($_REQUEST);

    array_push($GLOBALS['rutas'], [$ruta, 'PUT']);


    //$str = sprintf("(new %s())->%s([%s]);", $class, $method, $request);
    //eval($str);
}
function delete($ruta, $action)
{
    $class = explode("@", $action)[0];
    $method = explode("@", $action)[1];

    $request = get_values($_REQUEST);

    array_push($GLOBALS['rutas'], [$ruta, 'DELETE']);


    //$str = sprintf("(new %s())->%s([%s]);", $class, $method, $request);
    //eval($str);
}

switch ($url) {
    case 'users' :
//        if($request_type === 'GET')
            get('users', 'UserController@toList');
            get('users/{id}', 'UserController@getOne');
//        if($request_type === 'POST')
            post('users', 'UserController@store');
//        if($request_type === 'PUT')
            put('users/{id}', 'UserController@destroy');
//        if($request_type === 'DELETE')
            delete('users/{id}', 'UserController@udate');

            print_r($rutas);
        break;
    case 'products' :
        $products = new ProductController();
        include("views/producs/index.php");
        break;
    default:
        redirect("404.php");
        break;
}
?>
