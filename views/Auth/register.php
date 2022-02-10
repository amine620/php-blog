<?php

include '../../controllers/UserController.php';
$error = '';
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        if (register($_POST['name'], $_POST['email'], $_POST['password']) == false) {
            $error = 'email already exist';
        }
    } else {
        $error = 'filed missing';
    }
}



?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <form action="" class="form-signin" method="post">
        <?php
        if ($error != '') :
        ?>

            <div class="alert alert-danger" role="alert">
                <?php echo $error ?>
            </div>

        <?php endif ?>

        <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
        <label for="inputEmail" class="sr-only">Name</label>
        <input name="name" type="text" id="inputEmail" class="form-control mt-2" placeholder="Name">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="email" type="email" id="inputEmail" class="form-control mt-2" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control mt-2" placeholder="Password" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
    </form>
</body>

</html>