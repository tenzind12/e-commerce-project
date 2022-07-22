<?php
include_once 'core/lib/Session.php';
Session::init();
include_once('core/lib/Database.php');

include(__DIR__ . '/../core/helpers/Format.php');

spl_autoload_register(function ($class) {
    include_once(__DIR__ . "/../core/classes/" . $class . ".class.php");
});

$db      = new Database();
$fm      = new Format();
$course  = new Course();
$cart    = new Cart();
$user    = new User();
$order   = new Order();
$search  = new Search();
$cmmt = new Comment();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="The best site you will ever find for learning how to code. From zero to professional level">
    <link rel="icon" href="./img/code_logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/mainstyle.css">
    <link rel="stylesheet" href="assets/css/slider.css">
    <link rel="stylesheet" href="assets/css/comment--slider.css">
    <link rel="stylesheet" href="./assets/css/stripe.css">
    <title>Code Along - Learn at your pace - The best learning site</title>
</head>

<body id="bootstrap-overrides">
    <div class="main-container px-3">
        <div class="header_top">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="index.php"><b>Code Along</b></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">Cart <span class="badge  badge-danger">
                                    <?php
                                    $data = $cart->getAllCart();
                                    if ($data) echo "€ " . number_format(Session::get('totalPrice'), 2, ',', ' ');
                                    else echo "Empty";
                                    ?>
                                </span></a>
                        </li>

                        <!-- logout function -->
                        <?php
                        if (isset($_GET['cusId'])) {
                            $delCart = $cart->delAllCart();
                            Session::destroy();
                        }
                        ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                                Connection
                            </a>
                            <div class="dropdown-menu">
                                <!-- to dynamically display login logout button  -->
                                <a class="dropdown-item" href="<?= Session::get('cusLogin') ? '?cusId=' . Session::get('cusId') : 'login.php' ?>">
                                    <?= Session::get('cusLogin') ? 'Logout' : 'Login' ?>
                                </a>
                                <div class="dropdown-divider"></div>
                                <!-- display signup button according to session -->
                                <?= !Session::get('cusLogin') ? '<a class="dropdown-item" href="login.php">Sign Up</a>' : '' ?>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>

                        <!-- show Hello { Name } if customer is logged in  -->
                        <?php
                        if (Session::get('cusLogin') == true) {
                        ?>
                            <li>
                                <a class="nav-link" href="profile.php">Hello <span class="text-success">
                                        <?= Session::get('cusName') ? explode(' ', Session::get('cusName'))[0] : 'Guest' ?>
                                    </span></a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>

                    <!-- Search Bar in the header -->
                    <?php
                    if (isset($_POST['search'])) {
                        header("Location: search.php?search=" . $_POST['search']);
                    }
                    ?>

                    <form class="form-inline my-2 my-lg-0" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                        <input class="form-control mr-sm-2 search--fs" type="search" placeholder="Search" aria-label="Search" name="search">
                        <input class="btn btn-outline-warning my-2 my-sm-0 search--fs" type="submit" value="Search" />
                    </form>
                </div>
            </nav>
        </div>