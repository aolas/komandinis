<?php
define('__CONFIG__', true);


?>
<html>
    <head>
        <?php require_once "includes/head.php"; ?>
    </head>
    <body>

    <div class="container main-wraper main-container">
        <?php require_once "includes/navigation.php"; ?>
        <h2 class="text-center registration">Registration</h2>
        <form class="js-register">
            <div class="form-group">
                <label for="InputEmail">Email address</label>
                <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="passwordImput">Password</label>
                <input type="password" class="form-control" id="passwordImput">
                <small id="passwordHelp" class="form-text text-muted">Must be at least 8 characters long</small>
                <label for="confirmPasswordImput">Confirm password</label>
                <input type="password" class="form-control" id="confirmPasswordImput">
            </div>
            <div  class="invalid-feedback server-error">
                This email already exist.
            </div>
            <div  class="invalid-feedback invalid-password">
                Not valid password.
            </div>

            <button type="submit" class="btn submit-btn">Submit</button>
        </form>
    </div>
    <?php require_once "includes/footer.php"; ?>
    </body>
</html>
