<?php
    include_once 'lib/Session.php';
    Session::init();
    include_once ('lib/Database.php');

    $filepath = realpath(dirname(__FILE__));
    include ($filepath.'/../helpers/Format.php');

    spl_autoload_register(function($class) {
        $filepath = realpath(dirname(__FILE__));
        include_once ($filepath."/../classes/" .$class .".class.php");
    });

    $db     = new Database();
    $fm     = new Format();
    $course = new Course();
    $cart    = new Cart();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mainstyle.css">
    <link rel="stylesheet" href="css/slider.css">
    <title>Easy learning - Learn at your pace</title>
  </head>
  <body id="bootstrap-overrides">
      <div class="container-lg px-3">
          <div class="header_top">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="index.php"><b>Easy learning</b></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Course</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">Cart <span class="badge  badge-danger">
                                <?php
                                $data = $cart->getAllCart();
                                if($data) echo "€ ".number_format(Session::get('totalPrice'), 2, ',', ' ');
                                else echo "Empty";
                                ?>
                            </span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Login
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="login.php">Login</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.php">Sign Up</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                    </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2 search--fs" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-warning my-2 my-sm-0 search--fs" type="submit">Search</button>
                </form>
                </div>
            </nav>
          </div>