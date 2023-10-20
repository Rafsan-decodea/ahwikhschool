<?php
session_start();
include 'route/function.php';
$routes = include 'route/routes.php';
run('/db', $routes);
$db = new DB();
// This is dashboard

if (!isset($_SESSION["id"])) {
    run("/", $routes);

}

// if ($_SESSION["uid"] == 0) {

?>
<?php include 'extra/nav.php'?>

<main style="margin-top: 58px;">
  <div class="container pt-4">asdasaasdadadsasdd</div>
</main>
<?php include 'extra/fotter.php'?>
