<?php
//ini_set('display_errors', 1);
session_start();
include '../route/function.php';
$routes = include '../route/routes.php';
run('/db', $routes);
$db = new DB();
// This is dashboard

if (!isset($_SESSION["id"])) {
    run("/", $routes);

}

// if ($_SESSION["uid"] == 0) {

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Sidebar With Bootstrap</title>
</head>

<body>
