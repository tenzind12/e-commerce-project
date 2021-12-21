<?php include 'inc/header.php';?>

<div class="row my-5 mx-2">

    <!-- sign in section -->
    <div class="col-sm-5 border border-muted py-3">
        <h2>Existing Customers</h2>
        <form action="post" method="">
            <div class="form-group w-50">
                <label for="userId"><small>Sign in with the forms below:</small></label>
                <input type="text" name="userId" class="form-control mb-2" placeholder="Username">
                <input type="password" name="password" class="form-control" placeholder="•••••••••••••">
            </div>
            <p class="text-muted my-5"><i><small>If you forgot your passoword just enter your email and  <a href="#">click here</i></small></a>.</p>
            <input type="submit" value="Sign in" class="btn-lg btn-dark">
        </form>
    </div>

    <!-- Sign up section -->
    <div class="col-sm-7 border border-muted py-3">
        <h2>Register New Account</h2>
        <form action="" method="POST">
            <div class="form-group">

                <div class="d-flex mb-2">
                    <input type="text" name="name" placeholder="Name" class="form-control">
                    <input type="text" name="address" placeholder="Address" class="form-control ml-2">
                </div>

                <div class="d-flex mb-2">
                    <input type="text" name="city" placeholder="City" class="form-control">
                    <input type="text" name="country" placeholder="Country" class="form-control ml-2">
                </div>

                <div class="d-flex mb-2">
                    <input type="text" name="zip" placeholder="Zip-code" class="form-control">
                    <input type="text" name="phone" placeholder="Phone" class="form-control ml-2">
                </div>

                <div class="d-flex mb-2">
                    <input type="text" name="email" placeholder="E-mail" class="form-control">
                    <input type="text" name="password" placeholder="Password" class="form-control ml-2">
                </div>

                <input type="submit" value="Create Account" class="btn-lg btn-dark my-5">
            </div>
        </form>
        <p><i><small>By clicking 'Create Account' you agree to the <a href="#">Terms & Conditions</a>.</small></i></p>
    </div>
</div>

<?php include 'inc/footer.php';?>
