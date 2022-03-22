<?php
include './inc/header.php';

$message = "";
$message2 =  "";
$code = "";

// first section
if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    $result = $user->getByEmail($email);
    if (count($result->fetch()) > 0) {
        $date = date_create();
        $code = date_timestamp_get($date);

        $to = $email;
        $subject = "Password reset code";
        $message = "<h1>Please fill the following code in the password reset page form.</h1>";
        $message .= "Copy this code  " . $code;
        $headers = "From: seniorcassini@gmail.com" . "\r\n"
            . 'MIME-Version: 1.0' . "\r\n"
            . 'Content-type: text/html; charset=utf-8';


        if (mail($to, $subject, $message, $headers)) $message = "<span class='text-success'>A code has been sent to your email</span>";
        else $message = "<span class='text-danger'>Email failed to send</span>";
    } else {
        $message = "<span class='text-danger'>Email doesn't match any account</span>";
    }
}


// CREATING NEW PASSWORD
// second section
if (isset($_POST['code'])) {
    if ($code != $_POST['codeinput']) {
        $message2 = "<span class='text-danger'>Code doesn't match</span>";
    } else {
        $message2 = "<span class='text-success'>Code matched</span>";
    }
}

?>

<!-- the two columns html forms -->
<div class="row m-auto">
    <h2 class="display-3 text-center m-5 px-5">Treat your password like your toothbrush. Don't let anybody else use it, and get a new one every three months.</h2>
    <form action="" method="post" class="col-md-6 my-5">

        <div class="card p-3">
            <?= isset($message) ? $message : '' ?>
            <img src="img/forgot-password.webp" alt="forgot password" style="max-width: 300px;" />
            <div class="card-body">
                <h5 class="card-title">Forgot Password?</h5>
                <p class="card-text">

                <div class="form-group">
                    <label for="email">Enter your email: </label>
                    <input type="email" name="email" id="email" placeholder="enter email here" class="form-control">
                </div>
                </p>
                <input type="submit" class="btn btn-outline-primary" value="Confirm" name="submit">
            </div>
        </div>
    </form>

    <div class="col-md-6 my-5">
        <h2>Enter code first and then create your new password</h2>
        <?= isset($message2) ? $message2 : '' ?>
        <form method="post" class="d-flex my-3">
            <input type="text" name="codeinput" class="form-control col-6" placeholder="enter the code">
            <input type="submit" name="code" value="Enter" class="btn btn-primary">
        </form>


        <h3>Create a new password</h3>
        <form method="post">
            <div class="form-group">
                <input type="text" name="newPassword" placeholder="Choose a new password" class="form-control my-3 col-6" />
                <input type="text" name="confirmPassword" placeholder="Confirm password" class="form-control col-6" />
            </div>
            <input type="submit" value="Confirm" class="btn btn-outline-success" name="confirm">
        </form>
    </div>
</div>

<?php include './inc/footer.php'; ?>