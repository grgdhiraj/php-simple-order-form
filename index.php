<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

//your products with their price.
$products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];

$products = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];


$totalValue = 0;

$emailError = ""; $strtnumError = ""; $zipError = ""; $cityError = ""; $strtError ="";

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $emailError = "Email address " . $_POST['email'] . " is considered invalid.\n";
    }

    if (!is_numeric($_POST["streetnumber"])) {
    $strtnumError = "This  " . $_POST["streetnumber"] . " is an invalid street number!\n";
    }

    if (!is_numeric($_POST["zipcode"])) {
    $zipError = $_POST["zipcode"] . " Invalid ZIP code!\n";
    }

    if (!filter_var($_POST["city"])) {
        $cityError = "This is an invalid " . $_POST["city"] . " city!\n";
    }

    if (!filter_var($_POST["street"])) {
        $strtError = "This is an invalid " . $_POST["street"] . " street name!\n";
    }


require './form-view.php';
