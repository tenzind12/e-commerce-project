<?php include_once '../lib/Session.php' ?>
<?php Session::checkSession(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="css/reset.css">
        <title>Welcome Admin</title>
    </head>
    <body class="container" id="bootstrap-overrides">
        <header>
            <div class="p-3 border border-dark">
                <div class="row">
                    <div class="col">
                        <h1>Easy learning</h1>
                    </div>
                    <div class="col">
                        <p class="float-right">
                            <img src="img/admin-logo.png" class="admin-logos" alt="Admin logo"/>
                            <?php 
                                if(isset($_GET['action']) && $_GET['action'] == "logout") Session::destroy();
                            ?>
                             &nbsp; Hello <?= Session::get('adminName')?> | <a href="?action=logout" class="text-primary">Log Out</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- the links -->
            <nav class="navbar navbar-expand-lg my-3 py-3 navbar-light border border-dark bg-sm-light">
                <li class="navbar-brand text-muted" href="#">Navbar</li>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active ml-3">
                            <a class="nav-link" href="#"><img src="img/dashboard.png" alt="site logo" class="admin-logos mr-2 p-1">Dashboard <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-3" href="#"><img src="img/profile.png" alt="site logo" class="admin-logos mr-2 p-1">User Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-3" href="#"><img src="img/inbox.png" alt="site logo" class="admin-logos mr-2 p-1">Inbox</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-3" href="#"><img src="img/website.png" alt="site logo" class="admin-logos mr-2 p-1">Visit Site</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>