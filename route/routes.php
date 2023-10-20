
<?php

return [
    '/' => function () {
        header("location:/");
    },
    '/checklogin' => function () {
        header("location:/ahwikhschool/index.php?message=Invalide Username Password");

    },
    '/authuser' => function () {
        $index = "auth/userauth.php";
        echo $index;

    },
    '/deshboard' => function () {
        header("location:dashboard/index.php");
    },
    '/db' => function () {
        include $_SERVER['DOCUMENT_ROOT'] . "/ahwikhschool/db/db.php";
    },
];