<?php
// login.php

require_once '../app/controllers/AuthController.php';
require_once '../app/models/AuthModel.php';

// Assuming AuthModel uses PDO for database connection


// Create an instance of AuthModel and pass the database connection
$model = new AuthModel('user');

// Create an instance of AuthController and pass the AuthModel
$authController = new AuthController($model);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];

    $error = $authController->login($email, $password);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="/assets/css/style2.css">

</head>

<body class="d-flex flex-column justify-content-center align-items-center vh-100">
    <?php if (isset($_SESSION['login_error'])) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $_SESSION['login_error'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['login_error']); // Unset the session variable after displaying 
        ?>
    <?php endif; ?>


    <form action="" method="post">
        <div class="tong">
            <div class="boxtrai">
                <h3 class="form_heading">Login</h3>
                <div class="form_login">
                    <div class="form-group">
                        <label for="username">Username or email*</label></br>
                        <input type="text" name="email" placeholder="" id="user">
                        <div id="email-error"></div> <!-- Placeholder for email error message -->
                        <label class="form-group" for="password">Password*</label></br>
                        <input type="password" name="password" placeholder="" id="pass">
                        <div id="password-error"></div> <!-- Placeholder for password error message -->

                    </div>
                    <div class="button">
                        <button class="btn" onclick="checkform()">LOGIN</button>
                    </div>
                    <div class="input_top">
                        <input type="checkbox" name="vehicle2" value=""> Remember Me<br>
                    </div>
                    <div class="a_top">

                        <a href="/register" class="text_link">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
<!-- login.php -->

<script>
    function checkform() {
        var email = document.getElementById('user').value;
        var password = document.getElementById('pass').value;

        var errors = [];

        // Validate email
        if (!email) {
            errors.push('Email is required.');
        }

        // Validate password
        if (!password) {
            errors.push('Password is required.');
        }

        // Display errors next to the corresponding fields
        if (errors.length > 0) {
            // Clear existing error messages
            document.querySelectorAll('.error-message').forEach(function(element) {
                element.innerHTML = '';
            });

            // Display errors next to the fields
            errors.forEach(function(error) {
                var errorMessage = document.createElement('div');
                errorMessage.className = 'text-danger error-message';
                errorMessage.innerHTML = error;

                // Append error message next to the corresponding field
                if (error.includes('Email')) {
                    document.getElementById('email-error').appendChild(errorMessage);
                } else if (error.includes('Password')) {
                    document.getElementById('password-error').appendChild(errorMessage);
                }
            });
        } else {
            // If no errors, submit the form
            document.forms[0].submit();
        }
    }
</script>