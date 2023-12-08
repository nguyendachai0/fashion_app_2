<?php
// register.php


require_once '../app/controllers/AuthController.php';
require_once '../app/models/AuthModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    // Perform validation (e.g., check if passwords match, email is valid, etc.)

    $model = new AuthModel('user');
    $authController = new AuthController($model);

    // Call the registration method
    $error = $authController->register($email, $password);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SignUp Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="/assets/css/style2.css">

</head>

<body class="d-flex justify-content-center align-items-center vh-100">

    <form action="" method="post">
        <div class="tong">

            <div class="boxtrai">
                <h3 class="form_heading">Register</h3>
                <div class="form_login-hn">
                    <div class="form-group">
                        <label for="username">Email address*</label></br>
                        <input class="tendangnhap" type="text" name="email" id="username">
                    </div>
                    <div class="form-group">
                        <label class="form-group" for="password">Password*</label></br>
                        <input class="mkdangnhap" type="password" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label class="form-group" for="password">Confirm Password*</label></br>
                        <input class="mkdangnhap" type="password" name="password2" id="password">
                    </div>
                    <div class="button">
                        <button class="btn">Register</button>
                    </div>
                    <div class="a_top">
                        <a href="login.html" class="text_link">Back!</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>