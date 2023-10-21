
<?php

return [
    '/' => function () {
        header("location:/");
    },
    '/reg' => function () {
        $index = "auth/reg.php";
        echo $index;

    },
    '/regdone' => function () {
        header("location:/ahwikhschool/index.php?regmessage=Registration Complete Now Login");

    },
    '/checklogin' => function () {
        header("location:/ahwikhschool/index.php?message=Invalide Username Password");

    },
    '/authuser' => function () {
        $index = "auth/userauth.php";
        echo $index;

    },
    '/deshboard' => function () {
        header("location:/ahwikhschool/dashboard/");
    },
    '/db' => function () {
        include $_SERVER['DOCUMENT_ROOT'] . "/ahwikhschool/db/db.php";
    },
    '/logout' => function () {
        echo "../logout.php";

    },

];