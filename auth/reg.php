<?php

ini_set('display_errors', 1);
session_start();

include_once '../route/function.php';
$routes = include_once '../route/routes.php';
run('/db', $routes);

if (isset($_POST["submit"])) {
    $db = new DB();
    $uid = 1;
    $phone = $_POST["phoneNumber"];
    $password = $_POST["password"];
    $name = $_POST["name"];

    $sql = "INSERT INTO  users(uid,phone,password,name) values ($uid,'$phone','$password','$name') ";

    $db->insert($sql);

    run('/regdone', $routes);

}
