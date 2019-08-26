<?php

function redirect($url){
?>

    <iframe src='<?php echo "views/" . $url ?>' width="100%" height="100%" frameborder="0"></iframe>

<?php
}

$server = $_SERVER["HTTP_HOST"];
$document = $_SERVER["DOCUMENT_ROOT"];

$pag = isset($_GET['pag']) ? $_GET['pag'] : 'error';

switch ($pag) {
    case 'users' :
        $users = new UserContoller();
        //redirect("users");
        //include ("views/users/index.php");
        $users->toList();
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
