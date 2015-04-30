<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php $url = "http://localhost/touchard/index.php";
        $response = file_get_contents($url); ?>
        <a href="<?php $response?>">films</a>
    </body>
</html>
