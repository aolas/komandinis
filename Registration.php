<?php
define('__CONFIG__', true);

require_once "includes/config.php";
?>
<html>
    <head>
        <?php require_once "includes/head.php"; ?>
    </head>
    <body>
    <?php require_once "includes/navigation.php"; ?>
    <div class="container registration">
        <h2>Registration</h2>
        <form>
            <div class="form-group">
                <label for="InputEmail1">Email address</label>
                <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">
            
            </div>
            <div class="form-group">
                <label for="passwordImput">Password</label>
                <input type="password" class="form-control" id="passwordImput">
                <small id="passwordHelp" class="form-text text-muted">Must be 8-20 characters long</small>
                <label for="confirmPasswordImput">Confirm password</label>
                <input type="password" class="form-control" id="confirmPasswordImput">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php require_once "includes/footer.php"; ?>
    </body>
</html>
