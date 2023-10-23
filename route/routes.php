
<?php

return [
    '/' => function () {
        header("location:/");
    },
    '/reg' => function () {
        $index = "auth/reg.php";
        echo $index;

    },
    '/regform' => function () {
        echo "/dashboard/users/regform.php";
    },
    '/regfail' => function () {
        header("location:/index.php?regmessage=User Exist ");
    },
    '/regdone' => function () {
        header("location:/index.php?regmessage=Registration Complete Now Login");

    },
    '/checklogin' => function () {
        header("location:/index.php?message=Invalide Username Password");

    },
    '/authuser' => function () {
        $index = "/auth/userauth.php";
        echo $index;

    },
    '/deshboard' => function () {
        header("location:/dashboard/");
    },
    '/db' => function () {
        include $_SERVER['DOCUMENT_ROOT'] . "/db/db.php";
    },
    '/logout' => function () {
        echo "/logout.php";

    },

];