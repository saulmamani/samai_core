<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ctrl Food</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="./">Users</a></li>
            <li><a href="products">products</a></li>
        </ul>
    </header>
    <div class="container">
        <?php
            foreach ($data->users as $row)
            {
                print_r($row);
            }
        ?>
    </div>
</body>
</html>