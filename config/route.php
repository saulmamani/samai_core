<?php

$server = $_SERVER["HTTP_HOST"];
$document = $_SERVER["DOCUMENT_ROOT"];

$rute = isset($_GET['rute']) ? $_GET['rute'] : 'error';

$params = [];
$url= explode("/", $rute)[0];
$params= explode("/", $rute);

function open($ruta, $action)
{
    $class = explode("@", $action)[0];
    $method = explode("@", $action)[1];

    $str = sprintf("(new %s())->%s();", $class, $method);
    echo $str;
   eval($str);

//    (new UserController())->toList();

//    eval("$obj = new " . $class . "()");
//    eval("$obj->". $method . "()");
}

switch ($url) {
    case 'users' :
        /*$users = new UserController();
        //redirect("users");
        //include ("views/users/index.php");
        $users->toList();*/
        open('users', 'UserController@toList');
        break;
    case 'products' :
        $products = new ProductController();
        include ("views/producs/index.php");
        break;
    default:
        redirect("404.php");
        break;
}
?>
