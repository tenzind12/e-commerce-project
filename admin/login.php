<?php include_once '../classes/Adminlogin.class.php'?>

<?php
    $adminLogin = new Adminlogin();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $adminUser = $_POST['adminUser'];
        $adminPass = md5($_POST['adminPass']);

        $logginIn = $adminLogin->adminLogin($adminUser, $adminPass);
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/admin.css">
        <title>Admin Login</title>
    </head>
    <body id="adminLogin">
        <div class="container col-md-5 py-5">
            <h2>Admin Login</h2>
            <div class="row justify-content-center mt-5">
                <form action="" method="POST" class="col-lg-8">
                    <div class="form-group">
                        <input type="text" name="adminUser" placeholder="Username" class="form-control">
                        <input type="password" name="adminPass" placeholder="Password" class="form-control my-2">
                    </div>
                    <!-- display login msg -->
                    <?= isset($logginIn) ? $logginIn : ""?>
                    <input type="submit" value="Log In" id="login-btn">
                </form>
            </div>
        </div>
    </body>
</html>