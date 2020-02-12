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
$food = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];

$drink = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];

//switching food & drinks
$products = $drink;
if (isset($_GET['food'])){
    if($_GET['food'] ==1){
        $products = $food;
    }
    else {
        $products= $drink;
    }
}






$totalValue = 0;

$emailError = $strtnumError = $zipError =  $cityError =  $strtError = null;

if (!empty($_POST['email'])) {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        // $emailError = "Email address " . $_POST['email'] . " is considered invalid.\n";
        $emailError ="<div class= 'alert alert-danger'> Please enter a valid email address.</div>";
    } else {
        $_SESSION ['email'] = $_POST['email'];
    }

}

if (!empty($_POST['streetnumber'])){

  if (is_numeric($_POST["streetnumber"])) {
        // $strtnumError = "This  " . $_POST["streetnumber"] . " is an invalid street number!\n"; [This works!]
        $strtnumError ="<div class='alert alert-success'> valid number!</div>";// Using bootstrap

      $_SESSION ['streetnumber'] = $_POST['streetnumber'];
    }
    else {
        $strtnumError ="<div class='alert alert-danger'> This is not a number!</div>"; // Using bootstrap
    }
}

if (!empty($POST['zipcode'])){
    if (is_numeric($_POST["zipcode"])) {
        // $zipError = $_POST["zipcode"] . " Invalid ZIP code!\n";
        $zipError ="<div class='alert alert-success'> valid ZIP code!</div>";
        $_SESSION['zipcode'] = $_POST['zipcode'];
    }
    else {
        $zipError ="<div class='alert alert-danger'> Invalid ZIP code</div>"; // Using bootstrap
    }

}

if (!empty($POST['city'])){
    if (!filter_var($_POST["city"])) {
        $cityError = "This is an invalid " . $_POST["city"] . " city!\n";
        $cityError = "<div class='alert alert-danger'> Input the city name</div>";
    }
    else{$_SESSION['city'] = $_POST['city'];}
}

if(empty($POST['street'])) {
    if (!filter_var($POST['street'])) {
        $strtError = "<div class='alert alert-danger'>Input the street name</div>" . $_POST["street"];
    } else {
        $_SESSION['street'] = $_POST['street'];
    }
}


if (!$_SESSION['email'] or !$_SESSION['streetnumber'] or !$_SESSION['zipcode'] or !$_SESSION['city'] or !$_SESSION['street'])
{
    $_SESSION ['email'] = $_POST['email'];
    $_SESSION['streetnumber'] = $_POST['streetnumber'];
    $_SESSION['zipcode']= $_POST['zipcode'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['street'] = $_POST['street'];
}

whatIsHappening();

require './form-view.php';
