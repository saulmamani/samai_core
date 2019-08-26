<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

include "config/Conexion.php";
include "core/HasAttribute.php";
include "core/Query.php";
include "core/Model.php";
include "core/Response.php";

include "models/User.php";
include "models/Product.php";
include "models/Sale.php";
include "models/Detail.php";

include "controllers/UserContoller.php";
include "controllers/ProductController.php";


//routes
include "config/route.php";